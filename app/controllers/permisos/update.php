<?php
    include('../../../app/config.php');

    $id_permiso = $_POST['id_permiso'];
    $nombre_url = $_POST['nombre_url'];
    $url = $_POST['url'];

    $sentencia = $pdo->prepare("UPDATE permisos
    SET nombre_url=:nombre_url,
        url=:url,
        fyh_actualizacion=:fyh_actualizacion
    WHERE id_permiso =:id_permiso");

    $sentencia->bindParam(':nombre_url', $nombre_url);
    $sentencia->bindParam(':url', $url);
    $sentencia->bindParam(':fyh_actualizacion', $fechaAHora);
    $sentencia->bindParam(':id_permiso', $id_permiso);

    if($sentencia->execute()){
        session_start();
        $_SESSION['mensaje'] = "El permiso ha sido actualizado correctamente";
        $_SESSION['icono'] = "success";

        header('Location:' .APP_URL."/admin/permisos/index.php");
    }else{
        session_start();
        $_SESSION['mensaje'] = "Error al actualizar el permiso en la base de datos";
        $_SESSION['icono'] = "error";

        ?><script>window.history.back()</script><?php
    }
?>