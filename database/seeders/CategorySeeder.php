<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

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
            'Camilan',
            'Makanan Cepat Saji',
            'Dessert',
            'Main Course',
            'Appetizer',
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category,
                'slug' => strtolower(str_replace(' ', '-', $category)),
                'uuid' => Str::uuid(),
            ]);
        }
    }
}
