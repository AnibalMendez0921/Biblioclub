
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis préstamos | BiblioClub</title>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --ivory: #F7F2E8;
            --ivory-light: #FCFAF5;
            --gold: #B89A66;
            --gold-light: #D8C49E;
            --gold-dark: #927548;
            --chocolate: #3B3329;
            --chocolate-light: #554A3D;
            --beige: #E8DFCE;
            --taupe: #887E70;
            --white: #FFFFFF;
            --shadow: 0 12px 35px rgba(59, 51, 41, 0.08);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--ivory);
            color: var(--chocolate);
            min-height: 100vh;
        }

        header {
            background: var(--ivory-light);
            padding: 20px 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
            border-bottom: 1px solid var(--beige);
            box-shadow: 0 4px 18px rgba(59, 51, 41, 0.04);
        }

        header h1 {
            font-family: 'Playfair Display', serif;
            font-size: 28px;
            color: var(--chocolate);
            letter-spacing: -1px;
        }

        header h1 span {
            color: var(--gold);
        }

        header p {
            margin: 5px 0 0;
            color: var(--taupe);
            font-size: 13px;
        }

        .header-links {
            display: flex;
            gap: 25px;
            flex-wrap: wrap;
            align-items: center;
        }

        .header-links a {
            color: var(--chocolate-light);
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            transition: 0.2s;
        }

        .header-links a:hover {
            color: var(--gold-dark);
        }

        main {
            max-width: 1150px;
            margin: 45px auto;
            padding: 0 20px;
        }

        .heading {
            margin-bottom: 28px;
        }

        .section-tag {
            display: inline-block;
            color: var(--gold-dark);
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 2px;
            margin-bottom: 12px;
        }

        .heading h2 {
            font-family: 'Playfair Display', serif;
            color: var(--chocolate);
            font-size: 34px;
            font-weight: 600;
            margin: 0 0 10px;
        }

        .heading p {
            color: var(--taupe);
            margin: 0;
            line-height: 1.7;
            font-size: 14px;
        }

        .card {
            background: var(--ivory-light);
            border: 1px solid var(--beige);
            border-radius: 12px;
            padding: 23px;
            margin-bottom: 22px;
            box-shadow: var(--shadow);
        }

        .filters {
            display: flex;
            align-items: end;
            gap: 12px;
            flex-wrap: wrap;
        }

        .field {
            flex: 1;
            min-width: 200px;
        }

        .field label {
            display: block;
            margin-bottom: 9px;
            font-size: 13px;
            font-weight: 700;
            color: var(--chocolate);
        }

        .field select {
            width: 100%;
            padding: 12px;
            border: 1px solid var(--beige);
            border-radius: 8px;
            background: var(--white);
            color: var(--chocolate);
            font-family: 'DM Sans', sans-serif;
            font-size: 14px;
            outline: none;
            cursor: pointer;
        }

        .field select:focus {
            border-color: var(--gold);
            box-shadow: 0 0 0 3px rgba(184, 154, 102, 0.12);
        }

        .btn {
            display: inline-block;
            background: var(--gold);
            color: var(--white);
            text-decoration: none;
            border: none;
            border-radius: 7px;
            padding: 12px 18px;
            cursor: pointer;
            font-family: 'DM Sans', sans-serif;
            font-size: 13px;
            font-weight: 600;
            transition: 0.25s;
        }

        .btn:hover {
            background: var(--gold-dark);
            transform: translateY(-2px);
        }

        .btn-secondary {
            background: var(--ivory-light);
            color: var(--chocolate);
            border: 1px solid var(--gold-light);
        }

        .btn-secondary:hover {
            background: var(--beige);
            color: var(--chocolate);
        }

        .count {
            color: var(--taupe);
            font-size: 14px;
            margin: 0 0 18px;
        }

        .count strong {
            color: var(--chocolate);
        }

        .table-container {
            overflow-x: auto;
            border-radius: 9px;
        }

        table {
            width: 100%;
            min-width: 760px;
            border-collapse: collapse;
        }

        th {
            background: #EFE7D8;
            color: var(--chocolate);
            text-align: left;
            font-size: 12px;
            font-weight: 700;
            padding: 16px 13px;
            letter-spacing: 0.3px;
        }

        td {
            padding: 16px 13px;
            border-bottom: 1px solid var(--beige);
            font-size: 13px;
            color: var(--chocolate-light);
        }

        tbody tr {
            transition: background 0.2s;
        }

        tbody tr:hover {
            background: #F7F1E6;
        }

        tr:last-child td {
            border-bottom: none;
        }

        .status {
            display: inline-block;
            border-radius: 20px;
            padding: 7px 11px;
            font-size: 11px;
            font-weight: 700;
            white-space: nowrap;
        }

        .status-requested {
            background: #F1EBDD;
            color: #927548;
        }

        .status-loaned {
            background: #EFE2C9;
            color: #80602E;
        }

        .status-returned {
            background: #EDF1E4;
            color: #68764F;
        }

        .status-rejected {
            background: #F8EAE6;
            color: #A34E43;
        }

        .empty {
            text-align: center;
            color: var(--taupe);
            padding: 45px 15px;
            line-height: 1.8;
        }

        .empty strong {
            display: block;
            font-family: 'Playfair Display', serif;
            font-size: 21px;
            color: var(--chocolate);
            margin-bottom: 7px;
        }

        .empty .btn {
            margin-top: 15px;
        }

        .message {
            padding: 14px 17px;
            border-radius: 9px;
            margin-bottom: 18px;
            font-size: 14px;
            line-height: 1.6;
        }

        .success {
            background: #EDF1E4;
            color: #68764F;
            border: 1px solid #D6DFC8;
        }

        .error {
            background: #F8EAE6;
            color: #A34E43;
            border: 1px solid #EBCBC5;
        }

        footer {
            text-align: center;
            color: var(--taupe);
            font-size: 13px;
            padding: 25px 15px;
            border-top: 1px solid var(--beige);
            background: var(--ivory-light);
            margin-top: 55px;
        }

        @media (max-width: 600px) {
            header {
                padding: 18px 20px;
            }

            main {
                margin-top: 30px;
            }

            .card {
                padding: 16px;
            }

            .heading h2 {
                font-size: 28px;
            }

            .filters .btn {
                width: 100%;
                text-align: center;
            }

            .header-links {
                gap: 17px;
            }
        }
    </style>
