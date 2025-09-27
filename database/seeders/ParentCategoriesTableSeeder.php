<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParentCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $parentCategories = [
            [
                'parent_categories'          => 'Mobiles & Tablets',
                'category_image'             => 'https://upload.wikimedia.org/wikipedia/commons/3/3a/Smartphone_icon.svg',
                'category_status_ecommerce'  =>  0,
                'url'                        => 'mobiles-tablets',
                'sort_order'                 => 1,
            ],
            [
                'parent_categories'          => 'Laptops & Computers',
                'category_image'             => 'https://upload.wikimedia.org/wikipedia/commons/3/35/Laptop_icon.svg',
                'category_status_ecommerce'  =>  0,
                'url'                        => 'laptops-computers',
                'sort_order'                 => 2,
            ],
            [
                'parent_categories'          => 'Cameras & Photography',
                'category_image'             => 'https://upload.wikimedia.org/wikipedia/commons/9/9c/Camera_icon.svg',
                'category_status_ecommerce'  =>  0,
                'url'                        => 'cameras-photography',
                'sort_order'                 => 3,
            ],
            [
                'parent_categories'          => 'Audio & Video',
                'category_image'             => 'https://upload.wikimedia.org/wikipedia/commons/3/33/Headphones_icon.svg',
                'category_status_ecommerce'  =>  0,
                'url'                        => 'audio-video',
                'sort_order'                 => 4,
            ],
            [
                'parent_categories'          => 'Home Appliances',
                'category_image'             => 'https://upload.wikimedia.org/wikipedia/commons/0/03/Refrigerator_icon.svg',
                'category_status_ecommerce'  =>  0,
                'url'                        => 'home-appliances',
                'sort_order'                 => 5,
            ],
            [
                'parent_categories'          => 'Gaming',
                'category_image'             => 'https://upload.wikimedia.org/wikipedia/commons/e/eb/Game_controller_icon.svg',
                'category_status_ecommerce'  =>  0,
                'url'                        => 'gaming',
                'sort_order'                 => 6,
            ],
            [
                'parent_categories'          => 'Wearable Tech',
                'category_image'             => 'https://upload.wikimedia.org/wikipedia/commons/7/70/Smartwatch_icon.svg',
                'category_status_ecommerce'  =>  0,
                'url'                        => 'wearable-tech',
                'sort_order'                 => 7,
            ],
            [
                'parent_categories'          => 'Networking & Accessories',
                'category_image'             => 'https://upload.wikimedia.org/wikipedia/commons/6/6b/WiFi_icon.svg',
                'category_status_ecommerce'  =>  0,
                'url'                        => 'networking-accessories',
                'sort_order'                 => 8,
            ],
            [
                'parent_categories'          => 'Printers & Scanners',
                'category_image'             => 'https://upload.wikimedia.org/wikipedia/commons/1/12/Printer_icon.svg',
                'category_status_ecommerce'  =>  0,
                'url'                        => 'printers-scanners',
                'sort_order'                 => 9,
            ],
            [
                'parent_categories'          => 'Smart Home Devices',
                'category_image'             => 'https://upload.wikimedia.org/wikipedia/commons/2/2e/Smart_home_icon.svg',
                'category_status_ecommerce'  =>  0,
                'url'                        => 'smart-home-devices',
                'sort_order'                 => 10,
            ],
        ];

        DB::table('parent_categories')->insert($parentCategories);
    }
}
