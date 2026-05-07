<?php

namespace App\Http\Controllers;

use App\Models\LoginAttempt;
use App\Models\Product;
use App\Models\Reorder;
use IcehouseVentures\LaravelChartjs\Facades\Chartjs;

class DashboardController extends Controller
{
    public function index()
    {
        $productsCount = Product::count();
        $reordersCount = Reorder::count();
        $lowStockCount = Product::where('quantity', '<=', 2)->count();
        $outOfStockCount = Product::where('quantity', 0)->count();
        $normalStockCount = Product::where('quantity', '>', 2)->count();

        $loginAttempts = LoginAttempt::latest()->take(5)->get();

        $successfulLogins = $loginAttempts->where('successful', true)->count();
        $failedLogins = $loginAttempts->where('successful', false)->count();

        $loginChart = Chartjs::build()
            ->name('loginChart')
            ->type('line')
            ->labels([
                'Successful Logins',
                'Failed Logins',
            ])
            ->datasets([
                [
                    'label' => 'Login attempts',
                    'data' => [
                        $successfulLogins,
                        $failedLogins,
                    ],

                    'backgroundColor' => [
                        '#22c55e',
                        '#ef4444',
                    ],
                ],
            ])
            ->options([
                'responsive' => true,
                'maintainAspectRatio' => false,
            ]);

        $stockChart = Chartjs::build()
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

        return view('dashboard', compact(
            'productsCount',
            'reordersCount',
            'stockChart',
            'loginChart',
            'loginAttempts'
        ));
    }
}
