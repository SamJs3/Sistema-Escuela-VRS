<?php

$sql_niveles = "SELECT * FROM niveles as niv INNER JOIN año_escolar as esc ON niv.periodo_id = esc.id_periodo where niv.estado = '1' ";
$query_niveles = $pdo->prepare($sql_niveles);
$query_niveles->execute();
$niveles = $query_niveles->fetchAll(PDO::FETCH_ASSOC);