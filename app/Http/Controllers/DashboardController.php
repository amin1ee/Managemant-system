<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Reorder;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $productsCount = Product::count();
        $reordersCount = Reorder::count();

        return view('dashboard', compact(
            'productsCount',
            'reordersCount',
        ));
    }
}
