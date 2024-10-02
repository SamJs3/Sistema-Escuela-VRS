<?php

include ('../../../app/config.php');

$nombre_curso = $_POST['nombre_curso'];

$sentencia = $pdo->prepare('INSERT INTO cursos
(nombre_curso,fyh_creacion, estado)
VALUES ( :nombre_curso,:fyh_creacion,:estado)');

$sentencia->bindParam(':nombre_curso',$nombre_curso);
$sentencia->bindParam('fyh_creacion',$fechaAHora);
$sentencia->bindParam('estado',$estado_registro);

if($sentencia->execute()){
    echo 'success';
    session_start();
    $_SESSION['mensaje'] = "Se registro la materia de la manera correcta en la base de datos";
    $_SESSION['icono'] = "success";
    header('Location:'.APP_URL."/admin/cursos");
//header('Location:' .$URL.'/');
}else{
    echo 'error al registrar a la base de datos';
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo registrar en la base datos, comuniquese con el administrador";
    $_SESSION['icono'] = "error";
    ?><script>window.history.back();</script><?php
}