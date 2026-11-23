<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Préstamos | BiblioClub</title>

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
            gap: 15px;
            flex-wrap: wrap;
            margin-bottom: 25px;
        }

        .page-heading h2 {
            margin: 0 0 8px;
            font-family: 'Playfair Display', serif;
            color: var(--chocolate);
            font-size: 30px;
        }

        .page-heading p {
            margin: 0;
            color: var(--taupe);
            font-size: 14px;
        }

        .btn {
            display: inline-block;
            background: var(--gold-dark);
            color: var(--white);
            text-decoration: none;
            border: none;
            border-radius: 7px;
            padding: 11px 16px;
            cursor: pointer;
            font-size: 13px;
            font-weight: 600;
            font-family: inherit;
            transition: .2s;
        }

        .btn:hover {
            background: var(--gold);
        }

        .btn-secondary {
            background: var(--beige);
            color: var(--chocolate);
        }

        .btn-secondary:hover {
            background: var(--gold-light);
        }

        .btn-return {
            padding: 8px 12px;
            font-size: 12px;
            background: var(--gold-dark);
        }

        .btn-approve {
            padding: 8px 12px;
            font-size: 12px;
            background: #4C6E45;
        }

        .btn-approve:hover {
            background: #3B5935;
        }

        .btn-reject {
            padding: 8px 12px;
            font-size: 12px;
            background: #A83228;
        }

        .btn-reject:hover {
            background: #84231B;
        }

        .actions {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            gap: 7px;
        }

        .actions form {
            margin: 0;
        }

        .card {
            background: var(--ivory-light);
            border: 1px solid var(--beige);
            border-radius: 12px;
            padding: 22px;
            margin-bottom: 22px;
            box-shadow: 0 8px 24px rgba(59, 51, 41, .04);
        }

        .filters {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            align-items: end;
        }

        .field {
            flex: 1;
            min-width: 200px;
        }

        .field label {
            display: block;
            margin-bottom: 8px;
            font-size: 13px;
            font-weight: 700;
            color: var(--chocolate);
        }

        .field input,
        .field select {
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

        .field input:focus,
        .field select:focus {
            border-color: var(--gold);
            box-shadow: 0 0 0 3px rgba(184, 154, 102, .12);
        }

        .message {
            padding: 13px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .success {
            background: #E8F2E6;
            color: #365934;
            border: 1px solid #C6DEC2;
        }

        .error {
            background: #FCE8E6;
            color: #A83228;
            border: 1px solid #F3C7C3;
        }

        .error ul {
            margin: 8px 0 0;
            padding-left: 20px;
        }

        .table-container {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 1000px;
        }

        th {
            background: #F3EDE0;
            color: var(--chocolate);
            text-align: left;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 14px 12px;
        }

        td {
            padding: 14px 12px;
            border-bottom: 1px solid var(--beige);
            font-size: 14px;
        }

        tbody tr:hover {
            background: #F9F5EC;
        }

        tr:last-child td {
            border-bottom: none;
        }

        .status {
            display: inline-block;
            border-radius: 20px;
            padding: 6px 10px;
            font-size: 12px;
            font-weight: bold;
        }

        .status-loaned {
            background: #F7ECDA;
            color: #8A5E18;
        }

        .status-returned {
            background: #E8F2E6;
            color: #365934;
        }

        .status-requested {
            background: #EBF0F7;
            color: #36537A;
        }

        .status-rejected {
            background: #FCE8E6;
            color: #A83228;
        }

        .empty {
            text-align: center;
            color: var(--taupe);
            padding: 35px 15px;
        }

        .count {
            color: var(--taupe);
            font-size: 14px;
            margin-bottom: 15px;
        }

        footer {
            text-align: center;
            color: var(--taupe);
            font-size: 13px;
            padding: 20px;
        }

        @media (max-width: 600px) {
            header {
                padding: 18px 20px;
            }

            main {
                margin-top: 25px;
            }

            .page-heading h2 {
                font-size: 25px;
            }

            .card {
                padding: 15px;
            }
        }
    </style>
</head>

<body>
    <header>
        <div>
            <h1>BiblioClub</h1>
            <p>Administración de préstamos y devoluciones</p>
        </div>

        <nav class="header-links">
            <a href="{{ route('admin') }}">Panel de administración</a>
            <span>|</span>
            <a href="{{ route('libros.index') }}">Catálogo</a>
        </nav>
    </header>

    <main>
        <div class="page-heading">
            <div>
                <h2>Préstamos y devoluciones</h2>
                <p>Consulta las solicitudes, administra los préstamos y controla las devoluciones.</p>
            </div>

            <a href="{{ route('prestamos.create') }}" class="btn">
                + Registrar préstamo
            </a>
        </div>

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

        @if ($errors->any())
            <div class="message error">
                <strong>No se pudo completar la operación:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <section class="card">
            <form action="{{ route('prestamos.index') }}" method="GET" class="filters">
                <div class="field">
                    <label for="buscar">Buscar préstamo</label>
                    <input
                        type="text"
                        name="buscar"
                        id="buscar"
                        value="{{ $buscar ?? '' }}"
                        placeholder="Título del libro, nombre o correo"
                    >
                </div>

                <div class="field">
                    <label for="estado">Estado del préstamo</label>
                    <select name="estado" id="estado">
                        <option value="">Todos los estados</option>
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

                <button type="submit" class="btn">Buscar</button>

                @if (!empty($buscar) || !empty($estado))
                    <a href="{{ route('prestamos.index') }}" class="btn btn-secondary">
                        Limpiar
                    </a>
                @endif
            </form>
        </section>

        <section class="card">
            <p class="count">
                Registros encontrados: <strong>{{ $prestamos->count() }}</strong>
            </p>

            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Libro</th>
                            <th>Usuario</th>
                            <th>Fecha del préstamo</th>
                            <th>Devolución prevista</th>
                            <th>Devolución real</th>
                            <th>Estado</th>
                            <th>Acción</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($prestamos as $prestamo)
                            <tr>
                                <td>{{ $prestamo->libro->titulo ?? 'Libro no disponible' }}</td>

                                <td>
                                    {{ $prestamo->usuario->name ?? 'Usuario no disponible' }}
                                    @if ($prestamo->usuario)
                                        <br>
                                        <small>{{ $prestamo->usuario->email }}</small>
                                    @endif
                                </td>

                                <td>
                                    {{ $prestamo->fecha_prestamo
                                        ? $prestamo->fecha_prestamo->format('d/m/Y')
                                        : 'Pendiente' }}
                                </td>

                                <td>
                                    {{ $prestamo->fecha_devolucion_prevista
                                        ? $prestamo->fecha_devolucion_prevista->format('d/m/Y')
                                        : 'Pendiente' }}
                                </td>

                                <td>
                                    {{ $prestamo->fecha_devolucion_real
                                        ? $prestamo->fecha_devolucion_real->format('d/m/Y')
                                        : 'Pendiente' }}
                                </td>

                                <td>
                                    @if ($prestamo->estado === 'Solicitado')
                                        <span class="status status-requested">Solicitud pendiente</span>
                                    @elseif ($prestamo->estado === 'Prestado')
                                        <span class="status status-loaned">Prestado</span>
                                    @elseif ($prestamo->estado === 'Devuelto')
                                        <span class="status status-returned">Devuelto</span>
                                    @elseif ($prestamo->estado === 'Rechazado')
                                        <span class="status status-rejected">Rechazado</span>
                                    @else
                                        <span class="status">{{ $prestamo->estado }}</span>
                                    @endif
                                </td>

                                <td>
                                    <div class="actions">
                                        @if ($prestamo->estado === 'Solicitado')
                                            <form
                                                action="{{ route('prestamos.aprobar', $prestamo) }}"
                                                method="POST"
                                                onsubmit="return confirm('¿Deseas aprobar esta solicitud de préstamo?');"
                                            >
                                                @csrf
                                                @method('PATCH')

                                                <button type="submit" class="btn btn-approve">
                                                    Aprobar
                                                </button>
                                            </form>

                                            <form
                                                action="{{ route('prestamos.rechazar', $prestamo) }}"
                                                method="POST"
                                                onsubmit="return confirm('¿Deseas rechazar esta solicitud?');"
                                            >
                                                @csrf
                                                @method('PATCH')

                                                <button type="submit" class="btn btn-reject">
                                                    Rechazar
                                                </button>
                                            </form>
                                        @elseif ($prestamo->estado === 'Prestado')
                                            <form
                                                action="{{ route('prestamos.devolver', $prestamo) }}"
                                                method="POST"
                                                onsubmit="return confirm('¿Confirmas que deseas registrar la devolución de este libro?');"
                                            >
                                                @csrf
                                                @method('PATCH')

                                                <button type="submit" class="btn btn-return">
                                                    Registrar devolución
                                                </button>
                                            </form>
                                        @elseif ($prestamo->estado === 'Devuelto')
                                            <span>Completado</span>
                                        @elseif ($prestamo->estado === 'Rechazado')
                                            <span>Solicitud rechazada</span>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="empty">
                                    No hay préstamos registrados que coincidan con la búsqueda.
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