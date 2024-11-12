<?php

include('../../../app/config.php');

$id_usuario = $_POST['id_usuario'];
$id_persona = $_POST['id_persona'];
$id_estudiante = $_POST['id_estudiante'];
$id_padre = $_POST['id_padre'];
$rol_id = $_POST['rol_id'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$cui = $_POST['cui'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$celular = $_POST['celular'];
$correo = $_POST['correo'];
$direccion = $_POST['direccion'];
$nivel_id = $_POST['nivel_id'];
$grado_id = $_POST['grado_id'];
$nombres_pf = $_POST['nombres_pf'];
$apellidos_pf = $_POST['apellidos_pf'];
$cui_pf = $_POST['cui_pf'];
$celular_pf = $_POST['celular_pf'];
$parentezco = $_POST['parentezco'];
$encargado_dos = $_POST['encargado_dos'];
$numero_dos = $_POST['numero_dos'];
$estado = $_POST['estado'];

if($estado=="ACTIVO"){
    $estado = 1;
}else{
    $estado = 0;
}


/* ACUTALIZAR TABLA USUARIOS */
$pdo->beginTransaction();
$password = password_hash($cui, PASSWORD_DEFAULT);

    $sentencia = $pdo->prepare('UPDATE usuarios
           SET rol_id=:rol_id,
               correo=:correo,
               password=:password,
               fyh_actualizacion=:fyh_actualizacion
    WHERE  id_usuario=:id_usuario');

    $sentencia->bindParam(':rol_id',$rol_id);
    $sentencia->bindParam(':correo',$correo);
    $sentencia->bindParam(':password',$password);
    $sentencia->bindParam('fyh_actualizacion',$fechaAHora);
    $sentencia->bindParam('id_usuario',$id_usuario);
$sentencia->execute();



/* ACTUALIZAR TABLA PERSONAS */
$sentencia = $pdo->prepare('UPDATE personas
            SET 
                 nombres=:nombres,
                 apellidos=:apellidos,
                 cui=:cui,
                 fecha_nacimiento=:fecha_nacimiento,
                 celular=:celular,
                 direccion=:direccion,
                 fyh_actualizacion=:fyh_actualizacion,
                 estado=:estado
            WHERE id_persona=:id_persona');


$sentencia->bindParam(':nombres',$nombres);
$sentencia->bindParam(':apellidos',$apellidos);
$sentencia->bindParam(':cui',$cui);
$sentencia->bindParam(':fecha_nacimiento',$fecha_nacimiento);
$sentencia->bindParam(':celular',$celular);
$sentencia->bindParam(':direccion',$direccion);
$sentencia->bindParam('fyh_actualizacion',$fechaAHora);
$sentencia->bindParam('estado',$estado_registro);
$sentencia->bindParam(':id_persona',$id_persona);
$sentencia->execute();



/* ACTUALIZAR TABLA ESTUDIANTES */
$sentencia = $pdo->prepare('UPDATE estudiantes
            SET 
                nivel_id=:nivel_id,
                grado_id=:grado_id,
                fyh_actualizacion=:fyh_actualizacion,
                estado=:estado
            WHERE id_estudiante=:id_estudiante');

$sentencia->bindParam(':nivel_id',$nivel_id);
$sentencia->bindParam(':grado_id',$grado_id);
$sentencia->bindParam('fyh_actualizacion',$fechaAHora);
$sentencia->bindParam('id_estudiante',$id_estudiante);
$sentencia->bindParam('estado',$estado);
$sentencia->execute();



/* INSERT TABLA PADRES DE FAMILIA */
$sentencia = $pdo->prepare('UPDATE padres_familia
            SET nombres_pf=:nombres_pf,
                apellidos_pf=:apellidos_pf,
                cui_pf=:cui_pf,
                celular_pf=:celular_pf,
                parentezco=:parentezco,
                encargado_dos=:encargado_dos,
                numero_dos=:numero_dos,
                fyh_actualizacion=:fyh_actualizacion
            WHERE id_padre=:id_padre');


$sentencia->bindParam(':nombres_pf',$nombres_pf);
$sentencia->bindParam(':apellidos_pf',$apellidos_pf);
$sentencia->bindParam(':cui_pf',$cui_pf);
$sentencia->bindParam(':celular_pf',$celular_pf);
$sentencia->bindParam(':parentezco',$parentezco);
$sentencia->bindParam(':encargado_dos',$encargado_dos);
$sentencia->bindParam(':numero_dos',$numero_dos);
$sentencia->bindParam('fyh_actualizacion',$fechaAHora);
$sentencia->bindParam('id_padre',$id_padre);



if($sentencia->execute()){
echo 'success';
session_start();
    $_SESSION['mensaje'] = "El estudiante ha sido actualizado correctamente";
    $_SESSION['icono'] = "success";
    header('Location:'.APP_URL."/admin/estudiantes");
$pdo->commit();
//header('Location:' .$URL.'/');
}else{
echo 'error al registrar a la base de datos';
$pdo->rollBack();
session_start();
    $_SESSION['mensaje'] = "Error no se pudo actualizar en la base datos, intente de nuevo o comuniquese con el administrador";
    $_SESSION['icono'] = "error";
    ?><script>window.history.back();</script><?php
}





