<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [];

        $cName = 'No category';
        $categories[] = [
            'title'         => $cName,
            'slug'          => Str::slug($cName),
            'is_visible'  => 0,
        ];

        for ($i = 1; $i <= 10; $i++) {
            $cName = 'Category #' . $i;

            $categories[] = [
                'title'         => $cName,
                'slug'          => Str::slug($cName),
                'is_visible'  => 1,
            ];
        }

        DB::table('product_categories')->insert($categories);
    }
}
