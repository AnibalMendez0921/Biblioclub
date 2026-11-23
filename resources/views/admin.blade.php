<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración | BiblioClub</title>

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
            font-family: 'DM Sans', Arial, sans-serif;
            background: var(--ivory);
            color: var(--chocolate);
            min-height: 100vh;
        }

        header {
            background: var(--chocolate);
            color: var(--ivory);
            padding: 22px 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
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

        header p {
            font-size: 13px;
            margin-top: 5px;
            color: #D5CBBB;
            letter-spacing: 0.5px;
        }

        .container {
            max-width: 1150px;
            margin: 35px auto;
            padding: 0 22px;
        }

        .welcome {
            background: var(--ivory-light);
            padding: 30px;
            border-radius: 12px;
            border: 1px solid var(--beige);
            margin-bottom: 28px;
            box-shadow: 0 10px 28px rgba(59, 51, 41, .05);
        }

        .welcome h1 {
            font-family: 'Playfair Display', serif;
            font-size: 31px;
            margin-bottom: 12px;
            color: var(--chocolate);
        }

        .welcome p {
            color: var(--taupe);
            line-height: 1.65;
            font-size: 14px;
        }

        .role {
            display: inline-block;
            background: #F3EDE0;
            color: var(--gold-dark);
            border: 1px solid var(--gold-light);
            padding: 7px 13px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
            margin-top: 16px;
        }

        .section-title {
            font-family: 'Playfair Display', serif;
            margin-bottom: 18px;
            font-size: 22px;
            color: var(--chocolate);
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(230px, 1fr));
            gap: 20px;
        }

        .card {
            background: var(--ivory-light);
            border: 1px solid var(--beige);
            border-radius: 12px;
            padding: 25px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            min-height: 210px;
            box-shadow: 0 8px 22px rgba(59, 51, 41, .04);
            transition: .25s;
        }

        .card:hover {
            transform: translateY(-4px);
            border-color: var(--gold-light);
            box-shadow: 0 12px 28px rgba(59, 51, 41, .08);
        }

        .card-icon {
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #F3EDE0;
            border: 1px solid var(--beige);
            color: var(--gold-dark);
            border-radius: 10px;
            font-size: 24px;
            margin-bottom: 18px;
        }

        .card h3 {
            font-family: 'Playfair Display', serif;
            margin-bottom: 10px;
            font-size: 19px;
            color: var(--chocolate);
        }

        .card p {
            color: var(--taupe);
            font-size: 14px;
            line-height: 1.55;
            margin-bottom: 20px;
            flex-grow: 1;
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
            border: none;
            cursor: pointer;
            transition: .2s;
        }

        .button:hover {
            background: var(--gold);
        }

        .button-secondary {
            background: transparent;
            border: 1px solid var(--gold-light);
            color: var(--ivory);
        }

        .button-secondary:hover {
            background: var(--chocolate-light);
        }

        .top-actions {
            display: flex;
            gap: 10px;
            align-items: center;
            flex-wrap: wrap;
        }

        footer {
            text-align: center;
            padding: 25px;
            color: var(--taupe);
            font-size: 13px;
        }

        @media (max-width: 600px) {
            header {
                padding: 20px;
            }

            .container {
                margin-top: 22px;
                padding: 0 15px;
            }

            .welcome {
                padding: 22px;
            }

            .welcome h1 {
                font-size: 26px;
            }
        }
    </style>
</head>
<body>

    <header>
        <div>
            <div class="logo">Biblio<span>Club</span></div>
            <p>Sistema de gestión bibliotecaria</p>
        </div>

        <div class="top-actions">
            <a href="{{ route('admin') }}" class="button button-secondary">
                Panel de administración
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

        <section class="welcome">
            <h1>Panel de administración</h1>

            <p>
                Bienvenido, {{ auth()->user()->name }}.
                Desde este panel puedes acceder a las funciones de
                administración de BiblioClub.
            </p>

            <span class="role">
                Rol: {{ auth()->user()->getRoleNames()->first() }}
            </span>
        </section>

        <h2 class="section-title">Gestión de la biblioteca</h2>

        <section class="cards">

            <article class="card">
                <div class="card-icon">📚</div>

                <h3>Catálogo de libros</h3>

                <p>
                    Consulta los libros registrados, revisa su
                    disponibilidad y administra los ejemplares.
                </p>

                <a href="{{ route('libros.index') }}" class="button">
                    Gestionar libros
                </a>
            </article>

            <article class="card">
                <div class="card-icon">👥</div>

                <h3>Usuarios</h3>

                <p>
                    Consulta y administra los usuarios registrados
                    y los roles asignados en la biblioteca.
                </p>

                <a href="{{ route('admin.usuarios.index') }}" class="button">
                    Gestionar usuarios
                </a>
            </article>

            <article class="card">
                <div class="card-icon">📖</div>

                <h3>Préstamos y devoluciones</h3>

                <p>
                    Registra los préstamos de libros, consulta su estado
                    y administra las devoluciones de los usuarios.
                </p>

                <a href="{{ route('prestamos.index') }}" class="button">
                    Gestionar préstamos
                </a>
            </article>

            <article class="card">
                <div class="card-icon">📅</div>

                <h3>Actividades del club</h3>

                <p>
                    Programa talleres, encuentros de lectura y eventos,
                    establece fechas y horarios y administra su estado.
                </p>

                <a href="{{ route('actividades.index') }}" class="button">
                    Gestionar actividades
                </a>
            </article>

            <article class="card">
                <div class="card-icon">📊</div>

                <h3>Informes</h3>

                <p>
                    Consulta estadísticas del inventario, préstamos, usuarios
                    y actividades del club. Imprime los resultados para revisarlos.
                </p>

                <a href="{{ route('informes.index') }}" class="button">
                    Consultar informes
                </a>
            </article>

        </section>
    </main>

    <footer>
        BiblioClub · Sistema de gestión bibliotecaria
    </footer>

</body>
</html>