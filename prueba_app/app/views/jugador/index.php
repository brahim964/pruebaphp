<h1>Editar Jugador</h1>
<form action="index.php?controller=jugador&action=update" method="POST">
    <input type="hidden" name="id" value="<?= htmlspecialchars($jugador->id) ?>">
    <input type="hidden" name="equipo_id" value="<?= htmlspecialchars($jugador->equipo_id) ?>">

    <label>Nombre:</label>
    <input type="text" name="nombre" value="<?= htmlspecialchars($jugador->nombre) ?>" required><br>

    <label>Número:</label>
    <input type="number" name="numero" value="<?= htmlspecialchars($jugador->numero) ?>" required><br>

    <label>¿Es capitán?</label>
    <input type="checkbox" name="es_capitan" <?= $jugador->es_capitan ? 'checked' : '' ?>><br>

    <button type="submit">Actualizar</button>
</form>
