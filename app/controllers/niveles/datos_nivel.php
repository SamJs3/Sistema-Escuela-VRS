<?php

$sql_niveles = "SELECT * FROM niveles as niv INNER JOIN año_escolar as año 
ON niv.periodo_id = año.id_periodo where niv.estado = '1' and niv.id_nivel = '$id_nivel' ";
$query_niveles = $pdo->prepare($sql_niveles);
$query_niveles->execute();
$niveles = $query_niveles->fetchAll(PDO::FETCH_ASSOC);

foreach ($niveles as $nivele){
    $periodo_id = $nivele['periodo_id'];
    $periodo = $nivele['periodo'];
    $nivel = $nivele['nivel'];
    $turno = $nivele['turno'];
    $fyh_creacion = $nivele['fyh_creacion'];
    $estado = $nivele['estado'];
}