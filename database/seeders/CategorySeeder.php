<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $categories = [
            [
                'name' => 'Sports',
                'code' => 'SPORTS',
            ],

            [
                'name' => 'Science & Tech',
                'code' => 'SCIENCE & TECH',
            ],
            [
                'name' => 'Pop Culture',
                'code' => 'POP CULTURE',
            ]
        ];

        Category::insert($categories);
    }
}
