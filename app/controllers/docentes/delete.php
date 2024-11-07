<?php
include('../../../app/config.php');
session_start(); // Mueve el session_start al inicio

$id_docente = $_POST['id_docente'];

// Preparar la consulta SQL con el parámetro
$sentencia = $pdo->prepare("DELETE FROM docentes WHERE id_docente=:id_docente");
$sentencia->bindParam(':id_docente', $id_docente); // Asegurarse de que usa ":id_docente"

try {
    if ($sentencia->execute()) {
        $_SESSION['mensaje'] = 'Se eliminó los datos del docente de la manera correcta';
        $_SESSION['icono'] = 'success';
        header('Location:' . APP_URL . "/admin/docentes");
    } else {
        $_SESSION['mensaje'] = 'Error al eliminar el docente de la base de datos';
        $_SESSION['icono'] = 'error';
        header('Location:' . APP_URL . "/admin/docentes");
    }
} catch (Exception $exception) {
    $_SESSION['mensaje'] = 'Error al eliminar el docente de la base de datos porque se encuentra asignado a las respectivas materias';
    $_SESSION['icono'] = 'error';
    ?> 
    <script>window.history.back()</script>
    <?php
}
?>
