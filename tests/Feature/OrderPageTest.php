<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrderPageTest extends TestCase
{
    use RefreshDatabase;

    public function test_authenticated_users_can_view_orders_and_their_products(): void
    {
        $category = Category::create(['name' => 'Electronics']);
        $product = Product::factory()->create([
            'name' => 'Test Product',
            'category_id' => $category->id,
        ]);
        $order = Order::factory()->create([
            'name' => 'Test Customer',
            'email' => 'customer@example.com',
            'adress' => '123 Test Street',
        ]);
        OrderDetail::create([
            'order_id' => $order->id,
            'product_id' => $product->id,
        ]);

        $this->actingAs(User::factory()->create(['role' => 'admin']))
            ->get(route('orders.index'))
            ->assertOk()
            ->assertSee('Test Customer')
            ->assertSee('customer@example.com')
            ->assertSee('123 Test Street')
            ->assertSee('Test Product');
    }

    public function test_orders_page_requires_authentication(): void
    {
        $this->get(route('orders.index'))
            ->assertRedirect(route('login'));
    }
}
