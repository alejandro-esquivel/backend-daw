<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Componente extends Model {
  use HasFactory;

  public function Fabricantes() {
    return $this->belongsTo(Fabricante::class, 'fabricante');
  }

  public function Usuarios() {
    return $this->belongsToMany(Usuario::class, 'comentarios', 'componente');
  }

  public function Destacados() {
    return $this->hasMany(Destacado::class);
  }
}
