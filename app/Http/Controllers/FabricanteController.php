<?php

namespace App\Http\Controllers;

use App\Models\Fabricante;
use Illuminate\Http\Request;

class FabricanteController extends Controller {
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index() {
    return response(Fabricante::all());
  }

  public function show($id) {
    return Fabricante::where('id', $id)->get();
  }
}
