<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('usuarios', function (Blueprint $table) {
      $table->id();
      $table->string('username')->unique();
      $table->string('password');
      $table->string('nombre')->nullable();
      $table->string('apellidos')->nullable();
      $table->string('correo')->unique();
      $table->foreignId('rol')->default('1')->constrained('roles')->onDelete('cascade');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('usuarios');
  }
}
