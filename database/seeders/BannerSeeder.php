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
            'description' => ''
        ]);
        Banner::create([
            'image' => 'banner2.webp',
            'path' => 'images/banners/',
            'description' => ''
        ]);
        Banner::create([
            'image' => 'banner3.webp',
            'path' => 'images/banners/',
            'description' => ''
        ]);
    }
}
