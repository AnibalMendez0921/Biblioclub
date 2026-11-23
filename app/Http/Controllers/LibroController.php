<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class LibroController extends Controller
{
    public function index(Request $request)
    {
        $busqueda = $request->input('buscar');

        $libros = Libro::query()
            ->when($busqueda, function ($query, $busqueda) {
                $query->where(function ($consulta) use ($busqueda) {
                    $consulta->where('titulo', 'like', "%{$busqueda}%")
                        ->orWhere('autor', 'like', "%{$busqueda}%")
                        ->orWhere('genero', 'like', "%{$busqueda}%");
                });
            })
            ->orderBy('titulo')
            ->get();

        return view('libros.index', compact('libros', 'busqueda'));
    }

    public function create()
    {
        return view('libros.create');
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'genero' => 'required|string|max:100',
            'cantidad_total' => 'required|integer|min:1|max:100000',
            'portada' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'sinopsis' => 'nullable|string',
        ]);

        if ($request->hasFile('portada')) {
            $datos['portada'] = $this->guardarPortada($request);
        }

        // Inicialmente todos los ejemplares estarán disponibles
        $datos['cantidad_disponible'] = $datos['cantidad_total'];

        Libro::create($datos);

        return redirect()
            ->route('libros.index')
            ->with('success', 'Libro registrado correctamente.');
    }

    public function show(Libro $libro)
    {
        return view('libros.show', compact('libro'));
    }

    public function edit(Libro $libro)
    {
        return view('libros.edit', compact('libro'));
    }

    public function update(Request $request, Libro $libro)
    {
        $datos = $request->validate([
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'genero' => 'required|string|max:100',
            'cantidad_total' => 'required|integer|min:1|max:100000',
            'portada' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'sinopsis' => 'nullable|string',
        ]);

        $prestados = $libro->cantidad_total - $libro->cantidad_disponible;

        if ($datos['cantidad_total'] < $prestados) {
            return back()
                ->withErrors([
                    'cantidad_total' => 'La cantidad total no puede ser menor que los ejemplares actualmente prestados: ' . $prestados . '.',
                ])
                ->withInput();
        }

        $datos['cantidad_disponible'] = $datos['cantidad_total'] - $prestados;
        $portadaAnterior = $libro->portada;

        if ($request->hasFile('portada')) {
            $datos['portada'] = $this->guardarPortada($request);
        }

        $libro->update($datos);

        // Eliminar la portada anterior si fue reemplazada
        if ($request->hasFile('portada') && $portadaAnterior) {
            $this->eliminarPortada($portadaAnterior);
        }

        return redirect()
            ->route('libros.index')
            ->with('success', 'Libro actualizado correctamente.');
    }

    public function destroy(Libro $libro)
    {
        $portada = $libro->portada;
        $libro->delete();

        if ($portada) {
            $this->eliminarPortada($portada);
        }

        return redirect()
            ->route('libros.index')
            ->with('success', 'Libro eliminado correctamente.');
    }

    private function guardarPortada(Request $request): string
    {
        File::ensureDirectoryExists(public_path('images'));

        $imagen = $request->file('portada');
        $nombreImagen = 'portada_' . uniqid() . '.' . strtolower($imagen->getClientOriginalExtension());

        $imagen->move(public_path('images'), $nombreImagen);

        return 'images/' . $nombreImagen;
    }

    private function eliminarPortada(string $rutaRelativa): void
    {
        if (str_starts_with($rutaRelativa, 'images/')) {
            $rutaCompleta = public_path($rutaRelativa);

            if (File::exists($rutaCompleta)) {
                File::delete($rutaCompleta);
            }
        }
    }
}