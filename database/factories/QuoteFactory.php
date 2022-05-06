<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Quote;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class QuoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'from' => $this->faker->city() . ", " . $this->faker->postcode(),
            'to' => $this->faker->city() . ", " . $this->faker->postcode(),
            'method' => $this->faker->numberBetween(0, 1)
        ];
    }  
}
