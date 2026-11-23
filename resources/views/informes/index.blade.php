<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informes | BiblioClub</title>

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
            margin: 0;
            padding: 0;
        }

        body {
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
            font-family: 'Playfair Display', serif;
            font-size: 27px;
            color: var(--ivory);
        }

        header p {
            font-size: 13px;
            margin-top: 6px;
            color: #D5CBBB;
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

        .header-links a:hover { color: var(--gold-light); }
        .header-links span { color: var(--gold-light); }

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
            font-family: 'Playfair Display', serif;
            color: var(--chocolate);
            font-size: 30px;
            margin-bottom: 8px;
        }

        .page-heading p {
            color: var(--taupe);
            font-size: 14px;
            line-height: 1.5;
        }

        .section-title {
            font-family: 'Playfair Display', serif;
            color: var(--chocolate);
            font-size: 21px;
            margin-bottom: 17px;
        }

        .button {
            display: inline-block;
            background: var(--gold-dark);
            color: var(--white);
            padding: 11px 16px;
            border-radius: 7px;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            font-family: inherit;
            border: none;
            cursor: pointer;
            transition: .2s;
        }

        .button:hover { background: var(--gold); }

        .button-light {
            background: var(--beige);
            color: var(--chocolate);
            border: none;
        }

        .button-light:hover { background: var(--gold-light); }

        .panel {
            background: var(--ivory-light);
            border: 1px solid var(--beige);
            border-radius: 12px;
            padding: 24px;
            margin-bottom: 25px;
            box-shadow: 0 8px 24px rgba(59, 51, 41, .04);
        }

        .panel h3 {
            font-family: 'Playfair Display', serif;
            color: var(--chocolate);
            font-size: 19px;
            margin-bottom: 18px;
        }

        .filters {
            display: flex;
            align-items: end;
            gap: 15px;
            flex-wrap: wrap;
        }

        .field {
            display: flex;
            flex-direction: column;
            gap: 7px;
            flex: 1;
            min-width: 180px;
        }

        .field label {
            font-size: 13px;
            font-weight: 700;
            color: var(--chocolate);
        }

        .field input {
            padding: 11px 13px;
            border: 1px solid #DCD2C1;
            border-radius: 7px;
            font-size: 14px;
            font-family: inherit;
            width: 100%;
            background: var(--white);
            color: var(--chocolate);
            outline: none;
        }

        .field input:focus {
            border-color: var(--gold);
            box-shadow: 0 0 0 3px rgba(184, 154, 102, .12);
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(210px, 1fr));
            gap: 18px;
            margin-bottom: 25px;
        }

        .stat-card {
            background: var(--ivory-light);
            border: 1px solid var(--beige);
            border-top: 3px solid var(--gold);
            border-radius: 12px;
            padding: 23px;
            box-shadow: 0 8px 24px rgba(59, 51, 41, .04);
        }

        .stat-card .label {
            color: var(--taupe);
            font-size: 13px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 12px;
        }

        .stat-card .number {
            font-family: 'Playfair Display', serif;
            color: var(--gold-dark);
            font-size: 34px;
            font-weight: 700;
            margin-bottom: 7px;
        }

        .stat-card .detail {
            color: var(--taupe);
            font-size: 13px;
        }

        .reports-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 25px;
        }

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        th, td {
            padding: 13px 12px;
            text-align: left;
            border-bottom: 1px solid var(--beige);
        }

        th {
            background: #F3EDE0;
            color: var(--chocolate);
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        tbody tr:hover { background: #F9F5EC; }
        tr:last-child td { border-bottom: none; }

        .empty {
            color: var(--taupe);
            text-align: center;
            padding: 22px;
        }

        .summary-list {
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .summary-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            padding: 13px 15px;
            border: 1px solid var(--beige);
            border-radius: 8px;
            background: var(--white);
        }

        .summary-item span { color: var(--taupe); }

        .summary-item strong {
            color: var(--gold-dark);
            font-size: 18px;
        }

        .note {
            font-size: 13px;
            color: var(--taupe);
            margin-top: 15px;
            line-height: 1.5;
        }

        footer {
            text-align: center;
            padding: 25px;
            color: var(--taupe);
            font-size: 13px;
        }

        @media (max-width: 750px) {
            .reports-grid { grid-template-columns: 1fr; }
            header { padding: 20px; }
            main { margin-top: 25px; padding: 0 15px; }
            .page-heading h2 { font-size: 25px; }
            .panel { padding: 18px; }
        }

        @media print {
            body { background: white; }

            header {
                background: white;
                color: var(--chocolate);
                border-bottom: 2px solid var(--gold-dark);
            }

            header h1 { color: var(--chocolate); }

            header p,
            .header-links,
            .filters,
            .page-heading .button,
            footer {
                display: none !important;
            }

            main {
                max-width: none;
                margin: 15px 0;
                padding: 0;
            }

            .panel,
            .stat-card {
                break-inside: avoid;
                box-shadow: none;
            }

            .reports-grid { grid-template-columns: 1fr 1fr; }
        }
    </style>
</head>
<body>

<header>
    <div>
        <h1>BiblioClub</h1>
        <p>Informes y estadísticas de la biblioteca</p>
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
    <section class="page-heading">
        <div>
            <h2>Informes de la biblioteca</h2>
            <p>Consulta el inventario, los préstamos, los usuarios y las actividades.</p>
        </div>

        <button type="button" class="button" onclick="window.print()">
            Imprimir informes
        </button>
    </section>

    <section class="panel">
        <h3>Filtrar información por fecha</h3>

        <form action="{{ route('informes.index') }}" method="GET" class="filters">
            <div class="field">
                <label for="fecha_inicio">Fecha inicial</label>
                <input
                    type="date"
                    id="fecha_inicio"
                    name="fecha_inicio"
                    value="{{ $fechaInicio }}"
                >
            </div>

            <div class="field">
                <label for="fecha_fin">Fecha final</label>
                <input
                    type="date"
                    id="fecha_fin"
                    name="fecha_fin"
                    value="{{ $fechaFin }}"
                >
            </div>

            <button type="submit" class="button">Aplicar filtros</button>

            <a href="{{ route('informes.index') }}" class="button button-light">
                Limpiar filtros
            </a>
        </form>
    </section>

    <h3 class="section-title">Inventario de libros</h3>

    <section class="stats-grid">
        <article class="stat-card">
            <div class="label">Títulos registrados</div>
            <div class="number">{{ number_format($totalTitulos) }}</div>
            <div class="detail">Libros diferentes en el catálogo</div>
        </article>

        <article class="stat-card">
            <div class="label">Ejemplares totales</div>
            <div class="number">{{ number_format($totalEjemplares) }}</div>
            <div class="detail">Ejemplares registrados</div>
        </article>

        <article class="stat-card">
            <div class="label">Disponibles</div>
            <div class="number">{{ number_format($ejemplaresDisponibles) }}</div>
            <div class="detail">Ejemplares que pueden prestarse</div>
        </article>

        <article class="stat-card">
            <div class="label">No disponibles</div>
            <div class="number">{{ number_format($ejemplaresPrestados) }}</div>
            <div class="detail">Diferencia entre total y disponibles</div>
        </article>
    </section>

    <h3 class="section-title">Resumen de préstamos</h3>

    <section class="stats-grid">
        <article class="stat-card">
            <div class="label">Préstamos registrados</div>
            <div class="number">{{ number_format($totalPrestamos) }}</div>
            <div class="detail">Según el periodo seleccionado</div>
        </article>

        <article class="stat-card">
            <div class="label">Préstamos activos</div>
            <div class="number">{{ number_format($prestamosActivos) }}</div>
            <div class="detail">Aún no devueltos</div>
        </article>

        <article class="stat-card">
            <div class="label">Devoluciones realizadas</div>
            <div class="number">{{ number_format($prestamosDevueltos) }}</div>
            <div class="detail">Préstamos marcados como devueltos</div>
        </article>

        <article class="stat-card">
            <div class="label">Préstamos vencidos</div>
            <div class="number">{{ number_format($prestamosVencidos) }}</div>
            <div class="detail">Superaron la fecha prevista de devolución</div>
        </article>
    </section>

    <section class="reports-grid">
        <article class="panel">
            <h3>Libros más prestados</h3>

            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>Libro</th>
                            <th>Autor</th>
                            <th>Préstamos</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($librosMasPrestados as $registro)
                            <tr>
                                <td>{{ $registro->libro?->titulo ?? 'Libro no disponible' }}</td>
                                <td>{{ $registro->libro?->autor ?? 'No registrado' }}</td>
                                <td>{{ $registro->total_prestamos }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="empty">
                                    No hay préstamos para mostrar en este periodo.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </article>

        <article class="panel">
            <h3>Usuarios por rol</h3>

            <div class="summary-list">
                @forelse ($usuariosPorRol as $rol)
                    <div class="summary-item">
                        <span>{{ $rol->name }}</span>
                        <strong>{{ $rol->users_count }}</strong>
                    </div>
                @empty
                    <p class="empty">No hay roles registrados.</p>
                @endforelse
            </div>

            <div class="summary-item" style="margin-top: 14px;">
                <span>Total de usuarios</span>
                <strong>{{ number_format($totalUsuarios) }}</strong>
            </div>
        </article>

        <article class="panel">
            <h3>Estado de las actividades del club</h3>

            <div class="summary-list">
                <div class="summary-item">
                    <span>Programadas</span>
                    <strong>{{ number_format($actividadesProgramadas) }}</strong>
                </div>

                <div class="summary-item">
                    <span>Realizadas</span>
                    <strong>{{ number_format($actividadesRealizadas) }}</strong>
                </div>

                <div class="summary-item">
                    <span>Canceladas</span>
                    <strong>{{ number_format($actividadesCanceladas) }}</strong>
                </div>
            </div>

            <p class="note">
                Los conteos de actividades corresponden al periodo seleccionado.
            </p>
        </article>

        <article class="panel">
            <h3>Información del informe</h3>

            <div class="summary-list">
                <div class="summary-item">
                    <span>Fecha inicial</span>
                    <strong style="font-size: 14px;">
                        {{ $fechaInicio ? \Illuminate\Support\Carbon::parse($fechaInicio)->format('d/m/Y') : 'Sin límite' }}
                    </strong>
                </div>

                <div class="summary-item">
                    <span>Fecha final</span>
                    <strong style="font-size: 14px;">
                        {{ $fechaFin ? \Illuminate\Support\Carbon::parse($fechaFin)->format('d/m/Y') : 'Sin límite' }}
                    </strong>
                </div>
            </div>

            <p class="note">
                El inventario y los usuarios reflejan el estado actual. El periodo
                seleccionado filtra los préstamos por fecha de préstamo y las
                actividades por fecha programada.
            </p>
        </article>
    </section>
</main>

<footer>
    BiblioClub · Sistema de gestión bibliotecaria
</footer>

</body>
</html>
