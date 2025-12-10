<?php

namespace App\Filament\Widgets;

use App\Models\Category;
use App\Models\Product;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DashboardOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $totalProducts = Product::count();
        $inStock = Product::where('stock', 'In Stock')->count();
        $outOfStock = Product::where('stock', 'Out of Stock')->count();

        return [
            Stat::make('Categories', Category::count())
                ->description('Total number of categories')
                ->icon('heroicon-o-squares-2x2')
                ->color('primary')
                ->url('/admin/categories'),

            Stat::make('Products', $totalProducts)
                ->description('Total number of products')
                ->icon('heroicon-o-cube')
                ->color('info')
                ->url('/admin/products'),

            Stat::make('In Stock', $inStock)
                ->description($totalProducts > 0
                    ? round(($inStock / $totalProducts) * 100) . '% of products'
                    : 'No products available')
                ->icon('heroicon-o-check-circle')
                ->color('success')
                ->url('/admin/products'),

            Stat::make('Out of Stock', $outOfStock)
                ->description($totalProducts > 0
                    ? round(($outOfStock / $totalProducts) * 100) . '% of products'
                    : 'No products available')
                ->icon('heroicon-o-x-circle')
                ->color('danger')
                ->url('/admin/products'),
        ];
    }

}
