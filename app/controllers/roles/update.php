<!-- Aca esta toda la logica para actualizar en la base de datos, los datos que se reciben en el formulario de editar rol -->

<?php

include('../../../app/config.php');

$nombre_rol = $_POST['nombre_rol'];
$nombre_rol = mb_strtoupper($nombre_rol, 'UTF-8');
$estado = $_POST['estado'];
$id_rol = $_POST['id_rol'];

if($nombre_rol == ""){
    session_start();
    $_SESSION['mensaje'] = "Por favor, ingrese el nombre del nuevo rol";
    $_SESSION['icono'] = "warning";
    header('Location: ' . APP_URL . "/admin/roles/edit.php?id=".$id_rol);
}else{
    $sentencia = $pdo->prepare("UPDATE roles 
    SET nombre_rol=:nombre_rol,
    fyh_actualizacion=:fyh_actualizacion, 
    estado=:estado 
    WHERE id_rol=:id_rol");

    $sentencia->bindParam('nombre_rol',$nombre_rol);
    $sentencia->bindParam('fyh_actualizacion',$fechaAHora);
    $sentencia->bindParam('estado',$estado);
    $sentencia->bindParam('id_rol',$id_rol);



try{
    if($sentencia->execute()){
        session_start();
        $_SESSION['mensaje'] = "El rol ha sido actualizado con éxito";
        $_SESSION['icono'] = "success";
        header('Location: ' . APP_URL . "/admin/roles");
    }else{
        session_start();
        $_SESSION['mensaje'] = "No se pudo actualizar el rol, por favor intenta de nuevo o comunícate con el administrador";
        $_SESSION['icono'] = "error";
        header('Location: ' . APP_URL . "/admin/roles/edit.php?id=".$id_rol);
    }

}catch (Exception $exception) {
        session_start();
        $_SESSION['mensaje'] = "Este rol ya existe en la base de datos";
        $_SESSION['icono'] = "warning";
        header('Location: ' . APP_URL . "/admin/roles/edit.php?id=".$id_rol);
}



}
