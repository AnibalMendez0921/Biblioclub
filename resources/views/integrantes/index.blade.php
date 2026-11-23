<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Préstamos entre integrantes | BiblioClub</title>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">

    <style>
        @include('integrantes._estilos')
    </style>
</head>

<body>

    <header>
        <div class="logo">
            <h1>Biblio<span>Club.</span></h1>
            <p>Préstamos entre integrantes</p>
        </div>

        <nav class="enlaces">
            <a href="{{ route('dashboard') }}">Inicio</a>
            <a href="{{ route('prestamos-integrantes.index') }}">Catálogo de integrantes</a>
            <a href="{{ route('prestamos-integrantes.create') }}">Publicar libro</a>
            <a href="{{ route('prestamos-integrantes.mis-prestamos') }}">
                Mis préstamos
                @if($pendientes > 0)
                    <span class="insignia">{{ $pendientes }}</span>
                @endif
            </a>
        </nav>
    </header>

    <main>

        @if(session('success'))
            <div class="mensaje mensaje-exito">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="mensaje mensaje-error">{{ session('error') }}</div>
        @endif

        <section class="introduccion">
            <span class="etiqueta">✦ BIBLIOTECA COMUNITARIA</span>
            <h2>Libros de nuestros integrantes</h2>
            <p>
                Aquí aparecen los libros personales que los integrantes del club
                quieren compartir. No son los libros de la biblioteca: cada uno
                pertenece a quien lo publica.
            </p>
        </section>

        <div class="botones">
            <a href="{{ route('prestamos-integrantes.create') }}" class="btn">+ Publicar libro</a>
            <a href="{{ route('prestamos-integrantes.mis-prestamos') }}" class="btn btn-secundario">Mis préstamos</a>
        </div>

        <form action="{{ route('prestamos-integrantes.index') }}" method="GET" class="buscador">
            <input type="text" name="buscar" placeholder="Buscar por título, autor o género..." value="{{ $buscar ?? '' }}">

            <select name="genero">
                <option value="">Todos los géneros</option>
                @foreach($generos as $g)
                    <option value="{{ $g }}" @selected(($genero ?? '') === $g)>{{ $g }}</option>
                @endforeach
            </select>

            <button type="submit" class="btn">Buscar</button>

            @if(!empty($buscar) || !empty($genero))
                <a href="{{ route('prestamos-integrantes.index') }}" class="btn btn-secundario">Limpiar</a>
            @endif
        </form>

        <div class="resumen">
            Libros disponibles para prestar: <strong>{{ $libros->count() }}</strong>
        </div>

        <div class="libros">

            @forelse($libros as $libro)

                <article class="libro-card">

                    <div class="portada">
                        @if($libro->portada)
                            <img src="{{ asset($libro->portada) }}" alt="Portada de {{ $libro->titulo }}">
                        @else
                            <span class="icono">📖</span>
                        @endif
                    </div>

                    <div class="libro-info">
                        <span class="genero">{{ $libro->genero }}</span>

                        <h3>{{ $libro->titulo }}</h3>
                        <p class="autor">Por {{ $libro->autor }}</p>

                        <p class="publicado">
                            Publicado por: <strong>{{ $libro->propietario->name ?? 'Integrante' }}</strong>
                        </p>

                        <div class="fila-estado">
                            <span>Estado</span>
                            <span class="ok">Disponible</span>
                        </div>

                        <details>
                            <summary>Ver detalles</summary>

                            <div class="detalles">
                                <p>
                                    <strong>Descripción:</strong><br>
                                    {{ $libro->descripcion ?: 'El propietario no agregó una descripción.' }}
                                </p>
                                <p>
                                    <strong>Condiciones del préstamo:</strong><br>
                                    {{ $libro->condiciones ?: 'Sin condiciones especiales.' }}
                                </p>
                            </div>
                        </details>

                        @if($libro->user_id == auth()->id())

                            <p class="suyo">
                                Este libro es tuyo.
                                <a href="{{ route('prestamos-integrantes.edit', $libro) }}">Editar publicación</a>
                            </p>

                        @else

                            <details>
                                <summary class="principal">Solicitar préstamo</summary>

                                <form action="{{ route('prestamos-integrantes.solicitar', $libro) }}" method="POST">
                                    @csrf

                                    <textarea
                                        name="mensaje"
                                        rows="3"
                                        maxlength="500"
                                        placeholder="Mensaje para el propietario (opcional)"
                                    ></textarea>

                                    <button type="submit" class="btn">Enviar solicitud</button>
                                </form>
                            </details>

                        @endif
                    </div>
                </article>

            @empty

                <div class="vacio">
                    <span style="font-size:45px">📚</span>
                    <h3>Aún no hay libros publicados</h3>
                    <p>
                        @if(!empty($buscar) || !empty($genero))
                            Prueba con otra búsqueda u otro género.
                        @else
                            Sé el primero en compartir un libro con el club.
                        @endif
                    </p>
                </div>

            @endforelse

        </div>

    </main>

    <footer>
        BiblioClub · Un espacio para descubrir, aprender y compartir.
    </footer>

</body>
</html>