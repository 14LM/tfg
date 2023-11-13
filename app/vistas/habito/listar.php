<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/styles.css" rel="stylesheet">
    <title>Lista de Hábitos</title>
</head>
<body>
    <div class="container">
    <h2>Lista de Hábitos</h2>

<!-- Botón para agregar un nuevo hábito -->
<a href="app/vistas/habito/crear.php" class="btn btn-primary mb-3">Agregar Hábito</a>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($habitos as $habito) : ?>
            <tr>
                <td><?php echo $habito['nombre']; ?></td>
                <td><?php echo $habito['descripcion']; ?></td>
                <td>
                    <a href="index.php?page=habitos&accion=editar&id=<?php echo $habito['id']; ?>" class="btn btn-sm btn-primary">Editar</a>
                    <a href="controladores/HabitoController.php?accion=eliminar&id=<?php echo $habito['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este hábito?')">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
    </div>
</body>
</html>
