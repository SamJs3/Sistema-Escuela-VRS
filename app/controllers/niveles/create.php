<?php
include ('../../../app/config.php');

$periodo_id = $_POST['periodo_id'];
$nivel = $_POST['nivel'];
$turno = $_POST['turno'];


$sentencia = $pdo->prepare('INSERT INTO niveles 
(periodo_id, nivel, turno, fyh_creacion, estado)
VALUES (:periodo_id, :nivel, :turno, :fyh_creacion, :estado)');

$sentencia->bindParam(':periodo_id', $periodo_id);
$sentencia->bindParam(':nivel', $nivel);
$sentencia->bindParam(':turno', $turno);
$sentencia->bindParam(':fyh_creacion', $fechaAHora);  
$sentencia->bindParam(':estado', $estado_registro);  

if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Se registró el nivel correctamente en la base de datos";
    $_SESSION['icono'] = "success";
    header('Location:'.APP_URL."/admin/niveles");
} else {
    session_start();
    $_SESSION['mensaje'] = "Error: No se pudo registrar en la base de datos";
    $_SESSION['icono'] = "error";
    ?><script>window.history.back();</script><?php
}
?>
