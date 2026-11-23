<?php

namespace App\Http\Controllers;

use App\Models\LibroIntegrante;
use App\Models\ReporteIntegrante;
use App\Models\SolicitudIntegrante;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrestamoIntegranteController extends Controller
{
    private const MOTIVOS = [
        'No devolvió el libro',
        'Libro en mal estado',
        'No se presentó a la entrega',
        'Otro',
    ];

    public function index(Request $request)
    {
        $buscar = $request->input('buscar');
        $genero = $request->input('genero');

        $libros = LibroIntegrante::with('propietario')
            ->where('estado', 'Disponible')
            ->when($buscar, function ($consulta, $buscar) {
                $consulta->where(function ($sub) use ($buscar) {
                    $sub->where('titulo', 'like', "%{$buscar}%")
                        ->orWhere('autor', 'like', "%{$buscar}%")
                        ->orWhere('genero', 'like', "%{$buscar}%");
                });
            })
            ->when($genero, fn ($consulta, $genero) => $consulta->where('genero', $genero))
            ->latest()
            ->get();

        $generos = LibroIntegrante::where('estado', 'Disponible')
            ->distinct()
            ->orderBy('genero')
            ->pluck('genero');

        $pendientes = SolicitudIntegrante::where('propietario_id', auth()->id())
            ->where('estado', 'Pendiente')
            ->count();

        return view('integrantes.index', compact('libros', 'generos', 'buscar', 'genero', 'pendientes'));
    }

    public function create()
    {
        return view('integrantes.formulario', ['libro' => null]);
    }

    public function store(Request $request)
    {
        if ($bloqueo = $this->bloqueoPara($request->user())) {
            return back()->with('error', $bloqueo)->withInput();
        }

        $datos = $this->validarLibro($request);
        unset($datos['portada']);

        $datos['portada'] = $this->guardarPortada($request);
        $datos['user_id'] = $request->user()->id;
        $datos['estado'] = 'Disponible';

        LibroIntegrante::create($datos);

        return redirect()
            ->route('prestamos-integrantes.index')
            ->with('success', 'Tu libro ya aparece en el catálogo de integrantes.');
    }

    public function edit(LibroIntegrante $libro)
    {
        abort_unless($this->esMio($libro->user_id), 403);

        return view('integrantes.formulario', compact('libro'));
    }

    public function update(Request $request, LibroIntegrante $libro)
    {
        abort_unless($this->esMio($libro->user_id), 403);

        $datos = $this->validarLibro($request);
        unset($datos['portada']);

        if ($ruta = $this->guardarPortada($request)) {
            $this->borrarPortada($libro->portada);
            $datos['portada'] = $ruta;
        }

        $libro->update($datos);

        return redirect()
            ->route('prestamos-integrantes.mis-prestamos', ['tab' => 'publicaciones'])
            ->with('success', 'Publicación actualizada.');
    }

    public function retirar(LibroIntegrante $libro)
    {
        abort_unless($this->esMio($libro->user_id), 403);

        if ($libro->estado !== 'Disponible') {
            return back()->with('error', 'Solo puedes retirar un libro que esté disponible (no reservado ni prestado).');
        }

        $libro->update(['estado' => 'Retirado']);

        return back()->with('success', 'El libro ya no aparece en el catálogo.');
    }

    public function republicar(LibroIntegrante $libro)
    {
        abort_unless($this->esMio($libro->user_id), 403);

        if ($libro->estado !== 'Retirado') {
            return back()->with('error', 'Este libro ya está publicado o en un préstamo.');
        }

        if ($bloqueo = $this->bloqueoPara(auth()->user())) {
            return back()->with('error', $bloqueo);
        }

        $libro->update(['estado' => 'Disponible']);

        return back()->with('success', 'Tu libro volvió a publicarse en el catálogo.');
    }

    public function misPrestamos(Request $request)
    {
        $usuario = $request->user();

        $tab = in_array($request->input('tab'), ['recibidas', 'solicitadas', 'publicaciones'], true)
            ? $request->input('tab')
            : 'recibidas';

        $recibidas = SolicitudIntegrante::with(['libro', 'solicitante'])
            ->where('propietario_id', $usuario->id)
            ->latest()
            ->get();

        $solicitadas = SolicitudIntegrante::with(['libro', 'propietario'])
            ->where('solicitante_id', $usuario->id)
            ->latest()
            ->get();

        $publicaciones = LibroIntegrante::withCount([
                'solicitudes as pendientes_count' => fn ($q) => $q->where('estado', 'Pendiente'),
            ])
            ->where('user_id', $usuario->id)
            ->latest()
            ->get();

        $bloqueo = $this->bloqueoPara($usuario);

        return view('integrantes.mis-prestamos', compact(
            'tab', 'recibidas', 'solicitadas', 'publicaciones', 'bloqueo'
        ));
    }

    public function solicitar(Request $request, LibroIntegrante $libro)
    {
        $usuario = $request->user();

        $request->validate([
            'mensaje' => 'nullable|string|max:500',
        ]);

        if ($this->esMio($libro->user_id)) {
            return back()->with('error', 'No puedes solicitar tu propio libro.');
        }

        if ($libro->estado !== 'Disponible') {
            return back()->with('error', 'Este libro ya no está disponible.');
        }

        if ($bloqueo = $this->bloqueoPara($usuario)) {
            return back()->with('error', $bloqueo);
        }

        $yaSolicitado = SolicitudIntegrante::where('libro_integrante_id', $libro->id)
            ->where('solicitante_id', $usuario->id)
            ->where('estado', 'Pendiente')
            ->exists();

        if ($yaSolicitado) {
            return back()->with('error', 'Ya tienes una solicitud pendiente para este libro.');
        }

        SolicitudIntegrante::create([
            'libro_integrante_id' => $libro->id,
            'solicitante_id' => $usuario->id,
            'propietario_id' => $libro->user_id,
            'mensaje' => $request->input('mensaje'),
            'estado' => 'Pendiente',
        ]);

        return redirect()
            ->route('prestamos-integrantes.mis-prestamos', ['tab' => 'solicitadas'])
            ->with('success', 'Solicitud enviada. El propietario te responderá pronto.');
    }

    public function aceptar(Request $request, SolicitudIntegrante $solicitud)
    {
        abort_unless($this->esMio($solicitud->propietario_id), 403);

        $datos = $request->validate([
            'fecha_limite_devolucion' => 'required|date|after:today',
        ]);

        $error = DB::transaction(function () use ($solicitud, $datos) {
            $libro = LibroIntegrante::lockForUpdate()->findOrFail($solicitud->libro_integrante_id);
            $solicitud = SolicitudIntegrante::lockForUpdate()->findOrFail($solicitud->id);

            if ($solicitud->estado !== 'Pendiente') {
                return 'Esta solicitud ya no está pendiente.';
            }

            if ($libro->estado !== 'Disponible') {
                return 'El libro ya no está disponible.';
            }

            $solicitud->update([
                'estado' => 'Aceptado',
                'fecha_limite_devolucion' => $datos['fecha_limite_devolucion'],
            ]);

            $libro->update(['estado' => 'Reservado']);

            SolicitudIntegrante::where('libro_integrante_id', $libro->id)
                ->where('estado', 'Pendiente')
                ->where('id', '!=', $solicitud->id)
                ->update(['estado' => 'Rechazado']);

            return null;
        });

        return $error
            ? back()->with('error', $error)
            : back()->with('success', 'Solicitud aceptada. Coordina la entrega con el solicitante.');
    }

    public function rechazar(SolicitudIntegrante $solicitud)
    {
        abort_unless($this->esMio($solicitud->propietario_id), 403);

        if ($solicitud->estado !== 'Pendiente') {
            return back()->with('error', 'Esta solicitud ya no está pendiente.');
        }

        $solicitud->update(['estado' => 'Rechazado']);

        return back()->with('success', 'Solicitud rechazada.');
    }

    public function cancelar(SolicitudIntegrante $solicitud)
    {
        abort_unless(
            $this->esMio($solicitud->solicitante_id) || $this->esMio($solicitud->propietario_id),
            403
        );

        $error = DB::transaction(function () use ($solicitud) {
            $solicitud = SolicitudIntegrante::lockForUpdate()->findOrFail($solicitud->id);

            if (! in_array($solicitud->estado, ['Pendiente', 'Aceptado'], true)) {
                return 'Este préstamo ya no se puede cancelar.';
            }

            if ($solicitud->estado === 'Aceptado') {
                LibroIntegrante::where('id', $solicitud->libro_integrante_id)
                    ->where('estado', 'Reservado')
                    ->update(['estado' => 'Disponible']);
            }

            $solicitud->update(['estado' => 'Cancelado']);

            return null;
        });

        return $error
            ? back()->with('error', $error)
            : back()->with('success', 'Solicitud cancelada.');
    }

    public function confirmarEntrega(SolicitudIntegrante $solicitud)
    {
        abort_unless($this->esMio($solicitud->solicitante_id), 403);

        $error = DB::transaction(function () use ($solicitud) {
            $solicitud = SolicitudIntegrante::lockForUpdate()->findOrFail($solicitud->id);

            if ($solicitud->estado !== 'Aceptado') {
                return 'Este préstamo no está esperando entrega.';
            }

            $solicitud->update([
                'estado' => 'Activo',
                'fecha_entrega' => today(),
            ]);

            LibroIntegrante::where('id', $solicitud->libro_integrante_id)
                ->update(['estado' => 'Prestado']);

            return null;
        });

        return $error
            ? back()->with('error', $error)
            : back()->with('success', 'Entrega confirmada. ¡Disfruta tu lectura!');
    }

    public function marcarDevuelto(SolicitudIntegrante $solicitud)
    {
        abort_unless($this->esMio($solicitud->solicitante_id), 403);

        if ($solicitud->estado !== 'Activo') {
            return back()->with('error', 'Este préstamo no está activo.');
        }

        $solicitud->update(['estado' => 'DevolucionPendiente']);

        return back()->with('success', 'Avisaste la devolución. El propietario debe confirmarla.');
    }

    public function confirmarDevolucion(SolicitudIntegrante $solicitud)
    {
        abort_unless($this->esMio($solicitud->propietario_id), 403);

        $error = DB::transaction(function () use ($solicitud) {
            $solicitud = SolicitudIntegrante::lockForUpdate()->findOrFail($solicitud->id);

            if (! in_array($solicitud->estado, ['Activo', 'DevolucionPendiente'], true)) {
                return 'Este préstamo no está activo.';
            }

            $solicitud->update([
                'estado' => 'Devuelto',
                'fecha_devolucion' => today(),
            ]);

            LibroIntegrante::where('id', $solicitud->libro_integrante_id)
                ->update(['estado' => 'Disponible']);

            return null;
        });

        return $error
            ? back()->with('error', $error)
            : back()->with('success', 'Devolución confirmada. El libro volvió al catálogo.');
    }

    public function reportar(Request $request, SolicitudIntegrante $solicitud)
    {
        $soySolicitante = $this->esMio($solicitud->solicitante_id);
        $soyPropietario = $this->esMio($solicitud->propietario_id);

        abort_unless($soySolicitante || $soyPropietario, 403);

        $datos = $request->validate([
            'motivo' => 'required|in:' . implode(',', self::MOTIVOS),
            'descripcion' => 'nullable|string|max:1000',
        ]);

        if (! in_array($solicitud->estado, ['Aceptado', 'Activo', 'DevolucionPendiente'], true)) {
            return back()->with('error', 'Solo puedes reportar préstamos en curso.');
        }

        $yaReportado = ReporteIntegrante::where('solicitud_integrante_id', $solicitud->id)
            ->where('reportante_id', auth()->id())
            ->where('estado', 'Abierto')
            ->exists();

        if ($yaReportado) {
            return back()->with('error', 'Ya tienes un reporte abierto para este préstamo.');
        }

        ReporteIntegrante::create([
            'solicitud_integrante_id' => $solicitud->id,
            'reportante_id' => auth()->id(),
            'reportado_id' => $soySolicitante ? $solicitud->propietario_id : $solicitud->solicitante_id,
            'motivo' => $datos['motivo'],
            'descripcion' => $datos['descripcion'] ?? null,
            'estado' => 'Abierto',
        ]);

        return back()->with('success', 'Reporte enviado. Un administrador lo revisará.');
    }

    private function esMio($id): bool
    {
        return (int) $id === (int) auth()->id();
    }

    private function bloqueoPara(User $usuario): ?string
    {
        if ($usuario->estaRestringido()) {
            return 'Tu cuenta está restringida hasta el '
                . $usuario->restringido_hasta->format('d/m/Y')
                . ' por un reporte en préstamos entre integrantes.';
        }

        $vencido = SolicitudIntegrante::where('solicitante_id', $usuario->id)
            ->where('estado', 'Activo')
            ->whereDate('fecha_limite_devolucion', '<', today())
            ->exists();

        if ($vencido) {
            return 'Tienes un préstamo vencido. Devuélvelo para poder publicar o solicitar nuevos libros.';
        }

        return null;
    }

    private function validarLibro(Request $request): array
    {
        return $request->validate([
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'genero' => 'required|string|max:255',
            'descripcion' => 'nullable|string|max:2000',
            'condiciones' => 'nullable|string|max:1000',
            'portada' => 'nullable|image|max:2048',
        ]);
    }

    private function guardarPortada(Request $request): ?string
    {
        if (! $request->hasFile('portada')) {
            return null;
        }

        $archivo = $request->file('portada');
        $nombre = 'portada_' . uniqid() . '.' . $archivo->guessExtension();
        $archivo->move(public_path('images/integrantes'), $nombre);

        return 'images/integrantes/' . $nombre;
    }

    private function borrarPortada(?string $ruta): void
    {
        if ($ruta && str_starts_with($ruta, 'images/integrantes/') && file_exists(public_path($ruta))) {
            @unlink(public_path($ruta));
        }
    }
}