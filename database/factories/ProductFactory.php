<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use Faker\Factory as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * 
     */
    protected $model = Product::class;

    public function definition(): array
{
    $faker = Faker::create();
    
    return [
         'name'   => $faker->word,
         'detail' => $faker->paragraph,
         'price' => $faker->numberBetween(100,1000),
         'stock' => $faker->randomDigit,
         'discounts' => $faker->numberBetween(2,30),
    ];
}
}
