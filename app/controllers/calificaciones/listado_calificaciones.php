<?php

    $sql_calificaciones = " SELECT * FROM calificaciones AS cal
    INNER JOIN cursos AS cur ON cur.id_curso = cal.curso_id
    WHERE cal.estado = '1' ";
    $query_calificaciones = $pdo->prepare($sql_calificaciones);
    $query_calificaciones->execute();

    $calificaciones = $query_calificaciones->fetchAll(PDO::FETCH_ASSOC);
?>