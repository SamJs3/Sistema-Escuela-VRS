<?php

include ('../../../app/config.php');

$nivel_id = $_POST['nivel_id'];
$grado = $_POST['grado'];
$seccion = $_POST['seccion'];

$sentencia = $pdo->prepare('INSERT INTO grados
(nivel_id,grado,seccion,fyh_creacion,estado)
VALUES ( :nivel_id,:grado,:seccion,:fyh_creacion,:estado)');

$sentencia->bindParam(':nivel_id',$nivel_id);
$sentencia->bindParam(':grado',$grado);
$sentencia->bindParam(':seccion',$seccion);
$sentencia->bindParam('fyh_creacion',$fechaAHora);
$sentencia->bindParam('estado',$estado_registro);

if($sentencia->execute()){
    echo 'success';
    session_start();
    $_SESSION['mensaje'] = "Se registro el grado de la manera correcta en la base de datos";
    $_SESSION['icono'] = "success";
    header('Location:'.APP_URL."/admin/grados");
//header('Location:' .$URL.'/');
}else{
    echo 'error al registrar a la base de datos';
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo registrar en la base datos, comuniquese con el administrador";
    $_SESSION['icono'] = "error";
    ?><script>window.history.back();</script><?php
}