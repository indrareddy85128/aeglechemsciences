<?php

namespace App\Filament\Resources\ProductResource\RelationManagers;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Prism\Prism\Enums\Provider;
use Prism\Prism\Prism;

class MetaDetailsRelationManager extends RelationManager
{
    protected static string $relationship = 'MetaDetails';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')->columnSpanFull()->required(),
                Textarea::make('keywords')->required(),
                Textarea::make('description')->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('title')
            ->columns([
                TextColumn::make('title')->wrap(),
                TextColumn::make('keywords')->wrap(),
                TextColumn::make('description')->wrap(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()->visible(
                    fn(RelationManager $livewire) =>
                    $livewire->getOwnerRecord()->metaDetails()->count() === 0
                ),
                Tables\Actions\Action::make('generate_meta_details')
                    ->label('Generate Meta Details with AI')
                    ->action(function (RelationManager $livewire) {
                        try {
                            $prism = app(Prism::class);
                            $product = $livewire->getOwnerRecord();

                            $metaTitle = $prism->text()
                                ->using(Provider::OpenRouter, 'openai/gpt-oss-20b:free')
                                ->withPrompt("Write an SEO-optimized meta title under 60 characters for a digital marketing product or service named '{$product->name}'.")
                                ->asText();

                            $keywords = $prism->text()
                                ->using(Provider::OpenRouter, 'openai/gpt-oss-20b:free')
                                ->withPrompt("Generate 10–15 comma-separated SEO keywords for '{$product->name}'.")
                                ->asText();

                            $metaDescription = $prism->text()
                                ->using(Provider::OpenRouter, 'openai/gpt-oss-20b:free')
                                ->withPrompt("Write a compelling SEO meta description for '{$product->name}'.")
                                ->asText();

                            $meta = $product->metaDetails()->first();

                            if ($meta) {
                                $meta->update([
                                    'title' => $metaTitle->text,
                                    'keywords' => $keywords->text,
                                    'description' => $metaDescription->text,
                                ]);
                            } else {
                                $product->metaDetails()->create([
                                    'title' => $metaTitle->text,
                                    'keywords' => $keywords->text,
                                    'description' => $metaDescription->text,
                                ]);
                            }

                            Notification::make()
                                ->title('SEO metadata generated successfully!')
                                ->success()
                                ->send();
                        } catch (\Prism\Prism\Exceptions\PrismRateLimitedException $e) {
                            Notification::make()
                                ->title('limit exceeded — please try again later!')
                                ->danger()
                                ->send();
                        } catch (\Exception $e) {
                            Notification::make()
                                ->title('An unexpected error occurred!')
                                ->body($e->getMessage())
                                ->danger()
                                ->send();
                        }
                    }),


            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
