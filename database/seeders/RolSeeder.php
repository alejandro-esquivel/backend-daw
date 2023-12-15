<?php

namespace Database\Seeders;

use App\Models\Rol;
use Illuminate\Database\Seeder;

class RolSeeder extends Seeder {
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {
    $roles = ['usuario', 'admin'];

    foreach ($roles as $r) {
      // Verificamos que no exista un registro con el mismo valor
      $rol = Rol::firstOrCreate([
        'nombre' => $r
      ]);
      $rol->save();
    }
  }
}
