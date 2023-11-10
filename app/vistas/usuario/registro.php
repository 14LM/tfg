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
        <form action="../controladores/UsuarioController.php" method="POST">
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
