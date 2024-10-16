<?php
//Consulta sql para mostrar registros de 3 tablas diferentes pero relacionadas
    $sql_observacion = " SELECT * FROM observaciones AS obs
    INNER JOIN docentes AS doc ON doc.id_docente = obs.docente_id
    INNER JOIN personas AS per ON per.id_persona = doc.persona_id
    INNER JOIN usuarios AS usu ON usu.id_usuario = per.usuario_id
    INNER JOIN cursos AS cur ON cur.id_curso = obs.curso_id
    INNER JOIN estudiantes AS est ON est.id_estudiante = obs.estudiante_id";
    $query_observacion = $pdo->prepare($sql_observacion);
    $query_observacion->execute();

    $observaciones = $query_observacion->fetchAll(PDO::FETCH_ASSOC);
?>