<?php

include ('../../../app/config.php');

$id_grado = $_POST['id_grado'];
$nivel_id = $_POST['nivel_id'];
$grado = $_POST['grado'];
$seccion = $_POST['seccion'];
$estado = $_POST['estado'];

if($estado=="ACTIVO"){
    $estado = 1;
}else{
    $estado = 0;
}


$sentencia = $pdo->prepare('UPDATE grados
SET nivel_id=:nivel_id,
    grado=:grado,
    seccion=:seccion,
    estado=:estado,
    fyh_actualizacion=:fyh_actualizacion
WHERE id_grado=:id_grado');

$sentencia->bindParam(':nivel_id',$nivel_id);
$sentencia->bindParam(':grado',$grado);
$sentencia->bindParam(':seccion',$seccion);
$sentencia->bindParam('fyh_actualizacion',$fechaAHora);
$sentencia->bindParam('estado',$estado);
$sentencia->bindParam('id_grado',$id_grado);

if($sentencia->execute()){
    echo 'success';
    session_start();
    $_SESSION['mensaje'] = "Se actualizó el grado de la manera correcta en la base de datos";
    $_SESSION['icono'] = "success";
    header('Location:'.APP_URL."/admin/grados");
//header('Location:' .$URL.'/');
}else{
    echo 'error al registrar a la base de datos';
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo actualizar en la base datos, comuniquese con el administrador";
    $_SESSION['icono'] = "error";
    ?><script>window.history.back();</script><?php
}