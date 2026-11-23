<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;

class AdminUsuarioController extends Controller
{
    public function index(Request $request)
    {
        $busqueda = $request->input('buscar');

        $usuarios = User::query()
            ->when($busqueda, function ($query, $busqueda) {
                $query->where(function ($consulta) use ($busqueda) {
                    $consulta->where('name', 'like', "%{$busqueda}%")
                        ->orWhere('email', 'like', "%{$busqueda}%");
                });
            })
            ->orderBy('name')
            ->get();

        $roles = Role::where('guard_name', 'web')
            ->orderBy('name')
            ->get();

        return view('admin.usuarios.index', compact('usuarios', 'roles', 'busqueda'));
    }

    public function actualizarRol(Request $request, User $usuario)
    {
        if ($usuario->id === auth()->id()) {
            return redirect()
                ->route('admin.usuarios.index')
                ->with('error', 'No puedes cambiar tu propio rol.');
        }

        $datos = $request->validate([
            'rol' => [
                'required',
                'string',
                Rule::exists('roles', 'name')->where('guard_name', 'web'),
            ],
        ]);

        $usuario->syncRoles([$datos['rol']]);

        return redirect()
            ->route('admin.usuarios.index')
            ->with('success', 'El rol del usuario se actualizó correctamente.');
    }
}
