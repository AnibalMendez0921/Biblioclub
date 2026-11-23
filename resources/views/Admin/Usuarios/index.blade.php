<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios | BiblioClub</title>

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
        }

        header {
            background: var(--chocolate);
            color: var(--ivory);
            padding: 20px 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .logo {
            font-family: 'Playfair Display', serif;
            font-size: 26px;
            font-weight: 700;
            color: var(--ivory);
        }

        .logo span {
            color: var(--gold-light);
        }

        header a {
            color: var(--ivory);
            text-decoration: none;
            margin-left: 18px;
            font-size: 14px;
            transition: .2s;
        }

        header a:hover {
            color: var(--gold-light);
        }

        .contenedor {
            width: 90%;
            max-width: 1150px;
            margin: 35px auto;
        }

        .encabezado {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
            margin-bottom: 25px;
        }

        h1 {
            margin: 0 0 8px;
            font-family: 'Playfair Display', serif;
            color: var(--chocolate);
            font-size: 30px;
        }

        .descripcion {
            margin: 0;
            color: var(--taupe);
            font-size: 14px;
        }

        .boton {
            display: inline-block;
            background: var(--gold-dark);
            color: var(--white);
            padding: 10px 15px;
            border-radius: 7px;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: .2s;
        }

        .boton:hover {
            background: var(--gold);
        }

        .resumen {
            background: var(--ivory-light);
            border: 1px solid var(--beige);
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 22px;
            box-shadow: 0 8px 24px rgba(59, 51, 41, .04);
        }

        .resumen p {
            color: var(--taupe);
            margin: 0 0 8px;
            font-size: 14px;
        }

        .resumen strong {
            color: var(--chocolate);
            font-size: 28px;
        }

        .buscador {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin-bottom: 18px;
        }

        .buscador input {
            flex: 1;
            min-width: 240px;
            padding: 11px 14px;
            border: 1px solid #DCD2C1;
            border-radius: 7px;
            background: var(--white);
            color: var(--chocolate);
            font-family: inherit;
            font-size: 14px;
            outline: none;
        }

        .buscador input:focus {
            border-color: var(--gold);
            box-shadow: 0 0 0 3px rgba(184, 154, 102, .12);
        }

        .boton-secundario {
            background: var(--beige);
            color: var(--chocolate);
        }

        .boton-secundario:hover {
            background: var(--gold-light);
        }

        .resultado-busqueda {
            color: var(--taupe);
            font-size: 14px;
            margin: 0 0 18px;
        }

        .mensaje {
            padding: 14px 18px;
            border-radius: 7px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .exito {
            background: #E8F2E6;
            color: #365934;
            border: 1px solid #C6DEC2;
        }

        .error {
            background: #FCE8E6;
            color: #A83228;
            border: 1px solid #F3C7C3;
        }

        .tabla-contenedor {
            background: var(--ivory-light);
            border: 1px solid var(--beige);
            border-radius: 10px;
            overflow-x: auto;
            box-shadow: 0 8px 24px rgba(59, 51, 41, .04);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 850px;
        }

        th, td {
            padding: 16px 18px;
            text-align: left;
            border-bottom: 1px solid var(--beige);
            font-size: 14px;
        }

        th {
            background: #F3EDE0;
            color: var(--chocolate);
            font-weight: 700;
        }

        tbody tr:hover {
            background: #F9F5EC;
        }

        tr:last-child td {
            border-bottom: none;
        }

        .formulario-rol {
            display: flex;
            align-items: center;
            gap: 8px;
            flex-wrap: wrap;
        }

        select {
            padding: 9px 10px;
            border: 1px solid #DCD2C1;
            border-radius: 6px;
            background: var(--white);
            color: var(--chocolate);
            font-family: inherit;
            font-size: 13px;
            outline: none;
        }

        select:focus {
            border-color: var(--gold);
        }

        .rol-propio {
            display: inline-block;
            background: #F3EDE0;
            color: var(--gold-dark);
            border: 1px solid var(--gold-light);
            padding: 7px 11px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .vacio {
            padding: 35px;
            text-align: center;
            color: var(--taupe);
        }

        footer {
            text-align: center;
            padding: 25px;
            color: var(--taupe);
            font-size: 13px;
        }

        @media (max-width: 600px) {
            header {
                padding: 18px 5%;
            }

            header a {
                margin-left: 0;
                margin-right: 12px;
            }

            .contenedor {
                width: 92%;
                margin-top: 25px;
            }

            h1 {
                font-size: 25px;
            }

            .buscador input {
                min-width: 100%;
            }
        }
    </style>
</head>
<body>

    <header>
        <div class="logo">Biblio<span>Club</span></div>

        <nav>
            <a href="{{ route('admin') }}">Panel de administración</a>
            <a href="{{ route('libros.index') }}">Catálogo</a>
            <a href="{{ route('dashboard') }}">Mi cuenta</a>
        </nav>
    </header>

    <main class="contenedor">
        <div class="encabezado">
            <div>
                <h1>Usuarios registrados</h1>
                <p class="descripcion">
                    Consulta las cuentas registradas y administra sus roles.
                </p>
            </div>

            <a href="{{ route('admin') }}" class="boton">Volver al panel</a>
        </div>

        @if (session('success'))
            <div class="mensaje exito">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="mensaje error">
                {{ session('error') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mensaje error">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <section class="resumen">
            <p>
                {{ $busqueda ? 'Usuarios encontrados' : 'Total de usuarios registrados' }}
            </p>
            <strong>{{ $usuarios->count() }}</strong>
        </section>

        <form action="{{ route('admin.usuarios.index') }}" method="GET" class="buscador">
            <input
                type="text"
                name="buscar"
                value="{{ $busqueda ?? '' }}"
                placeholder="Buscar por nombre o correo electrónico..."
                aria-label="Buscar usuarios por nombre o correo electrónico"
            >

            <button type="submit" class="boton">Buscar</button>

            @if ($busqueda)
                <a href="{{ route('admin.usuarios.index') }}" class="boton boton-secundario">
                    Limpiar
                </a>
            @endif
        </form>

        @if ($busqueda)
            <p class="resultado-busqueda">
                Resultados para: <strong>{{ $busqueda }}</strong>
                — {{ $usuarios->count() }} usuario(s) encontrado(s).
            </p>
        @endif

        <section class="tabla-contenedor">
            @if ($usuarios->isNotEmpty())
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Correo electrónico</th>
                            <th>Rol actual</th>
                            <th>Cambiar rol</th>
                            <th>Fecha de registro</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($usuarios as $usuario)
                            <tr>
                                <td>{{ $usuario->id }}</td>
                                <td>{{ $usuario->name }}</td>
                                <td>{{ $usuario->email }}</td>

                                <td>
                                    {{ $usuario->getRoleNames()->join(', ') ?: 'Sin rol asignado' }}
                                </td>

                                <td>
                                    @if ($usuario->id === auth()->id())
                                        <span class="rol-propio">Tu cuenta</span>
                                    @elseif ($roles->isNotEmpty())
                                        <form
                                            action="{{ route('admin.usuarios.actualizarRol', $usuario) }}"
                                            method="POST"
                                            class="formulario-rol"
                                        >
                                            @csrf
                                            @method('PATCH')

                                            <select name="rol" required>
                                                @foreach ($roles as $rol)
                                                    <option
                                                        value="{{ $rol->name }}"
                                                        @selected($usuario->hasRole($rol->name))
                                                    >
                                                        {{ $rol->name }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            <button type="submit" class="boton">
                                                Guardar
                                            </button>
                                        </form>
                                    @else
                                        <span>Sin roles disponibles</span>
                                    @endif
                                </td>

                                <td>
                                    {{ $usuario->created_at?->format('d/m/Y') ?? 'No disponible' }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="vacio">
                    @if ($busqueda)
                        No se encontraron usuarios que coincidan con la búsqueda.
                    @else
                        No hay usuarios registrados para mostrar.
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
