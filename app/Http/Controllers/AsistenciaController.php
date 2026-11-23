<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use App\Models\Asistencia;

class AsistenciaController extends Controller
{
    // Confirmar asistencia
    public function confirmar(Actividad $actividad)
    {
        if ($actividad->estado !== 'Programada') {
            return back()->with('error', 'Esta actividad no está disponible para confirmar asistencia.');
        }

        Asistencia::firstOrCreate([
            'actividad_id' => $actividad->id,
            'user_id' => auth()->id(),
        ]);

        return back()->with('success', '¡Tu asistencia fue confirmada correctamente!');
    }

    // Cancelar asistencia
    public function cancelar(Actividad $actividad)
    {
        $actividad->asistencias()
            ->where('user_id', auth()->id())
            ->delete();

        return back()->with('success', 'Tu asistencia fue cancelada correctamente.');
    }

    // Ver asistentes de una actividad
    public function asistentes(Actividad $actividad)
    {
        $asistentes = $actividad->asistencias()
            ->with('usuario')
            ->get();

        return view('actividades.asistentes', compact(
            'actividad',
            'asistentes'
        ));
    }
}

