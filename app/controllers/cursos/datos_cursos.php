<?php

$sql_cursos = "SELECT * FROM cursos where estado = '1' and id_curso = '$id_curso'  ";
$query_cursos = $pdo->prepare($sql_cursos);
$query_cursos->execute();
$cursos = $query_cursos->fetchAll(PDO::FETCH_ASSOC);

foreach ($cursos as $curso){
    $nombre_curso = $curso['nombre_curso'];
    $fyh_creacion = $curso['fyh_creacion'];
    $estado = $curso['estado'];
} 