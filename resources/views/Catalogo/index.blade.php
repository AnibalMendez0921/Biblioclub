<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo | BiblioClub</title>

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
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: var(--ivory);
            color: var(--chocolate);
            font-family: 'DM Sans', sans-serif;
        }

        header {
            background: var(--chocolate);
            padding: 20px 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }

        .logo {
            font-family: 'Playfair Display', serif;
            color: var(--gold-light);
            font-size: 27px;
            font-weight: 700;
        }

        nav {
            display: flex;
            gap: 24px;
            flex-wrap: wrap;
        }

        nav a {
            color: var(--ivory);
            text-decoration: none;
            font-size: 14px;
            transition: .3s;
        }

        nav a:hover {
            color: var(--gold-light);
        }

        .contenedor {
            width: 86%;
            max-width: 1250px;
            margin: 55px auto;
        }

        .encabezado {
            text-align: center;
            margin-bottom: 35px;
        }

        .encabezado span {
            color: var(--gold-dark);
            text-transform: uppercase;
            letter-spacing: 3px;
            font-size: 12px;
            font-weight: 700;
        }

        h1 {
            font-family: 'Playfair Display', serif;
            font-size: 43px;
            margin: 12px 0;
        }

        .encabezado p {
            color: var(--taupe);
            font-size: 15px;
        }

        .buscador {
            display: flex;
            max-width: 600px;
            margin: 30px auto 45px;
            background: var(--white);
            border: 1px solid var(--gold-light);
            border-radius: 40px;
            padding: 7px;
            box-shadow: 0 5px 20px rgba(59, 51, 41, .06);
        }

        .buscador input {
            flex: 1;
            min-width: 0;
            border: none;
            outline: none;
            background: transparent;
            padding: 12px 18px;
            font-family: inherit;
            font-size: 14px;
            color: var(--chocolate);
        }

        .buscador button {
            background: var(--chocolate);
            color: var(--ivory);
            border: none;
            padding: 12px 25px;
            border-radius: 30px;
            cursor: pointer;
            font-family: inherit;
            font-weight: 600;
        }

        .buscador button:hover {
            background: var(--gold-dark);
        }

        .resumen {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 22px;
            flex-wrap: wrap;
            gap: 10px;
        }

        .resumen h2 {
            font-family: 'Playfair Display', serif;
            font-size: 25px;
        }

        .resumen p {
            color: var(--taupe);
            font-size: 13px;
        }

        .libros {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(245px, 1fr));
            gap: 25px;
        }

        .libro-card {
            background: var(--ivory-light);
            border: 1px solid var(--beige);
            border-radius: 13px;
            overflow: hidden;
            transition: .3s;
            box-shadow: 0 5px 18px rgba(59, 51, 41, .04);
        }

        .libro-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 28px rgba(59, 51, 41, .10);
            border-color: var(--gold-light);
        }

        .portada {
            height: 230px;
            background: linear-gradient(145deg, #E8DFCE, #D8C49E);
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        .portada img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .portada .icono {
            font-size: 65px;
        }

        .libro-info {
            padding: 20px;
        }

        .genero {
            color: var(--gold-dark);
            text-transform: uppercase;
            font-size: 10px;
            letter-spacing: 1.5px;
            font-weight: 700;
        }

        .libro-info h3 {
            font-family: 'Playfair Display', serif;
            font-size: 21px;
            margin: 8px 0;
        }

        .autor {
            color: var(--taupe);
            font-size: 13px;
            margin-bottom: 14px;
        }

        .disponibilidad {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 12px;
            padding: 11px 0;
            border-top: 1px solid var(--beige);
            border-bottom: 1px solid var(--beige);
        }

        .disponible {
            color: #607B55;
            font-weight: 700;
        }

        .agotado {
            color: #A34E42;
            font-weight: 700;
        }

        details {
            margin-top: 14px;
        }

        summary {
            list-style: none;
            cursor: pointer;
            background: var(--chocolate);
            color: var(--ivory);
            padding: 11px;
            text-align: center;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 600;
        }

        summary::-webkit-details-marker {
            display: none;
        }

        summary:hover {
            background: var(--gold-dark);
        }

        .detalles {
            padding-top: 15px;
            color: var(--chocolate-light);
            font-size: 13px;
            line-height: 1.7;
        }

        .detalles p {
            margin-bottom: 8px;
        }

        .vacio {
            grid-column: 1 / -1;
            text-align: center;
            padding: 55px 20px;
            background: var(--ivory-light);
            border: 1px dashed var(--gold-light);
            border-radius: 12px;
        }

        .vacio span {
            font-size: 45px;
        }

        .vacio h3 {
            font-family: 'Playfair Display', serif;
            margin: 12px 0;
        }

        footer {
            margin-top: 70px;
            padding: 25px;
            text-align: center;
            background: var(--chocolate);
            color: var(--gold-light);
            font-size: 12px;
        }

        @media (max-width: 600px) {
            .contenedor {
                width: 91%;
                margin: 35px auto;
            }

            h1 {
                font-size: 34px;
            }

            header {
                justify-content: center;
            }

            nav {
                justify-content: center;
                gap: 14px;
            }

            .buscador button {
                padding: 11px 17px;
            }
        }
    </style>
</head>

<body>

<header>
    <div class="logo">✦ BiblioClub</div>

    <nav>
        <a href="{{ route('dashboard') }}">Inicio</a>
        <a href="{{ route('catalogo.index') }}">Catálogo</a>
        <a href="{{ route('catalogo.solicitar') }}">Solicitar préstamo</a>
        <a href="{{ route('mis-prestamos.index') }}">Mis préstamos</a>
    </nav>
</header>

<main class="contenedor">

    <section class="encabezado">
        <span>Explora · Descubre · Lee</span>
        <h1>Nuestra biblioteca</h1>
        <p>Encuentra historias, conocimientos y nuevas aventuras entre nuestros libros.</p>
    </section>

    <form action="{{ route('catalogo.index') }}" method="GET" class="buscador">
        <input
            type="text"
            name="buscar"
            placeholder="Buscar por título, autor o género..."
            value="{{ $buscar ?? '' }}"
        >
        <button type="submit">Buscar</button>
    </form>

    <section>
        <div class="resumen">
            <h2>✧ Colección de libros</h2>
            <p>{{ $libros->count() }} libros encontrados</p>
        </div>

        <div class="libros">

            @forelse($libros as $libro)

                <article class="libro-card">

                    <div class="portada">
                        @if($libro->portada)
                            <img
                                src="{{ asset($libro->portada) }}"
                                alt="Portada de {{ $libro->titulo }}"
                            >
                        @else
                            <span class="icono">📖</span>
                        @endif
                    </div>

                    <div class="libro-info">

                        <span class="genero">
                            {{ $libro->genero }}
                        </span>

                        <h3>{{ $libro->titulo }}</h3>

                        <p class="autor">
                            Por {{ $libro->autor }}
                        </p>

                        <div class="disponibilidad">
                            <span>Ejemplares disponibles</span>

                            @if($libro->cantidad_disponible > 0)
                                <span class="disponible">
                                    {{ $libro->cantidad_disponible }}
                                </span>
                            @else
                                <span class="agotado">Agotado</span>
                            @endif
                        </div>

                        <details>
                            <summary>Ver detalles del libro</summary>

                            <div class="detalles">

                                <p>
                                    <strong>Sinopsis:</strong><br>
                                    {{ $libro->sinopsis ?: 'Aún no se ha agregado una sinopsis para este libro.' }}
                                </p>

                                <p>
                                    <strong>Autor:</strong>
                                    {{ $libro->autor }}
                                </p>

                                <p>
                                    <strong>Género:</strong>
                                    {{ $libro->genero }}
                                </p>

                                <p>
                                    <strong>Ejemplares totales:</strong>
                                    {{ $libro->cantidad_total }}
                                </p>

                                <p>
                                    <strong>Disponibles:</strong>
                                    {{ $libro->cantidad_disponible }}
                                </p>

                            </div>
                        </details>

                    </div>
                </article>

            @empty

                <div class="vacio">
                    <span>📚</span>
                    <h3>No encontramos libros</h3>
                    <p>Intenta buscar con otro título, autor o género.</p>
                </div>

            @endforelse

        </div>
    </section>

</main>

<footer>
    ✦ BiblioClub · Un espacio para los amantes de la lectura ✦
</footer>

</body>
</html>
