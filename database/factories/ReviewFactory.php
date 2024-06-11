<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;
use App\Models\Review;
use App\Models\Product;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Review::class;

    public function definition(): array
    {
        $faker = Faker::create();
        return [
            'product_id'=>function() {
              return  Product::all()->random();
            },
            'customer' => $faker->name,
            'review'   => $faker->paragraph,
            'star'     => $faker ->numberBetween(0,5), 
        ];
    }
}
