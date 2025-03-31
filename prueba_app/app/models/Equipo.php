<?php

require_once __DIR__ . '/../../config/database.php';
require_once 'Jugador.php';

class Equipo
{
    public $id;
    public $nombre;
    public $ciudad;
    public $deporte;
    public $fecha_creacion;

    public function __construct($id, $nombre, $ciudad, $deporte, $fecha_creacion)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->ciudad = $ciudad;
        $this->deporte = $deporte;
        $this->fecha_creacion = $fecha_creacion;
    }

    public static function all()
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->query("SELECT * FROM equipos");
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return array_map(fn($e) => new Equipo($e['id'], $e['nombre'], $e['ciudad'], $e['deporte'], $e['fecha_creacion']), $result);
    }

    public static function find($id)
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("SELECT * FROM equipos WHERE id = ?");
        $stmt->execute([$id]);
        $e = $stmt->fetch(PDO::FETCH_ASSOC);
        return new Equipo($e['id'], $e['nombre'], $e['ciudad'], $e['deporte'], $e['fecha_creacion']);
    }

    public function save()
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("INSERT INTO equipos (nombre, ciudad, deporte, fecha_creacion) VALUES (?, ?, ?, ?)");
        $stmt->execute([$this->nombre, $this->ciudad, $this->deporte, $this->fecha_creacion]);
    }

    public function getJugadores()
    {
        return Jugador::findByEquipo($this->id);
    }

    public function getCapitan()
    {
        return Jugador::findCapitan($this->id);
    }
}
