<?php

namespace App\Http\Controllers;

use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::query()
            ->with('orderDetails.product')
            ->latest()
            ->paginate(10);

        return view('orders.index', compact('orders'));
    }
}
