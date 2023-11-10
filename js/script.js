$(document).ready(function () {
    // Función para registrar un nuevo usuario
    $("#registroForm").submit(function (event) {
        event.preventDefault();
        var nombre = $("#nombre").val();
        var correo = $("#correo").val();
        var password = $("#password").val();

        $.ajax({
            type: "POST",
            url: "controladores/UsuarioController.php",
            data: {
                action: "registrarUsuario",
                nombre: nombre,
                correo: correo,
                password: password
            },
            success: function (response) {
                // Manejar la respuesta del servidor
                console.log(response);
                // Puedes redirigir al usuario a otra página después del registro
            }
        });
    });

    // Función para iniciar sesión
    $("#inicioSesionForm").submit(function (event) {
        event.preventDefault();
        var correo = $("#correo").val();
        var password = $("#password").val();

        $.ajax({
            type: "POST",
            url: "controladores/UsuarioController.php",
            data: {
                action: "iniciarSesion",
                correo: correo,
                password: password
            },
            success: function (response) {
                // Manejar la respuesta del servidor
                console.log(response);
                // Puedes redirigir al usuario a su página principal
            }
        });
    });

    // Otras funciones AJAX para hábitos, calendario y diario
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            plugins: ['dayGrid'],
            defaultView: 'dayGridMonth',
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth'
            }
        });
    
        calendar.render();
    });
    

    // Ejemplo de función para listar hábitos
    function listarHabitos(usuario_id) {
        $.ajax({
            type: "GET",
            url: "controladores/HabitoController.php",
            data: {
                action: "listarHabitos",
                usuario_id: usuario_id
            },
            success: function (response) {
                // Manejar la lista de hábitos obtenida del servidor
                console.log(response);
            }
        });
    }

    // Llama a la función para listar hábitos cuando el usuario inicia sesión
    var usuario_id = obtenerUsuarioActual(); // Supongamos que tienes una función para obtener el usuario actual
    if (usuario_id) {
        listarHabitos(usuario_id);
    }

    // Otras funciones AJAX para calendario, diario y más

    // Función para cerrar sesión
    $("#cerrarSesionBtn").click(function () {
        $.ajax({
            type: "POST",
            url: "controladores/UsuarioController.php",
            data: {
                action: "cerrarSesion"
            },
            success: function (response) {
                // Manejar la respuesta del servidor
                console.log(response);
                // Puedes redirigir al usuario a la página de inicio de sesión
            }
        });
    });
});
