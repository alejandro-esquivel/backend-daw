<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware {
  /**
   * The URIs that should be excluded from CSRF verification.
   *
   * @var array
   */
  protected $except = [
    "/api/usuario",
    "/api/usuario/login",
    "/api/usuario/delete",
    "/api/usuario/update",
    "/api/componentes",
    "/api/componentes/delete",
    "/api/componentes/update",
    "/crud/componente",
    "/crud/usuario",
    "/crud/fabricante",
    "/crud/categoria",


  ];
}
