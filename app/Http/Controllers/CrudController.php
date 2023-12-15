<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Componente;
use App\Models\Fabricante;
use App\Models\Usuario;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;

class CrudController extends Controller {
  public function index() {
    $componentes = Componente::all()->sortByDesc('id');
    $fabricantes = Fabricante::all()->sortByDesc('id');
    $usuarios = Usuario::all()->sortByDesc('id');
    return view('crud.index')
      ->with(compact('componentes'))
      ->with(compact('fabricantes'))
      ->with(compact('usuarios'));
  }

  public function addComponente(Request $req) {
    $req->validate([
      "modelo" => "required",
      "fabricante" => "required",
      "categoria" => "required",
      "precio" => "required",
      "imagen" => "nullable"
    ]);

    $componente = new Componente();
    $componente->modelo = $req->modelo;
    $componente->fabricante = $req->fabricante;
    $componente->categoria = $req->categoria;
    $componente->precio = $req->precio;
    $componente->imagen = "1.jpg";
    $componente->save();

    return redirect()->route('crud.index');
  }

  public function addUsuario(Request $req) {
    $req->validate([
      "username" => "required",
      "password" => "required",
      "nombre" => "nullable",
      "apellidos" => "nullable",
      "correo" => "required",
      "rol" => "required"
    ]);

    $usuario = new Usuario();
    $usuario->username = $req->username;
    $usuario->password = Hash::make($req->password);
    if ($req->nombre)
      $usuario->nombre = $req->nombre;
    if ($req->apellidos)
      $usuario->apellidos = $req->apellidos;
    $usuario->correo = $req->correo;
    $usuario->rol = $req->rol;
    $usuario->save();

    return redirect()->route('crud.index');
  }

  public function addFabricante(Request $req) {
    $req->validate([
      "nombre" => "required",
      "ubicacion" => "nullable"
    ]);

    $fabricante = new Fabricante();
    $fabricante->nombre = $req->nombre;
    if ($req->ubicacion) {
      $fabricante->ubicacion = $req->ubicacion;
    }
    $fabricante->save();

    return redirect()->route('crud.index');
  }

  function updateComponente(Request $req) {
    $req->validate([
      "modelo" => "required",
      "fabricante" => "required",
      "categoria" => "required",
      "descripcion" => "nullable",
      "precio" => "required",
      "imagen" => "nullable"
    ]);
    $componente = Componente::find($req->editedComponentId);
    $componente->modelo = $req->modelo;
    $componente->fabricante = $req->fabricante;
    $componente->categoria = $req->categoria;
    $componente->descripcion = $req->descripcion;
    $componente->precio = $req->precio;
    $componente->imagen = $req->imagen;
    $componente->save();

    return redirect()->route('crud.index');
  }

  function updateUsuario(Request $req) {
    $req->validate([
      "username" => "required",
      "nombre" => "nullable",
      "apellidos" => "nullable",
      "correo" => "required",
      "rol" => "required"
    ]);

    $usuario = Usuario::find($req->editedUserId);
    $usuario->username = $req->username;
    if ($req->nombre)
      $usuario->nombre = $req->nombre;
    if ($req->apellidos)
      $usuario->apellidos = $req->apellidos;
    $usuario->correo = $req->correo;
    $usuario->rol = $req->rol;
    $usuario->save();

    return redirect()->route('crud.index');
  }

  function updateFabricante(Request $req) {
    $req->validate([
      "nombre" => "required",
      "ubicacion" => "nullable"
    ]);

    $fabricante = Fabricante::find($req->editedFabricanteId);
    $fabricante->nombre = $req->nombre;
    if ($req->ubicacion) {
      $fabricante->ubicacion = $req->ubicacion;
    }
    $fabricante->save();

    return redirect()->route('crud.index');
  }

  function deleteComponente(Request $req) {
    $componente = Componente::find($req->destroyId);
    $componente->delete();
    return redirect()->route('crud.index');
  }

  function deleteUsuario(Request $req) {
    $usuario = Usuario::find($req->destroyId);
    $usuario->delete();
    return redirect()->route('crud.index');
  }

  function deleteFabricante(Request $req) {
    $fabricante = Fabricante::find($req->destroyId);
    $fabricante->delete();
    return redirect()->route('crud.index');
  }

}
