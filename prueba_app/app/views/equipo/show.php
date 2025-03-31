<h1>Equipo: <?= htmlspecialchars($equipo->nombre) ?></h1>
<p><strong>Ciudad:</strong> <?= htmlspecialchars($equipo->ciudad) ?></p>
<p><strong>Deporte:</strong> <?= htmlspecialchars($equipo->deporte) ?></p>
<p><strong>Fecha de creación:</strong> <?= htmlspecialchars($equipo->fecha_creacion) ?></p>

<hr>

<h2>Jugadores</h2>
<a href="index.php?controller=jugador&action=create&equipo_id=<?= $equipo->id ?>">Añadir jugador</a>
<table border="1">
    <tr>
        <th>Nombre</th>
        <th>Número</th>
        <th>Capitán</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($jugadores as $jugador): ?>
        <tr>
            <td><?= htmlspecialchars($jugador->nombre) ?></td>
            <td><?= htmlspecialchars($jugador->numero) ?></td>
            <td><?= $jugador->es_capitan ? '✅' : '' ?></td>
            <td>
                <a href="index.php?controller=jugador&action=edit&id=<?= $jugador->id ?>">Editar</a> |
                <a href="index.php?controller=jugador&action=delete&id=<?= $jugador->id ?>&equipo_id=<?= $equipo->id ?>" onclick="return confirm('¿Seguro?')">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
