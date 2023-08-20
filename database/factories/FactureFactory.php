<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Facture;
use App\Models\Client;
class FactureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Facture::class;
    public function definition()
    {
         $status = $this->faker->randomElement(['F', 'P', 'V']);//facturé, payé, vide   
        return [
            'client_id' => Client::factory(),
            'qté' => $this->faker->numberBetween(100, 20000),
            'status' => $status,
            'date_facturation'=>$this->faker->dateTimeThisDecade(),
            'date_paiement'=> $status =='P' ? $this->faker->dateTimeThisDecade() : NULL
        ];
    }
}
