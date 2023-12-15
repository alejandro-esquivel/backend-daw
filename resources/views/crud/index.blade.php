<!doctype html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>CRUD</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
  </style>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
          crossorigin="anonymous"></script>
  <script>
    window.onload = function () {
      const componentBtn = document.querySelector('button.componentButton');
      componentBtn.addEventListener('click', () => {
        let newComponentForm = document.querySelector('.newComponentForm');
        newComponentForm.style.display = newComponentForm.style.display == "table-row" ? "none" : "table-row";
      })
    }
  </script>
  @if ($errors->any())
    <script>
      @foreach ($errors->all() as $error)
      alert("{{$error}}}")
      @endforeach
    </script>
  @endif

</head>
<body>

<div class="container">
  <div class="row">
    <div class="col pt-5">
      <h2>CRUD</h2>
    </div>
    <!-- Componentes -->
    <div class="col-pt-2 pt-4">
      <details id="COMPONENTE-DETAILS">
        <summary class="h4">Componentes</summary>
        <div class="col pt-5">
          <button type="button"
                  style="font-weight: bold;"
                  class="btn btn-info text-white componentButton mb-2">
            Agregar Componente
          </button>

          <div class="tablewrapper" style="width: 100%; max-height: 300px; overflow-y: auto;">
            <table class="table table-hover">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Modelo</th>
                <th scope="col">Fabricante</th>
                <th scope="col">Categoría</th>
                <th scope="col">Descripción</th>
                <th scope="col">Precio</th>
                <th scope="col">Imagen</th>
                <th scope="col" colspan="2">Acciones</th>

              </tr>
              <tbody>
              <tr class="newComponentForm">
                <form action="{{route('crudComponente.add')}}" name="newComponenteForm" id="newComponenteForm"
                      method="post">
                  @csrf
                  <td></td>
                  <td><input form="newComponenteForm" type="text" name="modelo" placeholder="Modelo"
                             class="form-control">
                  </td>
                  <td><input form="newComponenteForm" type="text" name="fabricante" placeholder="Fabricante"
                             class="form-control"></td>
                  <td><input form="newComponenteForm" type="text" name="categoria" placeholder="categoria"
                             class="form-control"></td>
                  <td><input form="newComponenteForm" type="text" name="" placeholder="Decripción" disabled
                             class="form-control"></td>
                  <td><input form="newComponenteForm" type="text" name="precio" placeholder="Precio"
                             class="form-control">
                  </td>
                  <td><input form="newComponenteForm" type="text" name="imagen" value="" placeholder="Imagen" disabled
                             class="form-control"></td>
                  <td colspan="2">
                    <input type="submit" value="Crear Componente" form="newComponenteForm" class="btn btn-primary">
                  </td>
                </form>
              </tr>
              @foreach ($componentes as $componente)
                <tr>
                  <form action="{{route('crudComponente.update')}}" id="updateComponente-{{$componente->id}}"
                        name="updateComponente-{{$componente->id}}"
                        method="post">

                    @csrf()
                    @method('put')
                    <th>{{ $componente->id }}</th>
                    <input type="hidden" value="{{$componente->id}}" name="editedComponentId"
                           form="updateComponente-{{$componente->id}}">
                    <td><input form="updateComponente-{{$componente->id}}" type="text" name="modelo"
                               placeholder="Modelo"
                               class="form-control" value="{{$componente->modelo}}">
                    </td>
                    <td><input form="updateComponente-{{$componente->id}}" type="text" name="fabricante"
                               placeholder="Fabricante"
                               class="form-control" value="{{$componente->fabricante}}"></td>
                    <td><input form="updateComponente-{{$componente->id}}" type="text" name="categoria"
                               placeholder="categoria"
                               class="form-control" value="{{$componente->categoria}}"></td>
                    <td><input form="updateComponente-{{$componente->id}}" type="text" name="" placeholder="Decripción"
                               disabled
                               class="form-control" value="{{$componente->descripcion}}" disabled></td>
                    <td><input form="updateComponente-{{$componente->id}}" type="text" name="precio"
                               placeholder="Precio"
                               class="form-control" value="{{$componente->precio}}">
                    </td>
                    <td><input form="updateComponente-{{$componente->id}}" type="text" name="imagen"
                               placeholder="Imagen"
                               class="form-control" value="{{$componente->imagen}}"></td>

                    <td><input type="submit" value="Editar" class="btn btn-primary"></td>
                  </form>
                  <td>
                    <form action="{{ route('crudComponente.destroy') }}"
                          id="componentDestroyForm-{{$componente->id}}"
                          name="componentDestroyForm-{{$componente->id}}"
                          method="POST">
                      @csrf
                      @method('DELETE')
                      <input type="hidden" name="destroyId"
                             form="componentDestroyForm-{{$componente->id}}"
                             value="{{$componente->id}}">
                      <input type="submit" class="btn btn-danger" value="Eliminar"/>
                    </form>
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </details>
    </div>
    <!-- Fabricantes -->
    <div class="col-pt-2 pt-4">
      <details id="FABRICANTE-DETAILS">
        <summary class="h4">Fabricantes</summary>
        <div class="col pt-5">
          <button type="button"
                  style="font-weight: bold;"
                  class="btn btn-info text-white componentButton mb-2">
            Agregar Fabricante
          </button>

          <div class="tablewrapper" style="width: 100%; max-height: 300px; overflow-y: auto;">
            <table class="table table-hover">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">nombre</th>
                <th scope="col">Ubicación</th>
                <th scope="col" colspan="2">Acciones</th>

              </tr>
              <tbody>
              <tr class="newComponentForm">
                <form action="{{route('crudFabricante.add')}}" name="newFabricanteForm" id="newFabricanteForm"
                      method="post">
                  @csrf
                  <td></td>
                  <td>
                    <input form="newFabricanteForm" type="text" name="nombre" placeholder="Nombre" class="form-control">
                  </td>
                  <td>
                    <input form="newFabricanteForm" type="text" name="ubicacion" placeholder="Ubicación"
                           class="form-control">
                  </td>

                  <td colspan="2">
                    <input type="submit" value="Crear Fabricante" form="newFabricanteForm" class="btn btn-primary">
                  </td>
                </form>
              </tr>
              @foreach ($fabricantes as $fabricante)
                <tr>
                  <form action="{{route('crudFabricante.update')}}" id="updateFabricante-{{$fabricante->id}}"
                        name="updateFabricante-{{$fabricante->id}}"
                        method="post">

                    @csrf()
                    @method('put')
                    <th>{{ $fabricante->id }}</th>
                    <input type="hidden" value="{{$fabricante->id}}" name="editedFabricanteId"
                           form="updateFabricante-{{$fabricante->id}}">
                    <td>
                      <input form="updateFabricante-{{$fabricante->id}}" type="text" name="nombre"
                             placeholder="nombre"
                             class="form-control" value="{{$fabricante->nombre}}">
                    </td>
                    <td>
                      <input form="updateFabricante-{{$fabricante->id}}" type="text" name="ubicacion"
                             placeholder="Ubicación"
                             class="form-control" value="{{$fabricante->ubicacion}}">
                    </td>
                    <td><input type="submit" value="Editar" class="btn btn-primary"></td>
                  </form>
                  <td>
                    <form action="{{ route('crudFabricante.destroy') }}"
                          id="fabricanteDestroyForm-{{$fabricante->id}}"
                          name="fabricanteDestroyForm-{{$fabricante->id}}"
                          method="POST">
                      @csrf
                      @method('DELETE')
                      <input type="hidden" name="destroyId"
                             form="fabricanteDestroyForm-{{$fabricante->id}}"
                             value="{{$fabricante->id}}">
                      @if($fabricante->componente()->exists())
                        <input type="submit" class="btn btn-danger" value="Eliminar" disabled/>
                      @else
                        <input type="submit" class="btn btn-danger" value="Eliminar"/>
                      @endif
                    </form>
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </details>
    </div>
    <!-- Usuarios -->
    <div class="col-pt-2 pt-4">
      <details open id="USUARIO-DETAILS">
        <summary class="h4">Usuarios</summary>
        <div class="col pt-5">
          <button type="button"
                  style="font-weight: bold;"
                  class="btn btn-info text-white componentButton mb-2">
            Agregar Usuario
          </button>

          <div class="tablewrapper" style="width: 100%; max-height: 300px; overflow-y: auto;">
            <table class="table table-hover">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Username</th>
                <th scope="col">Password</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellidos</th>
                <th scope="col">Correo</th>
                <th scope="col">Rol</th>
                <th scope="col" colspan="2">Acciones</th>

              </tr>
              <tbody>
              <tr class="newComponentForm">
                <form action="{{route('crudUsuario.add')}}" name="newUsuarioForm" id="newUsuarioForm"
                      method="post">
                  @csrf
                  <td></td>
                  <td>
                    <input form="newUsuarioForm" type="text" name="username" placeholder="Username"
                           class="form-control">
                  </td>
                  <td>
                    <input form="newUsuarioForm" type="password" name="password" placeholder="Contraseña"
                           class="form-control">
                  </td>
                  <td>
                    <input form="newUsuarioForm" type="text" name="nombre" placeholder="Nombre"
                           class="form-control">
                  </td>
                  <td>
                    <input form="newUsuarioForm" type="text" name="apellidos" placeholder="Apellidos"
                           class="form-control">
                  </td>
                  <td>
                    <input form="newUsuarioForm" type="email" name="correo" placeholder="correo"
                           class="form-control">
                  </td>
                  <td>
                    <input form="newUsuarioForm" type="text" name="rol" placeholder="Rol" value="1"
                           class="form-control">
                  </td>
                  <td colspan="2">
                    <input type="submit" value="Crear Usuario" form="newUsuarioForm" class="btn btn-primary">
                  </td>
                </form>
              </tr>
              @foreach ($usuarios as $usuario)
                <tr>
                  <form action="{{route('crudUsuario.update')}}" id="updateUsuario-{{$usuario->id}}"
                        name="updateUsuario-{{$usuario->id}}"
                        method="post">

                    @csrf()
                    @method('put')
                    <th>{{ $usuario->id }}</th>
                    <input type="hidden" value="{{$usuario->id}}" name="editedUserId"
                           form="updateUsuario-{{$usuario->id}}">
                    <td><input form="updateUsuario-{{$usuario->id}}" type="text" name="username"
                               placeholder="Username"
                               class="form-control" value="{{$usuario->username}}">
                    </td>
                    <td><input form="updateUsuario-{{$usuario->id}}" type="password" name="password"
                               placeholder="Password"
                               class="form-control" value="{{$usuario->password}}" disabled></td>
                    <td><input form="updateUsuario-{{$usuario->id}}" type="text" name="nombre"
                               placeholder="Nombre"
                               class="form-control" value="{{$usuario->nombre}}"></td>
                    <td><input form="updateUsuario-{{$usuario->id}}" type="text" name="apellidos"
                               placeholder="Apellidos" class="form-control"
                               value="{{$usuario->apellidos}}"></td>
                    <td><input form="updateUsuario-{{$usuario->id}}" type="email" name="correo"
                               placeholder="Correo"
                               class="form-control" value="{{$usuario->correo}}">
                    </td>
                    <td><input form="updateUsuario-{{$usuario->id}}" type="text" name="rol"
                               placeholder="Rol"
                               class="form-control" value="{{$usuario->rol}}"></td>

                    <td><input type="submit" value="Editar" class="btn btn-primary"></td>
                  </form>
                  <td>
                    <form action="{{ route('crudUsuario.destroy') }}"
                          id="componentDestroyForm-{{$usuario->id}}"
                          name="componentDestroyForm-{{$usuario->id}}"
                          method="POST">
                      @csrf
                      @method('DELETE')
                      <input type="hidden" name="destroyId"
                             form="componentDestroyForm-{{$usuario->id}}"
                             value="{{$usuario->id}}">
                      <input type="submit" class="btn btn-danger" value="Eliminar"/>
                    </form>
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </details>
    </div>

  </div>
</div>

</body>
</html>
