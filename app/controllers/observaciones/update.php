<?php

include('../../../app/config.php');

$id_observacion = $_POST['id_observacion'];
$docente_id = $_POST['docente_id'];    
$fecha = $_POST['fecha'];    
$estudiante_id = $_POST['estudiante_id'];    
$curso_id = $_POST['curso_id'];    
$observacion = $_POST['observacion'];    
$nota = $_POST['nota'];

$sentencia = $pdo->prepare('UPDATE observaciones
    SET docente_id=:docente_id,
        estudiante_id=:estudiante_id,
        curso_id=:curso_id,
        fecha=:fecha,
        observacion=:observacion,
        nota=:nota,
        fyh_actualizacion=:fyh_actualizacion
    WHERE id_observacion=:id_observacion');
 
 $sentencia->bindParam(':docente_id',$docente_id);
 $sentencia->bindParam(':estudiante_id',$estudiante_id);
 $sentencia->bindParam(':curso_id',$curso_id);
 $sentencia->bindParam(':fecha',$fecha);
 $sentencia->bindParam(':observacion',$observacion);
 $sentencia->bindParam(':nota',$nota);
 $sentencia->bindParam(':fyh_actualizacion',$fechaAHora);
 $sentencia->bindParam(':id_observacion',$id_observacion);
 
 if($sentencia->execute()){
    session_start();
    $_SESSION['mensaje'] = 'La observacion ha sido actualizada correctamente';
    $_SESSION['icono'] = 'success';
    header('Location:'.APP_URL."/admin/observaciones");
 }else{
    session_start();
    $_SESSION['mensaje'] = 'Error al actualizar la observacion a la base de datos';
    $_SESSION['icono'] = 'error';
    ?><script>window.history.back()</script> <?php
 }

?>