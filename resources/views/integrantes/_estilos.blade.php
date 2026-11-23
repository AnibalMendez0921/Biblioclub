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

* { box-sizing: border-box; margin: 0; padding: 0; }

body {
    font-family: 'DM Sans', sans-serif;
    background: var(--ivory);
    color: var(--chocolate);
    min-height: 100vh;
}

header {
    background: var(--ivory-light);
    padding: 20px 7%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 15px;
    border-bottom: 1px solid var(--beige);
    box-shadow: 0 4px 18px rgba(59, 51, 41, 0.04);
}

.logo h1 {
    font-family: 'Playfair Display', serif;
    font-size: 28px;
    letter-spacing: -1px;
}

.logo h1 span { color: var(--gold); }
.logo p { margin-top: 4px; color: var(--taupe); font-size: 13px; }

.enlaces { display: flex; gap: 24px; flex-wrap: wrap; align-items: center; }

.enlaces a {
    color: var(--chocolate-light);
    text-decoration: none;
    font-size: 14px;
    font-weight: 600;
    transition: .2s;
}

.enlaces a:hover { color: var(--gold-dark); }

.insignia {
    display: inline-block;
    background: var(--gold);
    color: var(--white);
    border-radius: 20px;
    padding: 1px 8px;
    font-size: 11px;
    margin-left: 4px;
}

main { width: 88%; max-width: 1200px; margin: 45px auto; }

.introduccion { margin-bottom: 28px; }

.etiqueta {
    display: inline-block;
    color: var(--gold-dark);
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 2px;
    text-transform: uppercase;
    margin-bottom: 12px;
}

.introduccion h2 {
    font-family: 'Playfair Display', serif;
    font-size: 34px;
    font-weight: 600;
    margin-bottom: 10px;
}

.introduccion p { color: var(--taupe); line-height: 1.7; font-size: 15px; max-width: 680px; }

