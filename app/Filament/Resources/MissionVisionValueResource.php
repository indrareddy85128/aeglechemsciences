<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MissionVisionValueResource\Pages;
use App\Models\MissionVisionValue;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class MissionVisionValueResource extends Resource
{
    protected static ?string $model = MissionVisionValue::class;

    protected static ?string $navigationIcon = 'heroicon-o-check-badge';

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
            'index' => Pages\ListMissionVisionValues::route('/'),
            'create' => Pages\CreateMissionVisionValue::route('/create'),
            'edit' => Pages\EditMissionVisionValue::route('/{record}/edit'),
        ];
    }
}
