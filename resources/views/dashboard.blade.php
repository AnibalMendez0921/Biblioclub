
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel del lector | BiblioClub</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
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

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--ivory);
            color: var(--chocolate);
            line-height: 1.6;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        /* ENCABEZADO */

        header {
            background: rgba(252, 250, 245, 0.96);
            border-bottom: 1px solid var(--beige);
            padding: 18px 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
            position: sticky;
            top: 0;
            z-index: 100;
            backdrop-filter: blur(12px);
        }

        .logo {
            font-family: 'Playfair Display', serif;
            font-size: 29px;
            font-weight: 700;
            color: var(--chocolate);
            letter-spacing: -1px;
        }

        .logo span {
            color: var(--gold-dark);
        }

        header p {
            font-size: 13px;
            margin-top: 3px;
            color: var(--taupe);
        }

        .top-actions {
            display: flex;
            gap: 12px;
            align-items: center;
            flex-wrap: wrap;
        }

        /* BOTONES */

        .button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: var(--gold);
            color: var(--white);
            padding: 12px 19px;
            border-radius: 7px;
            text-decoration: none;
            font-size: 13px;
            font-weight: 700;
            border: 1px solid var(--gold);
            cursor: pointer;
            font-family: 'DM Sans', sans-serif;
            transition: all 0.25s ease;
        }

        .button:hover {
            background: var(--gold-dark);
            border-color: var(--gold-dark);
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(146, 117, 72, 0.17);
        }

        .button-secondary {
            background: transparent;
            color: var(--chocolate);
            border: 1px solid var(--gold);
        }

        .button-secondary:hover {
            background: var(--gold);
            color: var(--white);
            border-color: var(--gold);
        }

        /* CONTENEDOR */

        .container {
            max-width: 1160px;
            margin: 45px auto;
            padding: 0 22px;
        }

        /* BIENVENIDA */

        .welcome {
            background: var(--ivory-light);
            padding: 38px;
            border-radius: 15px;
            border: 1px solid var(--beige);
            margin-bottom: 45px;
            position: relative;
            overflow: hidden;
            box-shadow: var(--shadow);
        }

        .welcome::after {
            content: "";
            position: absolute;
            right: 45px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 95px;
            opacity: 0.12;
            pointer-events: none;
        }

        .welcome-label {
            color: var(--gold-dark);
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 3px;
            text-transform: uppercase;
            margin-bottom: 12px;
        }

        .welcome h1 {
            font-family: 'Playfair Display', serif;
            font-size: 34px;
            margin-bottom: 12px;
            color: var(--chocolate);
        }

        .welcome p {
            color: var(--taupe);
            line-height: 1.8;
            font-size: 14px;
            max-width: 700px;
        }

        .role {
            display: inline-flex;
            align-items: center;
            background: #EFE5D3;
            color: var(--gold-dark);
            padding: 8px 15px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
            margin-top: 20px;
            border: 1px solid var(--gold-light);
        }

        /* TÍTULO DE SECCIÓN */

        .section-heading {
            margin-bottom: 25px;
        }

        .section-heading span {
            color: var(--gold-dark);
            font-size: 11px;
            letter-spacing: 3px;
            text-transform: uppercase;
            font-weight: 700;
        }

        .section-title {
            margin-top: 5px;
            font-family: 'Playfair Display', serif;
            font-size: 29px;
            color: var(--chocolate);
        }

        .section-description {
            color: var(--taupe);
            font-size: 14px;
            margin-top: 5px;
        }

        /* TARJETAS */

        .cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 22px;
        }

        .card {
            background: var(--ivory-light);
            border: 1px solid var(--beige);
            border-radius: 13px;
            padding: 28px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            min-height: 285px;
            transition: all 0.3s ease;
            box-shadow: 0 5px 18px rgba(59, 51, 41, 0.035);
        }

        .card:hover {
            transform: translateY(-6px);
            box-shadow: var(--shadow);
            border-color: var(--gold-light);
        }

        .card-icon {
            width: 55px;
            height: 55px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #EFE5D3;
            color: var(--gold-dark);
            border-radius: 13px;
            font-size: 25px;
            margin-bottom: 22px;
        }

        .card h3 {
            margin-bottom: 11px;
            font-family: 'Playfair Display', serif;
            font-size: 20px;
            color: var(--chocolate);
        }

        .card p {
            color: var(--taupe);
            font-size: 13px;
            line-height: 1.8;
            margin-bottom: 23px;
            flex-grow: 1;
        }

        .card .button {
            margin-top: auto;
        }

        /* FRASE INFERIOR */

        .reading-banner {
            margin-top: 55px;
            padding: 42px 30px;
            border-radius: 15px;
            background: var(--chocolate);
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .reading-banner::before {
            content: "";
            position: absolute;
            width: 200px;
            height: 200px;
            border: 1px solid rgba(216, 196, 158, 0.2);
            border-radius: 50%;
            top: -100px;
            left: -50px;
        }

        .reading-banner h2 {
            font-family: 'Playfair Display', serif;
            font-size: 27px;
            color: var(--ivory);
            margin-bottom: 10px;
        }

        .reading-banner p {
            color: var(--gold-light);
            font-size: 13px;
        }

        .reading-banner .decoration {
            color: var(--gold-light);
            font-size: 25px;
            margin-bottom: 10px;
        }

        /* PIE DE PÁGINA */

        footer {
            text-align: center;
            padding: 30px 20px;
            margin-top: 55px;
            background: var(--ivory-light);
            border-top: 1px solid var(--beige);
        }

        .footer-logo {
            font-family: 'Playfair Display', serif;
            font-size: 21px;
            font-weight: 700;
            color: var(--chocolate);
            margin-bottom: 7px;
        }

        .footer-logo span {
            color: var(--gold-dark);
        }

        footer p {
            color: var(--taupe);
            font-size: 12px;
        }

        /* RESPONSIVE */

        @media (max-width: 900px) {
            .cards {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 600px) {
            header {
                padding: 17px 20px;
            }

            .logo {
                font-size: 24px;
            }

            .container {
                margin-top: 25px;
                padding: 0 15px;
            }

            .welcome {
                padding: 25px;
            }

            .welcome h1 {
                font-size: 27px;
            }

            .welcome::after {
                right: 15px;
                font-size: 55px;
            }

            .cards {
                grid-template-columns: 1fr;
            }

            .section-title {
                font-size: 25px;
            }

            .card {
                min-height: 250px;
            }

            .top-actions {
                width: 100%;
            }

            .top-actions .button {
                flex: 1;
            }

            .reading-banner h2 {
                font-size: 23px;
            }
        }
    </style>
</head>

<body>

    <!-- ENCABEZADO -->
    <header>

        <div>
            <div class="logo">Biblio<span>Club.</span></div>
            <p>Tu biblioteca y club de lectura</p>
        </div>

        <div class="top-actions">

            <a href="{{ route('dashboard') }}" class="button button-secondary">
                Mi panel
            </a>

            <form action="{{ route('logout') }}" method="POST">
                @csrf

                <button type="submit" class="button button-secondary">
                    Cerrar sesión
                </button>
            </form>

        </div>

    </header>

    <main class="container">

        <!-- BIENVENIDA -->
        <section class="welcome">

            <div class="welcome-label">
                Tu espacio de lectura
            </div>

            <h1>¡Bienvenido a BiblioClub!</h1>

            <p>
                Hola, {{ auth()->user()->name }}.
                Desde tu panel puedes consultar los libros de la biblioteca,
                solicitar préstamos, revisar tus solicitudes y conocer las
                próximas actividades del club de lectura.
            </p>

            <span class="role">
                ✦ Rol: {{ auth()->user()->getRoleNames()->first() ?? 'Lector' }}
            </span>

        </section>

        <!-- OPCIONES DEL LECTOR -->
        <div class="section-heading">

            <span>Explora tu biblioteca</span>

            <h2 class="section-title">
                ¿Qué deseas hacer?
            </h2>

            <p class="section-description">
                Accede fácilmente a las herramientas de BiblioClub.
            </p>

        </div>

        <section class="cards">

            <!-- CATÁLOGO -->
            <article class="card">

                <div class="card-icon">📚</div>

                <h3>Consultar catálogo</h3>

                <p>
                    Explora los libros registrados, busca por título,
                    autor o género y consulta cuántos ejemplares
                    están disponibles, sin realizar solicitudes.
                </p>

                <a href="{{ route('catalogo.index') }}" class="button">
                    Explorar libros →
                </a>

            </article>

            <!-- SOLICITAR PRÉSTAMO -->
            <article class="card">

                <div class="card-icon">📖</div>

                <h3>Solicitar un préstamo</h3>

                <p>
                    Explora los libros disponibles y envía una solicitud
                    de préstamo al bibliotecario para que pueda revisarla
                    y aprobarla.
                </p>

                <a href="{{ route('catalogo.solicitar') }}" class="button">
                    Elegir libro →
                </a>

            </article>

            <!-- MIS PRÉSTAMOS -->
            <article class="card">

                <div class="card-icon">🗂️</div>

                <h3>Mis préstamos</h3>

                <p>
                    Revisa tus solicitudes pendientes, los préstamos activos,
                    las fechas previstas de devolución y tu historial.
                </p>

                <a href="{{ route('mis-prestamos.index') }}" class="button">
                    Consultar préstamos →
                </a>

            </article>

            <!-- PRÉSTAMOS ENTRE INTEGRANTES -->
            <article class="card">

                <div class="card-icon">🤝</div>

                <h3>Préstamos entre integrantes</h3>

                <p>
                    Consulta y registra la circulación de libros
                    entre los miembros del club de lectura.
                </p>

                <a href="{{ route('prestamos-integrantes.index') }}" class="button">
                    Ver préstamos →
                </a>

            </article>

            <!-- ACTIVIDADES -->
            <article class="card">

                <div class="card-icon">📅</div>

                <h3>Actividades del club</h3>

                <p>
                    Consulta los próximos encuentros, talleres y
                    actividades con sus fechas, horarios y lugares.
                </p>

                <a href="{{ route('actividades-club.index') }}" class="button">
                    Ver actividades →
                </a>

            </article>

        </section>

        <!-- FRASE INFERIOR -->
        <section class="reading-banner">

            <div class="decoration">✦</div>

            <h2>Cada lectura es una nueva aventura.</h2>

            <p>
                Descubre, aprende y comparte el maravilloso mundo de los libros.
            </p>

        </section>

    </main>

    <!-- PIE DE PÁGINA -->
    <footer>

        <div class="footer-logo">
            Biblio<span>Club.</span>
        </div>

        <p>
            © {{ date('Y') }} BiblioClub. Tu espacio para leer y compartir.
        </p>

    </footer>

</body>
</html>

