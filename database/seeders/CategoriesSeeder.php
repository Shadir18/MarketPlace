<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Cars',
            'Vans',
            'MotorBikes',
            'Lorries',
            'Three wheels',
            'Heavy Duty',
            'Spare Parts'
        ];

        foreach ($categories as $category){
            Category::create([
                'name' => $category,
                'slug' => Str::slug($category),
                'is_active' => true
            ]);
        }
    }
}
