<?php

namespace Database\Seeders;

use App\Models\Fabricante;
use Illuminate\Database\Seeder;
use Database\Factories\FabricanteFactory;

class FabricanteSeeder extends Seeder {
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {
    // Fabricante::factory()->count(50)->create();
    $fabricantes = [
      "Intel",
      "AMD",
      "Nvidia",
      "EVGA",
      "Asus",
      "Corsair",
      "Crucial",
      "Cooler Master",
      "Dell",
      "HP",
      "Lian-li",
      "MSI",
      "Nox",
      "Kingston",
      "Thermaltake",
      "Seasonic",
      "Gigabyte",
      "Lenovo",
      "Samsung",
      "Seagate",
      "Western Digital",
      "Sapphire",
      "Zotac"
    ];

    foreach ($fabricantes as $fab) {

      // Verificamos que no exista un registro con el mismo valor
      $fabricante = Fabricante::firstOrCreate([
        'nombre' => $fab
      ]);
      $fabricante->save();
    }
  }
}
