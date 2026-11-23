
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitar préstamo | BiblioClub</title>

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
            padding: 22px 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
            border-bottom: 1px solid var(--beige);
            box-shadow: 0 4px 18px rgba(59, 51, 41, 0.04);
        }

        .logo h1 {
            font-family: 'Playfair Display', serif;
            font-size: 29px;
            color: var(--chocolate);
            letter-spacing: -1px;
        }

        .logo h1 span {
            color: var(--gold);
        }

        .logo p {
            margin-top: 4px;
            color: var(--taupe);
            font-size: 13px;
        }

        .btn {
            display: inline-block;
            padding: 12px 19px;
            border: none;
            border-radius: 7px;
            background: var(--gold);
            color: var(--white);
            text-decoration: none;
            font-family: 'DM Sans', sans-serif;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.25s ease;
        }

        .btn:hover {
            background: var(--gold-dark);
            transform: translateY(-2px);
        }

        .btn-secundario {
            background: var(--ivory-light);
            color: var(--chocolate);
            border: 1px solid var(--gold-light);
        }

        .btn-secundario:hover {
            background: var(--beige);
            color: var(--chocolate);
        }

        main {
            width: 86%;
            max-width: 1200px;
            margin: 45px auto;
        }

        .mensaje {
            padding: 16px 19px;
            border-radius: 9px;
            margin-bottom: 20px;
            line-height: 1.6;
            font-size: 14px;
        }

        .mensaje-exito {
            background: #F0F4E9;
            color: #536342;
            border: 1px solid #D4DFC4;
        }

        .mensaje-error {
            background: #F9EDEA;
            color: #A34E43;
            border: 1px solid #EBCBC5;
        }

        .introduccion {
            margin-bottom: 30px;
        }

        .etiqueta {
            display: inline-block;
            color: var(--gold-dark);
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 12px;
        }

        .introduccion h2 {
            font-family: 'Playfair Display', serif;
            font-size: 34px;
            font-weight: 600;
            margin-bottom: 10px;
            color: var(--chocolate);
        }

        .introduccion p {
            color: var(--taupe);
            line-height: 1.7;
            font-size: 15px;
            max-width: 650px;
        }

        .buscador {
            display: flex;
            gap: 10px;
            margin: 25px 0;
            flex-wrap: wrap;
        }

        .buscador input {
            flex: 1;
            min-width: 220px;
            padding: 14px 17px;
            border: 1px solid var(--beige);
            border-radius: 8px;
            font-family: 'DM Sans', sans-serif;
            font-size: 14px;
            background: var(--ivory-light);
            color: var(--chocolate);
            outline: none;
            transition: 0.2s;
        }

        .buscador input:focus {
            border-color: var(--gold);
            box-shadow: 0 0 0 3px rgba(184, 154, 102, 0.12);
        }

        .buscador input::placeholder {
            color: #A79D8E;
        }

        .resumen {
            background: var(--ivory-light);
            border: 1px solid var(--beige);
            border-radius: 9px;
            padding: 17px 20px;
            margin-bottom: 18px;
            color: var(--taupe);
            font-size: 14px;
        }

        .resumen strong {
            color: var(--chocolate);
        }

        .tabla-contenedor {
            overflow-x: auto;
            background: var(--ivory-light);
            border: 1px solid var(--beige);
            border-radius: 12px;
            box-shadow: var(--shadow);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 850px;
        }

        th, td {
            padding: 17px 16px;
            text-align: left;
            border-bottom: 1px solid var(--beige);
        }

        th {
            background: #EFE7D8;
            color: var(--chocolate);
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        td {
            font-size: 13px;
            color: var(--chocolate-light);
        }

        tbody tr {
            transition: background 0.2s ease;
        }

        tbody tr:hover {
            background: #F7F1E6;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        .disponible {
            display: inline-block;
            color: #68764F;
            background: #EDF1E4;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .agotado {
            display: inline-block;
            color: #A34E43;
            background: #F8EAE6;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .form-solicitud {
            margin: 0;
        }

        .btn-solicitar {
            white-space: nowrap;
            padding: 10px 14px;
            font-size: 12px;
        }

        .vacio {
            padding: 55px 25px;
            text-align: center;
            color: var(--taupe);
        }

        .vacio h3 {
            font-family: 'Playfair Display', serif;
            font-size: 23px;
            color: var(--chocolate);
            margin-bottom: 10px;
        }

        .vacio p {
            font-size: 14px;
            line-height: 1.6;
        }

        .pie {
            text-align: center;
            padding: 28px 15px;
            color: var(--taupe);
            font-size: 13px;
            border-top: 1px solid var(--beige);
            background: var(--ivory-light);
            margin-top: 60px;
        }

        @media (max-width: 600px) {
            header {
                padding: 20px 5%;
            }

            main {
                width: 92%;
                margin-top: 30px;
            }

            .introduccion h2 {
                font-size: 27px;
            }

            .buscador .btn {
                width: 100%;
                text-align: center;
            }

            .buscador a {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>

<body>

    <header>
        <div class="logo">
            <h1>Biblio<span>Club.</span></h1>
            <p>Solicitar un préstamo</p>
        </div>

        <a href="{{ route('dashboard') }}" class="btn btn-secundario">
            ← Volver a mi panel
        </a>
    </header>

    <main>

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

        @if($errors->any())
            <div class="mensaje mensaje-error">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <section class="introduccion">
            <span class="etiqueta">✦ DESCUBRE NUEVAS HISTORIAS</span>

            <h2>Encuentra tu próximo libro</h2>

            <p>
                Explora nuestro catálogo, consulta la disponibilidad
                y solicita el préstamo del libro que deseas leer.
                Tu próxima aventura literaria comienza aquí.
            </p>
        </section>

        <form action="{{ route('catalogo.solicitar') }}" method="GET" class="buscador">

            <input
                type="text"
                name="buscar"
                placeholder="Escribe un título, autor o género..."
                value="{{ $buscar ?? '' }}"
            >

            <button type="submit" class="btn">
                Buscar libros
            </button>

            @if(!empty($buscar))
                <a href="{{ route('catalogo.solicitar') }}" class="btn btn-secundario">
                    Limpiar búsqueda
                </a>
            @endif

        </form>

        <div class="resumen">
            @if(!empty($buscar))
                Resultados para: <strong>{{ $buscar }}</strong>.
                Libros encontrados: <strong>{{ $libros->count() }}</strong>.
            @else
                Libros registrados en el catálogo:
                <strong>{{ $libros->count() }}</strong>.
            @endif
        </div>

        <div class="tabla-contenedor">

            @if($libros->count() > 0)

                <table>
                    <thead>
                        <tr>
                            <th>Título</th>
                            <th>Autor</th>
                            <th>Género</th>
                            <th>Ejemplares totales</th>
                            <th>Disponibilidad</th>
                            <th>Acción</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($libros as $libro)

                            <tr>
                                <td><strong>{{ $libro->titulo }}</strong></td>
                                <td>{{ $libro->autor }}</td>
                                <td>{{ $libro->genero }}</td>
                                <td>{{ $libro->cantidad_total }}</td>

                                <td>
                                    @if($libro->cantidad_disponible > 0)
                                        <span class="disponible">
                                            {{ $libro->cantidad_disponible }} disponibles
                                        </span>
                                    @else
                                        <span class="agotado">
                                            No disponible
                                        </span>
                                    @endif
                                </td>

                                <td>
                                    @if($libro->cantidad_disponible > 0)

                                        <form
                                            action="{{ route('prestamos.solicitar', $libro) }}"
                                            method="POST"
                                            class="form-solicitud"
                                        >
                                            @csrf

                                            <button
                                                type="submit"
                                                class="btn btn-solicitar"
                                            >
                                                Solicitar préstamo
                                            </button>
                                        </form>

                                    @else

                                        <span class="agotado">
                                            No disponible
                                        </span>

                                    @endif
                                </td>
                            </tr>

                        @endforeach

                    </tbody>
                </table>

            @else

                <div class="vacio">
                    <h3>No se encontraron libros</h3>

                    <p>
                        @if(!empty($buscar))
                            Prueba con otro título, autor o género.
                        @else
                            Todavía no hay libros registrados en el catálogo.
                        @endif
                    </p>
                </div>

            @endif

        </div>

    </main>

    <footer class="pie">
        BiblioClub · Un espacio para descubrir, aprender y compartir.
    </footer>

</body>
</html>

