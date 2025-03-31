<?php

require_once __DIR__ . '/../../config/database.php';

class Jugador
{
    public $id;
    public $nombre;
    public $numero;
    public $equipo_id;
    public $es_capitan;

    public function __construct($id, $nombre, $numero, $equipo_id, $es_capitan = 0)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->numero = $numero;
        $this->equipo_id = $equipo_id;
        $this->es_capitan = $es_capitan;
    }

    public static function find($id)
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("SELECT * FROM jugadores WHERE id = ?");
        $stmt->execute([$id]);
        $j = $stmt->fetch(PDO::FETCH_ASSOC);
        return new Jugador($j['id'], $j['nombre'], $j['numero'], $j['equipo_id'], $j['es_capitan']);
    }

    public static function findByEquipo($equipo_id)
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("SELECT * FROM jugadores WHERE equipo_id = ?");
        $stmt->execute([$equipo_id]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return array_map(fn($j) => new Jugador($j['id'], $j['nombre'], $j['numero'], $j['equipo_id'], $j['es_capitan']), $result);
    }

    public static function findCapitan($equipo_id)
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("SELECT * FROM jugadores WHERE equipo_id = ? AND es_capitan = 1 LIMIT 1");
        $stmt->execute([$equipo_id]);
        $j = $stmt->fetch(PDO::FETCH_ASSOC);
        return $j ? new Jugador($j['id'], $j['nombre'], $j['numero'], $j['equipo_id'], $j['es_capitan']) : null;
    }

    public function save()
    {
        $pdo = Database::getConnection();

        // Solo un capitán por equipo
        if ($this->es_capitan) {
            $pdo->prepare("UPDATE jugadores SET es_capitan = 0 WHERE equipo_id = ?")->execute([$this->equipo_id]);
        }

        $stmt = $pdo->prepare("INSERT INTO jugadores (nombre, numero, equipo_id, es_capitan) VALUES (?, ?, ?, ?)");
        $stmt->execute([$this->nombre, $this->numero, $this->equipo_id, $this->es_capitan]);
    }

    public function update()
    {
        $pdo = Database::getConnection();

        if ($this->es_capitan) {
            $pdo->prepare("UPDATE jugadores SET es_capitan = 0 WHERE equipo_id = ?")->execute([$this->equipo_id]);
        }

        $stmt = $pdo->prepare("UPDATE jugadores SET nombre = ?, numero = ?, equipo_id = ?, es_capitan = ? WHERE id = ?");
        $stmt->execute([$this->nombre, $this->numero, $this->equipo_id, $this->es_capitan, $this->id]);
    }

    public static function delete($id)
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("DELETE FROM jugadores WHERE id = ?");
        $stmt->execute([$id]);
    }
}
