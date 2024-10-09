<?php

$sql_asignaciones = "SELECT * FROM asignaciones as asi 
                    INNER JOIN docentes as doc ON doc.id_docente = asi.docente_id
                    INNER JOIN niveles as niv ON niv.id_nivel = asi.nivel_id
                    INNER JOIN grados as gra ON gra.id_grado = asi.grado_id
                    INNER JOIN cursos as cur ON cur.id_curso = asi.curso_id 
                    where asi.estado = '1' AND doc.id_docente = '$id_docente' ";
$query_asignaciones = $pdo->prepare($sql_asignaciones);
$query_asignaciones->execute();
$asignaciones = $query_asignaciones->fetchAll(PDO::FETCH_ASSOC);

foreach ( $asignaciones as $asignacion){
    $nombre_curso = $asignacion['nombre_curso'];
    
    
}