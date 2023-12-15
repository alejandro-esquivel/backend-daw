<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destacado extends Model {
  use HasFactory;


  public function componente() {
    return $this->belongsToMany(Componente::class, 'destacados', 'componente');
  }
}
