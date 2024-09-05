<?php

include('../../../app/config.php');

$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$rol_id = $_POST['rol_id'];
$correo = $_POST['correo'];
$password = $_POST['password'];
$password_confirmada = $_POST['password_confirmada'];

if($password == $password_confirmada){
    //echo"Las contraseñas son iguales";
    $password = password_hash($password, PASSWORD_DEFAULT);

    $sentencia = $pdo->prepare('INSERT INTO usuarios
    (nombres,apellidos,rol_id,correo,password, fyh_creacion, estado)
    VALUES ( :nombres,:apellidos,:rol_id,:correo,:password,:fyh_creacion,:estado)');

    $sentencia->bindParam(':nombres',$nombres);
    $sentencia->bindParam(':apellidos',$apellidos);
    $sentencia->bindParam(':rol_id',$rol_id);
    $sentencia->bindParam(':correo',$correo);
    $sentencia->bindParam(':password',$password);
    $sentencia->bindParam('fyh_creacion',$fechaAHora);
    $sentencia->bindParam('estado',$estado_registro);

    try{
        if($sentencia->execute()){
            session_start();
                $_SESSION['mensaje'] = "El usuario ha sido registrado exitosamente";
                $_SESSION['icono'] = "success";
                header('Location:'.APP_URL.'/admin/usuarios');
        }else{
            session_start();
                $_SESSION['mensaje'] = "El usuario no ha sido registrado, por favor intenta de nuevo o comunicate con el administrador";
                $_SESSION['icono'] = "error";
        }
    }catch (Exception $exception){
        session_start();
        $_SESSION['mensaje'] = "El correo electronico ingresado ya esta en uso, por favor ingresa uno diferente";
        $_SESSION['icono'] = "warning";
        ?><script>window.history.back();</script><?php
    }  
}else{
    //echo"Las contraseñas no son iguales";
    session_start();
        $_SESSION['mensaje'] = "Las contraseñas introducidas no son iguales";
        $_SESSION['icono'] = "warning";
        ?><script>window.history.back();</script><?php
}