</head>

<body>

    <header>
        <div>
            <h1>Biblio<span>Club.</span></h1>
            <p>Tu espacio de lectura</p>
        </div>

        <nav class="header-links">
            <a href="{{ route('dashboard') }}">Inicio</a>
            <a href="{{ route('catalogo.index') }}">Catálogo</a>
        </nav>
    </header>

    <main>

        <section class="heading">
            <span class="section-tag">✦ TU ACTIVIDAD LITERARIA</span>

            <h2>Mis préstamos</h2>

            <p>
                Consulta el estado de tus solicitudes, los libros que
                tienes prestados y tus devoluciones.
            </p>
        </section>

        @if (session('success'))
            <div class="message success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="message error">
                {{ session('error') }}
            </div>
        @endif

        <section class="card">

            <form action="{{ route('mis-prestamos.index') }}" method="GET" class="filters">

                <div class="field">
                    <label for="estado">Filtrar por estado</label>

                    <select name="estado" id="estado">
                        <option value="">Todos mis préstamos</option>

                        <option value="Solicitado" @selected(($estado ?? '') === 'Solicitado')>
                            Solicitud pendiente
                        </option>

                        <option value="Prestado" @selected(($estado ?? '') === 'Prestado')>
                            Prestado
                        </option>

                        <option value="Devuelto" @selected(($estado ?? '') === 'Devuelto')>
                            Devuelto
                        </option>

                        <option value="Rechazado" @selected(($estado ?? '') === 'Rechazado')>
                            Rechazado
                        </option>
                    </select>
                </div>

                <button type="submit" class="btn">
                    Filtrar
                </button>

                @if (!empty($estado))
                    <a href="{{ route('mis-prestamos.index') }}" class="btn btn-secondary">
                        Limpiar
                    </a>
                @endif

            </form>

        </section>

        <section class="card">

            <p class="count">
                Registros encontrados:
                <strong>{{ $prestamos->count() }}</strong>
            </p>

            <div class="table-container">

                <table>
                    <thead>
                        <tr>
                            <th>Libro</th>
                            <th>Fecha de solicitud o préstamo</th>
                            <th>Devolución prevista</th>
                            <th>Devolución real</th>
                            <th>Estado</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse ($prestamos as $prestamo)

                            <tr>
                                <td>
                                    <strong>
                                        {{ $prestamo->libro->titulo ?? 'Libro no disponible' }}
                                    </strong>
                                </td>

                                <td>
                                    {{ $prestamo->fecha_prestamo ? $prestamo->fecha_prestamo->format('d/m/Y') : 'Pendiente' }}
                                </td>

                                <td>
                                    {{ $prestamo->fecha_devolucion_prevista ? $prestamo->fecha_devolucion_prevista->format('d/m/Y') : 'Pendiente' }}
                                </td>

                                <td>
                                    {{ $prestamo->fecha_devolucion_real ? $prestamo->fecha_devolucion_real->format('d/m/Y') : 'Pendiente' }}
                                </td>

                                <td>

                                    @if ($prestamo->estado === 'Solicitado')

                                        <span class="status status-requested">
                                            Solicitud pendiente
                                        </span>

                                    @elseif ($prestamo->estado === 'Prestado')

                                        <span class="status status-loaned">
                                            Prestado
                                        </span>

                                    @elseif ($prestamo->estado === 'Devuelto')

                                        <span class="status status-returned">
                                            Devuelto
                                        </span>

                                    @elseif ($prestamo->estado === 'Rechazado')

                                        <span class="status status-rejected">
                                            Rechazado
                                        </span>

                                    @else

                                        <span class="status">
                                            {{ $prestamo->estado }}
                                        </span>

                                    @endif

                                </td>
                            </tr>

                        @empty

                            <tr>
                                <td colspan="5" class="empty">

                                    <strong>Todavía no tienes préstamos registrados.</strong>

                                    Visita el catálogo para encontrar un libro
                                    y solicitarlo.

                                    <br>

                                    <a href="{{ route('catalogo.index') }}" class="btn">
                                        Explorar catálogo
                                    </a>

                                </td>
                            </tr>

                        @endforelse

                    </tbody>
                </table>

            </div>

        </section>

    </main>

    <footer>
        BiblioClub · Un espacio para descubrir, aprender y compartir.
    </footer>

</body>
</html>
