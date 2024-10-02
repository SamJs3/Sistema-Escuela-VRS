<?php

$sql_añoEscolar = "SELECT * FROM año_escolar ";
$query_añoEscolar = $pdo->prepare($sql_añoEscolar);
$query_añoEscolar->execute();
$años_escolares = $query_añoEscolar->fetchAll(PDO::FETCH_ASSOC);