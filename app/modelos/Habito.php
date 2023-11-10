<?php

class Habito {
    private $id;
    private $nombre;
    private $descripcion;
    private $usuario_id;

    // Constructor
    public function __construct($nombre, $descripcion, $usuario_id) {
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->usuario_id = $usuario_id;
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getUsuarioId() {
        return $this->usuario_id;
    }

    // Setters
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function setUsuarioId($usuario_id) {
        $this->usuario_id = $usuario_id;
    }

    // Funciones adicionales del modelo Habito (si es necesario)
}
?>
