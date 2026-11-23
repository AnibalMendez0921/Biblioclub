<?php

namespace App\Http\Controllers;


use App\Models\Prestamo;
use Illuminate\Http\Request;

class MisPrestamosController extends Controller
{
    public function index(Request $request)
    {
        $estado = $request->input('estado');

        $prestamos = Prestamo::with('libro')
            ->where('user_id', auth()->id())
            ->when($estado, function ($query, $estado) {
                $query->where('estado', $estado);
            })
            ->orderByDesc('created_at')
            ->get();

        return view('mis-prestamos.index', compact(
            'prestamos',
            'estado'
        ));
    }
}