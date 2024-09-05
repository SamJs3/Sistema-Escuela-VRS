<?php
include('../../../app/config.php');
$id_rol = $_POST['id_rol'];

 
$sql_usuarios = "SELECT * FROM usuarios where estado= '1' and rol_id = '$id_rol' ";
$query_usuarios = $pdo->prepare($sql_usuarios);
$query_usuarios->execute();
$usuarios = $query_usuarios->fetchAll(PDO::FETCH_ASSOC);
$contador = 0;

foreach ($usuarios as $usuario){
    $contador = $contador+1;
}
if($contador>0){
    session_start();
        $_SESSION['mensaje'] = "Error, no se puede completar la acción debido a que existen usuarios asignados a este rol";
        $_SESSION['icono'] = "error";
        header('Location: ' . APP_URL . "/admin/roles");
}else{
    $sentencia = $pdo->prepare("DELETE FROM roles WHERE id_rol=:id_rol");

    $sentencia->bindParam('id_rol',$id_rol);

        if($sentencia->execute()){
            session_start();
            $_SESSION['mensaje'] = "El rol ha sido eliminado exitosamente";
            $_SESSION['icono'] = "success";
            header('Location: ' . APP_URL . "/admin/roles");
        }else{
            session_start();
            $_SESSION['mensaje'] = "No se pudo eliminar el rol, por favor intenta de nuevo o comunícate con el administrador";
            $_SESSION['icono'] = "error";
            header('Location: ' . APP_URL . "/admin/roles");
        }

}









