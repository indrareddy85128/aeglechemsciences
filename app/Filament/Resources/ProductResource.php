<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers\MetaDetailsRelationManager;
use App\Models\Category;
use App\Models\Product;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Forms\Set;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Support\Str;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-squares-2x2';

    protected static ?string $navigationGroup = 'Products Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make()->schema([
                    Grid::make()
                        ->schema([
                            Section::make()->schema([
                                Select::make('category_id')
                                    ->label('Category')
                                    ->options(Category::all()->pluck('name', 'id'))
                                    ->searchable()
                                    ->required()->columnSpanFull(),
                                TextInput::make('name')->required()->live(onBlur: true)
                                    ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state))),
                                TextInput::make('slug')
                                    ->readOnly()
                                    ->required(),
                                TextInput::make('inr_price')->prefixIcon('heroicon-o-currency-rupee')->label('INR Price')->required(),
                                TextInput::make('usd_price')
                                    ->prefixIcon('heroicon-o-currency-dollar')->label('USD Price')->required(),
                                TextInput::make('quantity')->required(),
                                TextInput::make('catalogue_number')->required(),
                                TextInput::make('cas_number')->required(),
                                TextInput::make('hsn_code')->required(),
                                TextInput::make('molecular_formula')->required(),
                                TextInput::make('molecular_weight')->required(),
                                TextInput::make('purity')->required(),
                                TextInput::make('density')->required(),
                            ])->columns(2),
                        ])->columnSpan(8),
                    Section::make()->schema([
                        FileUpload::make('image')->disk('public')
                            ->directory('products')
                            ->required()
                            ->helperText('Please upload an image with a size of 600×600 only.'),
                        Select::make('stock')
                            ->options([
                                'In Stock' => 'In Stock',
                                'Out of Stock' => 'Out of Stock',
                            ])->native(false)->required(),
                    ])->columnSpan(4),
                ])->columns(12)->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('#')->rowIndex(),
                ImageColumn::make('image')->width(100)->height(100),
                TextColumn::make('category.name'),
                TextColumn::make('name')->searchable(),
                TextColumn::make('inr_price')->label('INR Price'),
                TextColumn::make('usd_price')->label('USD Price'),
                IconColumn::make('stock')
                    ->icon(fn(string $state): string => match ($state) {
                        'In Stock' => 'heroicon-o-check-circle',
                        'Out of Stock' => 'heroicon-o-x-circle',
                    })
                    ->color(fn(string $state): string => match ($state) {
                        'In Stock' => 'success',
                        'Out of Stock' => 'danger',
                    }),
            ])
            ->filters([
                SelectFilter::make('category')
                    ->label('Category')
                    ->relationship('category', 'name')
                    ->searchable()
                    ->preload(),

                SelectFilter::make('stock')
                    ->label('Stock Status')
                    ->options([
                        'In Stock' => 'In Stock',
                        'Out of Stock' => 'Out of Stock',
                    ])
                    ->searchable()
                    ->preload(),
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
            MetaDetailsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
