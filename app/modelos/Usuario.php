<?php

class Usuario {
    private $id;
    private $nombre;
    private $correo;
    private $password;

    // Constructor
    public function __construct($nombre, $correo, $password) {
        $this->nombre = $nombre;
        $this->correo = $correo;
        $this->password = $password;
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getCorreo() {
        return $this->correo;
    }

    public function getPassword() {
        return $this->password;
    }

    // Setters
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setCorreo($correo) {
        $this->correo = $correo;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    // Funciones adicionales del modelo Usuario (si es necesario)
}
?>
