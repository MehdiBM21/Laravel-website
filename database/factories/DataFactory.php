<?php

namespace Database\Factories;
use App\Models\Data;
use Illuminate\Database\Eloquent\Factories\Factory;

class DataFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=> $this->faker->name(),
            'city'=> $this->faker->city(),
            'price'=> $this->faker->numberBetween(0,10000),
        ];
    }
}
