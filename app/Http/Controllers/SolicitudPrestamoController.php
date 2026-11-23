<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Models\Prestamo;
use Illuminate\Http\Request;

class SolicitudPrestamoController extends Controller
{
    public function store(Request $request, Libro $libro)
    {
        if ($libro->cantidad_disponible <= 0) {
            return redirect()
                ->route('catalogo.index')
                ->with('error', 'Este libro no tiene ejemplares disponibles.');
        }

        $solicitudExistente = Prestamo::where('user_id', auth()->id())
            ->where('libro_id', $libro->id)
            ->whereIn('estado', ['Solicitado', 'Prestado'])
            ->exists();

        if ($solicitudExistente) {
            return redirect()
                ->route('catalogo.index')
                ->with('error', 'Ya tienes una solicitud pendiente o un préstamo activo de este libro.');
        }

        Prestamo::create([
            'libro_id' => $libro->id,
            'user_id' => auth()->id(),
            'fecha_prestamo' => now()->toDateString(),
            'fecha_devolucion_prevista' => now()->addDays(7)->toDateString(),
            'fecha_devolucion_real' => null,
            'estado' => 'Solicitado',
        ]);

        return redirect()
            ->route('catalogo.index')
            ->with('success', 'Tu solicitud fue enviada al bibliotecario. Está pendiente de aprobación.');
    }
}
