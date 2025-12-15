<?php

namespace App\Filament\Resources\ProductResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ProductVariantsRelationManager extends RelationManager
{
    protected static string $relationship = 'productVariants';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('pack')->required(),
                TextInput::make('availability')->required(),
                TextInput::make('inr_price')->prefixIcon('heroicon-o-currency-rupee')->label('INR Price')->required(),
                TextInput::make('usd_price')
                    ->prefixIcon('heroicon-o-currency-dollar')->label('USD Price')->required(),

            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('f')
            ->columns([
                TextColumn::make('#')->rowIndex(),
                TextColumn::make('pack')->label('Packs'),
                TextColumn::make('availability'),
                TextColumn::make('inr_price'),
                TextColumn::make('usd_price'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
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
