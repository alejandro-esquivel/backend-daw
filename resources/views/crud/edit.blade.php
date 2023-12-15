@extends('layouts.app')

@section('title', 'Bebidas: Create')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col pt-5">

        <h2>Bebidas: Edit<a href="{{route('adminbebidas.index')}}"><button type="button" style="float: right;" class="btn btn-success float-right">Volver
              a listado de bebidas</button></a></h2>

        <form action="{{ route('adminbebidas.update', $bebida) }}" method="POST">
          @method('put')
          @csrf
          <label>
            Nombre:
            <br>
            {{-- El método old() muestra el valor correcto del campo del formulario metido anteriormente --}}
            <input type="text" name="nombre" value="{{ $bebida->nombre }}">
          </label>

          @error('nombre')
            <br>
            <small class="text-danger">*{{ $message }}</small>
            <br>
          @enderror

          <br>
          <label>
            Descripcion:
            <br>
            <input type="text" name="descripcion" value="{{ $bebida->descripcion }}">
          </label>

          {{-- Verificamos si ha habido algún error de validación en el campo descripcion --}}
          @error('descripcion')
            <br>
            <small class="text-danger">*{{ $message }}</small>
            <br>
          @enderror
          <br>
          <label>
            PVP:
            <br>
            <input type="text" name="pvp" value="{{ $bebida->pvp }}">
          </label>

          {{-- Verificamos si ha habido algún error de validación en el campo descripcion --}}
          @error('pvp')
            <br>
            <small class="text-danger">*{{ $message }}</small>
            <br>
          @enderror
          <br>
          <button type="submit" class="btn btn-success mt-4">Añadir Bebida</button>
        </form>
      </div>
    </div>
  </div>

@endsection


@section('pie')

@endsection
