<h1>Crear Equipo</h1>
<form action="index.php?controller=equipo&action=store" method="POST">
    <label>Nombre:</label>
    <input type="text" name="nombre" required><br>

    <label>Ciudad:</label>
    <input type="text" name="ciudad"><br>

    <label>Deporte:</label>
    <select name="deporte" required>
        <option value="">Seleccione uno</option>
        <option value="Fútbol">Fútbol</option>
        <option value="Baloncesto">Baloncesto</option>
        <option value="Voleibol">Voleibol</option>
    </select><br>

    <label>Fecha de creación:</label>
    <input type="date" name="fecha_creacion" required><br>

    <button type="submit">Guardar</button>
</form>
