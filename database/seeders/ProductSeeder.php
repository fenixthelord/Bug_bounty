<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run()
    {
        foreach (range(1, 5) as $index) {
            Product::create([
                'uuid' => Str::uuid(),
                'title' => 'Product ' . $index,
                'description' => 'Description for product ' . $index,
                'company_id' => rand(1, 5), // تأكد من وجود شركات في قاعدة البيانات
                'status' => 0, // أو 'unavailable' حسب الحالة التي تريدها
                'terms' => 'Terms for product ' . $index,
                'url' => 'http://example.com/product/' . $index,
            ]);
        }
    }
}