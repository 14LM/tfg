<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/styles.css" rel="stylesheet">
    <title>Editar Hábito</title>
</head>
<body>
    <div class="container">
        <h1>Editar Hábito</h1>
        <form action="../controladores/HabitoController.php" method="POST">
            <!-- Incluir los campos para editar un hábito existente -->
            <button type="submit" name="editar_habito">Guardar Cambios</button>
        </form>
    </div>
</body>
</html>
