<?php
include('../config/database.php');

class HabitoController {
    // Función para crear un nuevo hábito
    public function crearHabito($nombre, $descripcion, $usuario_id) {
        global $conn;

        $stmt = $conn->prepare("INSERT INTO Habitos (nombre, descripcion, usuario_id) VALUES (?, ?, ?)");
        $stmt->bind_param("ssi", $nombre, $descripcion, $usuario_id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Función para listar los hábitos de un usuario
    public function listarHabitos($usuario_id) {
        global $conn;

        $stmt = $conn->prepare("SELECT id, nombre, descripcion FROM Habitos WHERE usuario_id = ?");
        $stmt->bind_param("i", $usuario_id);
        $stmt->execute();

        $result = $stmt->get_result();
        $habitos = [];
        while ($row = $result->fetch_assoc()) {
            $habitos[] = $row;
        }

        return $habitos;
    }

    // Función para actualizar información de un hábito
    public function actualizarHabito($id, $nombre, $descripcion) {
        global $conn;

        $stmt = $conn->prepare("UPDATE Habitos SET nombre = ?, descripcion = ? WHERE id = ?");
        $stmt->bind_param("ssi", $nombre, $descripcion, $id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Función para eliminar un hábito
    public function eliminarHabito($id) {
        global $conn;

        $stmt = $conn->prepare("DELETE FROM Habitos WHERE id = ?");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>
