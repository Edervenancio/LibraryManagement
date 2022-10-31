<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->paragraph(2),
            'category' => $this->faker->paragraph(1),
            'price' => $this->faker->numberBetween(1, 10),
            'quantity' => $this->faker->numberBetween(1, 20),
            'imageUrl' => 'book.png'
        ];
    }
}
