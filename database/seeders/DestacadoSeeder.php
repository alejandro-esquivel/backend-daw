<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Destacado;

class DestacadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $destacado = new Destacado();
        $destacado->componente = 2;
        $destacado->save();

        $destacado = new Destacado();
        $destacado->componente = 6;
        $destacado->save();

        $destacado = new Destacado();
        $destacado->componente = 3;
        $destacado->save();
    }
}
