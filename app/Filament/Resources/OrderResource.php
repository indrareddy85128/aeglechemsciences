<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Models\Order;
use Filament\Forms\Form;
use Filament\Infolists\Components\Fieldset;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-identification';

    protected static ?string $navigationLabel = 'Enquiries';

    protected static ?string $label = 'Enquiries';

    protected static ?string $slug = 'Enquiries';

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Fieldset::make('Customer Details')->schema([
                    TextEntry::make('user.name'),
                    TextEntry::make('user.phone_number'),
                    TextEntry::make('user.email'),
                    TextEntry::make('created_at')
                        ->label('Enquiry Date')
                        ->formatStateUsing(fn($state) => \Carbon\Carbon::parse($state)->format('F Y')),

                ])->columns(2),
                ...collect($infolist->record->orderItems)->map(function ($orderItem, $index) {
                    $productLabel = 'Product ' . ($index + 1);
                    return Fieldset::make($productLabel)->schema([
                        ImageEntry::make('Product Image')
                            ->getStateUsing(fn() => $orderItem->productVariant->product->image)
                            ->label('Product Image')
                            ->width(100)
                            ->height(100),
                        TextEntry::make('Product Name')
                            ->getStateUsing(fn() => $orderItem->productVariant->product->name)
                            ->label('Product Name'),

                        TextEntry::make('Catalogue Number')
                            ->getStateUsing(fn() => $orderItem->productVariant->product->catalogue_number)
                            ->label('Catalogue Number'),

                        TextEntry::make('CAS Number')
                            ->getStateUsing(fn() => $orderItem->productVariant->product->cas_number)
                            ->label('CAS Number'),

                        TextEntry::make('HSN Code')
                            ->getStateUsing(fn() => $orderItem->productVariant->product->hsn_code)
                            ->label('HSN Code'),

                        TextEntry::make('Product Pack')
                            ->getStateUsing(fn() => $orderItem->productVariant->pack)
                            ->label('Product Pack'),

                        TextEntry::make('Quantity')
                            ->getStateUsing(fn() => $orderItem->quantity)
                            ->label('Quantity'),

                        TextEntry::make('inr_price')
                            ->getStateUsing(fn() => '₹ ' . number_format($orderItem->productVariant->inr_price, 2))
                            ->label('Indian Price'),
                        TextEntry::make('usd_price')
                            ->getStateUsing(fn() => '$ ' . number_format($orderItem->productVariant->usd_price, 2))
                            ->label('USA Price'),
                    ])->columns(2);
                })->all(),
            ]);
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('order_number')->label('Enquiry ID')->searchable(),
                TextColumn::make('user.name')->label('Name')->searchable(),
                TextColumn::make('user.phone_number')->label('Phone Number'),
                TextColumn::make('user.email')->label('Email'),
                TextColumn::make('created_at')
                    ->label('Enquiry Date')
                    ->formatStateUsing(fn($state) => \Carbon\Carbon::parse($state)->format('d F Y')),
            ])->defaultSort('created_at', 'desc')
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListOrders::route('/'),
            // 'create' => Pages\CreateOrder::route('/create'),
            // 'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
