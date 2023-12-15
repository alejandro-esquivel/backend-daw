<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model {
  use HasFactory;

  public function componentes() {
    return $this->belongsToMany(Componente::class);
  }

  public function usuarios() {
    return $this->belongsToMany(Usuario::class);
  }
}
