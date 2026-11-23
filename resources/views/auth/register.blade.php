
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear cuenta | BiblioClub</title>

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
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            min-height: 100vh;
            font-family: 'DM Sans', sans-serif;
            background: var(--ivory);
            color: var(--chocolate);
            display: flex;
            flex-direction: column;
        }

        header {
            background: var(--chocolate);
            color: var(--ivory-light);
            padding: 20px 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
            box-shadow: 0 4px 18px rgba(59, 51, 41, 0.12);
        }

        .logo {
            font-family: 'Playfair Display', serif;
            font-size: 29px;
            font-weight: 700;
            letter-spacing: 0.3px;
        }

        .logo span {
            color: var(--gold-light);
        }

        .subtitle {
            font-size: 13px;
            color: var(--gold-light);
            margin-top: 5px;
            letter-spacing: 0.4px;
        }

        .button {
            display: inline-block;
            padding: 12px 19px;
            border-radius: 8px;
            background: var(--gold);
            color: var(--chocolate);
            text-decoration: none;
            font-size: 14px;
            font-weight: 700;
            border: 1px solid var(--gold);
            cursor: pointer;
            transition: all 0.25s ease;
        }

        .button:hover {
            background: var(--gold-dark);
            border-color: var(--gold-dark);
            color: var(--white);
            transform: translateY(-2px);
        }

        .button-outline {
            background: transparent;
            border-color: var(--gold-light);
            color: var(--ivory-light);
        }

        .button-outline:hover {
            background: var(--gold);
            border-color: var(--gold);
            color: var(--chocolate);
        }

        main {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 45px 20px;
            background:
                radial-gradient(circle at top left, rgba(216, 196, 158, 0.22), transparent 35%),
                var(--ivory);
        }

        .register-container {
            width: 100%;
            max-width: 480px;
        }

        .intro {
            text-align: center;
            margin-bottom: 27px;
        }

        .icon {
            width: 72px;
            height: 72px;
            background: var(--beige);
            border: 1px solid var(--gold-light);
            border-radius: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 auto 20px;
            font-size: 34px;
            box-shadow: 0 5px 15px rgba(146, 117, 72, 0.10);
        }

        .intro h1 {
            font-family: 'Playfair Display', serif;
            color: var(--chocolate);
            font-size: 30px;
            font-weight: 600;
            margin-bottom: 12px;
        }

        .intro p {
            color: var(--taupe);
            font-size: 14px;
            line-height: 1.7;
        }

        .form-card {
            background: var(--ivory-light);
            padding: 35px;
            border: 1px solid var(--beige);
            border-radius: 17px;
            box-shadow: 0 12px 35px rgba(59, 51, 41, 0.08);
        }

        .field {
            margin-bottom: 21px;
        }

        label {
            display: block;
            color: var(--chocolate);
            font-weight: 700;
            font-size: 14px;
            margin-bottom: 9px;
        }

        input {
            width: 100%;
            padding: 14px 15px;
            border: 1px solid var(--beige);
            border-radius: 9px;
            background: var(--white);
            color: var(--chocolate);
            font-family: 'DM Sans', sans-serif;
            font-size: 14px;
            outline: none;
            transition: all 0.2s ease;
        }

        input::placeholder {
            color: #AAA194;
        }

        input:focus {
            border-color: var(--gold);
            box-shadow: 0 0 0 3px rgba(184, 154, 102, 0.15);
        }

        .submit {
            width: 100%;
            padding: 15px;
            font-size: 15px;
            font-weight: 700;
            margin-top: 5px;
            letter-spacing: 0.2px;
        }

        .error {
            color: #B42318;
            font-size: 13px;
            margin-top: 7px;
        }

        .errors {
            padding: 14px 15px;
            background: #FDECEA;
            border: 1px solid #F2C6C2;
            color: #B42318;
            border-radius: 9px;
            margin-bottom: 22px;
            font-size: 13px;
            line-height: 1.7;
        }

        .errors ul {
            padding-left: 20px;
            margin-top: 7px;
        }

        .login-link {
            text-align: center;
            margin-top: 25px;
            color: var(--taupe);
            font-size: 14px;
        }

        .login-link a {
            color: var(--gold-dark);
            font-weight: 700;
            text-decoration: none;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        .note {
            color: var(--taupe);
            font-size: 12px;
            line-height: 1.7;
            margin-top: 19px;
            text-align: center;
        }

        footer {
            text-align: center;
            padding: 23px;
            background: var(--chocolate);
            color: var(--gold-light);
            font-size: 12px;
            letter-spacing: 0.3px;
        }

        @media (max-width: 480px) {
            header {
                padding: 18px 20px;
            }

            .form-card {
                padding: 26px 21px;
            }

            .intro h1 {
                font-size: 25px;
            }
        }
    </style>
</head>

<body>

    <header>
        <div>
            <div class="logo">Biblio<span>Club</span></div>
            <p class="subtitle">Tu biblioteca y club de lectura</p>
        </div>

        <a href="{{ url('/') }}" class="button button-outline">
            Volver al inicio
        </a>
    </header>

    <main>
        <div class="register-container">

            <section class="intro">
                <div class="icon">📖</div>

                <h1>Únete a BiblioClub</h1>

                <p>
                    Crea tu cuenta para explorar libros, solicitar préstamos
                    y participar en las actividades del club.
                </p>
            </section>

            <section class="form-card">

                @if ($errors->any())
                    <div class="errors">
                        <strong>No se pudo completar el registro.</strong>

                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="field">
                        <label for="name">Nombre completo</label>

                        <input
                            id="name"
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            required
                            autofocus
                            autocomplete="name"
                            placeholder="Escribe tu nombre completo"
                        >

                        @error('name')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="email">Correo electrónico</label>

                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autocomplete="username"
                            placeholder="tucorreo@ejemplo.com"
                        >

                        @error('email')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="password">Contraseña</label>

                        <input
                            id="password"
                            type="password"
                            name="password"
                            required
                            autocomplete="new-password"
                            placeholder="Crea una contraseña"
                        >

                        @error('password')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="password_confirmation">
                            Confirmar contraseña
                        </label>

                        <input
                            id="password_confirmation"
                            type="password"
                            name="password_confirmation"
                            required
                            autocomplete="new-password"
                            placeholder="Escribe nuevamente tu contraseña"
                        >
                    </div>

                    <button type="submit" class="button submit">
                        Crear mi cuenta
                    </button>
                </form>

                <p class="note">
                    Al registrarte, podrás acceder a las funciones
                    disponibles para los lectores de BiblioClub.
                </p>

            </section>

            <div class="login-link">
                ¿Ya tienes una cuenta?
                <a href="{{ route('login') }}">Inicia sesión</a>
            </div>

        </div>
    </main>

    <footer>
        BiblioClub · Tu espacio para leer y compartir
    </footer>

</body>
</html>
