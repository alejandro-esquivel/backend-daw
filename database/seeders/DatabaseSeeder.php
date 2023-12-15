<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run() {
    $this->call(CategoriaSeeder::class);
    $this->call(FabricanteSeeder::class);
    $this->call(ComponenteSeeder::class);
    $this->call(DestacadoSeeder::class);
    $this->call(RolSeeder::class);
  }
}
