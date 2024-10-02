<?php

include ('../../../../app/config.php');

$logo = $_POST['logo'];
$nombre_institucion = $_POST['nombre_institucion'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$id_inst_config = $_POST['id_inst_config'];


if($_FILES['file']['name'] != null){
    //echo "existe una imagen";
    $nombre_archivo = date ('Y-m-d-H-i-s').$_FILES['file']['name'];
    $location = "../../../../public/images/configuracion".$nombre_archivo;
    move_uploaded_file($_FILES['file']['tmp_name'],$location);
    $logo = $nombre_archivo;
}else{
    //echo "no existe imagen";
    if($logo == ""){
        $logo = "";
    }else{
        $logo = $_POST['logo'];
    }
}


$sentencia = $pdo->prepare('UPDATE datos_institucion 
          SET nombre_institucion=:nombre_institucion,
              logo=:logo,
              direccion=:direccion,
              telefono=:telefono,
              correo=:correo, 
              fyh_actualizacion=:fyh_actualizacion
          WHERE id_inst_config=:id_inst_config');

$sentencia->bindParam(':nombre_institucion',$nombre_institucion);
$sentencia->bindParam(':logo',$logo);
$sentencia->bindParam(':direccion',$direccion);
$sentencia->bindParam(':telefono',$telefono);
$sentencia->bindParam(':correo',$correo);
$sentencia->bindParam('fyh_actualizacion',$fechaAHora);
$sentencia->bindParam('id_inst_config',$id_inst_config);

if($sentencia->execute()){
    echo 'success';
    session_start();
    $_SESSION['mensaje'] = "Los datos de la institución han sido actualizados correctamente";
    $_SESSION['icono'] = "success";
    header('Location:'.APP_URL."/admin/configuraciones/institucion");
//header('Location:' .$URL.'/');
}else{
    //echo 'error al registrar a la base de datos';
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo actualizar la informacion, por favor intenta de nuevo o comunicate con el administrador";
    $_SESSION['icono'] = "error";
    ?><script>window.history.back();</script><?php
}
