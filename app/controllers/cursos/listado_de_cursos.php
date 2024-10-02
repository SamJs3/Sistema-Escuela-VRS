<?php

$sql_cursos = "SELECT * FROM cursos where estado = '1' ";
$query_cursos = $pdo->prepare($sql_cursos);
$query_cursos->execute();
$cursos = $query_cursos->fetchAll(PDO::FETCH_ASSOC);