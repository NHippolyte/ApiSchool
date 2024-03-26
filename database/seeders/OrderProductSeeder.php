<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\Product;



class OrderProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 1; $i <= Order::count() ; $i++){
            DB::table('order_products')->insert([
                'order_id' => $i,
                'product_id'=> rand(1, Product::count()),
                'quantity' => rand(1, 5)
            ]);

        }
    }
}
