<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Models\Prestamo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class PrestamoController extends Controller
{
    public function index(Request $request)
    {
        $buscar = $request->input('buscar');
        $estado = $request->input('estado');

        $prestamos = Prestamo::with(['libro', 'usuario'])
            ->when($buscar, function ($query, $buscar) {
                $query->where(function ($subquery) use ($buscar) {
                    $subquery->whereHas('libro', function ($libros) use ($buscar) {
                        $libros->where('titulo', 'like', "%{$buscar}%");
                    })->orWhereHas('usuario', function ($usuarios) use ($buscar) {
                        $usuarios->where('name', 'like', "%{$buscar}%")
                            ->orWhere('email', 'like', "%{$buscar}%");
                    });
                });
            })
            ->when($estado, function ($query, $estado) {
                $query->where('estado', $estado);
            })
            ->orderByDesc('created_at')
            ->get();

        return view('prestamos.index', compact(
            'prestamos',
            'buscar',
            'estado'
        ));
    }

    public function create()
    {
        $libros = Libro::where('cantidad_disponible', '>', 0)
            ->orderBy('titulo')
            ->get();

        $usuarios = User::orderBy('name')->get();

        return view('prestamos.create', compact('libros', 'usuarios'));
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'libro_id' => ['required', 'integer', 'exists:libros,id'],
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'fecha_prestamo' => ['required', 'date'],
            'fecha_devolucion_prevista' => [
                'required',
                'date',
                'after_or_equal:fecha_prestamo',
            ],
        ]);

        DB::transaction(function () use ($datos) {
            $libro = Libro::whereKey($datos['libro_id'])
                ->lockForUpdate()
                ->firstOrFail();

            if ($libro->cantidad_disponible < 1) {
                throw ValidationException::withMessages([
                    'libro_id' => 'Este libro no tiene ejemplares disponibles.',
                ]);
            }

            Prestamo::create([
                'libro_id' => $libro->id,
                'user_id' => $datos['user_id'],
                'fecha_prestamo' => $datos['fecha_prestamo'],
                'fecha_devolucion_prevista' => $datos['fecha_devolucion_prevista'],
                'estado' => 'Prestado',
            ]);

            $libro->decrement('cantidad_disponible');
        });

        return redirect()
            ->route('prestamos.index')
            ->with('success', 'El préstamo se registró correctamente.');
    }

    public function aprobar(Prestamo $prestamo)
    {
        DB::transaction(function () use ($prestamo) {
            $prestamo = Prestamo::whereKey($prestamo->id)
                ->lockForUpdate()
                ->firstOrFail();

            if ($prestamo->estado !== 'Solicitado') {
                throw ValidationException::withMessages([
                    'prestamo' => 'Esta solicitud ya fue procesada o no está pendiente.',
                ]);
            }

            $libro = Libro::whereKey($prestamo->libro_id)
                ->lockForUpdate()
                ->firstOrFail();

            if ($libro->cantidad_disponible < 1) {
                throw ValidationException::withMessages([
                    'prestamo' => 'No hay ejemplares disponibles para aprobar esta solicitud.',
                ]);
            }

            $prestamo->update([
                'estado' => 'Prestado',
                'fecha_prestamo' => now()->toDateString(),
                'fecha_devolucion_prevista' => now()->addDays(7)->toDateString(),
            ]);

            $libro->decrement('cantidad_disponible');
        });

        return redirect()
            ->route('prestamos.index')
            ->with('success', 'La solicitud fue aprobada y el préstamo quedó registrado.');
    }

    public function rechazar(Prestamo $prestamo)
    {
        if ($prestamo->estado !== 'Solicitado') {
            return redirect()
                ->route('prestamos.index')
                ->with('error', 'Solo se pueden rechazar solicitudes pendientes.');
        }

        $prestamo->update([
            'estado' => 'Rechazado',
        ]);

        return redirect()
            ->route('prestamos.index')
            ->with('success', 'La solicitud fue rechazada.');
    }

    public function devolver(Prestamo $prestamo)
    {
        DB::transaction(function () use ($prestamo) {
            $prestamo = Prestamo::whereKey($prestamo->id)
                ->lockForUpdate()
                ->firstOrFail();

            if ($prestamo->estado !== 'Prestado') {
                throw ValidationException::withMessages([
                    'prestamo' => 'Solo se pueden devolver préstamos que estén activos.',
                ]);
            }

            $libro = Libro::whereKey($prestamo->libro_id)
                ->lockForUpdate()
                ->firstOrFail();

            $prestamo->update([
                'estado' => 'Devuelto',
                'fecha_devolucion_real' => now()->toDateString(),
            ]);

            if ($libro->cantidad_disponible < $libro->cantidad_total) {
                $libro->increment('cantidad_disponible');
            }
        });

        return redirect()
            ->route('prestamos.index')
            ->with('success', 'La devolución se registró correctamente.');
    }
}
