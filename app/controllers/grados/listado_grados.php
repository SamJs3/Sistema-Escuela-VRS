<?php

$sql_grados = "SELECT 
    gra.*, 
    niv.*, 
    ae.periodo
FROM 
    grados AS gra
INNER JOIN 
    niveles AS niv ON gra.nivel_id = niv.id_nivel
INNER JOIN 
    año_escolar AS ae ON niv.periodo_id = ae.id_periodo
WHERE 
    gra.estado = '1'";
$query_grados = $pdo->prepare($sql_grados);
$query_grados->execute();
$grados = $query_grados->fetchAll(PDO::FETCH_ASSOC);