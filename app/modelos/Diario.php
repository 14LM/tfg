<?php

class Diario {
    private $id;
    private $fecha;
    private $contenido;
    private $usuario_id;

    // Constructor
    public function __construct($fecha, $contenido, $usuario_id) {
        $this->fecha = $fecha;
        $this->contenido = $contenido;
        $this->usuario_id = $usuario_id;
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getContenido() {
        return $this->contenido;
    }

    public function getUsuarioId() {
        return $this->usuario_id;
    }

    // Setters
    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function setContenido($contenido) {
        $this->contenido = $contenido;
    }

    public function setUsuarioId($usuario_id) {
        $this->usuario_id = $usuario_id;
    }

    // Funciones adicionales del modelo Diario (si es necesario)
}
?>
