<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar libro | BiblioClub</title>

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
            --white: #FFFFFF;
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
            color: #D5CBBB;
            font-size: 12px;
            margin-top: 5px;
            letter-spacing: 1px;
        }

        .button {
            display: inline-block;
            padding: 12px 19px;
            border-radius: 6px;
            border: none;
            background: var(--gold-dark);
            color: white;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: .2s;
        }

        .button:hover {
            background: var(--gold);
        }

        .button-light {
            background: transparent;
            border: 1px solid var(--gold-light);
            color: var(--ivory);
        }

        .button-light:hover {
            background: var(--chocolate-light);
        }

        .container {
            max-width: 950px;
            margin: 45px auto;
            padding: 0 22px;
        }

        .heading {
            margin-bottom: 27px;
        }

        .eyebrow {
            color: var(--gold-dark);
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 11px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .heading h1 {
            font-family: 'Playfair Display', serif;
            font-size: 36px;
            color: var(--chocolate);
            margin-bottom: 9px;
        }

        .heading p {
            color: var(--taupe);
            font-size: 14px;
            line-height: 1.7;
        }

        .form-card {
            background: var(--ivory-light);
            border: 1px solid var(--beige);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 12px 35px rgba(59, 51, 41, .06);
        }

        .form-header {
            padding: 25px 30px;
            border-bottom: 1px solid var(--beige);
            background: #F3EDE0;
        }

        .form-header h2 {
            font-family: 'Playfair Display', serif;
            font-size: 22px;
            margin-bottom: 7px;
        }

        .form-header p {
            color: var(--taupe);
            font-size: 13px;
        }

        .form-body {
            padding: 30px;
        }

        .form-group {
            margin-bottom: 23px;
        }

        label {
            display: block;
            font-size: 13px;
            font-weight: 700;
            color: var(--chocolate);
            margin-bottom: 9px;
        }

        .required {
            color: #A34F40;
        }

        input, textarea {
            width: 100%;
            padding: 13px 15px;
            border: 1px solid #DCD2C1;
            border-radius: 6px;
            background: white;
            color: var(--chocolate);
            font-family: 'DM Sans', sans-serif;
            font-size: 14px;
            outline: none;
            transition: .2s;
        }

        input:focus, textarea:focus {
            border-color: var(--gold);
            box-shadow: 0 0 0 3px rgba(184, 154, 102, .12);
        }

        input::placeholder, textarea::placeholder {
            color: #AAA092;
        }

        textarea {
            min-height: 130px;
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
            margin-bottom: 22px;
            font-size: 13px;
        }

        .alert-error ul {
            padding-left: 20px;
            margin-top: 8px;
        }

        .section-label {
            font-family: 'Playfair Display', serif;
            font-size: 19px;
            margin: 30px 0 20px;
            padding-bottom: 12px;
            border-bottom: 1px solid var(--beige);
        }

        .grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .upload-box {
            border: 1px dashed var(--gold);
            background: #F9F5EC;
            border-radius: 8px;
            padding: 23px;
            text-align: center;
        }

        .upload-icon {
            font-size: 30px;
            margin-bottom: 10px;
        }

        .upload-box input {
            background: white;
            margin-top: 13px;
        }

        .preview {
            display: none;
            margin: 18px auto 0;
            width: 125px;
            height: 170px;
            object-fit: cover;
            border-radius: 5px;
            box-shadow: 0 5px 15px rgba(0,0,0,.12);
        }

        .form-footer {
            background: #F3EDE0;
            border-top: 1px solid var(--beige);
            padding: 22px 30px;
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

        .actions {
            display: flex;
            gap: 10px;
        }

        .button-cancel {
            background: transparent;
            color: var(--chocolate);
            border: 1px solid #CFC3AF;
        }

        .button-cancel:hover {
            background: var(--beige);
        }

        footer {
            text-align: center;
            padding: 25px;
            color: var(--taupe);
            font-size: 12px;
        }

        @media (max-width: 650px) {
            header {
                padding: 20px;
            }

            .container {
                margin: 30px auto;
                padding: 0 14px;
            }

            .heading h1 {
                font-size: 29px;
            }

            .form-body {
                padding: 22px 18px;
            }

            .form-header {
                padding: 20px 18px;
            }

            .grid {
                grid-template-columns: 1fr;
                gap: 0;
            }

            .form-footer {
                padding: 18px;
                align-items: flex-start;
            }

            .actions {
                width: 100%;
            }

            .actions .button {
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
        <p class="eyebrow">Colección bibliotecaria</p>
        <h1>Registrar un libro</h1>
        <p>
            Incorpora una nueva obra a BiblioClub. Añade sus datos,
            una portada y una breve descripción para que los lectores
            puedan conocerla.
        </p>
    </section>

    @if ($errors->any())
        <div class="alert-error">
            <strong>No se pudo registrar el libro.</strong>
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
            <p>Los campos marcados con * son obligatorios.</p>
        </div>

        <form action="{{ route('libros.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-body">

                <h3 class="section-label">01. Datos generales</h3>

                <div class="form-group">
                    <label for="titulo">Título del libro <span class="required">*</span></label>
                    <input type="text" id="titulo" name="titulo"
                        value="{{ old('titulo') }}" maxlength="255"
                        placeholder="Ej. Cien años de soledad" required>
                    @error('titulo') <p class="error">{{ $message }}</p> @enderror
                </div>

                <div class="grid">
                    <div class="form-group">
                        <label for="autor">Autor <span class="required">*</span></label>
                        <input type="text" id="autor" name="autor"
                            value="{{ old('autor') }}" maxlength="255"
                            placeholder="Nombre del autor" required>
                        @error('autor') <p class="error">{{ $message }}</p> @enderror
                    </div>

                    <div class="form-group">
                        <label for="genero">Género literario <span class="required">*</span></label>
                        <input type="text" id="genero" name="genero"
                            value="{{ old('genero') }}" maxlength="100"
                            placeholder="Ej. Infantil, novela, historia" required>
                        @error('genero') <p class="error">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="cantidad_total">Cantidad de ejemplares <span class="required">*</span></label>
                    <input type="number" id="cantidad_total" name="cantidad_total"
                        value="{{ old('cantidad_total', 1) }}"
                        min="1" max="100000" required>
                    <span class="help">
                        Número total de ejemplares físicos. Inicialmente todos quedarán disponibles.
                    </span>
                    @error('cantidad_total') <p class="error">{{ $message }}</p> @enderror
                </div>

                <h3 class="section-label">02. Presentación del libro</h3>

                <div class="form-group">
                    <label for="portada">Portada del libro</label>

                    <div class="upload-box">
                        <div class="upload-icon">📚</div>
                        <strong>Selecciona la imagen de portada</strong>
                        <p class="help">Formatos JPG, PNG o WEBP. Máximo 2 MB.</p>

                        <input type="file" id="portada" name="portada"
                            accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp">

                        <img id="preview" class="preview" alt="Vista previa de portada">
                    </div>

                    @error('portada') <p class="error">{{ $message }}</p> @enderror
                </div>

                <div class="form-group">
                    <label for="sinopsis">Sinopsis del libro</label>
                    <textarea id="sinopsis" name="sinopsis"
                        placeholder="Escribe aquí una descripción que permita a los lectores conocer de qué trata esta obra...">{{ old('sinopsis') }}</textarea>
                    <span class="help">
                        Puedes escribir un resumen breve de la historia o del contenido.
                    </span>
                    @error('sinopsis') <p class="error">{{ $message }}</p> @enderror
                </div>

            </div>

            <div class="form-footer">
                <p>* Verifica la información antes de guardar.</p>

                <div class="actions">
                    <a href="{{ route('libros.index') }}" class="button button-cancel">
                        Cancelar
                    </a>

                    <button type="submit" class="button">
                        Guardar libro
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

