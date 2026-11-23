<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar libro | BiblioClub</title>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

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
        }

        body {
            font-family: 'DM Sans', sans-serif;
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
            gap: 15px;
            flex-wrap: wrap;
        }

        .logo {
            font-family: 'Playfair Display', serif;
            font-size: 29px;
            font-weight: 700;
        }

        .logo span {
            color: var(--gold-light);
        }

        .subtitle {
            margin-top: 5px;
            color: #D5CBBB;
            font-size: 12px;
            letter-spacing: 1px;
        }

        .button {
            display: inline-block;
            padding: 12px 19px;
            border: none;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            transition: .2s;
        }

        .button-primary {
            background: var(--gold-dark);
            color: white;
        }

        .button-primary:hover {
            background: var(--gold);
        }

        .button-secondary {
            background: transparent;
            border: 1px solid #CFC3AF;
            color: var(--chocolate);
        }

        .button-secondary:hover {
            background: var(--beige);
        }

        .button-light {
            color: var(--ivory);
            border: 1px solid var(--gold-light);
            background: transparent;
        }

        .button-light:hover {
            background: var(--chocolate-light);
        }

        .container {
            max-width: 900px;
            margin: 42px auto;
            padding: 0 22px;
        }

        .heading {
            margin-bottom: 25px;
        }

        .eyebrow {
            color: var(--gold-dark);
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 11px;
            font-weight: 700;
            margin-bottom: 9px;
        }

        h1 {
            font-family: 'Playfair Display', serif;
            color: var(--chocolate);
            font-size: 35px;
            margin-bottom: 9px;
        }

        .description {
            color: var(--taupe);
            font-size: 14px;
            line-height: 1.7;
        }

        .book-code {
            display: inline-block;
            margin-top: 17px;
            padding: 8px 13px;
            background: #EEE5D4;
            color: var(--gold-dark);
            border-radius: 5px;
            font-size: 12px;
            font-weight: 700;
        }

        .form-card {
            background: var(--ivory-light);
            border: 1px solid var(--beige);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 12px 35px rgba(59,51,41,.06);
        }

        .form-header {
            padding: 23px 28px;
            background: #F3EDE0;
            border-bottom: 1px solid var(--beige);
        }

        .form-header h2 {
            font-family: 'Playfair Display', serif;
            font-size: 21px;
        }

        .form-header p {
            color: var(--taupe);
            font-size: 13px;
            margin-top: 6px;
        }

        .form-body {
            padding: 28px;
        }

        .section-title {
            font-family: 'Playfair Display', serif;
            font-size: 19px;
            margin: 15px 0 22px;
            padding-bottom: 12px;
            border-bottom: 1px solid var(--beige);
        }

        .form-group {
            margin-bottom: 22px;
        }

        label {
            display: block;
            color: var(--chocolate);
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 9px;
        }

        input, textarea {
            width: 100%;
            padding: 13px 14px;
            border: 1px solid #DCD2C1;
            border-radius: 6px;
            background: white;
            color: var(--chocolate);
            font-family: 'DM Sans', sans-serif;
            font-size: 14px;
            outline: none;
        }

        input:focus, textarea:focus {
            border-color: var(--gold);
            box-shadow: 0 0 0 3px rgba(184,154,102,.12);
        }

        textarea {
            min-height: 125px;
            resize: vertical;
            line-height: 1.6;
        }

        .help {
            display: block;
            color: var(--taupe);
            font-size: 12px;
            margin-top: 8px;
            line-height: 1.5;
        }

        .error {
            color: #B42318;
            font-size: 12px;
            margin-top: 7px;
        }

        .alert-error {
            background: #FCE8E6;
            color: #A83228;
            border: 1px solid #F3C7C3;
            border-radius: 8px;
            padding: 15px 18px;
            margin-bottom: 20px;
            font-size: 13px;
        }

        .alert-error ul {
            padding-left: 20px;
            margin-top: 8px;
        }

        .upload-box {
            background: #F9F5EC;
            border: 1px dashed var(--gold);
            border-radius: 8px;
            padding: 22px;
            text-align: center;
        }

        .upload-box input {
            margin-top: 15px;
            background: white;
        }

        .current-cover {
            width: 125px;
            height: 170px;
            object-fit: cover;
            border-radius: 5px;
            margin: 10px auto 15px;
            display: block;
            box-shadow: 0 5px 15px rgba(0,0,0,.12);
        }

        .preview {
            display: none;
            width: 125px;
            height: 170px;
            object-fit: cover;
            border-radius: 5px;
            margin: 18px auto 0;
            box-shadow: 0 5px 15px rgba(0,0,0,.12);
        }

        .form-footer {
            background: #F3EDE0;
            border-top: 1px solid var(--beige);
            padding: 21px 28px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .form-footer p {
            color: var(--taupe);
            font-size: 12px;
        }

        .form-actions {
            display: flex;
            gap: 10px;
        }

        footer {
            text-align: center;
            color: var(--taupe);
            font-size: 12px;
            padding: 28px 15px;
        }

        @media(max-width:600px) {
            header {
                padding: 20px;
            }

            .container {
                padding: 0 14px;
                margin: 28px auto;
            }

            h1 {
                font-size: 29px;
            }

            .form-body {
                padding: 22px 18px;
            }

            .form-footer {
                padding: 18px;
                align-items: flex-start;
            }

            .form-actions {
                width: 100%;
            }

            .form-actions .button {
                flex: 1;
                text-align: center;
            }
        }
    </style>
</head>

<body>

<header>
    <div>
        <div class="logo">Biblio<span>Club</span></div>
        <p class="subtitle">GESTIÓN DEL CATÁLOGO BIBLIOTECARIO</p>
    </div>

    <a href="{{ route('libros.index') }}" class="button button-light">
        ← Volver al catálogo
    </a>
</header>

<main class="container">

    <section class="heading">
        <p class="eyebrow">Administración de la colección</p>
        <h1>Editar libro</h1>

        <p class="description">
            Actualiza los datos, la portada y la descripción de esta obra.
        </p>

        <span class="book-code">
            CÓDIGO DEL LIBRO: {{ $libro->id }}
        </span>
    </section>

    @if ($errors->any())
        <div class="alert-error">
            <strong>No se pudieron guardar los cambios.</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <section class="form-card">

        <div class="form-header">
            <h2>Información de la obra</h2>
            <p>Modifica los campos que necesites.</p>
        </div>

        <form action="{{ route('libros.update', $libro) }}"
              method="POST" enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="form-body">

                <h3 class="section-title">01. Datos generales</h3>

                <div class="form-group">
                    <label for="titulo">Título del libro</label>
                    <input type="text" id="titulo" name="titulo"
                        value="{{ old('titulo', $libro->titulo) }}"
                        maxlength="255" required>
                    @error('titulo')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="autor">Autor</label>
                    <input type="text" id="autor" name="autor"
                        value="{{ old('autor', $libro->autor) }}"
                        maxlength="255" required>
                    @error('autor')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="genero">Género literario</label>
                    <input type="text" id="genero" name="genero"
                        value="{{ old('genero', $libro->genero) }}"
                        maxlength="100" required>
                    @error('genero')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="cantidad_total">Cantidad total de ejemplares</label>
                    <input type="number" id="cantidad_total"
                        name="cantidad_total"
                        value="{{ old('cantidad_total', $libro->cantidad_total) }}"
                        min="1" max="100000" required>

                    <span class="help">
                        Incluye todos los ejemplares, tanto disponibles como prestados.
                        La cantidad disponible se calcula automáticamente.
                    </span>

                    @error('cantidad_total')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>

                <h3 class="section-title">02. Presentación del libro</h3>

                <div class="form-group">
                    <label>Portada actual</label>

                    <div class="upload-box">

                        @if ($libro->portada)
                            <img
                                src="{{ asset($libro->portada) }}"
                                class="current-cover"
                                alt="Portada actual del libro"
                            >
                        @else
                            <p>No hay una portada registrada todavía.</p>
                        @endif

                        <label for="portada">Seleccionar una nueva portada</label>

                        <input type="file" id="portada" name="portada"
                            accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp">

                        <img id="preview" class="preview" alt="Vista previa de nueva portada">

                        <span class="help">
                            Si no seleccionas otra imagen, se conservará la portada actual.
                            Formatos JPG, PNG o WEBP. Máximo 2 MB.
                        </span>
                    </div>

                    @error('portada')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="sinopsis">Sinopsis del libro</label>

                    <textarea id="sinopsis" name="sinopsis"
                        placeholder="Escribe una descripción del libro...">{{ old('sinopsis', $libro->sinopsis) }}</textarea>

                    @error('sinopsis')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            <div class="form-footer">
                <p>Comprueba los cambios antes de guardar.</p>

                <div class="form-actions">
                    <a href="{{ route('libros.index') }}"
                       class="button button-secondary">
                        Cancelar
                    </a>

                    <button type="submit" class="button button-primary">
                        Guardar cambios
                    </button>
                </div>
            </div>

        </form>
    </section>

</main>

<footer>
    BiblioClub · Un espacio para descubrir nuevas historias
</footer>

<script>
    const portada = document.getElementById('portada');
    const preview = document.getElementById('preview');

    portada.addEventListener('change', function () {
        const archivo = this.files[0];

        if (archivo) {
            preview.src = URL.createObjectURL(archivo);
            preview.style.display = 'block';
        } else {
            preview.removeAttribute('src');
            preview.style.display = 'none';
        }
    });
</script>

</body>
</html>

