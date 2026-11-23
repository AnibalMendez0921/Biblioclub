<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;

class CatalogoLectorController extends Controller
{
    public function index(Request $request)
    {
        $buscar = $request->input('buscar');

        $libros = Libro::query()
            ->when($buscar, function ($consulta, $buscar) {
                $consulta->where(function ($subconsulta) use ($buscar) {
                    $subconsulta->where('titulo', 'like', "%{$buscar}%")
                        ->orWhere('autor', 'like', "%{$buscar}%")
                        ->orWhere('genero', 'like', "%{$buscar}%");
                });
            })
            ->orderBy('titulo')
            ->get();

        return view('catalogo.index', compact('libros', 'buscar'));
    }

    public function solicitar(Request $request)
    {
        $buscar = $request->input('buscar');

        $libros = Libro::query()
            ->when($buscar, function ($consulta, $buscar) {
                $consulta->where(function ($subconsulta) use ($buscar) {
                    $subconsulta->where('titulo', 'like', "%{$buscar}%")
                        ->orWhere('autor', 'like', "%{$buscar}%")
                        ->orWhere('genero', 'like', "%{$buscar}%");
                });
            })
            ->orderBy('titulo')
            ->get();

        return view('catalogo.solicitar', compact('libros', 'buscar'));
    }
}
