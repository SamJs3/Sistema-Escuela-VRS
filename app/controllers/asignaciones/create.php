<?php

include ('../../../app/config.php');

$id_docente = $_POST['id_docente'];
$id_nivel = $_POST['id_nivel'];
$id_grado = $_POST['id_grado'];
$id_curso = $_POST['id_curso'];

$sentencia = $pdo->prepare('INSERT INTO asignaciones
(docente_id,nivel_id,grado_id,curso_id,fyh_creacion, estado)
VALUES ( :docente_id,:nivel_id,:grado_id,:curso_id,:fyh_creacion,:estado)');

$sentencia->bindParam(':docente_id',$id_docente);
$sentencia->bindParam(':nivel_id',$id_nivel);
$sentencia->bindParam(':grado_id',$id_grado);
$sentencia->bindParam(':curso_id',$id_curso);
$sentencia->bindParam('fyh_creacion',$fechaAHora);
$sentencia->bindParam('estado',$estado_registro);

if($sentencia->execute()){
    echo 'success';
    session_start();
    $_SESSION['mensaje'] = "La asignacion ha sido realizada con exito";
    $_SESSION['icono'] = "success";
    header('Location:'.APP_URL."/admin/asignaciones");
//header('Location:' .$URL.'/');
}else{
    echo 'error al registrar a la base de datos';
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo registrar en la base datos, intente de nuevo o comuniquese con el administrador";
    $_SESSION['icono'] = "error";
    ?><script>window.history.back();</script><?php
}