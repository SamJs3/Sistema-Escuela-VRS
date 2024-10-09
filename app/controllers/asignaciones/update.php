<?php

include ('../../../app/config.php');

$id_asignacion = $_POST['id_asignacion'];
$id_nivel = $_POST['id_nivel'];
$id_grado = $_POST['id_grado'];
$id_curso = $_POST['id_curso'];

$sentencia = $pdo->prepare('UPDATE asignaciones
            SET nivel_id=:nivel_id,
                grado_id=:grado_id,
                curso_id=:curso_id,
                fyh_actualizacion=:fyh_actualizacion
            WHERE id_asignacion=:id_asignacion');


$sentencia->bindParam(':nivel_id',$id_nivel);
$sentencia->bindParam(':grado_id',$id_grado);
$sentencia->bindParam(':curso_id',$id_curso);
$sentencia->bindParam('fyh_actualizacion',$fechaAHora);
$sentencia->bindParam('id_asignacion',$id_asignacion);

if($sentencia->execute()){
    echo 'success';
    session_start();
    $_SESSION['mensaje'] = "La asignacion ha sido actualizada con exito";
    $_SESSION['icono'] = "success";
    header('Location:'.APP_URL."/admin/asignaciones");
//header('Location:' .$URL.'/');
}else{
    echo 'error al registrar a la base de datos';
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo actualizar la asignacion en la base datos, intente de nuevo o comuniquese con el administrador";
    $_SESSION['icono'] = "error";
    ?><script>window.history.back();</script><?php
}