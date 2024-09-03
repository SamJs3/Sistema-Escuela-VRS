<?php
// La contraseña en texto plano que deseas hashear
$password = 'Admin123';

// Generar el hash de la contraseña usando password_hash
$password_hash = password_hash($password, PASSWORD_DEFAULT);

// Mostrar el hash generado
echo $password_hash;
?>
