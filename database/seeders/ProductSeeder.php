<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $products = [
            [
                'name' => 'Internet 10 Mbps',
                'description' => 'Paket internet kecepatan 10 Mbps untuk kebutuhan browsing dan streaming.',
                'price' => 299000,
                'speed' => 10,
                'status' => 'active',
            ],
            [
                'name' => 'Internet 20 Mbps',
                'description' => 'Paket internet kecepatan 20 Mbps untuk kebutuhan gaming dan work from home.',
                'price' => 399000,
                'speed' => 20,
                'status' => 'active',
            ],
            [
                'name' => 'Internet 50 Mbps',
                'description' => 'Paket internet kecepatan 50 Mbps untuk kebutuhan bisnis dan streaming 4K.',
                'price' => 599000,
                'speed' => 50,
                'status' => 'active',
            ],
            [
                'name' => 'Internet 100 Mbps',
                'description' => 'Paket internet kecepatan 100 Mbps untuk kebutuhan bisnis dengan multiple user.',
                'price' => 899000,
                'speed' => 100,
                'status' => 'active',
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
