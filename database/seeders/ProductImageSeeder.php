<?php

namespace Database\Seeders;

use App\Models\ProductImage;
use Illuminate\Database\Seeder;

class ProductImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 50; $i++) {
            ProductImage::create([
                'name' => 'image.jpg',
                'path' => 'path/another',
                'product_id' => $i
            ]);
        }
    }
}
