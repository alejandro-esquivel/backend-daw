@extends('layouts.app')

@section('title', 'Bebidas: Create')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col pt-5">

        <h2>Bebidas: Create<a href=""><button type="button" style="float: right;"
              class="btn btn-success float-right">Volver a listado de categorías</button></a></h2>

        <form action="{{ route('adminbebidas.store') }}" method="POST">
          @csrf
          <label>
            Nombre:
            <br>
            {{-- El método old() muestra el valor correcto del campo del formulario metido anteriormente --}}
            <input type="text" name="nombre" value="{{ old('nombre') }}">
          </label>

          {{-- Verificamos si ha habido algún error de validación en el campo nombre --}}
          {{-- Buscamos laravel en español y descargamos de github las traducciones a español y las copiamos en resources/lang/es --}}
          {{-- Cambiamos configuración en config/app.php ('locale' => 'es') --}}
          @error('nombre')
            <br>
            <small class="text-danger">*{{ $message }}</small>
            <br>
          @enderror

          <br>
          <label for="categoria">
            Categoría:
            <br>
            <select class="form-select" name="categoria" id="categoria">
              <option selected>Categorías</option>
              @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
              @endforeach
            </select>
          </label>

          <br>
          <label>
            Descripcion:
            <br>
            <input type="text" name="descripcion" value="{{ old('descripcion') }}">
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
            <input type="text" name="pvp" value="{{ old('pvp') }}">
          </label>

          {{-- Verificamos si ha habido algún error de validación en el campo descripcion --}}
          @error('pvp')
            <br>
            <small class="text-danger">*{{ $message }}</small>
            <br>
          @enderror
          <br>

          <button type="submit" class="btn btn-success mt-4">Añadir Categoría</button>

        </form>
      </div>
    </div>
  </div>

@endsection
