<h1>Listado de Equipos</h1>
<a href="index.php?controller=equipo&action=create">Crear nuevo equipo</a>
<ul>
    <?php foreach ($equipos as $equipo): ?>
        <li>
            <a href="index.php?controller=equipo&action=show&id=<?= $equipo->id ?>">
                <?= htmlspecialchars($equipo->nombre) ?> (<?= htmlspecialchars($equipo->deporte) ?>)
            </a>
        </li>
    <?php endforeach; ?>
</ul>
