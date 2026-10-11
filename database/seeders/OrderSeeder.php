<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Database\Seeder;
use LogicException;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $productIds = Product::query()->pluck('id');

        if ($productIds->isEmpty()) {
            throw new LogicException('Seed products before seeding orders.');
        }

        Order::factory()
            ->count(10)
            ->create()
            ->each(function (Order $order) use ($productIds): void {
                $productIds->shuffle()
                    ->take(min($productIds->count(), random_int(1, 4)))
                    ->each(fn (int $productId) => OrderDetail::create([
                        'order_id' => $order->id,
                        'product_id' => $productId,
                    ]));
            });
    }
}
