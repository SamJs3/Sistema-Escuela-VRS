<?php

include('../../../app/config.php');

$id_rol_permiso = $_POST['id_rol_permiso'];

$sentencia = $pdo->prepare("DELETE FROM roles_permisos WHERE id_rol_permiso=:id_rol_permiso");

$sentencia->bindParam(':id_rol_permiso', $id_rol_permiso);

if($sentencia->execute()){
    session_start();
    $_SESSION['mensaje'] = "El permiso ha sido eliminado de la manera correcta";
    $_SESSION['icono'] = "success";

    header('Location:' .APP_URL."/admin/roles");
}else{
    session_start();
    $_SESSION['mensaje'] = "Error al eliminar el permiso de la base de datos";
    $_SESSION['icono'] = "error";

    ?><script>window.history.back()</script><?php
}

?>