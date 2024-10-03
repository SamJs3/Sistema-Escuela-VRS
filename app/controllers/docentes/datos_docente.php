<?php

$sql_docentes = "SELECT * FROM usuarios as usu INNER JOIN roles as rol ON rol.id_rol = usu.rol_id
                    INNER JOIN personas as per ON per.usuario_id = usu.id_usuario
                    INNER JOIN docentes as doc ON doc.persona_id = per.id_persona where doc.estado = '1' AND doc.id_docente = '$id_docente' ";
$query_docentes = $pdo->prepare($sql_docentes);
$query_docentes->execute();
$docentes = $query_docentes->fetchAll(PDO::FETCH_ASSOC);



foreach ( $docentes as $docente){
        $id_docente = $docente['id_docente'];
        $id_usuario = $docente['id_usuario'];
        $id_persona = $docente['id_persona'];
        $nombres = $docente['nombres'];
        $apellidos = $docente['apellidos'];
        $nombre_rol = $docente['nombre_rol'];
        $correo = $docente['correo'];
        $cui = $docente['cui'];
        $fecha_nacimiento = $docente['fecha_nacimiento'];
        $fyhcreacion = $docente['fyh_creacion'];
        $celular = $docente['celular'];
        $direccion = $docente['direccion'];
        $estado = $docente['estado'];
        
 }