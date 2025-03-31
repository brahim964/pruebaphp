<h1>Añadir Jugador</h1>
<form action="index.php?controller=jugador&action=store" method="POST">
    <input type="hidden" name="equipo_id" value="<?= htmlspecialchars($equipo_id) ?>">

    <label>Nombre:</label>
    <input type="text" name="nombre" required><br>

    <label>Número:</label>
    <input type="number" name="numero" required><br>

    <label>¿Es capitán?</label>
    <input type="checkbox" name="es_capitan"><br>

    <button type="submit">Guardar</button>
</form>
