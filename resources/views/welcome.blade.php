
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BiblioClub | Tu espacio de lectura</title>

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
            --shadow: 0 15px 40px rgba(59, 51, 41, 0.09);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            background: var(--ivory);
            color: var(--chocolate);
            font-family: 'DM Sans', sans-serif;
            line-height: 1.6;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .container {
            width: min(1160px, 90%);
            margin: auto;
        }

        /* NAVEGACIÓN */

        header {
            background: rgba(252, 250, 245, 0.97);
            border-bottom: 1px solid var(--beige);
            position: sticky;
            top: 0;
            z-index: 100;
            backdrop-filter: blur(12px);
        }

        nav {
            min-height: 82px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 25px;
        }

        .logo {
            font-family: 'Playfair Display', serif;
            font-size: 27px;
            font-weight: 700;
            color: var(--chocolate);
            letter-spacing: -1px;
        }

        .logo span {
            color: var(--gold-dark);
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 30px;
            color: var(--chocolate-light);
            font-size: 14px;
            font-weight: 600;
        }

        .nav-links a:hover {
            color: var(--gold-dark);
        }

        .nav-buttons {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
        }

        /* BOTONES */

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 12px 20px;
            border-radius: 7px;
            font-size: 13px;
            font-weight: 700;
            transition: 0.25s ease;
            cursor: pointer;
            border: 1px solid transparent;
            white-space: nowrap;
        }

        .btn-gold {
            background: var(--gold);
            color: var(--white);
            border-color: var(--gold);
        }

        .btn-gold:hover {
            background: var(--gold-dark);
            border-color: var(--gold-dark);
            transform: translateY(-2px);
        }

        .btn-outline {
            border-color: var(--gold);
            color: var(--chocolate);
            background: transparent;
        }

        .btn-outline:hover {
            background: var(--gold);
            color: var(--white);
        }

        /* ACCESO ADMINISTRADOR */

        .btn-admin {
            background: var(--chocolate);
            color: var(--ivory);
            border: 1px solid var(--chocolate);
        }

        .btn-admin:hover {
            background: var(--gold-dark);
            border-color: var(--gold-dark);
            color: white;
            transform: translateY(-2px);
        }

        /* PORTADA */

        .hero {
            padding: 90px 0 100px;
            position: relative;
            isolation: isolate;
            background: var(--ivory);
            overflow: hidden;
        }

        .hero::before {
            content: "";
            position: absolute;
            inset: -12px;
            background-image: url("{{ asset('images/biblioteca 2.jpg') }}");
            background-size: cover;
            background-position: center;
            filter: blur(1px);
            opacity: 0.98;
            z-index: -2;
            pointer-events: none;
        }

        .hero::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(
                90deg,
                rgba(30, 25, 20, 0.60) 0%,
                rgba(30, 25, 20, 0.36) 55%,
                rgba(30, 25, 20, 0.12) 100%
            );
            z-index: -1;
            pointer-events: none;
        }

        .hero .container {
            position: relative;
            z-index: 1;
        }

        .hero-content {
            display: grid;
            grid-template-columns: 1.1fr 0.9fr;
            align-items: center;
            gap: 65px;
        }

        .eyebrow {
            color: var(--gold-dark);
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 3px;
            text-transform: uppercase;
            margin-bottom: 22px;
        }

        .hero .eyebrow {
            color: #F0D49E;
        }

        .hero h1 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(43px, 5vw, 66px);
            line-height: 1.13;
            font-weight: 600;
            color: var(--white);
            margin-bottom: 24px;
            text-shadow: 0 2px 12px rgba(0,0,0,0.25);
        }

        .hero h1 span {
            color: #E2C18A;
            font-style: italic;
        }

        .hero-description {
            color: #F5F0E8;
            font-size: 16px;
            max-width: 490px;
            margin-bottom: 32px;
            text-shadow: 0 1px 5px rgba(0,0,0,0.35);
        }

        .hero-actions {
            display: flex;
            gap: 14px;
            flex-wrap: wrap;
        }

        .hero-note {
            margin-top: 27px;
            color: #F5E8D2;
            font-size: 12px;
        }

        .hero .btn-outline {
            color: white;
            border-color: #E2C18A;
            background: rgba(30,25,20,0.25);
        }

        .hero .btn-outline:hover {
            background: var(--gold);
            color: white;
        }

        /* LIBROS DECORATIVOS */

        .book-scene {
            min-height: 390px;
            background: linear-gradient(145deg, #EDE3D1, #F9F4E9);
            border: 1px solid var(--beige);
            border-radius: 18px;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            box-shadow: var(--shadow);
            overflow: hidden;
        }

        .book-scene::before {
            content: "";
            position: absolute;
            width: 270px;
            height: 270px;
            border: 1px solid rgba(184,154,102,0.3);
            border-radius: 50%;
        }

        .books {
            display: flex;
            align-items: end;
            gap: 9px;
            position: relative;
            z-index: 1;
            transform: rotate(-5deg);
        }

        .book {
            width: 75px;
            height: 210px;
            border-radius: 5px 9px 9px 5px;
            box-shadow: 8px 12px 18px rgba(59,51,41,0.18);
            display: flex;
            align-items: center;
            justify-content: center;
            writing-mode: vertical-rl;
            font-family: 'Playfair Display', serif;
            font-size: 17px;
            letter-spacing: 2px;
            color: var(--ivory);
            border-left: 5px solid rgba(255,255,255,0.18);
        }

        .book:nth-child(1) {
            background: #806A4B;
            height: 180px;
        }

        .book:nth-child(2) {
            background: #B89A66;
            height: 245px;
            color: var(--white);
        }

        .book:nth-child(3) {
            background: #594A3B;
            height: 220px;
        }

        .book:nth-child(4) {
            background: #C7AD7E;
            height: 195px;
            color: var(--chocolate);
        }

        .floating-label {
            position: absolute;
            bottom: 28px;
            right: 25px;
            background: var(--ivory-light);
            color: var(--chocolate);
            padding: 12px 17px;
            border-radius: 8px;
            box-shadow: var(--shadow);
            font-size: 12px;
            font-weight: 600;
        }

        /* BENEFICIOS */

        .benefits {
            padding: 75px 0;
            background: var(--ivory-light);
            border-top: 1px solid var(--beige);
            border-bottom: 1px solid var(--beige);
        }

        .benefits-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 35px;
        }

        .benefit {
            display: flex;
            gap: 17px;
            align-items: flex-start;
        }

        .benefit-icon {
            width: 47px;
            height: 47px;
            border-radius: 12px;
            background: #EFE5D3;
            color: var(--gold-dark);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            flex-shrink: 0;
        }

        .benefit h3 {
            font-family: 'Playfair Display', serif;
            font-size: 19px;
            margin-bottom: 6px;
        }

        .benefit p {
            font-size: 13px;
            color: var(--taupe);
        }

        /* CARACTERÍSTICAS */

        .features {
            padding: 100px 0;
            background: var(--ivory);
        }

        .section-heading {
            text-align: center;
            max-width: 650px;
            margin: 0 auto 55px;
        }

        .section-heading h2 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(32px, 4vw, 43px);
            color: var(--chocolate);
            margin-bottom: 14px;
        }

        .section-heading p {
            color: var(--taupe);
            font-size: 15px;
        }

        .feature-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 23px;
        }

        .feature-card {
            padding: 32px 28px;
            background: var(--ivory-light);
            border: 1px solid var(--beige);
            border-radius: 12px;
            transition: 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-6px);
            box-shadow: var(--shadow);
            border-color: var(--gold-light);
        }

        .feature-icon {
            width: 51px;
            height: 51px;
            background: #EFE5D3;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 23px;
            margin-bottom: 23px;
        }

        .feature-card h3 {
            font-family: 'Playfair Display', serif;
            font-size: 21px;
            margin-bottom: 12px;
        }

        .feature-card p {
            color: var(--taupe);
            font-size: 14px;
        }

        /* IMAGEN PANORÁMICA */

        .library-image-section {
            padding: 20px 0 90px;
            background: var(--ivory);
        }

        .library-image {
            position: relative;
            width: 100%;
            height: 420px;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 15px 40px rgba(59,51,41,0.15);
        }

        .library-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            display: block;
            transition: transform 0.6s ease;
        }

        .library-image:hover img {
            transform: scale(1.04);
        }

        .library-image::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(
                90deg,
                rgba(35,29,23,0.75) 0%,
                rgba(35,29,23,0.42) 48%,
                rgba(35,29,23,0.05) 100%
            );
            pointer-events: none;
        }

        .library-image-text {
            position: absolute;
            z-index: 2;
            top: 50%;
            left: 65px;
            transform: translateY(-50%);
            max-width: 510px;
            color: white;
        }

        .library-image-text .eyebrow {
            color: #E5C58E;
            margin-bottom: 15px;
        }

        .library-image-text h2 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(30px, 4vw, 44px);
            line-height: 1.2;
            margin-bottom: 17px;
            color: white;
        }

        .library-image-text p {
            font-size: 15px;
            color: #F7F2E8;
            line-height: 1.8;
        }

        /* FRASE */

        .quote-section {
            padding: 85px 20px;
            text-align: center;
            background: var(--chocolate);
            color: var(--ivory);
        }

        .quote-section .quote-mark {
            color: var(--gold-light);
            font-family: 'Playfair Display', serif;
            font-size: 65px;
            line-height: 1;
        }

        .quote-section blockquote {
            max-width: 750px;
            margin: 15px auto 20px;
            font-family: 'Playfair Display', serif;
            font-size: clamp(24px, 3vw, 35px);
            line-height: 1.4;
        }

        .quote-section p {
            color: var(--gold-light);
            font-size: 12px;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        /* INVITACIÓN */

        .cta {
            padding: 90px 20px;
            text-align: center;
            background: var(--ivory-light);
        }

        .cta h2 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(32px, 4vw, 44px);
            margin-bottom: 15px;
            color: var(--chocolate);
        }

        .cta p {
            max-width: 560px;
            margin: 0 auto 28px;
            color: var(--taupe);
            font-size: 15px;
        }

        /* PIE DE PÁGINA */

        footer {
            background: #302920;
            color: var(--ivory);
            padding: 35px 0;
        }

        .footer-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .footer-logo {
            font-family: 'Playfair Display', serif;
            font-size: 23px;
            font-weight: 700;
        }

        .footer-logo span {
            color: var(--gold-light);
        }

        .footer-content p {
            color: #C9BDA9;
            font-size: 12px;
        }

        .footer-links {
            display: flex;
            gap: 20px;
            font-size: 13px;
            color: #E8DFCE;
        }

        .footer-links a:hover {
            color: var(--gold-light);
        }

        /* RESPONSIVE */

        @media (max-width: 1050px) {
            nav {
                flex-wrap: wrap;
                padding: 15px 0;
            }

            .nav-buttons {
                justify-content: flex-end;
            }
        }

        @media (max-width: 850px) {
            .hero-content {
                grid-template-columns: 1fr;
                gap: 45px;
            }

            .hero {
                padding: 65px 0;
            }

            .book-scene {
                min-height: 320px;
            }

            .benefits-grid,
            .feature-grid {
                grid-template-columns: 1fr 1fr;
            }

            .nav-links {
                display: none;
            }

            .library-image {
                height: 350px;
            }

            .library-image-text {
                left: 35px;
                right: 25px;
            }
        }

        @media (max-width: 560px) {
            nav {
                min-height: 70px;
            }

            .logo {
                font-size: 22px;
            }

            .nav-buttons {
                justify-content: flex-start;
                gap: 7px;
            }

            .nav-buttons .btn {
                padding: 9px 12px;
                font-size: 12px;
            }

            .benefits-grid,
            .feature-grid {
                grid-template-columns: 1fr;
            }

            .hero h1 {
                font-size: 43px;
            }

            .book {
                width: 57px;
                font-size: 13px;
            }

            .footer-content {
                flex-direction: column;
                text-align: center;
            }

            .library-image {
                height: 350px;
            }

            .library-image-text {
                left: 25px;
                right: 20px;
            }

            .library-image-text h2 {
                font-size: 30px;
            }

            .library-image-text p {
                font-size: 13px;
            }

            .library-image-section {
                padding-bottom: 60px;
            }
        }
    </style>
