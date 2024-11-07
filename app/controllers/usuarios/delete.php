<?php

$id_usuario = $_POST['id_usuario'];

include('../../../app/config.php');

 


$sentencia = $pdo->prepare("DELETE FROM usuarios WHERE id_usuario=:id_usuario");

$sentencia->bindParam('id_usuario',$id_usuario);

try {
    
    if($sentencia->execute()){
        session_start();
        $_SESSION['mensaje'] = 'El usuario ha sido eliminado correctamente';
        $_SESSION['icono'] = 'success';
        header('Location:'.APP_URL."/admin/usuarios");
    }else{
        session_start();
        $_SESSION['mensaje'] = 'Error al eliminar el usuario de la base de datos';
        $_SESSION['icono'] = 'error';
        header('Location:'.APP_URL."/admin/usuarios");
}
} catch (Exception $exception) {
    session_start();
    $_SESSION['mensaje'] = 'El usuario no ha sido eliminado debido a que existe en otros modulos';
    $_SESSION['icono'] = 'error';
    header('Location:'.APP_URL."/admin/usuarios");
}


?>





