<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Banner::firstOrCreate([
            'title' => 'Your Products Are Great.',
            'subtitle' => 'Explore our featured collections.',
            'image' => 'images/banner-image.png',
            'button_text' => 'Shop Product',
            'button_link' => '/shop',
            'order' => 1,
            'status' => true,
        ]);
    }
}
