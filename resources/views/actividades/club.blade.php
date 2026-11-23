
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Actividades del club | BiblioClub</title>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #F7F2E8;
            color: #3B3329;
            font-family: 'DM Sans', sans-serif;
        }

        header {
            background: #3B3329;
            color: #F7F2E8;
            padding: 22px 6%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }

        header h1 {
            font-family: 'Playfair Display', serif;
            margin: 0;
            font-size: 27px;
        }

        header a {
            color: white;
            text-decoration: none;
            background: #927548;
            padding: 11px 18px;
            border-radius: 7px;
        }

        main {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .titulo {
            margin-bottom: 30px;
        }

        .titulo h2 {
            font-family: 'Playfair Display', serif;
            font-size: 32px;
            margin-bottom: 8px;
        }

        .titulo p {
            color: #887E70;
        }

        .contenedor {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 22px;
        }

        .actividad {
            background: #FCFAF5;
            border: 1px solid #E8DFCE;
            border-radius: 14px;
            padding: 25px;
            box-shadow: 0 8px 24px rgba(59,51,41,.04);
        }

        .icono {
            background: #F0E7D6;
            width: 55px;
            height: 55px;
            border-radius: 12px;
            display: grid;
            place-items: center;
            font-size: 27px;
        }

        .actividad h3 {
            font-family: 'Playfair Display', serif;
            font-size: 22px;
            margin: 20px 0 12px;
        }

        .descripcion {
            color: #887E70;
            line-height: 1.7;
            min-height: 45px;
        }

        .dato {
            margin-top: 15px;
            font-size: 14px;
        }

        .dato strong {
            color: #3B3329;
        }

        .estado {
            display: inline-block;
            padding: 7px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
            margin-top: 18px;
        }

        .programada {
            background: #EBF0F7;
            color: #36537A;
        }

        .realizada {
            background: #E8F2E6;
            color: #365934;
        }

        .cancelada {
            background: #FCE8E6;
            color: #A83228;
        }

        .asistentes {
            margin-top: 18px;
            padding: 12px;
            background: #F0E7D6;
            border-radius: 8px;
            font-size: 14px;
        }

        .confirmada {
            margin-top: 15px;
            padding: 12px;
            background: #E8F2E6;
            color: #365934;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 700;
        }

        .acciones {
            margin-top: 18px;
        }

        .boton {
            display: block;
            width: 100%;
            padding: 12px 16px;
            border: none;
            border-radius: 8px;
            font-family: 'DM Sans', sans-serif;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            text-align: center;
        }

        .boton-confirmar {
            background: #927548;
            color: white;
        }

        .boton-confirmar:hover {
            background: #765D37;
        }

        .boton-cancelar {
            background: #FCE8E6;
            color: #A83228;
        }

        .boton-cancelar:hover {
            background: #F5D4D0;
        }

        .mensaje {
            padding: 14px 18px;
            border-radius: 8px;
            margin-bottom: 22px;
            font-size: 14px;
        }

        .mensaje-exito {
            background: #E8F2E6;
            color: #365934;
            border: 1px solid #C8DEC4;
        }

        .mensaje-error {
            background: #FCE8E6;
            color: #A83228;
            border: 1px solid #EBC5C1;
        }

        .vacio {
            background: #FCFAF5;
            border: 1px solid #E8DFCE;
            padding: 40px;
            text-align: center;
            border-radius: 14px;
            color: #887E70;
        }

        @media(max-width: 600px) {
            header {
                padding: 20px;
            }

            .titulo h2 {
                font-size: 26px;
            }
        }
    </style>
</head>

<body>

<header>
    <div>
        <h1>📚 BiblioClub</h1>
        <p>Actividades del club de lectura</p>
    </div>

    <a href="{{ route('dashboard') }}">Volver al inicio</a>
</header>

<main>

    <section class="titulo">
        <h2>Actividades del club</h2>
        <p>
            Consulta los próximos encuentros, talleres y actividades
            organizados por nuestro club de lectura.
        </p>
    </section>

    @if(session('success'))
        <div class="mensaje mensaje-exito">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="mensaje mensaje-error">
            {{ session('error') }}
        </div>
    @endif

    @if($actividades->isEmpty())

        <div class="vacio">
            <h3>📅 No hay actividades registradas</h3>
            <p>Pronto publicaremos nuevas actividades para el club.</p>
        </div>

    @else

        <div class="contenedor">

            @foreach($actividades as $actividad)

                @php
                    $claseEstado = match($actividad->estado) {
                        'Programada' => 'programada',
                        'Realizada' => 'realizada',
                        'Cancelada' => 'cancelada',
                        default => 'programada'
                    };

                    $yaConfirmo = $actividad->asistencias->isNotEmpty();
                @endphp

                <article class="actividad">

                    <div class="icono">📅</div>

                    <h3>{{ $actividad->nombre }}</h3>

                    <p class="descripcion">
                        {{ $actividad->descripcion ?: 'Sin descripción disponible.' }}
                    </p>

                    <div class="dato">
                        📍 <strong>Lugar:</strong>
                        {{ $actividad->lugar }}
                    </div>

                    <div class="dato">
                        📆 <strong>Fecha:</strong>
                        {{ $actividad->fecha->format('d/m/Y') }}
                    </div>

                    <div class="dato">
                        🕒 <strong>Horario:</strong>
                        {{ substr($actividad->hora_inicio, 0, 5) }}
                        -
                        {{ substr($actividad->hora_fin, 0, 5) }}
                    </div>

                    <span class="estado {{ $claseEstado }}">
                        {{ $actividad->estado }}
                    </span>

                    <div class="asistentes">
                        👥 <strong>Personas confirmadas:</strong>
                        {{ $actividad->asistencias_count ?? 0 }}
                    </div>

                    @if($actividad->estado === 'Programada')

                        @if($yaConfirmo)

                            <div class="confirmada">
                                ✓ ¡Ya confirmaste tu asistencia!
                            </div>

                            <div class="acciones">
                                <form method="POST"
                                      action="{{ route('actividades.cancelar', $actividad) }}"
                                      onsubmit="return confirm('¿Estás seguro de que deseas cancelar tu asistencia?')">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="boton boton-cancelar">
                                        Cancelar mi asistencia
                                    </button>
                                </form>
                            </div>

                        @else

                            <div class="acciones">
                                <form method="POST"
                                      action="{{ route('actividades.confirmar', $actividad) }}">

                                    @csrf

                                    <button type="submit" class="boton boton-confirmar">
                                        Confirmar mi asistencia
                                    </button>
                                </form>
                            </div>

                        @endif

                    @endif

                </article>

            @endforeach

        </div>

    @endif

</main>

</body>
</html>
