<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis préstamos entre integrantes | BiblioClub</title>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">

    <style>
        @include('integrantes._estilos')
    </style>
</head>

<body>

    @php
        $pendientesRecibidas = $recibidas->where('estado', 'Pendiente')->count();
    @endphp

    <header>
        <div class="logo">
            <h1>Biblio<span>Club.</span></h1>
            <p>Préstamos entre integrantes</p>
        </div>

        <nav class="enlaces">
            <a href="{{ route('dashboard') }}">Inicio</a>
            <a href="{{ route('prestamos-integrantes.index') }}">Catálogo de integrantes</a>
            <a href="{{ route('prestamos-integrantes.create') }}">Publicar libro</a>
        </nav>
    </header>

    <main>

        @if(session('success'))
            <div class="mensaje mensaje-exito">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="mensaje mensaje-error">{{ session('error') }}</div>
        @endif

        @if($errors->any())
            <div class="mensaje mensaje-error">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        @if($bloqueo)
            <div class="mensaje mensaje-aviso">⚠ {{ $bloqueo }}</div>
        @endif

        <section class="introduccion">
            <span class="etiqueta">✦ TUS INTERCAMBIOS</span>
            <h2>Mis préstamos entre integrantes</h2>
            <p>
                Gestiona las solicitudes que recibes por tus libros, los libros que
                has pedido a otros integrantes y tus publicaciones.
            </p>
        </section>

        <nav class="tabs">
            <a href="{{ route('prestamos-integrantes.mis-prestamos', ['tab' => 'recibidas']) }}"
               class="tab {{ $tab === 'recibidas' ? 'activa' : '' }}">
                Solicitudes recibidas
                @if($pendientesRecibidas > 0)
                    <span class="insignia">{{ $pendientesRecibidas }}</span>
                @endif
            </a>

            <a href="{{ route('prestamos-integrantes.mis-prestamos', ['tab' => 'solicitadas']) }}"
               class="tab {{ $tab === 'solicitadas' ? 'activa' : '' }}">
                Libros que solicité
            </a>

            <a href="{{ route('prestamos-integrantes.mis-prestamos', ['tab' => 'publicaciones']) }}"
               class="tab {{ $tab === 'publicaciones' ? 'activa' : '' }}">
                Mis publicaciones
            </a>
        </nav>

        @if($tab === 'recibidas')

            <div class="tabla-contenedor">
                @if($recibidas->count())
                    <table>
                        <thead>
                            <tr>
                                <th>Libro</th>
                                <th>Solicitante</th>
                                <th>Fechas</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($recibidas as $s)
                                <tr>
                                    <td><strong>{{ $s->libro->titulo ?? 'Libro no disponible' }}</strong></td>

                                    <td>
                                        {{ $s->solicitante->name ?? '—' }}
                                        @if($s->mensaje)
                                            <br><span class="nota">“{{ $s->mensaje }}”</span>
                                        @endif
                                    </td>

                                    <td>
                                        Solicitado: {{ $s->created_at->format('d/m/Y') }}<br>
                                        Entrega: {{ $s->fecha_entrega?->format('d/m/Y') ?? 'Pendiente' }}<br>
                                        Devolución acordada: {{ $s->fecha_limite_devolucion?->format('d/m/Y') ?? 'Por acordar' }}<br>
                                        Devuelto: {{ $s->fecha_devolucion?->format('d/m/Y') ?? '—' }}
                                    </td>

                                    <td>
                                        <span class="estado {{ $s->clase() }}">{{ $s->etiqueta() }}</span>
                                        @if($s->estaVencida())
                                            <br><span class="estado st-vencido">Vencido</span>
                                        @endif
                                    </td>

                                    <td>
                                        <div class="acciones">

                                            @if($s->estado === 'Pendiente')

                                                <form method="POST" action="{{ route('prestamos-integrantes.aceptar', $s) }}">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input
                                                        type="date"
                                                        name="fecha_limite_devolucion"
                                                        min="{{ now()->addDay()->toDateString() }}"
                                                        value="{{ now()->addDays(7)->toDateString() }}"
                                                        required
                                                        title="Fecha límite de devolución"
                                                    >
                                                    <button type="submit" class="btn btn-sm">Aceptar</button>
                                                </form>

                                                <form method="POST" action="{{ route('prestamos-integrantes.rechazar', $s) }}">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-secundario btn-sm">Rechazar</button>
                                                </form>

                                            @elseif($s->estado === 'Aceptado')

                                                <span class="nota">Coordina la entrega y espera la confirmación del solicitante.</span>

                                                <form method="POST" action="{{ route('prestamos-integrantes.cancelar', $s) }}">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-secundario btn-sm"
                                                        onclick="return confirm('¿Cancelar este préstamo?')">Cancelar</button>
                                                </form>

                                                @include('integrantes._reportar', ['s' => $s])

                                            @elseif(in_array($s->estado, ['Activo', 'DevolucionPendiente']))

                                                @if($s->estado === 'DevolucionPendiente')
                                                    <span class="nota">El solicitante dice que ya devolvió el libro.</span>
                                                @endif

                                                <form method="POST" action="{{ route('prestamos-integrantes.confirmar-devolucion', $s) }}">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-sm">Confirmar devolución</button>
                                                </form>

                                                @include('integrantes._reportar', ['s' => $s])

                                            @else
                                                <span class="nota">Sin acciones</span>
                                            @endif

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="vacio">
                        <h3>Aún no has recibido solicitudes</h3>
                        <p>Cuando alguien pida uno de tus libros, aparecerá aquí.</p>
                    </div>
                @endif
            </div>

        @elseif($tab === 'solicitadas')

            <div class="tabla-contenedor">
                @if($solicitadas->count())
                    <table>
                        <thead>
                            <tr>
                                <th>Libro</th>
                                <th>Propietario</th>
                                <th>Fechas</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($solicitadas as $s)
                                <tr>
                                    <td><strong>{{ $s->libro->titulo ?? 'Libro no disponible' }}</strong></td>
                                    <td>{{ $s->propietario->name ?? '—' }}</td>

                                    <td>
                                        Solicitado: {{ $s->created_at->format('d/m/Y') }}<br>
                                        Entrega: {{ $s->fecha_entrega?->format('d/m/Y') ?? 'Pendiente' }}<br>
                                        Devolución acordada: {{ $s->fecha_limite_devolucion?->format('d/m/Y') ?? 'Por acordar' }}<br>
                                        Devuelto: {{ $s->fecha_devolucion?->format('d/m/Y') ?? '—' }}
                                    </td>

                                    <td>
                                        <span class="estado {{ $s->clase() }}">{{ $s->etiqueta() }}</span>
                                        @if($s->estaVencida())
                                            <br><span class="estado st-vencido">Vencido</span>
                                        @endif
                                    </td>

                                    <td>
                                        <div class="acciones">

                                            @if($s->estado === 'Pendiente')

                                                <form method="POST" action="{{ route('prestamos-integrantes.cancelar', $s) }}">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-secundario btn-sm">Cancelar solicitud</button>
                                                </form>

                                            @elseif($s->estado === 'Aceptado')

                                                <form method="POST" action="{{ route('prestamos-integrantes.confirmar-entrega', $s) }}">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-sm">Ya recibí el libro</button>
                                                </form>

                                                <form method="POST" action="{{ route('prestamos-integrantes.cancelar', $s) }}">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-secundario btn-sm"
                                                        onclick="return confirm('¿Cancelar este préstamo?')">Cancelar</button>
                                                </form>

                                                @include('integrantes._reportar', ['s' => $s])

                                            @elseif($s->estado === 'Activo')

                                                <form method="POST" action="{{ route('prestamos-integrantes.devuelto', $s) }}">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-sm">Ya devolví el libro</button>
                                                </form>

                                                @include('integrantes._reportar', ['s' => $s])

                                            @elseif($s->estado === 'DevolucionPendiente')

                                                <span class="nota">Esperando que el propietario confirme la devolución.</span>

                                                @include('integrantes._reportar', ['s' => $s])

                                            @else
                                                <span class="nota">Sin acciones</span>
                                            @endif

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="vacio">
                        <h3>Todavía no has solicitado libros</h3>
                        <p>Explora el catálogo de integrantes y pide el que te interese.</p>
                        <br>
                        <a href="{{ route('prestamos-integrantes.index') }}" class="btn">Ver catálogo</a>
                    </div>
                @endif
            </div>

        @else

            <div class="tabla-contenedor">
                @if($publicaciones->count())
                    <table>
                        <thead>
                            <tr>
                                <th>Libro</th>
                                <th>Género</th>
                                <th>Estado</th>
                                <th>Solicitudes pendientes</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($publicaciones as $libro)
                                <tr>
                                    <td>
                                        <strong>{{ $libro->titulo }}</strong><br>
                                        <span class="nota">{{ $libro->autor }}</span>
                                    </td>

                                    <td>{{ $libro->genero }}</td>

                                    <td>
                                        <span class="estado {{ $libro->estado === 'Disponible' ? 'st-devuelto' : ($libro->estado === 'Retirado' ? 'st-rechazado' : 'st-activo') }}">
                                            {{ $libro->estado }}
                                        </span>
                                    </td>

                                    <td>{{ $libro->pendientes_count }}</td>

                                    <td>
                                        <div class="acciones">
                                            <a href="{{ route('prestamos-integrantes.edit', $libro) }}" class="btn btn-secundario btn-sm">Editar</a>

                                            @if($libro->estado === 'Disponible')
                                                <form method="POST" action="{{ route('prestamos-integrantes.retirar', $libro) }}">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-secundario btn-sm"
                                                        onclick="return confirm('¿Retirar este libro del catálogo?')">Retirar publicación</button>
                                                </form>
                                            @elseif($libro->estado === 'Retirado')
                                                <form method="POST" action="{{ route('prestamos-integrantes.republicar', $libro) }}">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-sm">Volver a publicar</button>
                                                </form>
                                            @else
                                                <span class="nota">En préstamo: no se puede retirar</span>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="vacio">
                        <h3>No has publicado libros</h3>
                        <p>Comparte uno de tus libros con los demás integrantes.</p>
                        <br>
                        <a href="{{ route('prestamos-integrantes.create') }}" class="btn">Publicar libro</a>
                    </div>
                @endif
            </div>

        @endif

    </main>

    <footer>
        BiblioClub · Un espacio para descubrir, aprender y compartir.
    </footer>

</body>
</html>