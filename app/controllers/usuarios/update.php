<?php

include('../../../app/config.php');
$id_usuario = $_POST['id_usuario'];
$rol_id = $_POST['rol_id'];
$correo = $_POST['correo'];
$password = $_POST['password'];
$estado = $_POST['estado'];
$password_confirmada = $_POST['password_confirmada'];
if($estado=="ACTIVO"){
    $estado = 1;
}else{
    $estado = 0;
}


if ($password == ""){ 
        $sentencia = $pdo->prepare('UPDATE usuarios
        SET 
            rol_id=:rol_id,
            correo=:correo,
            fyh_actualizacion=:fyh_actualizacion,
            estado=:estado
        WHERE id_usuario=:id_usuario');
        
        $sentencia->bindParam(':rol_id',$rol_id);
        $sentencia->bindParam(':correo',$correo);
        $sentencia->bindParam(':fyh_actualizacion',$fechaAHora);
        $sentencia->bindParam(':estado',$estado);
        $sentencia->bindParam(':id_usuario',$id_usuario);
    
        try{
            if($sentencia->execute()){
                session_start();
                    $_SESSION['mensaje'] = "El usuario ha sido actualizado exitosamente";
                    $_SESSION['icono'] = "success";
                    header('Location:'.APP_URL.'/admin/usuarios');
            }else{
                session_start();
                    $_SESSION['mensaje'] = "No se ha podido actualizar el usuario, por favor intenta de nuevo o comunicate con el administrador";
                    $_SESSION['icono'] = "error";
            }
        }catch (Exception $exception){
            session_start();
            $_SESSION['mensaje'] = "El correo electronico ingresado ya esta en uso, por favor ingresa uno diferente";
            $_SESSION['icono'] = "warning";
            ?><script>window.history.back();</script><?php
        }  
    


}else{
    if($password == $password_confirmada){
        //echo"Las contraseñas son iguales";
        $password = password_hash($password, PASSWORD_DEFAULT);
    
        $sentencia = $pdo->prepare('UPDATE usuarios
        SET 
            rol_id=:rol_id,
            correo=:correo,
            password=:password,
            fyh_actualizacion=:fyh_actualizacion,
            estado=:estado
        WHERE id_usuario=:id_usuario');
        

        $sentencia->bindParam(':rol_id',$rol_id);
        $sentencia->bindParam(':correo',$correo);
        $sentencia->bindParam(':password',$password);
        $sentencia->bindParam(':fyh_actualizacion',$fechaAHora);
        $sentencia->bindParam(':estado',$estado);
        $sentencia->bindParam(':id_usuario',$id_usuario);
    
        try{
            if($sentencia->execute()){
                session_start();
                    $_SESSION['mensaje'] = "El usuario ha sido actualizado exitosamente";
                    $_SESSION['icono'] = "success";
                    header('Location:'.APP_URL.'/admin/usuarios');
            }else{
                session_start();
                    $_SESSION['mensaje'] = "No se ha podido actualizar el usuario, por favor intenta de nuevo o comunicate con el administrador";
                    $_SESSION['icono'] = "error";
            }
        }catch (Exception $exception){
            session_start();
            $_SESSION['mensaje'] = "El correo electronico ingresado ya esta en uso, por favor ingresa uno diferente";
            $_SESSION['icono'] = "warning";
            ?><script>window.history.back();</script><?php
        }  
    }else{
        //echo"Las contraseñas no son iguales";
        session_start();
            $_SESSION['mensaje'] = "Las contraseñas introducidas no son iguales";
            $_SESSION['icono'] = "warning";
            ?><script>window.history.back();</script><?php
    }


}





