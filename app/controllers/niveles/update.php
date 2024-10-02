<?php

include ('../../../app/config.php');

$id_nivel = $_POST['id_nivel'];
$periodo_id = $_POST['periodo_id'];
$nivel = $_POST['nivel'];
$turno = $_POST['turno'];

$sentencia = $pdo->prepare('UPDATE niveles
 SET periodo_id=:periodo_id,
     nivel=:nivel,
     turno=:turno,
     fyh_actualizacion=:fyh_actualizacion
WHERE id_nivel=:id_nivel ');

$sentencia->bindParam(':periodo_id',$periodo_id);
$sentencia->bindParam(':nivel',$nivel);
$sentencia->bindParam(':turno',$turno);
$sentencia->bindParam('fyh_actualizacion',$fechaAHora);
$sentencia->bindParam('id_nivel',$id_nivel);

if($sentencia->execute()){
    echo 'success';
    session_start();
    $_SESSION['mensaje'] = "Se actualizó el nivel de la manera correcta en la base de datos";
    $_SESSION['icono'] = "success";
    header('Location:'.APP_URL."/admin/niveles");
//header('Location:' .$URL.'/');
}else{
    echo 'error al registrar a la base de datos';
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo actualizar en la base datos, comuniquese con el administrador";
    $_SESSION['icono'] = "error";
    ?><script>window.history.back();</script><?php
}