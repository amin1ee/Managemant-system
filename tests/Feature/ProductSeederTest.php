<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Supplier;
use Database\Seeders\ProductSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductSeederTest extends TestCase
{
    use RefreshDatabase;

    public function test_product_seeder_creates_products_linked_to_categories_and_suppliers(): void
    {
        Category::create(['name' => 'Electronics']);
        Supplier::factory()->create();

        $this->seed(ProductSeeder::class);

        $this->assertDatabaseCount('products', 30);
        $this->assertDatabaseHas('products', [
            'category_id' => Category::query()->value('id'),
            'supplier_id' => Supplier::query()->value('id'),
        ]);
    }
}
