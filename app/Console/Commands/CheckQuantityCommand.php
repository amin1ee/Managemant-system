<?php

namespace App\Console\Commands;

use App\Models\Product;
use App\Models\User;
use App\Notifications\LowQuanitityNotification;
use Illuminate\Console\Command;

class CheckQuantityCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product:check-quantity-command';

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
        $products = Product::all();
        $admins = User::where('role', 'admin')->get();
        foreach ($products as $product) {
            if ($product->quantity < 10) {
                foreach ($admins as $admin) {
                    $admin->notify(new LowQuanitityNotification($product));
                }
            }
        }

    }
}
