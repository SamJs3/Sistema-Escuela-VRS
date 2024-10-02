<?php

$sql_años = "SELECT * FROM año_escolar WHERE id_periodo = '$id_periodo' ";
$query_años = $pdo->prepare($sql_años);
$query_años->execute();
$años = $query_años->fetchAll(PDO::FETCH_ASSOC);

foreach ($años as $año){
    $periodo= $año['periodo'];
    $fyh_creacion = $año['fyh_creacion'];
    $estado = $año['estado'];
}