<?php


include ('../../../../app/config.php');

$periodo = $_POST['periodo'];
$estado = $_POST['estado'];
if($estado=="ACTIVO"){
    $estado = 1;
}else{
    $estado = 0;
}

$sentencia = $pdo->prepare('INSERT INTO año_escolar
(periodo, fyh_creacion, estado)
VALUES ( :periodo,:fyh_creacion,:estado)');

$sentencia->bindParam(':periodo',$periodo);
$sentencia->bindParam('fyh_creacion',$fechaAHora);
$sentencia->bindParam('estado',$estado);

if($sentencia->execute()){
    //echo 'success';
    echo 'success';
    session_start();
    $_SESSION['mensaje'] = "El nuevo año escolar ha sido registrado exitosamente";
    $_SESSION['icono'] = "success";
    header('Location:'.APP_URL."/admin/configuraciones/datos_año");
//header('Location:' .$URL.'/');
}else{
    //echo 'error al registrar a la base de datos';
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo registrar el nuevo año, intente de nuevo o comuniquese con el administrador";
    $_SESSION['icono'] = "error";
    ?><script>window.history.back();</script><?php
}