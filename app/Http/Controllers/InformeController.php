<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Models\Prestamo;
use App\Models\Actividad;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class InformeController extends Controller
{
    public function index(Request $request)
    {
        $fechaInicio = $request->input('fecha_inicio');
        $fechaFin = $request->input('fecha_fin');

        $totalTitulos = Libro::count();

        $totalEjemplares = Libro::sum('cantidad_total');

        $ejemplaresDisponibles = Libro::sum('cantidad_disponible');

        $ejemplaresPrestados = max(
            0,
            $totalEjemplares - $ejemplaresDisponibles
        );

        $totalUsuarios = User::count();

        $usuariosPorRol = Role::withCount('users')->get();

        $prestamosConsulta = Prestamo::query();

        if ($fechaInicio) {
            $prestamosConsulta->whereDate(
                'fecha_prestamo',
                '>=',
                $fechaInicio
            );
        }

        if ($fechaFin) {
            $prestamosConsulta->whereDate(
                'fecha_prestamo',
                '<=',
                $fechaFin
            );
        }

        $totalPrestamos = (clone $prestamosConsulta)->count();

        $prestamosActivos = (clone $prestamosConsulta)
            ->where('estado', 'Prestado')
            ->count();

        $prestamosDevueltos = (clone $prestamosConsulta)
            ->where('estado', 'Devuelto')
            ->count();

        $prestamosVencidos = (clone $prestamosConsulta)
            ->where('estado', 'Prestado')
            ->whereDate('fecha_devolucion_prevista', '<', now()->toDateString())
            ->count();

        $librosMasPrestados = (clone $prestamosConsulta)
            ->select('libro_id', DB::raw('COUNT(*) as total_prestamos'))
            ->with('libro:id,titulo,autor')
            ->groupBy('libro_id')
            ->orderByDesc('total_prestamos')
            ->limit(5)
            ->get();

        $actividadesConsulta = Actividad::query();

        if ($fechaInicio) {
            $actividadesConsulta->whereDate('fecha', '>=', $fechaInicio);
        }

        if ($fechaFin) {
            $actividadesConsulta->whereDate('fecha', '<=', $fechaFin);
        }

        $actividadesProgramadas = (clone $actividadesConsulta)
            ->where('estado', 'Programada')
            ->count();

        $actividadesRealizadas = (clone $actividadesConsulta)
            ->where('estado', 'Realizada')
            ->count();

        $actividadesCanceladas = (clone $actividadesConsulta)
            ->where('estado', 'Cancelada')
            ->count();

        return view('informes.index', compact(
            'fechaInicio',
            'fechaFin',
            'totalTitulos',
            'totalEjemplares',
            'ejemplaresDisponibles',
            'ejemplaresPrestados',
            'totalUsuarios',
            'usuariosPorRol',
            'totalPrestamos',
            'prestamosActivos',
            'prestamosDevueltos',
            'prestamosVencidos',
            'librosMasPrestados',
            'actividadesProgramadas',
            'actividadesRealizadas',
            'actividadesCanceladas'
        ));
    }
}
