<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::create(['name' => 'Cà chua', 'description' => 'Cà chua tươi, giàu vitamin', 'price' => 15000, 'quantity' => 100, 'image' => 'tomato.jpg']);
        Product::create(['name' => 'Dưa leo', 'description' => 'Dưa leo xanh, mát lạnh', 'price' => 12000, 'quantity' => 80, 'image' => 'cucumber.jpg']);
        Product::create(['name' => 'Bắp cải', 'description' => 'Bắp cải sạch, tự nhiên', 'price' => 20000, 'quantity' => 60, 'image' => 'cabbage.jpg']);
        Product::create(['name' => 'Cà rốt', 'description' => 'Cà rốt ngọt, giàu dinh dưỡng', 'price' => 18000, 'quantity' => 70, 'image' => 'carrot.jpg']);
        Product::create(['name' => 'Hành tây', 'description' => 'Hành tây vàng, thơm ngon', 'price' => 10000, 'quantity' => 90, 'image' => 'onion.jpg']);
        Product::create(['name' => 'Cải xoăn', 'description' => 'Cải xoăn tươi tốt', 'price' => 16000, 'quantity' => 75, 'image' => 'kale.jpg']);
    }
}