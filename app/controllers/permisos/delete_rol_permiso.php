<?php

include('../../../app/config.php');

$id_rol_permiso = $_POST['id_rol_permiso'];

$sentencia = $pdo->prepare("DELETE FROM roles_permisos WHERE id_rol_permiso=:id_rol_permiso");

$sentencia->bindParam(':id_rol_permiso', $id_rol_permiso);

if($sentencia->execute()){
    session_start();
    $_SESSION['mensaje'] = "El permiso ha sido eliminado correctamente";
    $_SESSION['icono'] = "success";

    header('Location:' .APP_URL."/admin/roles");
}else{
    session_start();
    $_SESSION['mensaje'] = "Error al eliminar el permiso, intenta de nuevo o comunicate con el administrador";
    $_SESSION['icono'] = "error";

    ?><script>window.history.back()</script><?php
}

?>