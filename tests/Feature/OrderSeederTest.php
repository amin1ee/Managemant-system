<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Database\Seeders\OrderSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrderSeederTest extends TestCase
{
    use RefreshDatabase;

    public function test_order_seeder_creates_orders_with_product_details(): void
    {
        $category = Category::create(['name' => 'Test']);
        Product::factory()->count(5)->create(['category_id' => $category->id]);

        $this->seed(OrderSeeder::class);

        $this->assertDatabaseCount('orders', 10);
        $this->assertSame(
            10,
            Order::query()->where('adress', 'like', '%, Groningen, Netherlands')->count()
        );

        $detail = OrderDetail::query()->firstOrFail();
        $this->assertDatabaseHas('order_details', [
            'order_id' => $detail->order_id,
            'product_id' => $detail->product_id,
        ]);
        $this->assertGreaterThan(0, Order::query()->firstOrFail()->orderDetails()->count());
    }
}
