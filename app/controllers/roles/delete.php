<?php

$id_rol = $_POST['id_rol'];

include('../../../app/config.php');

 


$sentencia = $pdo->prepare("DELETE FROM roles WHERE id_rol=:id_rol");

$sentencia->bindParam('id_rol',$id_rol);

    if($sentencia->execute()){
        session_start();
        $_SESSION['mensaje'] = "El rol ha sido eliminado con éxito";
        $_SESSION['icono'] = "success";
        header('Location: ' . APP_URL . "/admin/roles");
    }else{
        session_start();
        $_SESSION['mensaje'] = "No se pudo elimiar el rol, por favor intenta de nuevo o comunícate con el administrador";
        $_SESSION['icono'] = "error";
        header('Location: ' . APP_URL . "/admin/roles");
    }







