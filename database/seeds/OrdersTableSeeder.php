<?php

use App\Order;
use App\Product;
use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Order::class, 5)->create()->each(
            function ($order) {
                $order->product()->attach(Product::all()->random(3),
                    [
                        'product_count' => rand(1, 10),
                        'product_price' => rand(1, 100),
                    ]
                );
            }
        );
    }
}
