<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de libros | BiblioClub</title>

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
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'DM Sans', Arial, Helvetica, sans-serif;
            background: var(--ivory);
            color: var(--chocolate);
            min-height: 100vh;
        }

        header {
            background: var(--chocolate);
            color: var(--ivory);
            padding: 22px 6%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .logo {
            font-family: 'Playfair Display', serif;
            font-size: 27px;
            font-weight: 700;
            color: var(--ivory);
        }

        .logo span {
            color: var(--gold-light);
        }

        .subtitle {
            margin-top: 5px;
            color: #D5CBBB;
            font-size: 13px;
            letter-spacing: 0.5px;
        }

        .header-actions {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .button {
            display: inline-block;
            padding: 11px 16px;
            border-radius: 7px;
            border: none;
            background: var(--gold-dark);
            color: var(--white);
            text-decoration: none;
            font-size: 13px;
            cursor: pointer;
            font-weight: 600;
            font-family: inherit;
            transition: .2s;
        }

        .button:hover {
            background: var(--gold);
        }

        .button-light {
            background: transparent;
            border: 1px solid var(--gold-light);
            color: var(--ivory);
        }

        .button-light:hover {
            background: var(--chocolate-light);
        }

        .container {
            max-width: 1250px;
            margin: 35px auto;
            padding: 0 24px;
        }

        .page-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            flex-wrap: wrap;
            margin-bottom: 25px;
        }

        .page-heading h1 {
            font-family: 'Playfair Display', serif;
            color: var(--chocolate);
            font-size: 31px;
            margin-bottom: 8px;
        }

        .page-heading p {
            color: var(--taupe);
            font-size: 14px;
            line-height: 1.5;
        }

        .search-form {
            display: flex;
            gap: 10px;
            margin-bottom: 25px;
            flex-wrap: wrap;
        }

        .search-input {
            flex: 1;
            min-width: 200px;
            padding: 12px 15px;
            border: 1px solid #DCD2C1;
            border-radius: 7px;
            background: var(--white);
            color: var(--chocolate);
            font-family: inherit;
            font-size: 14px;
            outline: none;
        }

        .search-input:focus {
            border-color: var(--gold);
            box-shadow: 0 0 0 3px rgba(184, 154, 102, .12);
        }

        .clear-button {
            display: inline-block;
            padding: 12px 18px;
            background: var(--beige);
            color: var(--chocolate);
            border-radius: 7px;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            transition: .2s;
        }

        .clear-button:hover {
            background: var(--gold-light);
        }

        .summary {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 18px;
            margin-bottom: 25px;
        }

        .summary-card {
            background: var(--ivory-light);
            padding: 22px;
            border-radius: 11px;
            border: 1px solid var(--beige);
            box-shadow: 0 8px 24px rgba(59, 51, 41, .04);
        }

        .summary-label {
            color: var(--taupe);
            font-size: 13px;
            margin-bottom: 10px;
        }

        .summary-value {
            color: var(--chocolate);
            font-size: 29px;
            font-weight: bold;
        }

        .summary-description {
            color: var(--taupe);
            font-size: 12px;
            margin-top: 8px;
        }

        .table-card {
            background: var(--ivory-light);
            border: 1px solid var(--beige);
            border-radius: 11px;
            overflow: hidden;
            box-shadow: 0 8px 24px rgba(59, 51, 41, .04);
        }

        .table-heading {
            padding: 22px;
            background: #F3EDE0;
            border-bottom: 1px solid var(--beige);
        }

        .table-heading h2 {
            font-family: 'Playfair Display', serif;
            font-size: 20px;
            color: var(--chocolate);
            margin-bottom: 6px;
        }

        .table-heading p {
            font-size: 13px;
            color: var(--taupe);
        }

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 980px;
        }

        thead {
            background: #F3EDE0;
        }

        th {
            text-align: left;
            color: var(--chocolate);
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 16px 20px;
        }

        td {
            padding: 17px 20px;
            border-top: 1px solid var(--beige);
            font-size: 14px;
            vertical-align: middle;
        }

        tbody tr:hover {
            background: #F9F5EC;
        }

        .book-cover {
            width: 46px;
            height: 64px;
            object-fit: cover;
            border-radius: 4px;
            box-shadow: 0 2px 6px rgba(59, 51, 41, 0.14);
            display: block;
        }

        .no-cover {
            color: var(--taupe);
            font-size: 12px;
        }

        .book-title {
            font-weight: bold;
            color: var(--chocolate);
            margin-bottom: 5px;
        }

        .book-id {
            color: var(--taupe);
            font-size: 12px;
        }

        .book-synopsis {
            max-width: 280px;
            color: var(--chocolate-light);
            font-size: 13px;
            line-height: 1.45;
        }

        .badge {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
            white-space: nowrap;
        }

        .available {
            background: #E8F2E6;
            color: #365934;
        }

        .unavailable {
            background: #FCE8E6;
            color: #A83228;
        }

        .actions {
            display: flex;
            gap: 8px;
            align-items: center;
        }

        .button-edit {
            background: var(--gold-dark);
            padding: 9px 12px;
        }

        .button-delete {
            background: #A83228;
            padding: 9px 12px;
        }

        .button-delete:hover {
            background: #84231B;
        }

        .delete-form {
            display: inline;
        }

        .empty-state {
            text-align: center;
            padding: 55px 20px;
        }

        .empty-icon {
            font-size: 42px;
            margin-bottom: 15px;
        }

        .empty-state h3 {
            font-family: 'Playfair Display', serif;
            color: var(--chocolate);
            margin-bottom: 10px;
        }

        .empty-state p {
            color: var(--taupe);
            font-size: 14px;
            margin-bottom: 22px;
            line-height: 1.6;
        }

        .alert {
            padding: 14px 18px;
            border-radius: 8px;
            margin-bottom: 22px;
            font-size: 14px;
        }

        .alert-success {
            background: #E8F2E6;
            color: #365934;
            border: 1px solid #C6DEC2;
        }

        .alert-error {
            background: #FCE8E6;
            color: #A83228;
            border: 1px solid #F3C7C3;
        }

        footer {
            text-align: center;
            color: var(--taupe);
            font-size: 13px;
            padding: 28px 15px;
        }

        @media (max-width: 600px) {
            header {
                padding: 20px;
            }

            .container {
                padding: 0 14px;
                margin-top: 25px;
            }

            .page-heading h1 {
                font-size: 26px;
            }

            .page-heading .button {
                width: 100%;
                text-align: center;
            }

            .header-actions {
                width: 100%;
            }

            .search-form > * {
                width: 100%;
            }
        }
    </style>
