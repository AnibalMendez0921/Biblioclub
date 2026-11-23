
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Asistentes | BiblioClub</title>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --ivory: #F7F2E8;
            --ivory-light: #FCFAF5;
            --gold: #B89A66;
            --gold-light: #D8C49E;
            --gold-dark: #927548;
            --chocolate: #3B3329;
            --beige: #E8DFCE;
            --taupe: #887E70;
            --white: #FFFFFF;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'DM Sans', Arial, sans-serif;
            background: var(--ivory);
            color: var(--chocolate);
            min-height: 100vh;
        }

        header {
            background: var(--chocolate);
            color: var(--ivory);
            padding: 20px 6%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }

        header h1 {
            margin: 0;
            font-family: 'Playfair Display', serif;
            font-size: 27px;
        }

        header p {
            margin: 6px 0 0;
            color: #D5CBBB;
            font-size: 13px;
        }

        header a {
            color: var(--ivory);
            text-decoration: none;
            font-size: 14px;
        }

        header a:hover {
            color: var(--gold-light);
        }

        main {
            max-width: 1100px;
            margin: 35px auto;
            padding: 0 20px;
        }

        .panel {
            background: var(--ivory-light);
            border: 1px solid var(--beige);
            border-radius: 12px;
            padding: 25px;
            margin-bottom: 22px;
            box-shadow: 0 8px 24px rgba(59, 51, 41, .04);
        }

        h2 {
            font-family: 'Playfair Display', serif;
            font-size: 29px;
            margin: 0 0 12px;
        }

        h3 {
            font-family: 'Playfair Display', serif;
            margin-top: 0;
        }

        .details {
            color: var(--taupe);
            line-height: 1.8;
            font-size: 14px;
        }

        .counter {
            background: #F0E7D6;
            border-radius: 10px;
            padding: 18px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 20px;
        }

        .counter strong {
            font-size: 30px;
            color: var(--gold-dark);
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 550px;
        }

        th, td {
            padding: 15px 12px;
            border-bottom: 1px solid var(--beige);
            text-align: left;
        }

        th {
            background: #F3EDE0;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: .5px;
        }

        td {
            font-size: 14px;
        }

        tbody tr:hover {
            background: #F9F5EC;
        }

        .badge {
            display: inline-block;
            padding: 6px 10px;
            background: #E8F2E6;
            color: #365934;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
        }

        .empty {
            padding: 35px 15px;
            text-align: center;
            color: var(--taupe);
        }

        .button {
            display: inline-block;
            padding: 11px 16px;
            background: var(--gold-dark);
            color: white;
            text-decoration: none;
            border-radius: 7px;
            font-size: 13px;
            font-weight: 600;
        }

        .button:hover {
            background: var(--gold);
        }

        footer {
            text-align: center;
            color: var(--taupe);
            font-size: 13px;
            padding: 20px;
        }

        @media (max-width: 650px) {
            header {
                padding: 18px 20px;
            }

            .panel {
                padding: 17px;
            }

            h2 {
                font-size: 24px;
            }
        }
    </style>
</head>

<body>

<header>
    <div>
        <h1>BiblioClub</h1>
        <p>Administración de asistentes</p>
    </div>

    <nav>
        <a href="{{ route('admin') }}">Panel de administración</a>
        &nbsp; | &nbsp;
        <a href="{{ route('actividades.index') }}">Actividades</a>
    </nav>
</header>

<main>

    <section class="panel">

        <h2>{{ $actividad->nombre }}</h2>

        <div class="details">
            <strong>Lugar:</strong> {{ $actividad->lugar }}<br>

            <strong>Fecha:</strong>
            {{ $actividad->fecha->format('d/m/Y') }}<br>

            <strong>Horario:</strong>
            {{ \Illuminate\Support\Carbon::parse($actividad->hora_inicio)->format('h:i A') }}
            -
            {{ \Illuminate\Support\Carbon::parse($actividad->hora_fin)->format('h:i A') }}<br>

            <strong>Estado:</strong> {{ $actividad->estado }}
        </div>

        <div class="counter">
            <span>
                <strong>Personas confirmadas</strong>
            </span>

            <strong>{{ $asistentes->count() }}</strong>
        </div>

    </section>

    <section class="panel">

        <h3>Lista de asistentes</h3>

        <div class="table-wrapper">

            <table>

                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre del usuario</th>
                        <th>Correo electrónico</th>
                        <th>Fecha de confirmación</th>
                        <th>Estado</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse ($asistentes as $asistencia)

                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <td>
                                {{ $asistencia->usuario->name ?? 'Usuario no disponible' }}
                            </td>

                            <td>
                                {{ $asistencia->usuario->email ?? 'No disponible' }}
                            </td>

                            <td>
                                {{ $asistencia->created_at
                                    ? $asistencia->created_at->format('d/m/Y h:i A')
                                    : 'No registrada' }}
                            </td>

                            <td>
                                <span class="badge">
                                    Confirmado
                                </span>
                            </td>
                        </tr>

                    @empty

                        <tr>
                            <td colspan="5" class="empty">
                                Todavía no hay personas que hayan confirmado asistencia a esta actividad.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </section>

    <a href="{{ route('actividades.index') }}" class="button">
        ← Volver a actividades
    </a>

</main>

<footer>
    BiblioClub · Sistema de gestión bibliotecaria
</footer>

</body>
</html>
