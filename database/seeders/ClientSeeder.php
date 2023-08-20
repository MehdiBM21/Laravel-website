<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Client;
class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Client::factory()
            ->count(25)
            ->hasFactures(10)
            ->create();
        Client::factory()
            ->count(100)
            ->hasFactures(4)
            ->create();
        Client::factory()
            ->count(6)
            ->create();
            

    }
}
