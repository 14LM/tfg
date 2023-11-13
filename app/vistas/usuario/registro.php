<?php
// Incluir el controlador de Usuario
include('../../controladores/UsuarioController.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// Verifica si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtiene los datos del formulario
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $password = $_POST['password'];

    // Instancia el controlador de Usuario
    $usuarioController = new UsuarioController();

    // Llama al método para registrar un nuevo usuario
    $resultado = $usuarioController->registrarUsuario($nombre, $correo, $password);

    // Verifica si se registró correctamente
    if ($resultado) {
        // Redirige a la página de inicio de sesión o a donde desees
        header("Location: inicio_sesion.php");
        exit();
    } else {
        // Maneja el error si no se pudo registrar
        $mensaje_error = "Error al registrar el usuario.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/styles.css" rel="stylesheet">
    <title>Registro de Usuario</title>
</head>
<body>
    <div class="container">
        <h1>Registro de Usuario</h1>

        <?php if (isset($mensaje_error)): ?>
            <p class="error"><?php echo $mensaje_error; ?></p>
        <?php endif; ?>

        <form action=" " method="POST">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
            <br>
            <label for="correo">Correo Electrónico:</label>
            <input type="email" id="correo" name="correo" required>
            <br>
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>
            <br>
            <button type="submit" name="registro">Registrarse</button>
        </form>
        
        <p>¿Ya tienes una cuenta? <a href="inicio_sesion.php">Inicia sesión aquí</a></p>
    </div>
</body>
</html>
