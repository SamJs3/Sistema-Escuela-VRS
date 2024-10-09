<?php

include ('../../../app/config.php');

$id_asignacion = $_POST['id_asignacion'];



$sentencia = $pdo->prepare("DELETE FROM asignaciones where id_asignacion=:id_asignacion ");

$sentencia->bindParam('id_asignacion',$id_asignacion);


if($sentencia->execute()){
    session_start();
    $_SESSION['mensaje'] = "La asignacion ha sido eliminada correctamente";
    $_SESSION['icono'] = "success";
    header('Location:'.APP_URL."/admin/asignaciones");
}else{
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo eliminar la asignacion, intente de nuevo o contactese con el administrador";
    $_SESSION['icono'] = "error";
    header('Location:'.APP_URL."/admin/cursos");
}




