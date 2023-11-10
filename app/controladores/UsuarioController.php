<?php
// Incluir el archivo de conexión a la base de datos
include('../config/database.php');

class UsuarioController {
    // Función para registrar un nuevo usuario
    public function registrarUsuario($nombre, $correo, $contraseña) {
        global $conn;
        
        // Hash de la contraseña
        $hashedPassword = password_hash($contraseña, PASSWORD_DEFAULT);
        
        // Preparar la consulta SQL
        $stmt = $conn->prepare("INSERT INTO Usuarios (nombre, correo, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nombre, $correo, $hashedPassword);
        
        // Ejecutar la consulta
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
    // Función para iniciar sesión de un usuario
    public function iniciarSesion($correo, $contraseña) {
        global $conn;
        
        // Buscar el usuario por correo
        $stmt = $conn->prepare("SELECT id, nombre, correo, password FROM Usuarios WHERE correo = ?");
        $stmt->bind_param("s", $correo);
        $stmt->execute();
        
        // Obtener el resultado de la consulta
        $result = $stmt->get_result();
        
        if ($result->num_rows === 1) {
            // El usuario existe, verificar la contraseña
            $usuario = $result->fetch_assoc();
            if (password_verify($contraseña, $usuario['password'])) {
                // Contraseña válida, iniciar sesión
                session_start();
                $_SESSION['id'] = $usuario['id'];
                $_SESSION['nombre'] = $usuario['nombre'];
                return true;
            } else {
                // Contraseña incorrecta
                return false;
            }
        } else {
            // Usuario no encontrado
            return false;
        }
    }

    // Otras funciones CRUD para usuarios (actualizar, eliminar) 
    // Función para actualizar información de un usuario
public function actualizarUsuario($id, $nombre, $correo, $contraseña) {
    global $conn;
    
    // Si se proporciona una nueva contraseña, la actualizamos
    if (!empty($contraseña)) {
        $hashedPassword = password_hash($contraseña, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("UPDATE Usuarios SET nombre = ?, correo = ?, password = ? WHERE id = ?");
        $stmt->bind_param("sssi", $nombre, $correo, $hashedPassword, $id);
    } else {
        // Si no se proporciona una nueva contraseña, no la actualizamos
        $stmt = $conn->prepare("UPDATE Usuarios SET nombre = ?, correo = ? WHERE id = ?");
        $stmt->bind_param("ssi", $nombre, $correo, $id);
    }
    
    // Ejecutar la consulta de actualización
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

// Función para eliminar un usuario
public function eliminarUsuario($id) {
    global $conn;
    
    // Preparar la consulta SQL
    $stmt = $conn->prepare("DELETE FROM Usuarios WHERE id = ?");
    $stmt->bind_param("i", $id);
    
    // Ejecutar la consulta de eliminación
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}


    // Función para cerrar sesión
    public function cerrarSesion() {
        session_start();
        session_destroy();
    }
}
?>
