<?php

namespace App\Console\Commands;

use App\Models\Product;

use Illuminate\Console\Command;

class ReorderAutomatic extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:reorder-automatic';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $products = Product::where('quantity', '<', 15)->get();

        foreach ($products as $product) {
            $product->reorder()->create([
                "requested_quantity" => 50,
                "status" => "pending"
            ]);




        }
    }
}
