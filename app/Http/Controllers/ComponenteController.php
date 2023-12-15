<?php

namespace App\Http\Controllers;

use App\Models\Componente;
use App\Models\Fabricante;
use Illuminate\Http\Request;

class ComponenteController extends Controller {

  public function index() {
    return response(Componente::all());
  }


  public function show($id) {
    return response(Componente::where('id', $id)->get());
  }

}
