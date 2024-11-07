<?php

include('../../../app/config.php');

$id_estudiante = $_POST['id_estudiante'];

//para trabajar con parámetros
$sentencia = $pdo->prepare("DELETE FROM estudiantes WHERE id_estudiante=:id_estudiante");


$sentencia->bindParam('id_estudiante', $id_estudiante);

try {
    if($sentencia->execute()){
        session_start();
        $_SESSION['mensaje'] = 'El usuario del estudiante ha sido eliminado correctamente';
        $_SESSION['icono'] = 'success';
        header('Location:'.APP_URL."/admin/estudiantes");
    }else{
        session_start();
        $_SESSION['mensaje'] = 'Error al eliminar el estudiante de la base de datos';
        $_SESSION['icono'] = 'error';
        ?> <script>window.history.back()</script>  <?php
}
} catch (Exception $exception) {
    session_start();
        $_SESSION['mensaje'] = 'Error el usuario del estudiante no se ha podido eliminar debido a que se encuentra relacionado con otros registros';
        $_SESSION['icono'] = 'error';
        ?> <script>window.history.back()</script>  <?php
}

?>