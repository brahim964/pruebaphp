<?php

require_once __DIR__ . '/../models/Jugador.php';

class JugadorController
{
    public function create()
    {
        $equipo_id = $_GET['equipo_id'] ?? null;
        require_once __DIR__ . '/../views/jugador/create.php';
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'] ?? '';
            $numero = $_POST['numero'] ?? '';
            $equipo_id = $_POST['equipo_id'] ?? '';
            $es_capitan = isset($_POST['es_capitan']) ? 1 : 0;

            if (empty($nombre) || empty($numero) || empty($equipo_id)) {
                echo "Todos los campos requeridos deben completarse.";
                return;
            }

            $jugador = new Jugador(null, $nombre, $numero, $equipo_id, $es_capitan);
            $jugador->save();

            header("Location: index.php?controller=equipo&action=show&id=$equipo_id");
        }
    }

    public function edit()
    {
        $id = $_GET['id'] ?? null;
        $jugador = Jugador::find($id);
        require_once __DIR__ . '/../views/jugador/edit.php';
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $numero = $_POST['numero'];
            $equipo_id = $_POST['equipo_id'];
            $es_capitan = isset($_POST['es_capitan']) ? 1 : 0;

            $jugador = new Jugador($id, $nombre, $numero, $equipo_id, $es_capitan);
            $jugador->update();

            header("Location: index.php?controller=equipo&action=show&id=$equipo_id");
        }
    }

    public function delete()
    {
        $id = $_GET['id'] ?? null;
        $equipo_id = $_GET['equipo_id'] ?? null;

        if ($id) {
            Jugador::delete($id);
            header("Location: index.php?controller=equipo&action=show&id=$equipo_id");
        }
    }
}
