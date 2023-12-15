<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Fabricante extends Model {
  use HasFactory;

  protected $table = "fabricantes";
  /**
   * @var mixed|string
   */
  private $nombre;

  public function componente() {
    return $this->hasMany(Componente::class, 'fabricante');
  }
}