</head>

<body>

    <header>
        <div class="container">
            <nav>

                <a href="{{ url('/') }}" class="logo">
                    Biblio<span>Club.</span>
                </a>

                <div class="nav-links">
                    <a href="#inicio">Inicio</a>
                    <a href="#beneficios">Beneficios</a>
                    <a href="#funciones">Características</a>
                </div>

                <div class="nav-buttons">

                    <a href="{{ route('login') }}" class="btn btn-outline">
                        Iniciar sesión
                    </a>

                    <a href="{{ route('register') }}" class="btn btn-gold">
                        Crear cuenta
                    </a>

                    <a href="{{ route('login') }}" class="btn btn-admin">
                        ♛ Entrar como administrador
                    </a>

                </div>

            </nav>
        </div>
    </header>

    <main>

        <section class="hero" id="inicio">
            <div class="container">
                <div class="hero-content">

                    <div>
                        <div class="eyebrow">
                            Un mundo de historias te espera
                        </div>

                        <h1>
                            Cada libro abre
                            una puerta a <span>nuevos mundos.</span>
                        </h1>

                        <p class="hero-description">
                            Bienvenido a BiblioClub, un espacio diseñado para
                            descubrir libros, gestionar préstamos y compartir
                            el maravilloso hábito de la lectura.
                        </p>

                        <div class="hero-actions">
                            <a href="{{ route('register') }}" class="btn btn-gold">
                                Comenzar ahora →
                            </a>

                            <a href="#funciones" class="btn btn-outline">
                                Conocer más
                            </a>
                        </div>

                        <p class="hero-note">
                            Tu próxima historia favorita comienza aquí.
                        </p>
                    </div>

                    <div class="book-scene">
                        <div class="books">
                            <div class="book">HISTORIAS</div>
                            <div class="book">LECTURA</div>
                            <div class="book">CULTURA</div>
                            <div class="book">SUEÑOS</div>
                        </div>

                        <div class="floating-label">
                            ✦ Descubre. Lee. Comparte.
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section class="benefits" id="beneficios">
            <div class="container">
                <div class="benefits-grid">

                    <div class="benefit">
                        <div class="benefit-icon">📚</div>
                        <div>
                            <h3>Explora libros</h3>
                            <p>
                                Descubre un catálogo organizado para encontrar
                                nuevas lecturas.
                            </p>
                        </div>
                    </div>

                    <div class="benefit">
                        <div class="benefit-icon">🤝</div>
                        <div>
                            <h3>Conecta con la lectura</h3>
                            <p>
                                Participa en una comunidad que disfruta
                                aprender y compartir.
                            </p>
                        </div>
                    </div>

                    <div class="benefit">
                        <div class="benefit-icon">✨</div>
                        <div>
                            <h3>Organiza tu experiencia</h3>
                            <p>
                                Consulta tus préstamos y mantén todo en un
                                mismo lugar.
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section class="features" id="funciones">
            <div class="container">

                <div class="section-heading">
                    <div class="eyebrow">Todo en un solo lugar</div>

                    <h2>Una biblioteca pensada para ti</h2>

                    <p>
                        BiblioClub reúne herramientas que facilitan la
                        administración de una biblioteca y hacen de la lectura
                        una experiencia más sencilla.
                    </p>
                </div>

                <div class="feature-grid">

                    <article class="feature-card">
                        <div class="feature-icon">📖</div>
                        <h3>Catálogo de libros</h3>
                        <p>
                            Consulta los libros disponibles y encuentra
                            información sobre cada ejemplar.
                        </p>
                    </article>

                    <article class="feature-card">
                        <div class="feature-icon">📋</div>
                        <h3>Gestión de préstamos</h3>
                        <p>
                            Lleva un seguimiento organizado de los préstamos
                            y las devoluciones.
                        </p>
                    </article>

                    <article class="feature-card">
                        <div class="feature-icon">👥</div>
                        <h3>Administración de usuarios</h3>
                        <p>
                            Gestiona la información de los usuarios y sus
                            actividades dentro de la biblioteca.
                        </p>
                    </article>

                    <article class="feature-card">
                        <div class="feature-icon">🎭</div>
                        <h3>Actividades</h3>
                        <p>
                            Consulta y organiza actividades para fomentar
                            la cultura y el amor por los libros.
                        </p>
                    </article>

                    <article class="feature-card">
                        <div class="feature-icon">📊</div>
                        <h3>Informes</h3>
                        <p>
                            Accede a información organizada para facilitar
                            el seguimiento de la biblioteca.
                        </p>
                    </article>

                    <article class="feature-card">
                        <div class="feature-icon">🌟</div>
                        <h3>Experiencia sencilla</h3>
                        <p>
                            Disfruta de una plataforma intuitiva, clara
                            y fácil de utilizar.
                        </p>
                    </article>

                </div>
            </div>
        </section>

        <section class="library-image-section">
            <div class="container">
                <div class="library-image">

                    <img
                        src="{{ asset('images/libros.jpg') }}"
                        alt="Interior de una biblioteca">

                    <div class="library-image-text">
                        <div class="eyebrow">Un lugar para descubrir</div>

                        <h2>
                            Un espacio para imaginar, aprender y descubrir.
                        </h2>

                        <p>
                            Cada página es una oportunidad para explorar
                            nuevos conocimientos y vivir grandes historias.
                        </p>
                    </div>

                </div>
            </div>
        </section>

        <section class="quote-section">
            <div class="quote-mark">“</div>

            <blockquote>
                Un libro es un sueño que sostienes entre tus manos.
            </blockquote>

            <p>El placer de descubrir nuevas historias</p>
        </section>

        <section class="cta">
            <div class="container">

                <div class="eyebrow">Tu historia comienza hoy</div>

                <h2>¿Listo para descubrir tu próximo libro?</h2>

                <p>
                    Forma parte de BiblioClub y disfruta de un espacio
                    donde cada lectura representa una nueva oportunidad
                    para aprender, imaginar y crecer.
                </p>

                <a href="{{ route('register') }}" class="btn btn-gold">
                    Crear mi cuenta →
                </a>

            </div>
        </section>

    </main>

    <footer>
        <div class="container">
            <div class="footer-content">

                <div class="footer-logo">
                    Biblio<span>Club.</span>
                </div>

                <p>
                    © {{ date('Y') }} BiblioClub. Todos los derechos reservados.
                </p>

                <div class="footer-links">
                    <a href="#inicio">Inicio</a>
                    <a href="#beneficios">Beneficios</a>
                    <a href="#funciones">Características</a>
                </div>

            </div>
        </div>
    </footer>

</body>
</html>
