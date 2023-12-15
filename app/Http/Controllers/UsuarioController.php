<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller {

  function create(Request $req) {
    //return response($req);
    $req->validate([
      'username' => 'required|min:3',
      'correo' => 'required|email',
      'pass' => 'required|min:6',
      'pass2' => 'required|min:6'
    ]);

    $duplicado = Usuario::where('username', $req->username)->exists();
    if ($duplicado) {
      return response('El usuario introducido ya existe', 406);
    }

    $correoDuplicado = Usuario::where('correo', $req->correo)->exists();
    if ($correoDuplicado) {
      return response('Ya existe un usuario con ese correo.', 406);
    }

    if ($req->pass != $req->pass2) {
      return response('Las contraseñas introducidas no coinciden', 406);
    }

    $usuario = new Usuario();
    $usuario->username = $req->username;
    $usuario->correo = $req->correo;
    $usuario->password = Hash::make($req->pass);
    if ($req->username == 'aleaallee' || $req->username == 'administreitor') {
      $usuario->rol = 2;
    } else {
      $usuario->rol = 1;
    }
    $usuario->save();
    return response('Has creado el usuario con éxito', 201);
  }

  function login(Request $req) {
    $req->validate([
      'username' => 'required|min:3',
      'password' => 'required'
    ]);

    $usuarioExiste = Usuario::where('username', $req->username)->exists();
    if (!$usuarioExiste) {
      return response('El usuario introducido no existe', 406);
    }
    $contraDB = Usuario::where('username', $req->username)->get();
    $contraValida = Hash::check($req->password, $contraDB[0]->password);

    if (!$contraValida) {
      return response('La contraseña introducida es incorrecta', 406);
    }

    return response('Se ha iniciado sesión con exito', 201);
  }

  function getUsers() {
    return response(Usuario::all());
  }

  function getUser($user) {
    return response(Usuario::where('username', $user)->get());
  }


}
