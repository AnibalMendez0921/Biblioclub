<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar actividad | BiblioClub</title>

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

        .header-links a:hover { color: var(--gold-light); }
        .header-links span { color: var(--gold-light); }

        main {
            max-width: 850px;
            margin: 35px auto;
            padding: 0 20px;
        }

        .back {
            display: inline-block;
            margin-bottom: 20px;
            color: var(--gold-dark);
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            transition: .2s;
        }

        .back:hover { color: var(--gold); }

        .page-heading { margin-bottom: 25px; }

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
            line-height: 1.5;
        }

        .panel {
            padding: 28px;
            background: var(--ivory-light);
            border: 1px solid var(--beige);
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(59, 51, 41, .04);
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .field {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .full { grid-column: 1 / -1; }

        label {
            font-size: 13px;
            font-weight: 700;
            color: var(--chocolate);
        }

        input,
        select,
        textarea {
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

        textarea {
            min-height: 110px;
            resize: vertical;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: var(--gold);
            box-shadow: 0 0 0 3px rgba(184, 154, 102, .12);
        }

        .hint {
            color: var(--taupe);
            font-size: 12px;
        }

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

        .error ul {
            margin: 8px 0 0;
            padding-left: 20px;
        }

        .actions {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 25px;
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

        .button:hover { background: var(--gold); }

        .button-secondary {
            background: var(--beige);
            color: var(--chocolate);
        }

        .button-secondary:hover { background: var(--gold-light); }

        footer {
            text-align: center;
            color: var(--taupe);
            font-size: 13px;
            padding: 20px;
        }

        @media (max-width: 600px) {
            header { padding: 18px 20px; }
            main { margin-top: 25px; }
            .panel { padding: 18px; }
            .page-heading h2 { font-size: 25px; }
            .form-grid { grid-template-columns: 1fr; }
            .full { grid-column: auto; }
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
        </nav>
    </header>

    <main>
        <a href="{{ route('actividades.index') }}" class="back">
            ← Volver a las actividades
        </a>

        <div class="page-heading">
            <h2>Editar actividad</h2>
            <p>
                Modifica los datos de la actividad y guarda los cambios.
            </p>
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

        <section class="panel">
            <form action="{{ route('actividades.update', $actividad) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-grid">
                    <div class="field full">
                        <label for="nombre">Nombre de la actividad *</label>

                        <input
                            type="text"
                            id="nombre"
                            name="nombre"
                            value="{{ old('nombre', $actividad->nombre) }}"
                            placeholder="Ej. Club de lectura juvenil"
                            maxlength="255"
                            required
                        >
                    </div>

                    <div class="field full">
                        <label for="descripcion">Descripción</label>

                        <textarea
                            id="descripcion"
                            name="descripcion"
                            placeholder="Explica en qué consiste la actividad y quiénes pueden participar."
                        >{{ old('descripcion', $actividad->descripcion) }}</textarea>
                    </div>

                    <div class="field full">
                        <label for="lugar">Lugar *</label>

                        <input
                            type="text"
                            id="lugar"
                            name="lugar"
                            value="{{ old('lugar', $actividad->lugar) }}"
                            placeholder="Ej. Sala de lectura de BiblioClub"
                            maxlength="255"
                            required
                        >
                    </div>

                    <div class="field">
                        <label for="fecha">Fecha *</label>

                        <input
                            type="date"
                            id="fecha"
                            name="fecha"
                            value="{{ old('fecha', $actividad->fecha->format('Y-m-d')) }}"
                            required
                        >
                    </div>

                    <div class="field">
                        <label for="hora_inicio">Hora de inicio *</label>

                        <input
                            type="time"
                            id="hora_inicio"
                            name="hora_inicio"
                            value="{{ old('hora_inicio', \Illuminate\Support\Carbon::parse($actividad->hora_inicio)->format('H:i')) }}"
                            required
                        >
                    </div>

                    <div class="field">
                        <label for="hora_fin">Hora de finalización *</label>

                        <input
                            type="time"
                            id="hora_fin"
                            name="hora_fin"
                            value="{{ old('hora_fin', \Illuminate\Support\Carbon::parse($actividad->hora_fin)->format('H:i')) }}"
                            required
                        >

                        <span class="hint">
                            Debe ser posterior a la hora de inicio.
                        </span>
                    </div>

                    <div class="field">
                        <label for="estado">Estado *</label>

                        <select name="estado" id="estado" required>
                            @foreach (['Programada', 'Realizada', 'Cancelada'] as $opcion)
                                <option value="{{ $opcion }}" @selected(old('estado', $actividad->estado) === $opcion)>
                                    {{ $opcion }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="actions">
                    <button type="submit" class="button">
                        Guardar cambios
                    </button>

                    <a
                        href="{{ route('actividades.index') }}"
                        class="button button-secondary"
                    >
                        Cancelar
                    </a>
                </div>
            </form>
        </section>
    </main>

    <footer>
        BiblioClub · Sistema de gestión bibliotecaria
    </footer>
</body>
</html>