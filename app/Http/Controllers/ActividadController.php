<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use Illuminate\Http\Request;

class ActividadController extends Controller
{
    // Mostrar actividades al administrador
    public function index(Request $request)
    {
        $buscar = $request->input('buscar');
        $estado = $request->input('estado');

        $actividades = Actividad::query()
            ->withCount('asistencias')
            ->when($buscar, function ($query, $buscar) {
                $query->where(function ($consulta) use ($buscar) {
                    $consulta->where('nombre', 'like', "%{$buscar}%")
                        ->orWhere('lugar', 'like', "%{$buscar}%");
                });
            })
            ->when($estado, function ($query, $estado) {
                $query->where('estado', $estado);
            })
            ->orderBy('fecha')
            ->orderBy('hora_inicio')
            ->get();

        return view('actividades.index', compact(
            'actividades',
            'buscar',
            'estado'
        ));
    }

    // Formulario para crear actividad
    public function create()
    {
        return view('actividades.create');
    }

    // Guardar actividad
    public function store(Request $request)
    {
        $datos = $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'descripcion' => ['nullable', 'string'],
            'lugar' => ['required', 'string', 'max:255'],
            'fecha' => ['required', 'date'],
            'hora_inicio' => ['required', 'date_format:H:i'],
            'hora_fin' => [
                'required',
                'date_format:H:i',
                'after:hora_inicio',
            ],
        ], [
            'nombre.required' => 'El nombre de la actividad es obligatorio.',
            'lugar.required' => 'Debes indicar el lugar de la actividad.',
            'fecha.required' => 'Debes seleccionar la fecha de la actividad.',
            'hora_inicio.required' => 'Debes indicar la hora de inicio.',
            'hora_fin.required' => 'Debes indicar la hora de finalización.',
            'hora_fin.after' => 'La hora de finalización debe ser posterior a la hora de inicio.',
        ]);

        $datos['estado'] = 'Programada';

        Actividad::create($datos);

        return redirect()
            ->route('actividades.index')
            ->with('success', 'La actividad se registró correctamente.');
    }

    // Editar actividad
    public function edit(Actividad $actividad)
    {
        return view('actividades.edit', compact('actividad'));
    }

    // Actualizar actividad
    public function update(Request $request, Actividad $actividad)
    {
        $datos = $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'descripcion' => ['nullable', 'string'],
            'lugar' => ['required', 'string', 'max:255'],
            'fecha' => ['required', 'date'],
            'hora_inicio' => ['required', 'date_format:H:i'],
            'hora_fin' => [
                'required',
                'date_format:H:i',
                'after:hora_inicio',
            ],
        ], [
            'nombre.required' => 'El nombre de la actividad es obligatorio.',
            'lugar.required' => 'Debes indicar el lugar de la actividad.',
            'fecha.required' => 'Debes seleccionar la fecha de la actividad.',
            'hora_inicio.required' => 'Debes indicar la hora de inicio.',
            'hora_fin.required' => 'Debes indicar la hora de finalización.',
            'hora_fin.after' => 'La hora de finalización debe ser posterior a la hora de inicio.',
        ]);

        $actividad->update($datos);

        return redirect()
            ->route('actividades.index')
            ->with('success', 'La actividad se actualizó correctamente.');
    }

    // Cambiar estado
    public function cambiarEstado(Request $request, Actividad $actividad)
    {
        $datos = $request->validate([
            'estado' => ['required', 'in:Programada,Realizada,Cancelada'],
        ]);

        $actividad->update([
            'estado' => $datos['estado'],
        ]);

        return redirect()
            ->route('actividades.index')
            ->with('success', 'El estado de la actividad se actualizó correctamente.');
    }

    // Eliminar actividad
    public function destroy(Actividad $actividad)
    {
        $actividad->delete();

        return redirect()
            ->route('actividades.index')
            ->with('success', 'La actividad se eliminó correctamente.');
    }

    // Vista de actividades para los usuarios del club
    public function club()
    {
        $actividades = Actividad::query()
            ->withCount('asistencias')
            ->with(['asistencias' => function ($query) {
                $query->where('user_id', auth()->id());
            }])
            ->orderByRaw(
                'CASE WHEN fecha >= ? THEN 0 ELSE 1 END',
                [now()->toDateString()]
            )
            ->orderBy('fecha')
            ->orderBy('hora_inicio')
            ->get();

        return view('actividades.club', compact('actividades'));
    }
}
