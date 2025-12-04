<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WhyChooseusResource\Pages;
use App\Models\WhyChooseus;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class WhyChooseusResource extends Resource
{
    protected static ?string $model = WhyChooseus::class;

    protected static ?string $navigationIcon = 'heroicon-o-question-mark-circle';

    protected static ?string $navigationLabel = 'Why Choose Us';

    protected static ?string $navigationGroup = 'Frontend';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make()->schema([
                    Section::make()->schema([
                        TextInput::make('title')->required(),
                        Repeater::make('points')
                            ->schema([
                                Grid::make()->schema([
                                    Section::make()->schema([
                                        TextInput::make('title')->required(),
                                        Textarea::make('description')->required(),
                                    ])->columnSpan(8),
                                    Section::make()->schema([
                                        FileUpload::make('image')->disk('public')
                                            ->directory('why-choose-us')
                                            ->required(),
                                    ])->columnSpan(4),
                                ])->columns(12)->columnSpanFull(),
                            ]),
                    ])->columnSpan(8),
                    Section::make()->schema([
                        FileUpload::make('image_one')->disk('public')
                            ->directory('why-choose-us')
                            ->required(),
                        FileUpload::make('image_two')->disk('public')
                            ->directory('why-choose-us')
                            ->required(),
                    ])->columnSpan(4),
                ])->columns(12)->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image_one')->width(100)->height(100),
                ImageColumn::make('image_two')->width(100)->height(100),
                TextColumn::make('title'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    // Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListWhyChooseuses::route('/'),
            'create' => Pages\CreateWhyChooseus::route('/create'),
            'edit' => Pages\EditWhyChooseus::route('/{record}/edit'),
        ];
    }
}
