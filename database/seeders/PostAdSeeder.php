<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Model;
use App\Models\Type;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class PostAdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userIds = User::pluck('id')->toArray();
        $modelIds = Model::pluck('id')->toArray();
        $typeIds = Type::pluck('id')->toArray();
        $categoryIds = Category::pluck('id')->toArray();

        if (empty($userIds) || empty($modelIds) || empty($typeIds) || empty($categoryIds)) {
            $this->command->error('Please run User, Model, Type, and Category seeders first!');
            return;
        }

        $titles = [
            'Excellent Condition Vehicle for Sale',
            'Urgent Sale - Price Negotiable',
            'Well Maintained, Low Mileage',
            'First Owner, Clean Interior',
            'Doctor Used Mint Condition',
        ];

        for ($i = 0; $i < 100; $i++) {
            $randomModel = Model::find($modelIds[array_rand($modelIds)]);
            $randomTitle = $randomModel->name . ' ' . $titles[array_rand($titles)];

            DB::table('post_ads')->insert([
                'user_id'          => $userIds[array_rand($userIds)],
                'model_id'         => $randomModel->id,
                'type_id'          => $typeIds[array_rand($typeIds)],
                'category_id'      => $categoryIds[array_rand($categoryIds)],
                'title'            => $randomTitle,
                'manufacture_year' => rand(2010, 2026),
                'mileage'          => rand(10000, 150000) . ' km',
                'price'            => rand(500000, 8500000), 
                'status'           => rand(0, 2),
                'created_at'       => now(),
                'updated_at'       => now(),
            ]);
        }
    }
}
