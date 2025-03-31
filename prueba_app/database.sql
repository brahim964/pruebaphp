CREATE DATABASE prueba_backend CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE prueba_backend;

CREATE TABLE equipos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    ciudad VARCHAR(100),
    deporte VARCHAR(100) NOT NULL,
    fecha_creacion DATE NOT NULL
);

CREATE TABLE jugadores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    numero INT NOT NULL,
    equipo_id INT NOT NULL,
    es_capitan TINYINT(1) DEFAULT 0,
    FOREIGN KEY (equipo_id) REFERENCES equipos(id) ON DELETE CASCADE
);