</head>
<body>

    <header>
        <div>
            <div class="logo">Biblio<span>Club</span></div>
            <p class="subtitle">Gestión del catálogo bibliotecario</p>
        </div>

        <div class="header-actions">
            <a href="{{ route('admin') }}" class="button button-light">
                Volver al panel
            </a>
        </div>
    </header>

    <main class="container">

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-error">
                No se pudo completar la operación. Revisa los datos ingresados.
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <section class="page-heading">
            <div>
                <h1>Catálogo de libros</h1>
                <p>Administra los libros y consulta la disponibilidad de ejemplares.</p>
            </div>

            <a href="{{ route('libros.create') }}" class="button">
                + Registrar libro
            </a>
        </section>

        <form action="{{ route('libros.index') }}" method="GET" class="search-form">
            <input
                type="text"
                name="buscar"
                class="search-input"
                value="{{ $busqueda ?? '' }}"
                placeholder="Buscar por título, autor o género..."
                aria-label="Buscar libros"
            >

            <button type="submit" class="button">
                Buscar
            </button>

            <a href="{{ route('libros.index') }}" class="clear-button">
                Limpiar
            </a>
        </form>

        <section class="summary">
            <article class="summary-card">
                <p class="summary-label">
                    {{ $busqueda ? 'Títulos encontrados' : 'Títulos registrados' }}
                </p>
                <p class="summary-value">{{ $libros->count() }}</p>
                <p class="summary-description">
                    {{ $busqueda ? 'Resultados de la búsqueda' : 'Libros diferentes en el catálogo' }}
                </p>
            </article>

            <article class="summary-card">
                <p class="summary-label">Ejemplares registrados</p>
                <p class="summary-value">{{ $libros->sum('cantidad_total') }}</p>
                <p class="summary-description">Total de ejemplares de los resultados mostrados</p>
            </article>

            <article class="summary-card">
                <p class="summary-label">Ejemplares disponibles</p>
                <p class="summary-value">{{ $libros->sum('cantidad_disponible') }}</p>
                <p class="summary-description">Ejemplares disponibles para préstamo</p>
            </article>
        </section>

        <section class="table-card">
            <div class="table-heading">
                <h2>Libros registrados</h2>
                <p>Información almacenada en la base de datos de BiblioClub.</p>
            </div>

            @if ($libros->isNotEmpty())
                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>Portada</th>
                                <th>Libro</th>
                                <th>Autor</th>
                                <th>Género</th>
                                <th>Sinopsis</th>
                                <th>Ejemplares</th>
                                <th>Disponibilidad</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($libros as $libro)
                                <tr>
                                    <td>
                                        @if ($libro->portada)
                                            <img
                                                src="{{ asset($libro->portada) }}"
                                                alt="Portada de {{ $libro->titulo }}"
                                                class="book-cover"
                                            >
                                        @else
                                            <span class="no-cover">Sin portada</span>
                                        @endif
                                    </td>

                                    <td>
                                        <div class="book-title">
                                            {{ $libro->titulo }}
                                        </div>
                                        <div class="book-id">
                                            Código: {{ $libro->id }}
                                        </div>
                                    </td>

                                    <td>{{ $libro->autor }}</td>
                                    <td>{{ $libro->genero }}</td>

                                    <td>
                                        <p class="book-synopsis">
                                            {{ $libro->sinopsis ? \Illuminate\Support\Str::limit($libro->sinopsis, 90) : 'Sin sinopsis' }}
                                        </p>
                                    </td>

                                    <td>{{ $libro->cantidad_total }}</td>

                                    <td>
                                        @if ($libro->cantidad_disponible > 0)
                                            <span class="badge available">
                                                {{ $libro->cantidad_disponible }} disponibles
                                            </span>
                                        @else
                                            <span class="badge unavailable">
                                                No disponible
                                            </span>
                                        @endif
                                    </td>

                                    <td>
                                        <div class="actions">
                                            <a
                                                href="{{ route('libros.edit', $libro) }}"
                                                class="button button-edit"
                                            >
                                                Editar
                                            </a>

                                            <form
                                                action="{{ route('libros.destroy', $libro) }}"
                                                method="POST"
                                                class="delete-form"
                                                onsubmit="return confirm('¿Estás seguro de que deseas eliminar este libro? Esta acción no se puede deshacer.');"
                                            >
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="button button-delete">
                                                    Eliminar
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="empty-state">
                    <div class="empty-icon">📚</div>

                    @if ($busqueda)
                        <h3>No se encontraron libros</h3>
                        <p>
                            No hay libros que coincidan con "{{ $busqueda }}".
                            Prueba con otro título, autor o género.
                        </p>

                        <a href="{{ route('libros.index') }}" class="button">
                            Ver todos los libros
                        </a>
                    @else
                        <h3>Aún no hay libros registrados</h3>
                        <p>
                            El catálogo está vacío. Registra el primer libro
                            para comenzar a administrar los ejemplares.
                        </p>

                        <a href="{{ route('libros.create') }}" class="button">
                            Registrar primer libro
                        </a>
                    @endif
                </div>
            @endif
        </section>

    </main>

    <footer>
        BiblioClub · Sistema de gestión bibliotecaria
    </footer>

</body>
</html>