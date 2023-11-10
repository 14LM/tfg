<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendario - ZenHub</title>
    
    <!-- Enlace a CSS -->
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    
    <!-- Enlace a JS -->
    <script src="js/script.js"></script>
    
    <!-- Enlace a FullCalendar desde un CDN -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js"></script>
</head>
<body>
    <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <!-- Botón de retroceso -->
            <a class="navbar-brand" href="index.php">Atrás</a>            
        </div>
    </nav>        
    <h1>Calendario</h1>
    </header>
    
    <main>
    <section class="calendario-container">
        <!-- Calendario (Llamamos a la funcion de js)--> 
        <div id="calendario"></div>
    </section>
        
        <section class="diario-container">
            <!-- Diario -->
            <h2>Diario</h2>
            <form action="guardar_diario.php" method="POST">
                <label for="contenido">Contenido del Diario:</label>
                <textarea name="contenido" id="contenido" rows="4" cols="50"></textarea>
                <input type="hidden" name="fecha" id="fecha_seleccionada" value="">
                <button type="submit">Guardar</button>
            </form>
        </section>
        
        <section class="habitos-container">
            <!-- Lista de Hábitos -->
            <h2>Hábitos para la fecha seleccionada</h2>
            <ul>
                <!-- Aquí puedes iterar sobre los hábitos correspondientes al día seleccionado y mostrarlos en una lista -->
                <li>Nombre del Hábito 1</li>
                <li>Nombre del Hábito 2</li>
                <!-- ... -->
            </ul>
        </section>
    </main>
    
    <footer>
        <!-- Pie de página -->
        <p>&copy; 2023 ZenHub - Todos los derechos reservados.</p>
    </footer>
</body>
</html>