.mensaje { padding: 15px 18px; border-radius: 9px; margin-bottom: 18px; font-size: 14px; line-height: 1.6; }
.mensaje-exito { background: #F0F4E9; color: #536342; border: 1px solid #D4DFC4; }
.mensaje-error { background: #F9EDEA; color: #A34E43; border: 1px solid #EBCBC5; }
.mensaje-aviso { background: #F6EEDC; color: #80602E; border: 1px solid #E5D3AC; }

.btn {
    display: inline-block;
    padding: 12px 19px;
    border: 1px solid var(--gold);
    border-radius: 7px;
    background: var(--gold);
    color: var(--white);
    text-decoration: none;
    font-family: 'DM Sans', sans-serif;
    font-size: 13px;
    font-weight: 600;
    cursor: pointer;
    transition: .25s ease;
}

.btn:hover { background: var(--gold-dark); border-color: var(--gold-dark); transform: translateY(-2px); }
.btn-secundario { background: var(--ivory-light); color: var(--chocolate); border-color: var(--gold-light); }
.btn-secundario:hover { background: var(--beige); border-color: var(--gold-light); }
.btn-peligro { background: #A34E43; border-color: #A34E43; }
.btn-peligro:hover { background: #823d34; border-color: #823d34; }
.btn-sm { padding: 8px 12px; font-size: 12px; }

.buscador { display: flex; gap: 10px; margin: 22px 0 28px; flex-wrap: wrap; }

.buscador input, .buscador select {
    padding: 13px 16px;
    border: 1px solid var(--beige);
    border-radius: 8px;
    font-family: inherit;
    font-size: 14px;
    background: var(--ivory-light);
    color: var(--chocolate);
    outline: none;
}

.buscador input { flex: 1; min-width: 220px; }
.buscador input:focus, .buscador select:focus { border-color: var(--gold); box-shadow: 0 0 0 3px rgba(184, 154, 102, .12); }

.resumen {
    background: var(--ivory-light);
    border: 1px solid var(--beige);
    border-radius: 9px;
    padding: 15px 19px;
    margin-bottom: 20px;
    color: var(--taupe);
    font-size: 14px;
}

.resumen strong { color: var(--chocolate); }

.libros { display: grid; grid-template-columns: repeat(auto-fill, minmax(245px, 1fr)); gap: 25px; }

.libro-card {
    background: var(--ivory-light);
    border: 1px solid var(--beige);
    border-radius: 13px;
    overflow: hidden;
    transition: .3s;
    box-shadow: 0 5px 18px rgba(59, 51, 41, .04);
}

.libro-card:hover { transform: translateY(-5px); box-shadow: var(--shadow); border-color: var(--gold-light); }

.portada {
    height: 220px;
    background: linear-gradient(145deg, #E8DFCE, #D8C49E);
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
}

.portada img { width: 100%; height: 100%; object-fit: cover; }
.portada .icono { font-size: 62px; }

.libro-info { padding: 19px; }

.genero {
    color: var(--gold-dark);
    text-transform: uppercase;
    font-size: 10px;
    letter-spacing: 1.5px;
    font-weight: 700;
}

.libro-info h3 { font-family: 'Playfair Display', serif; font-size: 20px; margin: 8px 0 4px; }
.autor { color: var(--taupe); font-size: 13px; margin-bottom: 8px; }
.publicado { color: var(--chocolate-light); font-size: 12px; margin-bottom: 12px; }

.fila-estado {
    display: flex;
    justify-content: space-between;
    font-size: 12px;
    padding: 10px 0;
    border-top: 1px solid var(--beige);
    border-bottom: 1px solid var(--beige);
}

.ok { color: #607B55; font-weight: 700; }

details { margin-top: 12px; }

summary {
    list-style: none;
    cursor: pointer;
    background: var(--ivory);
    color: var(--chocolate);
    border: 1px solid var(--gold-light);
    padding: 10px;
    text-align: center;
    border-radius: 6px;
    font-size: 13px;
    font-weight: 600;
}

summary::-webkit-details-marker { display: none; }
summary:hover { background: var(--beige); }
summary.principal { background: var(--chocolate); color: var(--ivory); border-color: var(--chocolate); }
summary.principal:hover { background: var(--gold-dark); }

.detalles { padding-top: 13px; color: var(--chocolate-light); font-size: 13px; line-height: 1.7; }
.detalles p { margin-bottom: 8px; }

.libro-info textarea, .form-reporte textarea, .form-reporte select {
    width: 100%;
    margin: 10px 0;
    padding: 10px;
    border: 1px solid var(--beige);
    border-radius: 7px;
    font-family: inherit;
    font-size: 13px;
    background: var(--white);
    color: var(--chocolate);
    resize: vertical;
}

.libro-info .btn { width: 100%; text-align: center; }
.suyo { margin-top: 12px; font-size: 12px; color: var(--taupe); }
.suyo a { color: var(--gold-dark); font-weight: 600; }

.vacio {
    grid-column: 1 / -1;
    text-align: center;
    padding: 55px 20px;
    background: var(--ivory-light);
    border: 1px dashed var(--gold-light);
    border-radius: 12px;
    color: var(--taupe);
}

.vacio h3 { font-family: 'Playfair Display', serif; color: var(--chocolate); margin: 10px 0; font-size: 22px; }

.tabs { display: flex; gap: 8px; margin-bottom: 20px; flex-wrap: wrap; }

.tab {
    padding: 10px 17px;
    border: 1px solid var(--gold-light);
    border-radius: 30px;
    font-size: 13px;
    font-weight: 600;
    color: var(--chocolate);
    text-decoration: none;
    background: var(--ivory-light);
}

.tab.activa { background: var(--chocolate); color: var(--ivory); border-color: var(--chocolate); }

.tabla-contenedor {
    overflow-x: auto;
    background: var(--ivory-light);
    border: 1px solid var(--beige);
    border-radius: 12px;
    box-shadow: var(--shadow);
}

table { width: 100%; min-width: 880px; border-collapse: collapse; }
th, td { padding: 16px 14px; text-align: left; border-bottom: 1px solid var(--beige); vertical-align: top; }
th { background: #EFE7D8; font-size: 12px; font-weight: 700; letter-spacing: .4px; }
td { font-size: 13px; color: var(--chocolate-light); line-height: 1.6; }
tbody tr:hover { background: #F7F1E6; }
tbody tr:last-child td { border-bottom: none; }
.nota { color: var(--taupe); font-style: italic; }

.estado {
    display: inline-block;
    border-radius: 20px;
    padding: 6px 11px;
    font-size: 11px;
    font-weight: 700;
    white-space: nowrap;
    background: #F1EBDD;
    color: #927548;
    margin-bottom: 4px;
}

.st-pendiente { background: #F1EBDD; color: #927548; }
.st-activo { background: #EFE2C9; color: #80602E; }
.st-devuelto { background: #EDF1E4; color: #68764F; }
.st-rechazado { background: #F8EAE6; color: #A34E43; }
.st-vencido { background: #A34E43; color: var(--white); }

.acciones { display: flex; flex-direction: column; gap: 8px; align-items: flex-start; }
.acciones form { display: flex; gap: 6px; align-items: center; flex-wrap: wrap; }
.acciones input[type=date] { padding: 7px; border: 1px solid var(--beige); border-radius: 6px; font-family: inherit; font-size: 12px; }

.reporte summary { padding: 7px 11px; font-size: 12px; background: transparent; color: #A34E43; border-color: #EBCBC5; }
.form-reporte { margin-top: 8px; width: 230px; }

.form-card {
    background: var(--ivory-light);
    border: 1px solid var(--beige);
    border-radius: 12px;
    padding: 28px;
    box-shadow: var(--shadow);
    max-width: 720px;
}

.campo { margin-bottom: 18px; }
.campo label { display: block; font-size: 13px; font-weight: 700; margin-bottom: 7px; }
.campo small { color: var(--taupe); font-weight: 400; }

.campo input[type=text], .campo input[type=file], .campo textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid var(--beige);
    border-radius: 8px;
    font-family: inherit;
    font-size: 14px;
    background: var(--white);
    color: var(--chocolate);
    outline: none;
}

.campo input:focus, .campo textarea:focus { border-color: var(--gold); box-shadow: 0 0 0 3px rgba(184, 154, 102, .12); }
.portada-actual { width: 90px; border-radius: 6px; margin-bottom: 8px; display: block; }
.botones { display: flex; gap: 10px; flex-wrap: wrap; margin-top: 6px; }

footer {
    text-align: center;
    padding: 28px 15px;
    color: var(--taupe);
    font-size: 13px;
    border-top: 1px solid var(--beige);
    background: var(--ivory-light);
    margin-top: 60px;
}

@media (max-width: 600px) {
    header { padding: 18px 5%; }
    main { width: 92%; margin-top: 30px; }
    .introduccion h2 { font-size: 27px; }
    .buscador .btn, .buscador select { width: 100%; }
}