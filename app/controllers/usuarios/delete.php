<?php

$id_usuario = $_POST['id_usuario'];

include('../../../app/config.php');

 


$sentencia = $pdo->prepare("DELETE FROM usuarios WHERE id_usuario=:id_usuario");

$sentencia->bindParam('id_usuario',$id_usuario);

    if($sentencia->execute()){
        session_start();
        $_SESSION['mensaje'] = "El usuario ha sido eliminado exitosamente";
        $_SESSION['icono'] = "success";
        header('Location: ' . APP_URL . "/admin/usuarios");
    }else{
        session_start();
        $_SESSION['mensaje'] = "No se pudo eliminar el rol, por favor intenta de nuevo o comunícate con el administrador";
        $_SESSION['icono'] = "error";
        header('Location: ' . APP_URL . "/admin/usuarios");
    }







