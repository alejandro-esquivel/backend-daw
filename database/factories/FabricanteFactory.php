<?php

namespace Database\Factories;

use App\Models\Fabricante;
use Illuminate\Database\Eloquent\Factories\Factory;

class FabricanteFactory extends Factory {
  /**
   * The name of the factory's corresponding model.
   *
   * @var string
   */
  protected $model = Fabricante::class;

  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition() {
    return [
      'nombre' => $this->faker->domainWord,
      'ubicacion' => $this->faker->address
    ];
  }
}
