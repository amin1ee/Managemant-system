<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Amin',
            'role' => 'admin',
            'email' => 'amin@amin.nl',
            'password' => bcrypt("password")
        ]);
        $categories = [
            'Electronics',
            'Furniture',
            'Office Supplies',
            'Cleaning Products',
            'Tools & Hardware',
            'Packaging Materials',
            'Food & Beverages',
            'Clothing & Textiles',
            'Spare Parts',
            'Safety Equipment',
            'Medical Supplies',
            'Building Materials',
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category,
            ]);
        }
        Supplier::factory()->count(20)->create();
    }
}
