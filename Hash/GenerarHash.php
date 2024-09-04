<?php
// La contraseña en texto plano que deseas hashear
$password = 'vrsanchez1*';

// Generar el hash de la contraseña usando password_hash
$password_hash = password_hash($password, PASSWORD_DEFAULT);

// Mostrar el hash generado
echo $password_hash;
?>
