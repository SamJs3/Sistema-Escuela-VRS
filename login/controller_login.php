<?php

include ('../app/config.php');

$correo = $_POST['correo'];
$password = $_POST['password'];


$sql = " SELECT * FROM usuarios WHERE correo = '$correo' AND estado='1' ";
$query = $pdo->prepare($sql);
$query->execute();


$usuarios = $query->fetchAll(PDO::FETCH_ASSOC);
//print_r ($usuarios);

$contador = 0;

foreach ($usuarios as $usuario){
    $password_columna = $usuario['password'];
    $contador = $contador+1;
}

//echo $contador;

if ($contador > 0 && password_verify($password, $password_columna)) {
    //echo "Credenciales correctas";
    // Redirigir al panel de administración si las credenciales son correctas
    session_start();
    $_SESSION['mensaje'] = "Sesión Iniciada";
    $_SESSION['icono'] = "success";
    
    $_SESSION['email recibido'] = $correo;
    header('Location: ' . APP_URL . "/admin");
    exit();
} else {
    //parte que nos permite mostrar el mensaje de error en caso credenciales sean incorrectas
    session_start();
    $_SESSION['mensaje'] = "Los datos ingresados son incorrectos. Vuelva a intentarlo.";

    //echo "Credenciales Incorrectas";
    // Redirigir a la página de inicio de sesión si las credenciales son incorrectas
    header('Location: ' . APP_URL . "/login");
    exit();
}