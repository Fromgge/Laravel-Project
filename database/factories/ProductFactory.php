<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->unique()->words(rand(1, 2), true),
            'description' => fake()->paragraph(rand(1, 5)),
            'SKU' => fake()->unique()->ean8(),
            'price' => fake()->randomFloat(2, 10, 100),
            'discount' => rand(0, 90),
            'quantity' => rand(0, 15),
            'thumbnail' => fake()->imageUrl(category: 'cars', randomize: true),
        ];
    }
}
