<?php

include ('../../../app/config.php');

$id_curso = $_POST['id_curso'];

$sentencia = $pdo->prepare("DELETE FROM cursos where id_curso=:id_curso ");

$sentencia->bindParam('id_curso',$id_curso);

try{	
if($sentencia->execute()){
    session_start();
    $_SESSION['mensaje'] = "El curso ha sido eliminado correctamente";
    $_SESSION['icono'] = "success";
    header('Location:'.APP_URL."/admin/cursos");
}else{
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo eliminar el curso, intente de nuevo o contactese con el administrador";
    $_SESSION['icono'] = "error";
    header('Location:'.APP_URL."/admin/cursos");
}
}   catch(Exception $exception){
    session_start();
    $_SESSION['mensaje'] = "Error, no se pudo eliminar el curso debido a que esta relacionado con otros módulos";
    $_SESSION['icono'] = "error";
    header('Location:'.APP_URL."/admin/cursos");
}



