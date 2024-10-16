<?php
include('../../../app/config.php');
$id_observacion = $_POST['id_observacion'];

//para trabajar con parámetros
$sentencia = $pdo->prepare("DELETE FROM observaciones WHERE id_observacion=:id_observacion");


$sentencia->bindParam('id_observacion', $id_observacion);


    if($sentencia->execute()){
        session_start();
        $_SESSION['mensaje'] = 'La observacion ha sido eliminada correctamente';
        $_SESSION['icono'] = 'success';
        header('Location:'.APP_URL."/admin/observaciones");
    }else{
        session_start();
        $_SESSION['mensaje'] = 'Error al eliminar la observacion de la base de datos';
        $_SESSION['icono'] = 'error';
        header('Location:'.APP_URL."/admin/observaciones");
}

?>