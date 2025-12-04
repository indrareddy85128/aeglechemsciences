<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageMetaDetailsResource\Pages;
use App\Filament\Resources\PageMetaDetailsResource\RelationManagers;
use App\Models\PageMetaDetails;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PageMetaDetailsResource extends Resource
{
    protected static ?string $model = PageMetaDetails::class;

    protected static ?string $navigationIcon = 'heroicon-o-chart-bar-square';

    protected static ?string $navigationGroup = 'Seo Settings';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('page_name')
                    ->options([
                        'home' => 'Home',
                    ])
                    ->native(false)->required(),
                TextInput::make('title')->required(),
                Textarea::make('keywords')->required(),
                Textarea::make('description')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('page_name'),
                TextColumn::make('title')->wrap(),
                TextColumn::make('keywords')->wrap(),
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
                    Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListPageMetaDetails::route('/'),
            'create' => Pages\CreatePageMetaDetails::route('/create'),
            'edit' => Pages\EditPageMetaDetails::route('/{record}/edit'),
        ];
    }
}
