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
    public function definition(): array
    {
        $faker = fake('fa_IR');

        return [
            'name' => $faker->name(),
            'description' => 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و باید برای آن کوشید.',
            'category' => $faker->randomElement(['house', 'office', 'kids', 'kitchen', 'accessories']),
            'discount' => mt_rand(1, 100) <= 20 ? $faker->numberBetween(10, 90) : 0,
            'image' => '',
            'price' => $faker->numberBetween(1, 999) . '00000',
            'user_id' => 2
        ];
    }
}
