<?php

use Illuminate\Database\Seeder;
use App\AppCargo;

class CargoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AppCargo::create([
            'precedencia' => '1',
            'cargo' => 'Governador do Estado de Santa Catarina'
        ]);
    }
}
