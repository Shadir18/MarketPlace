<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Model;
use App\Models\PostAds;
use App\Models\Type;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<PostAds>
 */
class PostAdsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $type = Type::factory()->create();
        $model = Model::factory()->create();
        $year = $this->faker->year();
        return [
            'user_id' => User::factory(),
            'title' => "{$type->name} {$model->name} {$year}",
            'manufacture_year' => $this->faker->year(),
            'mileage' => $this->faker->numberBetween(1000, 150000),
            'price' => $this->faker->randomFloat(50000, 1000000),
            'status' => $this->faker->randomElement([0,1,2]),
            'type_id' => Type::factory(),
            'model_id' => Model::factory(),
            'Category_id' => Category::factory(),
        ];
    }
}
