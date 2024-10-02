<?php

include ('../../../../app/config.php');

$id_periodo = $_POST['id_periodo'];
$periodo = $_POST['periodo'];
$estado = $_POST['estado'];

if($estado=="ACTIVO"){
    $estado = 1;
}else{
    $estado = 0;
}

$sentencia = $pdo->prepare('UPDATE año_escolar
 SET periodo=:periodo,
     fyh_actualizacion=:fyh_actualizacion,
     estado=:estado
WHERE id_periodo=:id_periodo');

$sentencia->bindParam(':periodo',$periodo);
$sentencia->bindParam('fyh_actualizacion',$fechaHora);
$sentencia->bindParam('estado',$estado);
$sentencia->bindParam('id_periodo',$id_periodo);

if($sentencia->execute()){
    //echo 'success';
    //echo 'success';
    session_start();
    $_SESSION['mensaje'] = "Se actualizó el año escolar exitosamente";
    $_SESSION['icono'] = "success";
    header('Location:'.APP_URL."/admin/configuraciones/datos_año");
//header('Location:' .$URL.'/');
}else{
    //echo 'error al regis a la base de datos';
    session_start();
    $_SESSION['mensaje'] = "Error, no se pudo actualizar el año escolar, por favor intenta de nuevo o comunicate con el administrador";
    $_SESSION['icono'] = "error";
    ?><script>window.history.back();</script><?php
}