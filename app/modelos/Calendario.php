<?php

class Calendario {
    private $id;
    private $fecha;
    private $hecho;
    private $habit_id;
    private $usuario_id;

    // Constructor
    public function __construct($fecha, $hecho, $habit_id, $usuario_id) {
        $this->fecha = $fecha;
        $this->hecho = $hecho;
        $this->habit_id = $habit_id;
        $this->usuario_id = $usuario_id;
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getHecho() {
        return $this->hecho;
    }

    public function getHabitId() {
        return $this->habit_id;
    }

    public function getUsuarioId() {
        return $this->usuario_id;
    }

    // Setters
    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function setHecho($hecho) {
        $this->hecho = $hecho;
    }

    public function setHabitId($habit_id) {
        $this->habit_id = $habit_id;
    }

    public function setUsuarioId($usuario_id) {
        $this->usuario_id = $usuario_id;
    }

    // Funciones adicionales del modelo Calendario (si es necesario)
}
?>
