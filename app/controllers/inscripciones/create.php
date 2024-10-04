<?php

include('../../../app/config.php');


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


/* INSERT TABLA USUARIOS */
$pdo->beginTransaction();
$password = password_hash($cui, PASSWORD_DEFAULT);

    $sentencia = $pdo->prepare('INSERT INTO usuarios
            (rol_id,correo,password, fyh_creacion, estado)
    VALUES ( :rol_id,:correo,:password,:fyh_creacion,:estado)');

    $sentencia->bindParam(':rol_id',$rol_id);
    $sentencia->bindParam(':correo',$correo);
    $sentencia->bindParam(':password',$password);
    $sentencia->bindParam('fyh_creacion',$fechaAHora);
    $sentencia->bindParam('estado',$estado_registro);
$sentencia->execute();

$id_usuario = $pdo->lastInsertID();



/* INSERT TABLA PERSONAS */
$sentencia = $pdo->prepare('INSERT INTO personas
(usuario_id,nombres,apellidos,cui,fecha_nacimiento,celular,direccion, fyh_creacion, estado)
VALUES ( :usuario_id,:nombres,:apellidos,:cui,:fecha_nacimiento,:celular,:direccion,:fyh_creacion,:estado)');

$sentencia->bindParam(':usuario_id',$id_usuario);
$sentencia->bindParam(':nombres',$nombres);
$sentencia->bindParam(':apellidos',$apellidos);
$sentencia->bindParam(':cui',$cui);
$sentencia->bindParam(':fecha_nacimiento',$fecha_nacimiento);
$sentencia->bindParam(':celular',$celular);
$sentencia->bindParam(':direccion',$direccion);
$sentencia->bindParam('fyh_creacion',$fechaAHora);
$sentencia->bindParam('estado',$estado_registro);
$sentencia->execute();

$id_persona = $pdo->lastInsertId();

/* INSERT TABLA ADMINISTRATIVOS */
$sentencia = $pdo->prepare('INSERT INTO estudiantes
(persona_id,nivel_id,grado_id,fyh_creacion, estado)
VALUES ( :persona_id,:nivel_id,:grado_id,:fyh_creacion,:estado)');

$sentencia->bindParam(':persona_id',$id_persona);
$sentencia->bindParam(':nivel_id',$nivel_id);
$sentencia->bindParam(':grado_id',$grado_id);
$sentencia->bindParam('fyh_creacion',$fechaAHora);
$sentencia->bindParam('estado',$estado_registro);
$sentencia->execute();

$id_estudiante = $pdo->lastInsertId();

/* INSERT TABLA PADRES DE FAMILIA */
$sentencia = $pdo->prepare('INSERT INTO padres_familia
(estudiante_id,nombres_pf,apellidos_pf,cui_pf,celular_pf,parentezco,encargado_dos,numero_dos,fyh_creacion,estado)
VALUES ( :estudiante_id,:nombres_pf,:apellidos_pf,:cui_pf,:celular_pf,:parentezco,:encargado_dos,:numero_dos,:fyh_creacion,:estado)');

$sentencia->bindParam(':estudiante_id',$id_estudiante);
$sentencia->bindParam(':nombres_pf',$nombres_pf);
$sentencia->bindParam(':apellidos_pf',$apellidos_pf);
$sentencia->bindParam(':cui_pf',$cui_pf);
$sentencia->bindParam(':celular_pf',$celular_pf);
$sentencia->bindParam(':parentezco',$parentezco);
$sentencia->bindParam(':encargado_dos',$encargado_dos);
$sentencia->bindParam(':numero_dos',$numero_dos);
$sentencia->bindParam('fyh_creacion',$fechaAHora);
$sentencia->bindParam('estado',$estado_registro);


if($sentencia->execute()){
echo 'success';
session_start();
    $_SESSION['mensaje'] = "El nuevo estudiante ha sido registrado correctamente";
    $_SESSION['icono'] = "success";
    header('Location:'.APP_URL."/admin/estudiantes");
$pdo->commit();
//header('Location:' .$URL.'/');
}else{
echo 'error al registrar a la base de datos';
$pdo->rollBack();
session_start();
    $_SESSION['mensaje'] = "Error no se pudo registrar en la base datos, comuniquese con el administrador";
    $_SESSION['icono'] = "error";
    ?><script>window.history.back();</script><?php
}





