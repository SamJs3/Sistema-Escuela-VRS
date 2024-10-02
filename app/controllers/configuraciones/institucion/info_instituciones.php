<?php

$sql_datos_institucion = "SELECT * FROM datos_institucion
                     where id_inst_config = '$id_inst_config' and estado = '1' " ;
$query_datos_institucion = $pdo->prepare($sql_datos_institucion);
$query_datos_institucion->execute();
$instituciones = $query_datos_institucion->fetchAll(PDO::FETCH_ASSOC);

foreach($instituciones as $institucion){
    $nombre_institucion = $institucion['nombre_institucion'];
    $direccion = $institucion['direccion'];
    $telefono = $institucion['telefono'];
    $correo = $institucion['correo'];
    $logo = $institucion['logo'];
}