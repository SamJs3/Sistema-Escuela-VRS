<?php
include('../../../app/config.php');
$id_administrativo = $_POST['id_administrativo'];


$sentencia = $pdo->prepare("DELETE FROM administrativos WHERE id_administrativo=:id_administrativo");


$sentencia->bindParam('id_administrativo', $id_administrativo);

try {
    
    if($sentencia->execute()){
        session_start();
        $_SESSION['mensaje'] = 'El usuario administrativo ha sido eliminado correctamente';
        $_SESSION['icono'] = 'success';
        header('Location:'.APP_URL."/admin/administrativo");
    }else{
        session_start();
        $_SESSION['mensaje'] = 'Error al eliminar al personal administrativo de la base de datos';
        $_SESSION['icono'] = 'error';
        header('Location:'.APP_URL."/admin/administrativo");
}
} catch (Exception $exception) {
    session_start();
    $_SESSION['mensaje'] = 'No se ha podido eliminar al usuario administrativo debido a que este usuario esta relacionado con otros modulos';
    $_SESSION['icono'] = 'error';
    header('Location:'.APP_URL."/admin/administrativo");
}


?>