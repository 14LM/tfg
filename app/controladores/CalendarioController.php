<?php
include('../config/database.php');

class CalendarioController {
    // Función para marcar un hábito como "completado" en una fecha específica
    public function marcarHabitoComoCompletado($habit_id, $usuario_id, $fecha) {
        global $conn;

        $stmt = $conn->prepare("INSERT INTO Calendario (fecha, hecho, habit_id, usuario_id) VALUES (?, 1, ?, ?)");
        $stmt->bind_param("sii", $fecha, $habit_id, $usuario_id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Función para desmarcar un hábito como "completado" en una fecha específica
    public function desmarcarHabitoComoCompletado($habit_id, $usuario_id, $fecha) {
        global $conn;

        $stmt = $conn->prepare("DELETE FROM Calendario WHERE fecha = ? AND habit_id = ? AND usuario_id = ?");
        $stmt->bind_param("sii", $fecha, $habit_id, $usuario_id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Función para obtener los hábitos completados en una fecha específica
    public function obtenerHabitosCompletadosEnFecha($usuario_id, $fecha) {
        global $conn;

        $stmt = $conn->prepare("SELECT H.nombre FROM Calendario C INNER JOIN Habitos H ON C.habit_id = H.id WHERE C.usuario_id = ? AND C.fecha = ? AND C.hecho = 1");
        $stmt->bind_param("is", $usuario_id, $fecha);
        $stmt->execute();

        $result = $stmt->get_result();
        $habitosCompletados = [];
        while ($row = $result->fetch_assoc()) {
            $habitosCompletados[] = $row['nombre'];
        }

        return $habitosCompletados;
    }

     // Función para guardar el contenido del diario en la base de datos
     public function guardarDiario($usuario_id, $fecha, $contenido) {
        global $conn;

        $stmt = $conn->prepare("INSERT INTO Diario (fecha, contenido, usuario_id) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $fecha, $contenido, $usuario_id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // FUNCIONES EXTRA
}
?>
