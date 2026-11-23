
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Actividades del club | BiblioClub</title>

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
            color: var(--ivory);
        }

        header p {
            margin: 6px 0 0;
            color: #D5CBBB;
            font-size: 13px;
            letter-spacing: 0.5px;
        }

        .header-links {
            display: flex;
            gap: 10px;
            align-items: center;
            flex-wrap: wrap;
        }

        .header-links a {
            color: var(--ivory);
            text-decoration: none;
            font-size: 14px;
            transition: .2s;
        }

        .header-links a:hover {
            color: var(--gold-light);
        }

        .header-links span {
            color: var(--gold-light);
        }

        main {
            max-width: 1250px;
            margin: 35px auto;
            padding: 0 20px;
        }

        .page-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 25px;
        }

        .page-heading h2 {
            margin: 0 0 8px;
            font-family: 'Playfair Display', serif;
            font-size: 30px;
            color: var(--chocolate);
        }

        .page-heading p {
            margin: 0;
            color: var(--taupe);
            font-size: 14px;
        }

        .button {
            display: inline-block;
            padding: 11px 16px;
            background: var(--gold-dark);
            color: var(--white);
            text-decoration: none;
            border: none;
            border-radius: 7px;
            cursor: pointer;
            font-size: 13px;
            font-weight: 600;
            font-family: inherit;
            transition: .2s;
        }

        .button:hover {
            background: var(--gold);
        }

        .button-secondary {
            background: var(--beige);
            color: var(--chocolate);
        }

        .button-secondary:hover {
            background: var(--gold-light);
        }

        .button-danger {
            background: #A83228;
        }

        .button-danger:hover {
            background: #84231B;
        }

        /* Botón para consultar asistentes */
        .button-asistentes {
            background: #365934;
            color: white;
        }

        .button-asistentes:hover {
            background: #294629;
        }

        .panel {
            padding: 22px;
            margin-bottom: 22px;
            background: var(--ivory-light);
            border: 1px solid var(--beige);
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(59, 51, 41, .04);
        }

        .filters {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            align-items: end;
        }

        .field {
            display: flex;
            flex-direction: column;
            gap: 7px;
            flex: 1;
            min-width: 200px;
        }

        label {
            font-weight: 700;
            font-size: 13px;
            color: var(--chocolate);
        }

        input,
        select {
            width: 100%;
            padding: 11px 13px;
            border: 1px solid #DCD2C1;
            border-radius: 7px;
            font-size: 14px;
            font-family: inherit;
            background: var(--white);
            color: var(--chocolate);
            outline: none;
        }

        input:focus,
        select:focus {
            border-color: var(--gold);
            box-shadow: 0 0 0 3px rgba(184, 154, 102, .12);
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 950px;
        }

        th,
        td {
            padding: 14px 12px;
            border-bottom: 1px solid var(--beige);
            text-align: left;
            vertical-align: top;
        }

        th {
            background: #F3EDE0;
            color: var(--chocolate);
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        td {
            font-size: 14px;
        }

        tbody tr:hover {
            background: #F9F5EC;
        }

        tr:last-child td {
            border-bottom: none;
        }

        .description {
            max-width: 240px;
            white-space: normal;
            overflow-wrap: anywhere;
            color: var(--taupe);
        }

        .status {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }

        .status-programada {
            background: #EBF0F7;
            color: #36537A;
        }

        .status-realizada {
            background: #E8F2E6;
            color: #365934;
        }

        .status-cancelada {
            background: #FCE8E6;
            color: #A83228;
        }

        .actions {
            display: flex;
            flex-direction: column;
            gap: 8px;
            min-width: 160px;
        }

        .actions form {
            display: flex;
            gap: 6px;
            margin: 0;
        }

        .actions select {
            min-width: 105px;
            padding: 8px;
        }

        .actions .button {
            padding: 8px 10px;
            font-size: 12px;
            text-align: center;
        }

        .contador-asistentes {
            display: inline-block;
            padding: 5px 9px;
            margin-bottom: 2px;
            background: #F0E7D6;
            color: var(--chocolate);
            border-radius: 20px;
            font-weight: 700;
            font-size: 12px;
            text-align: center;
        }

        .success {
            padding: 13px 16px;
            margin-bottom: 20px;
            border-radius: 8px;
            font-size: 14px;
            background: #E8F2E6;
            color: #365934;
            border: 1px solid #C6DEC2;
        }

        .errors {
            padding: 13px 16px;
            margin-bottom: 20px;
            border-radius: 8px;
            font-size: 14px;
            background: #FCE8E6;
            color: #A83228;
            border: 1px solid #F3C7C3;
        }

        .errors ul {
            margin: 8px 0 0;
            padding-left: 20px;
        }

        .empty {
            padding: 35px 15px;
            text-align: center;
            color: var(--taupe);
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

            main {
                margin-top: 25px;
            }

            .panel {
                padding: 15px;
            }

            .page-heading h2 {
                font-size: 25px;
            }
        }
    </style>
</head>

<body>

<header>
    <div>
        <h1>BiblioClub</h1>
        <p>Administración de actividades del club</p>
    </div>

    <nav class="header-links">
        <a href="{{ route('admin') }}">Panel de administración</a>
        <span>|</span>
        <a href="{{ route('libros.index') }}">Catálogo</a>
        <span>|</span>
        <a href="{{ route('prestamos.index') }}">Préstamos</a>
        <span>|</span>
        <a href="{{ route('actividades.index') }}">Actividades del club</a>
    </nav>
</header>

<main>

    <div class="page-heading">
        <div>
            <h2>Actividades del club</h2>
            <p>
                Programa encuentros, talleres y eventos de BiblioClub.
            </p>
        </div>

        <a href="{{ route('actividades.create') }}" class="button">
            + Crear actividad
        </a>
    </div>

    @if (session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="errors">
            <strong>No se pudo completar la operación:</strong>

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <section class="panel">

        <form action="{{ route('actividades.index') }}" method="GET" class="filters">

            <div class="field">
                <label for="buscar">Buscar actividad</label>

                <input
                    type="text"
                    id="buscar"
                    name="buscar"
                    value="{{ $buscar ?? '' }}"
                    placeholder="Nombre o lugar"
                >
            </div>

            <div class="field">
                <label for="estado">Filtrar por estado</label>

                <select name="estado" id="estado">
                    <option value="">Todos los estados</option>

                    <option value="Programada" {{ ($estado ?? '') === 'Programada' ? 'selected' : '' }}>
                        Programada
                    </option>

                    <option value="Realizada" {{ ($estado ?? '') === 'Realizada' ? 'selected' : '' }}>
                        Realizada
                    </option>

                    <option value="Cancelada" {{ ($estado ?? '') === 'Cancelada' ? 'selected' : '' }}>
                        Cancelada
                    </option>
                </select>
            </div>

            <button type="submit" class="button">Buscar</button>

            @if (!empty($buscar) || !empty($estado))
                <a href="{{ route('actividades.index') }}" class="button button-secondary">
                    Limpiar
                </a>
            @endif

        </form>

    </section>

    <section class="panel">

        <div class="table-wrapper">

            <table>

                <thead>
                    <tr>
                        <th>Actividad</th>
                        <th>Descripción</th>
                        <th>Lugar</th>
                        <th>Fecha</th>
                        <th>Horario</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse ($actividades as $actividad)

                        <tr>

                            <td>
                                <strong>{{ $actividad->nombre }}</strong>
                            </td>

                            <td class="description">
                                {{ $actividad->descripcion ?: 'Sin descripción' }}
                            </td>

                            <td>{{ $actividad->lugar }}</td>

                            <td>
                                {{ $actividad->fecha->format('d/m/Y') }}
                            </td>

                            <td>
                                {{ \Illuminate\Support\Carbon::parse($actividad->hora_inicio)->format('h:i A') }}
                                -
                                {{ \Illuminate\Support\Carbon::parse($actividad->hora_fin)->format('h:i A') }}
                            </td>

                            <td>
                                <span class="status status-{{ strtolower($actividad->estado) }}">
                                    {{ $actividad->estado }}
                                </span>
                            </td>

                            <td>

                                <div class="actions">

                                    <!-- NUEVO: CONTADOR Y BOTÓN PARA VER ASISTENTES -->

                                    <span class="contador-asistentes">
                                        👥 {{ $actividad->asistencias_count ?? 0 }}
                                        confirmados
                                    </span>

                                    <a
                                        href="{{ route('admin.actividades.asistentes', $actividad) }}"
                                        class="button button-asistentes"
                                    >
                                        Ver asistentes
                                    </a>

                                    <!-- EDITAR ACTIVIDAD -->

                                    <a
                                        href="{{ route('actividades.edit', $actividad) }}"
                                        class="button"
                                    >
                                        Editar
                                    </a>

                                    <!-- CAMBIAR ESTADO -->

                                    <form
                                        action="{{ route('actividades.estado', $actividad) }}"
                                        method="POST"
                                    >
                                        @csrf
                                        @method('PATCH')

                                        <select name="estado" aria-label="Cambiar estado">

                                            <option value="Programada" {{ $actividad->estado === 'Programada' ? 'selected' : '' }}>
                                                Programada
                                            </option>

                                            <option value="Realizada" {{ $actividad->estado === 'Realizada' ? 'selected' : '' }}>
                                                Realizada
                                            </option>

                                            <option value="Cancelada" {{ $actividad->estado === 'Cancelada' ? 'selected' : '' }}>
                                                Cancelada
                                            </option>

                                        </select>

                                        <button type="submit" class="button">
                                            Guardar
                                        </button>

                                    </form>

                                    <!-- ELIMINAR ACTIVIDAD -->

                                    <form
                                        action="{{ route('actividades.destroy', $actividad) }}"
                                        method="POST"
                                        onsubmit="return confirm('¿Seguro que deseas eliminar esta actividad?');"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="button button-danger">
                                            Eliminar
                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="7" class="empty">
                                Todavía no hay actividades registradas.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </section>

</main>

<footer>
    BiblioClub · Sistema de gestión bibliotecaria
</footer>

</body>
</html>
