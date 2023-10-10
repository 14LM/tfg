<?php 

$server = "localhost";
$user = "root";
$password = "";
$db = "ZenHub";

$conexion = new mysqli($server, $user, $password, $db);

if ($conexion->connect_errno){
    die("Conexion fallida");
} else {
    echo "Conexión realizada";
}


?>