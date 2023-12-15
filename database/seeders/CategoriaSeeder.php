<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder {
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {
    $categorias = [
      "Almacenamiento",
      "Fuentes de alimentación",
      "Microprocesadores",
      "Placas Base",
      "Refrigeración",
      "Tarjetas gráficas",
      "Monitores",
      "Ratones",
      "Teclados",
    ];

    foreach ($categorias as $categoria) {
      $cat = Categoria::firstOrCreate([
        'nombre' => $categoria
      ]);
      $cat->save();
    }
  }
}
