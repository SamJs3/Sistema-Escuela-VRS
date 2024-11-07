<?php

include('../../../app/config.php');

$id_grado = $_POST['id_grado'];

//para trabajar con parámetros
$sentencia = $pdo->prepare("DELETE FROM grados WHERE id_grado=:id_grado");


$sentencia->bindParam('id_grado', $id_grado);

try {
    if($sentencia->execute()){
        session_start();
        $_SESSION['mensaje'] = 'El grado ha sido eliminado de la manera correcta';
        $_SESSION['icono'] = 'success';
        header('Location:'.APP_URL."/admin/grados");
    }else{
        session_start();
        $_SESSION['mensaje'] = 'Error al eliminar el grado de la base de datos';
        $_SESSION['icono'] = 'error';
        ?> <script>window.history.back()</script>  <?php
}
} catch (Exception $exception) {
    session_start();
        $_SESSION['mensaje'] = 'Error, el grado no se ha podido eliminar debido a que existen docentes asignados a este grado';
        $_SESSION['icono'] = 'error';
        ?> <script>window.history.back()</script>  <?php
}

?>