<?php

require_once __DIR__ . '/../models/Equipo.php';

class EquipoController
{
    public function index()
    {
        $equipos = Equipo::all();
        require_once __DIR__ . '/../views/equipo/index.php';
    }

    public function create()
    {
        require_once __DIR__ . '/../views/equipo/create.php';
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'] ?? '';
            $ciudad = $_POST['ciudad'] ?? '';
            $deporte = $_POST['deporte'] ?? '';
            $fecha_creacion = $_POST['fecha_creacion'] ?? '';

            if (empty($nombre) || empty($deporte) || empty($fecha_creacion)) {
                echo "Todos los campos requeridos deben completarse.";
                return;
            }

            $equipo = new Equipo(null, $nombre, $ciudad, $deporte, $fecha_creacion);
            $equipo->save();

            header('Location: index.php?controller=equipo&action=index');
        }
    }

    public function show()
    {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $equipo = Equipo::find($id);
            $jugadores = $equipo->getJugadores();
            require_once __DIR__ . '/../views/equipo/show.php';
        }
    }
}
