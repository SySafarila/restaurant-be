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
        Product::create([
            'name' => 'Product 1',
            'description' => 'Congue pharetra parturient facilisi est semper sed sem dui ac. Laoreet letius turpis ligula pulvinar primis iaculis ac donec fringilla posuere pharetra. Natoque senectus felis sed at id consectetuer. Dapibus molestie imperdiet fames taciti facilisi malesuada primis. Blandit commodo laoreet efficitur letius aliquet amet vitae at quam ad tellus. Mi felis suspendisse fusce pede tortor risus.',
            'cover' => 'image.jpg',
            'price' => 20000,
            'quantity' => 50,
            'discount' => null
        ]);
    }
}
