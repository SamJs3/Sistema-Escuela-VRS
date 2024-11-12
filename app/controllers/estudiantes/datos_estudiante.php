<?php

$sql_estudiantes = "SELECT *, est.nivel_id as nivel_id FROM usuarios as usu 
                    INNER JOIN roles as rol ON rol.id_rol = usu.rol_id
                    INNER JOIN personas as per ON per.usuario_id = usu.id_usuario
                    INNER JOIN estudiantes as est ON est.persona_id = per.id_persona
                    INNER JOIN niveles as niv ON niv.id_nivel = est.nivel_id
                    INNER JOIN grados as gd ON gd.id_grado = est.grado_id
                    INNER JOIN padres_familia as pf ON pf.estudiante_id = est.id_estudiante  
                    where est.estado = '1' and est.id_estudiante = '$id_estudiante' ";
$query_estudiantes = $pdo->prepare($sql_estudiantes);
$query_estudiantes->execute();
$estudiantes = $query_estudiantes->fetchAll(PDO::FETCH_ASSOC);


foreach ( $estudiantes as $estudiante){
    $id_usuario = $estudiante['id_usuario'];
    $id_persona = $estudiante['id_persona'];
    $id_estudiante = $estudiante['id_estudiante'];
    $id_padre = $estudiante['id_padre'];
    $rol_id = $estudiante['rol_id'];
    $nombre_rol = $estudiante['nombre_rol'];
    $nombres = $estudiante['nombres'];
    $apellidos = $estudiante['apellidos'];
    $cui = $estudiante['cui'];
    $fecha_nacimiento = $estudiante['fecha_nacimiento'];
    $celular = $estudiante['celular'];
    $correo = $estudiante['correo'];
    $direccion = $estudiante['direccion'];
    $nivel_id = $estudiante['nivel_id'];
    $grado_id = $estudiante['grado_id'];
    $nombres_pf = $estudiante['nombres_pf'];
    $celular_pf = $estudiante['celular_pf'];
    $apellidos_pf = $estudiante['apellidos_pf'];
    $cui_pf = $estudiante['cui_pf'];
    $parentezco = $estudiante['parentezco'];
    $encargado_dos = $estudiante['encargado_dos'];
    $numero_dos = $estudiante['numero_dos'];
    $nivel = $estudiante['nivel'];
    $grado = $estudiante['grado'];
    $seccion = $estudiante['seccion'];
    $estado = $estudiante['estado'];
    
    
}

