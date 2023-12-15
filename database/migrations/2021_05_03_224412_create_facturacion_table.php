<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturacionTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('facturacion', function (Blueprint $table) {
      $table->id();
      $table->foreignId('usuario')->constrained('usuarios');
      $table->string('nombre');
      $table->string('apellidos');
      $table->string('correo');
      $table->string('telefono');
      $table->string('direccion');
      $table->string('ciudad');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('facturacion');
  }
}
