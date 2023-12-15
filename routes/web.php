<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FabricanteController;
use App\Http\Controllers\ComponenteController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CrudController;
use Illuminate\Support\Facades\Storage;


Route::get('/', function () {
  return 'awd';
});
Route::get('api/fabricantes', [FabricanteController::class, 'index'])->name('fabricantes.index');
Route::get('api/fabricantes/{id}', [FabricanteController::class, 'show'])->name('fabricantes.show');

Route::get('api/componentes', [ComponenteController::class, 'index'])->name('componentes.index');
Route::get('api/componentes/{id}', [ComponenteController::class, 'show'])->name('componentes.show');

Route::get('api/imagenes/{id}', function ($id) {
  $img = Storage::get("/images/components/$id.jpg");
  return response($img, 200)->header('Content-Type', 'image/jpeg');
});

Route::get('api/usuario', [UsuarioController::class, 'getUsers'])->name('users.getAll');
Route::post('api/usuario', [UsuarioController::class, 'create'])->name('users.create');
Route::get('api/usuario/{usuario}', [UsuarioController::class, 'getUser'])->name('users.get');
Route::post('api/usuario/login', [UsuarioController::class, 'login'])->name('users.login');

Route::get('crud', [CrudController::class, 'index'])->name('crud.index');
Route::post('crud/componente', [CrudController::class, 'addComponente'])->name('crudComponente.add');
Route::delete('crud/componente', [CrudController::class, 'deleteComponente'])->name('crudComponente.destroy');
Route::put('crud/componente', [CrudController::class, 'updateComponente'])->name('crudComponente.update');

Route::post('crud/fabricante', [CrudController::class, 'addFabricante'])->name('crudFabricante.add');
Route::delete('crud/fabricante', [CrudController::class, 'deleteFabricante'])->name('crudFabricante.destroy');
Route::put('crud/fabricante', [CrudController::class, 'updateFabricante'])->name('crudFabricante.update');

Route::post('crud/usuario', [CrudController::class, 'addUsuario'])->name('crudUsuario.add');
Route::delete('crud/usuario', [CrudController::class, 'deleteUsuario'])->name('crudUsuario.destroy');
Route::put('crud/usuario', [CrudController::class, 'updateUsuario'])->name('crudUsuario.update');
