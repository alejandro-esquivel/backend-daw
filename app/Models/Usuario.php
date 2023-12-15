<?php
namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable {
  use HasFactory, Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'usuario',
    'nombre',
    'apellidos',
    'correo',
    'password',
  ];

  /**
   * The attributes that should be cast to native types.
   *
   * @var array
   */
  protected $casts = [
    'email_verified_at' => 'datetime',
  ];

  public function Componentes() {
    return $this->belongsToMany(Factura::class, 'comentarios', 'usuario');
  }

  public function Facturas() {
    return $this->hasMany(Factura::class);
  }

  public function Roles() {
    return $this->belongsTo(Rol::class);
  }
}
