<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 15; $i++) {
            Product::create([
                'name' => 'Product ' . $i,
                'description' => 'Congue pharetra parturient facilisi est semper sed sem dui ac. Laoreet letius turpis ligula pulvinar primis iaculis ac donec fringilla posuere pharetra. Natoque senectus felis sed at id consectetuer. Dapibus molestie imperdiet fames taciti facilisi malesuada primis. Blandit commodo laoreet efficitur letius aliquet amet vitae at quam ad tellus. Mi felis suspendisse fusce pede tortor risus.',
                'cover' => '1.jpg',
                'coverPath' => 'images/foods/',
                'price' => 20000,
                'quantity' => 50,
                'discount' => null,
                'category_id' => 1
            ]);
        }
        for ($i = 0; $i < 15; $i++) {
            Product::create([
                'name' => 'Product ' . $i,
                'description' => 'Congue pharetra parturient facilisi est semper sed sem dui ac. Laoreet letius turpis ligula pulvinar primis iaculis ac donec fringilla posuere pharetra. Natoque senectus felis sed at id consectetuer. Dapibus molestie imperdiet fames taciti facilisi malesuada primis. Blandit commodo laoreet efficitur letius aliquet amet vitae at quam ad tellus. Mi felis suspendisse fusce pede tortor risus.',
                'cover' => '1.jpg',
                'coverPath' => 'images/foods/',
                'price' => 20000,
                'quantity' => 50,
                'discount' => null,
                'category_id' => 2
            ]);
        }
        for ($i = 0; $i < 15; $i++) {
            Product::create([
                'name' => 'Product ' . $i,
                'description' => 'Congue pharetra parturient facilisi est semper sed sem dui ac. Laoreet letius turpis ligula pulvinar primis iaculis ac donec fringilla posuere pharetra. Natoque senectus felis sed at id consectetuer. Dapibus molestie imperdiet fames taciti facilisi malesuada primis. Blandit commodo laoreet efficitur letius aliquet amet vitae at quam ad tellus. Mi felis suspendisse fusce pede tortor risus.',
                'cover' => '1.jpg',
                'coverPath' => 'images/foods/',
                'price' => 20000,
                'quantity' => 50,
                'discount' => null,
                'category_id' => 3
            ]);
        }
    }
}
