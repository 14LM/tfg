<?php
include('../config/database.php');

class DiarioController {
    // Función para agregar una anotación diaria
    public function agregarAnotacionDiaria($usuario_id, $fecha, $contenido) {
        global $conn;

        $stmt = $conn->prepare("INSERT INTO Diario (fecha, contenido, usuario_id) VALUES (?, ?, ?)");
        $stmt->bind_param("ssi", $fecha, $contenido, $usuario_id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Función para obtener las anotaciones diarias de un usuario en una fecha específica
    public function obtenerAnotacionesDiarias($usuario_id, $fecha) {
        global $conn;

        $stmt = $conn->prepare("SELECT contenido FROM Diario WHERE usuario_id = ? AND fecha = ?");
        $stmt->bind_param("is", $usuario_id, $fecha);
        $stmt->execute();

        $result = $stmt->get_result();
        $anotacionesDiarias = [];
        while ($row = $result->fetch_assoc()) {
            $anotacionesDiarias[] = $row['contenido'];
        }

        return $anotacionesDiarias;
    }

    // Otras funciones CRUD para Diario pueden agregarse de manera similar
}
?>
