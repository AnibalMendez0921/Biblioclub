<details class="reporte">
    <summary>⚠ Reportar problema</summary>

    <form method="POST" action="{{ route('prestamos-integrantes.reportar', $s) }}" class="form-reporte">
        @csrf

        <select name="motivo" required>
            <option value="No devolvió el libro">No devolvió el libro</option>
            <option value="Libro en mal estado">Libro en mal estado</option>
            <option value="No se presentó a la entrega">No se presentó a la entrega</option>
            <option value="Otro">Otro</option>
        </select>

        <textarea name="descripcion" rows="3" maxlength="1000" placeholder="Describe lo ocurrido (opcional)"></textarea>

        <button type="submit" class="btn btn-peligro btn-sm">Enviar reporte</button>
    </form>
</details>