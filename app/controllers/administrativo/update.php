<?php

include('../../../app/config.php');

$id_administrativo = $_POST['id_administrativo'];
$id_usuario = $_POST['id_usuario'];
$id_persona = $_POST['id_persona'];
$rol_id = $_POST['rol_id'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$cui = $_POST['cui'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$celular = $_POST['celular'];
$correo = $_POST['correo'];
$direccion = $_POST['direccion'];

/* ACTUALIZAR TABLA USUARIOS */
$pdo->beginTransaction();
$password = password_hash($cui, PASSWORD_DEFAULT);

    $sentencia = $pdo->prepare('UPDATE usuarios
        SET  rol_id=:rol_id,
             correo=:correo,
             password=:password, 
             fyh_actualizacion=:fyh_actualizacion
    WHERE  id_usuario=:id_usuario ');

    $sentencia->bindParam(':rol_id',$rol_id);
    $sentencia->bindParam(':correo',$correo);
    $sentencia->bindParam(':password',$password);
    $sentencia->bindParam('fyh_actualizacion',$fechaAHora);
    $sentencia->bindParam('id_usuario',$id_usuario);
$sentencia->execute();




/* ACTUALIZAR TABLA PERSONAS */
$sentencia = $pdo->prepare('UPDATE personas
            SET nombres=:nombres,
                apellidos=:apellidos,
                cui=:cui,
                fecha_nacimiento=:fecha_nacimiento,
                celular=:celular,
                direccion=:direccion,
                fyh_actualizacion=:fyh_actualizacion
        WHERE   id_persona=:id_persona');


$sentencia->bindParam(':nombres',$nombres);
$sentencia->bindParam(':apellidos',$apellidos);
$sentencia->bindParam(':cui',$cui);
$sentencia->bindParam(':fecha_nacimiento',$fecha_nacimiento);
$sentencia->bindParam(':celular',$celular);
$sentencia->bindParam(':direccion',$direccion);
$sentencia->bindParam('fyh_actualizacion',$fechaAHora);
$sentencia->bindParam('id_persona',$id_persona);
$sentencia->execute();


/* ACTUALIZAR TABLA ADMINISTRATIVOS */
$sentencia = $pdo->prepare('UPDATE administrativos
            SET fyh_actualizacion=:fyh_actualizacion
        WHERE   id_administrativo=:id_administrativo ');


$sentencia->bindParam('fyh_actualizacion',$fechaAHora);
$sentencia->bindParam('id_administrativo',$id_administrativo);


if($sentencia->execute()){
echo 'success';
session_start();
    $_SESSION['mensaje'] = "El usuario administrativo ha sido actualizado correctamente";
    $_SESSION['icono'] = "success";
    header('Location:'.APP_URL."/admin/administrativo");
$pdo->commit();
//header('Location:' .$URL.'/');
}else{
echo 'error al registrar a la base de datos';
$pdo->rollBack();
session_start();
    $_SESSION['mensaje'] = "Error no se pudo actualizar el usuario en la base datos, comuniquese con el administrador";
    $_SESSION['icono'] = "error";
    ?><script>window.history.back();</script><?php
}





