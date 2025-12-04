<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AboutResource\Pages;
use App\Models\About;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Prism\Prism\Facades\Prism;
use Prism\Prism\Enums\Provider;
use Filament\Forms\Set;

class AboutResource extends Resource
{
    protected static ?string $model = About::class;

    protected static ?string $navigationIcon = 'heroicon-o-information-circle';

    protected static ?string $navigationLabel = 'About Us';

    protected static ?string $navigationGroup = 'Frontend';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make()->schema([
                    Section::make()->schema([
                        TextInput::make('title')->required(),
                        Textarea::make('description')
                            ->required(),
                    ])->columnSpan(8),
                    Section::make()->schema([
                        FileUpload::make('image')->disk('public')
                            ->directory('about-us')
                            ->required(),
                    ])->columnSpan(4),
                ])->columns(12)->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')->width(100)->height(100),
                TextColumn::make('title'),
                TextColumn::make('description')->wrap(),
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
            'index' => Pages\ListAbouts::route('/'),
            'create' => Pages\CreateAbout::route('/create'),
            'edit' => Pages\EditAbout::route('/{record}/edit'),
        ];
    }
}
