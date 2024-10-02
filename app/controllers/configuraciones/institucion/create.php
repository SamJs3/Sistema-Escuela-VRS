<?php

include('../../../../app/config.php');

$nombre_institucion = $_POST['nombre_institucion'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];

//esta es la logica para verificar que existe la imagen, darle nombre y guardarla en la carpeta especifica
if($_FILES['file'] ['name'] !=null){
    //echo"existe una imagen";
    $nombre_archivo = date ('Y-m-d-H-i-s').$_FILES['file']['name'];
    $location = "../../../../public/images/configuracion".$nombre_archivo;
    move_uploaded_file($_FILES['file']['tmp_name'],$location);
    $logo = $nombre_archivo;
}else{
    //echo "no existe imagen";
    $logo = "";
}


$sentencia = $pdo->prepare('INSERT INTO datos_institucion
(nombre_institucion,logo,direccion,telefono,correo,fyh_creacion,estado)
VALUES ( :nombre_institucion,:logo,:direccion,:telefono,:correo,:fyh_creacion,:estado)');

$sentencia->bindParam(':nombre_institucion',$nombre_institucion);
$sentencia->bindParam(':logo',$logo);
$sentencia->bindParam(':direccion',$direccion);
$sentencia->bindParam(':telefono',$telefono);
$sentencia->bindParam(':correo',$correo);
$sentencia->bindParam('fyh_creacion',$fechaAHora);
$sentencia->bindParam('estado',$estado_registro);

if($sentencia->execute()){
echo 'success';
//header('Location:' .$URL.'/');
        session_start();
        $_SESSION['mensaje'] = "La nueva institucion ha sido registrada con éxito";
        $_SESSION['icono'] = "success";
        header('Location: ' . APP_URL . "/admin/configuraciones/institucion");
}else{
//echo 'error al registrar a la base de datos';
        session_start();
        $_SESSION['mensaje'] = "Erro, no se pudo registrar la nueva institucion";
        $_SESSION['icono'] = "error";
        header('Location: ' . APP_URL . "/admin/roles/configuracion/institucion");

}
