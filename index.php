<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Enlace a la hoja de estilos de Bootstrap y CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/styles.css">

    <title>ZenHub - Habits Tracker</title>
    
    <!-- Descripción de la página para motores de búsqueda -->
    <meta name="description" content="ZenHub: Tu asistente de seguimiento de hábitos.">
</head>

<body>
    <!-- Encabezado de la página -->
    <header>
        <!-- Barra de navegación -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <!-- Logo y enlace a la página de inicio -->
                <a class="navbar-brand" href="#">ZenHub</a>
                
                <!-- Botón de hamburguesa para dispositivos móviles -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <!-- Menú de navegación -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=habitos">Hábitos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=calendario">Calendario</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=diario">Diario</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Cerrar Sesión</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Contenido principal de la página -->
    <main>
        <div class="container mt-5">
            <?php
            // Carga la configuración de la base de datos
            require_once 'config/database.php';

            // Inicia una sesión de usuario si no está iniciada
            session_start();

            // Enrutamiento de la solicitud
            if (isset($_GET['page'])) {
                $page = $_GET['page'];

                // Aquí puedes implementar lógica para enrutar a las páginas apropiadas
                // dependiendo de la variable 'page' que se pasa en la URL.

                // Ejemplo de enrutamiento básico:
                switch ($page) {
                    case 'habitos':
                        require 'controladores/HabitoController.php';
                        break;
                    case 'calendario':
                        require 'vistas/calendario/ver.php';
                        break;
                    case 'diario':
                        require 'vistas/diario/ver.php';
                        break;
                    // Agrega más casos según tus necesidades
                    default:
                        require 'vistas/inicio.php';
                        break;
                }
            } else {
                // Si no se proporciona una página específica, carga la página de inicio
                require 'vistas/inicio.php';
            }
            ?>
        </div>
    </main>

    <!-- Pie de página -->
    <footer>
        <div class="container mt-5">
            <p>&copy; 2023 ZenHub - Todos los derechos reservados.</p>
        </div>
    </footer>

    <!-- Scripts de Bootstrap (jQuery y Popper.js son necesarios para Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+Jwq9z68suLcKlSnr4K9zai/4EjhFt5zF5w5f5Oj04meM1a7xj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-jZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYlT" crossorigin="anonymous"></script>
</body>
</html>

