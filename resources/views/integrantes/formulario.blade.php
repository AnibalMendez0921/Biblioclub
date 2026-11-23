<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $libro ? 'Editar publicación' : 'Publicar libro' }} | BiblioClub</title>

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
            <a href="{{ route('prestamos-integrantes.mis-prestamos') }}">Mis préstamos</a>
        </nav>
    </header>

    <main>

        @if(session('error'))
            <div class="mensaje mensaje-error">{{ session('error') }}</div>
        @endif

        @if($errors->any())
            <div class="mensaje mensaje-error">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <section class="introduccion">
            <span class="etiqueta">✦ COMPARTE TU LIBRO</span>
            <h2>{{ $libro ? 'Editar publicación' : 'Publicar un libro' }}</h2>
            <p>
                Ofrece un libro tuyo a los demás integrantes. Publicarlo no significa
                que ya esté prestado: tú decides a quién se lo prestas.
            </p>
        </section>

        <form
            class="form-card"
            method="POST"
            enctype="multipart/form-data"
            action="{{ $libro ? route('prestamos-integrantes.update', $libro) : route('prestamos-integrantes.store') }}"
        >
            @csrf
            @if($libro)
                @method('PUT')
            @endif

            <div class="campo">
                <label for="titulo">Título</label>
                <input type="text" id="titulo" name="titulo" value="{{ old('titulo', $libro?->titulo) }}" required maxlength="255">
            </div>

            <div class="campo">
                <label for="autor">Autor</label>
                <input type="text" id="autor" name="autor" value="{{ old('autor', $libro?->autor) }}" required maxlength="255">
            </div>

            <div class="campo">
                <label for="genero">Género</label>
                <input type="text" id="genero" name="genero" value="{{ old('genero', $libro?->genero) }}" required maxlength="255" placeholder="Ej: Fantasía, Infantil, Drama...">
            </div>

            <div class="campo">
                <label for="descripcion">Descripción <small>(opcional)</small></label>
                <textarea id="descripcion" name="descripcion" rows="4" maxlength="2000">{{ old('descripcion', $libro?->descripcion) }}</textarea>
            </div>

            <div class="campo">
                <label for="condiciones">Condiciones del préstamo <small>(opcional)</small></label>
                <textarea id="condiciones" name="condiciones" rows="3" maxlength="1000" placeholder="Ej: Entrega en persona, máximo 15 días, cuidar las hojas...">{{ old('condiciones', $libro?->condiciones) }}</textarea>
            </div>

            <div class="campo">
                <label for="portada">Portada <small>(opcional, máximo 2 MB)</small></label>

                @if($libro?->portada)
                    <img src="{{ asset($libro->portada) }}" alt="Portada actual" class="portada-actual">
                @endif

                <input type="file" id="portada" name="portada" accept="image/*">
            </div>

            <div class="botones">
                <button type="submit" class="btn">
                    {{ $libro ? 'Guardar cambios' : 'Publicar en el catálogo' }}
                </button>

                <a href="{{ route('prestamos-integrantes.index') }}" class="btn btn-secundario">Cancelar</a>
            </div>
        </form>

    </main>

    <footer>
        BiblioClub · Un espacio para descubrir, aprender y compartir.
    </footer>

</body>
</html>