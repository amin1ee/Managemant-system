<?php

namespace App\View\Components;

use App\Models\Product;
use IcehouseVentures\LaravelChartjs\Facades\Chartjs;
use Illuminate\View\Component;

class StockLevels extends Component
{
    public $stockChart;

    public function __construct()
    {
        $lowStockCount = Product::where('quantity', '<=', 2)->count();
        $outOfStockCount = Product::where('quantity', 0)->count();
        $normalStockCount = Product::where('quantity', '>', 2)->count();

        $this->stockChart = Chartjs::build()
            ->name('stockChart')
            ->type('doughnut')
            ->labels([
                'Low Stock',
                'Out Of Stock',
                'Normal Stock',
            ])
            ->datasets([
                [
                    'label' => 'Inventory Status',
                    'data' => [
                        $lowStockCount,
                        $outOfStockCount,
                        $normalStockCount,
                    ],
                    'backgroundColor' => [
                        '#facc15',
                        '#ef4444',
                        '#22c55e',
                    ],
                ],
            ])
            ->options([
                'responsive' => true,
                'maintainAspectRatio' => false,
            ]);
    }

    public function render()
    {
        return view('components.stock-levels');
    }
}
