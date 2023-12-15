<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComponentesTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('componentes', function (Blueprint $table) {
      $table->id();
      $table->string('modelo');
      $table->foreignId('fabricante')->constrained('fabricantes');
      $table->foreignId('categoria')->constrained('categorias');
      $table->decimal('precio', 8, 2);
      $table->string("imagen");
      $table->jsonb('descripcion')->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('componentes');
  }
}
