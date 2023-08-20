<?php

namespace Database\Factories;
use App\Models\Client;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model= Client::class;
    public function definition()
    {
        $type = $this->faker->randomElement(['IND','E/P']);
        $name= $type =='IND'? $this->faker->name(): $this->faker->company();
        return [
            'nom' => $name,
            'type' => $type,
            'email' => $this->faker->email(),
            'ville' => $this->faker->city(),
            'code_postal' => $this->faker->postcode()

        ];
    }
}
