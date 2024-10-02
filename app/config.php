<?php
define('SERVIDOR','localhost');
define('USUARIO','root');
define('PASSWORD','');
define('BD','sistemagestionescolar');

define('APP_NAME','ESCUELA VICENTE R. SANCHEZ');//Nombre de la aplicacion
define('APP_URL','http://localhost/sistemanotas'); 
define('KEY_API_MAPS',''); //Api para google maps 



$servidor = "mysql:dbname=".BD.";host=".SERVIDOR;


try{ // aca le pasamos los parametros que se utilizaran para la conexion a la BD
    $pdo = new PDO($servidor, USUARIO, PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));

    //echo "Conexión exitosa a la base de datos";
    
}catch(PDOException $e){
    echo "Error en la conexión a la base de datos"; 
}

date_default_timezone_set ("America/El_Salvador"); 
$fechaAHora = date (format:'y-m-d h:i:s');
$fecha_actual = date (format:'Y-m-d');
$dia_actual = date (format:'d');
$mes_actual = date (format:'m');
$anio_actual = date (format:'Y');
$estado_registro='1';

