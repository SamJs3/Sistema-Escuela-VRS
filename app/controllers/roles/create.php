<!-- Aca esta toda la logica para registrar en la base de datos, los datos que se reciben en el formulario de crear nuevo rol -->
<?php       

include('../../../app/config.php');

$nombre_rol = $_POST['nombre_rol'];
$nombre_rol = mb_strtoupper($nombre_rol, 'UTF-8');

if($nombre_rol == ""){
    session_start();
    $_SESSION['mensaje'] = "Por favor, ingrese el nombre del nuevo rol";
    $_SESSION['icono'] = "warning";
    header('Location: ' . APP_URL . "/admin/roles/create.php");
}else{
    $sentencia = $pdo->prepare("INSERT INTO roles 
    (nombre_rol, fyh_creacion, estado) 
    VALUES (:nombre_rol, :fyh_creacion, :estado)");

$sentencia->bindParam('nombre_rol',$nombre_rol);
$sentencia->bindParam('fyh_creacion',$fechaAHora);
$sentencia->bindParam('estado',$estado_registro);


try{
    if($sentencia->execute()){
        session_start();
        $_SESSION['mensaje'] = "El nuevo rol ha sido guardado con éxito";
        $_SESSION['icono'] = "success";
        header('Location: ' . APP_URL . "/admin/roles");
    }else{
        session_start();
        $_SESSION['mensaje'] = "No se pudo registrar el nuevo rol, por favor intenta de nuevo o comunícate con el administrador";
        $_SESSION['icono'] = "error";
        header('Location: ' . APP_URL . "/admin/roles/create.php");
    }

}catch (Exception $exception) {
        session_start();
        $_SESSION['mensaje'] = "Este rol ya existe en la base de datos";
        $_SESSION['icono'] = "warning";
        header('Location: ' . APP_URL . "/admin/roles/create.php");
}



}




