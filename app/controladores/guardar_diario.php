<?php
// Incluye el controlador de Calendario
include('../app/controladores/CalendarioController.php');

// Verifica si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtiene los datos del formulario
    $usuario_id = $_SESSION['id']; // Supongo que tienes una sesión de usuario
    $fecha = $_POST['fecha']; // Debe coincidir con el nombre del campo en el formulario
    $contenido = $_POST['contenido']; // Debe coincidir con el nombre del campo en el formulario

    // Instancia el controlador de Calendario
    $calendarioController = new CalendarioController();

    // Llama al método para guardar el contenido del diario
    $resultado = $calendarioController->guardarDiario($usuario_id, $fecha, $contenido);

    // Verifica si se guardó correctamente
    if ($resultado) {
        // Redirige a la página de calendario o a donde desees
        header("Location: calendario/ver.php");
        exit();
    } else {
        // Maneja el error si no se pudo guardar
        echo "Error al guardar el diario.";
    }
}
?>

