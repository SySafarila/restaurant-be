<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Banner::create([
            'image' => 'banner1.webp',
            'path' => 'images/banners/',
            'description' => 'Dui efficitur fames purus non himenaeos congue nec. Elementum a porttitor laoreet nam rutrum platea neque condimentum enim. Netus risus rutrum purus sapien accumsan nam quisque cubilia.'
        ]);
        Banner::create([
            'image' => 'banner2.webp',
            'path' => 'images/banners/',
            'description' => 'Dui efficitur fames purus non himenaeos congue nec. Elementum a porttitor laoreet nam rutrum platea neque condimentum enim. Netus risus rutrum purus sapien accumsan nam quisque cubilia.'
        ]);
        Banner::create([
            'image' => 'banner3.webp',
            'path' => 'images/banners/',
            'description' => 'Dui efficitur fames purus non himenaeos congue nec. Elementum a porttitor laoreet nam rutrum platea neque condimentum enim. Netus risus rutrum purus sapien accumsan nam quisque cubilia.'
        ]);
    }
}
