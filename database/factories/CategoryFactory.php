<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $fake = fake('id_ID');
        
        return [
            'id' => $fake->unique()->numerify('k############'),
            'name' => $fake->word(),
            'status' => $fake->randomElements([0 , 1]),
        ];
    }
}
