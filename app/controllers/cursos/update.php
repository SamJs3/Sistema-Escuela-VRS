<?php

include ('../../../app/config.php');

$id_curso = $_POST['id_curso'];
$nombre_curso = $_POST['nombre_curso'];
$estado = $_POST['estado'];

$sentencia = $pdo->prepare('UPDATE cursos
 SET nombre_curso=:nombre_curso,
     fyh_actualizacion=:fyh_actualizacion,
     estado=:estado
WHERE id_curso=:id_curso ');

$sentencia->bindParam(':nombre_curso',$nombre_curso);
$sentencia->bindParam('fyh_actualizacion',$fechaAHora);
$sentencia->bindParam('id_curso',$id_curso);
$sentencia->bindParam('estado',$estado);


if($sentencia->execute()){
    echo 'success';
    session_start();
    $_SESSION['mensaje'] = "Se actualizó la materia de la manera correcta en la base de datos";
    $_SESSION['icono'] = "success";
    header('Location:'.APP_URL."/admin/cursos");
//header('Location:' .$URL.'/');
}else{
    echo 'error al registrar a la base de datos';
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo actualizar en la base datos, comuniquese con el administrador";
    $_SESSION['icono'] = "error";
    ?><script>window.history.back();</script><?php
}