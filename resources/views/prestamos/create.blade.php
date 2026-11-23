<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar préstamo | BiblioClub</title>

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

        * { box-sizing: border-box; }

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
            letter-spacing: 0.5px;
        }

        .header-links { display: flex; gap: 10px; align-items: center; flex-wrap: wrap; }
        .header-links a { color: var(--ivory); text-decoration: none; font-size: 14px; transition: .2s; }
        .header-links a:hover { color: var(--gold-light); }
        .header-links span { color: var(--gold-light); }

        main {
            max-width: 700px;
            margin: 35px auto;
            padding: 0 20px;
        }

        .page-heading h2 {
            margin: 0 0 8px;
            font-family: 'Playfair Display', serif;
            font-size: 30px;
        }

        .page-heading p {
            margin: 0 0 25px;
            color: var(--taupe);
            font-size: 14px;
        }

        .card {
            background: var(--ivory-light);
            border: 1px solid var(--beige);
            border-radius: 12px;
            padding: 26px;
            box-shadow: 0 8px 24px rgba(59, 51, 41, .04);
        }

        .field { margin-bottom: 20px; }

        .field label {
            display: block;
            margin-bottom: 8px;
            font-size: 13px;
            font-weight: 700;
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

        .row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        .btn {
            display: inline-block;
            background: var(--gold-dark);
            color: var(--white);
            text-decoration: none;
            border: none;
            border-radius: 7px;
            padding: 11px 18px;
            cursor: pointer;
            font-size: 13px;
            font-weight: 600;
            font-family: inherit;
            transition: .2s;
        }

        .btn:hover { background: var(--gold); }
        .btn-secondary { background: var(--beige); color: var(--chocolate); }
        .btn-secondary:hover { background: var(--gold-light); }

        .buttons { display: flex; gap: 10px; flex-wrap: wrap; margin-top: 8px; }

        .message {
            padding: 13px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .error {
            background: #FCE8E6;
            color: #A83228;
            border: 1px solid #F3C7C3;
        }

        .error ul { margin: 8px 0 0; padding-left: 20px; }

        .empty-note {
            color: var(--taupe);
            font-size: 13px;
            margin-top: 6px;
        }

        footer {
            text-align: center;
            color: var(--taupe);
            font-size: 13px;
            padding: 20px;
        }

        @media (max-width: 600px) {
            header { padding: 18px 20px; }
            .row { grid-template-columns: 1fr; }
            .card { padding: 18px; }
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
            <a href="{{ route('prestamos.index') }}">Préstamos</a>
            <span>|</span>
            <a href="{{ route('libros.index') }}">Catálogo</a>
        </nav>
    </header>

    <main>
        <div class="page-heading">
            <h2>Registrar préstamo</h2>
            <p>Selecciona el libro, el usuario y las fechas del préstamo.</p>
        </div>

        @if ($errors->any())
            <div class="message error">
                <strong>Revisa los siguientes campos:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <section class="card">
            <form action="{{ route('prestamos.store') }}" method="POST">
                @csrf

                <div class="field">
                    <label for="libro_id">Libro</label>
                    <select name="libro_id" id="libro_id" required>
                        <option value="">Selecciona un libro</option>
                        @foreach ($libros as $libro)
                            <option value="{{ $libro->id }}" @selected(old('libro_id') == $libro->id)>
                                {{ $libro->titulo }} ({{ $libro->cantidad_disponible }} disponibles)
                            </option>
                        @endforeach
                    </select>
                    @if ($libros->isEmpty())
                        <p class="empty-note">No hay libros con ejemplares disponibles.</p>
                    @endif
                </div>

                <div class="field">
                    <label for="user_id">Usuario</label>
                    <select name="user_id" id="user_id" required>
                        <option value="">Selecciona un usuario</option>
                        @foreach ($usuarios as $usuario)
                            <option value="{{ $usuario->id }}" @selected(old('user_id') == $usuario->id)>
                                {{ $usuario->name }} · {{ $usuario->email }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="row">
                    <div class="field">
                        <label for="fecha_prestamo">Fecha del préstamo</label>
                        <input
                            type="date"
                            name="fecha_prestamo"
                            id="fecha_prestamo"
                            value="{{ old('fecha_prestamo', now()->format('Y-m-d')) }}"
                            required
                        >
                    </div>

                    <div class="field">
                        <label for="fecha_devolucion_prevista">Devolución prevista</label>
                        <input
                            type="date"
                            name="fecha_devolucion_prevista"
                            id="fecha_devolucion_prevista"
                            value="{{ old('fecha_devolucion_prevista', now()->addDays(7)->format('Y-m-d')) }}"
                            required
                        >
                    </div>
                </div>

                <div class="buttons">
                    <button type="submit" class="btn">Registrar préstamo</button>
                    <a href="{{ route('prestamos.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </section>
    </main>

    <footer>
        BiblioClub · Sistema de gestión bibliotecaria
    </footer>
</body>
</html>