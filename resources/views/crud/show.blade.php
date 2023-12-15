@extends('layouts.app')

@section('titulo', 'Bebidas: Show')

@section('content')

  <div class="container">
    <div class="row">
      <div class="col pt-5">
        <h2>Bebidas: Show
          <a href="{{ route('adminbebidas.index') }}"><button type="button" style="float: right"
              class="btn btn-success float-right">Volver al Listado de bebidas</button>
          </a>
        </h2>
        <ul>
          <li><strong>Nombre: </strong>{{ $bebida->nombre }}</li>
          <li><strong>Descripcion: </strong>{{ $bebida->descripcion }}</li>
          <li><strong>PVP: </strong>{{ $bebida->pvp }}</li>
        </ul>

      </div>
    </div>
  </div>
@endsection
