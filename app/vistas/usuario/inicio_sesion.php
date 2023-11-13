<?php
// Incluir el controlador de Usuario
include('../controladores/UsuarioController.php');

// Verifica si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['iniciar_sesion'])) {
    // Obtiene los datos del formulario
    $correo = $_POST['correo'];
    $password = $_POST['password'];

    // Instancia el controlador de Usuario
    $usuarioController = new UsuarioController();

    // Llama al método para iniciar sesión
    $resultado = $usuarioController->iniciarSesion($correo, $password);

    // Verifica si se inició sesión correctamente
    if ($resultado) {
        // Redirige a la página principal o a donde desees
        header("Location: index.php");
        exit();
    } else {
        // Maneja el error si no se pudo iniciar sesión
        $mensaje_error = "Correo electrónico o contraseña incorrectos.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/styles.css" rel="stylesheet">
    <title>Iniciar Sesión</title>
</head>
<body>
    <div class="container">
        <h1>Iniciar Sesión</h1>

        <?php if (isset($mensaje_error)): ?>
            <p class="error"><?php echo $mensaje_error; ?></p>
        <?php endif; ?>

        <form action="inicio_sesion.php" method="POST">
            <label for="correo">Correo Electrónico:</label>
            <input type="email" id="correo" name="correo" required>
            <br>
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>
            <br>
            <button type="submit" name="iniciar_sesion">Iniciar Sesión</button>
        </form>
        
        <p>¿No tienes una cuenta? <a href="registro.php">Regístrate aquí</a></p>
    </div>
</body>
</html>

