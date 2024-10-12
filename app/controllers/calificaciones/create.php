<?php

include ('../../../app/config.php');

$id_docente = $_GET['id_docente'];
$id_estudiante = $_GET['id_estudiante'];
$id_curso = $_GET['id_curso'];
$nota1 = $_GET['nota1'];
$nota2 = $_GET['nota2'];
$nota3 = $_GET['nota3'];
$nota4 = $_GET['nota4'];
$promedio = $_GET['promedio'];

//echo "id_docente: ".$id_docente."-id_estudiante: ".$id_estudiante."-id_curso: ".$id_curso."-".$nota1."-".$nota2."-".$nota3."-".$nota4."-".$promedio;

//Ingreso de notas
$sql_nota_1 = "SELECT * FROM  calificaciones WHERE docente_id='$id_docente'AND estudiante_id='$id_estudiante'AND curso_id='$id_curso'";
$query = $pdo->prepare($sql_nota_1);
$query->execute();
$notas = $query->fetchAll(PDO::FETCH_ASSOC); //Si la variable query tiene datos

foreach($notas as $nota){
    $id_calificacion = $nota['id_calificacion'];
}

if($notas){
    echo "Existen calificaciones";

    $sentencia = $pdo->prepare('UPDATE calificaciones
        SET nota1=:nota1,
            nota2=:nota2,
            nota3=:nota3,
            nota4=:nota4,
            promedio=:promedio,
            fyh_actualizacion=:fyh_actualizacion
    WHERE   id_calificacion=:id_calificacion');

    $sentencia->bindParam(':nota1',$nota1);
    $sentencia->bindParam(':nota2',$nota2);
    $sentencia->bindParam(':nota3',$nota3);
    $sentencia->bindParam(':nota4',$nota4);
    $sentencia->bindParam(':promedio',$promedio);
    $sentencia->bindParam(':fyh_actualizacion',$fechaAHora);
    $sentencia->bindParam(':id_calificacion',$id_calificacion);

    $sentencia->execute();
    
}else{
    echo "No existen calificaciones";

    $sentencia = $pdo->prepare('INSERT INTO calificaciones
            (docente_id, estudiante_id, curso_id, nota1, nota2, nota3, nota4, promedio, fyh_creacion, estado)
    VALUES (:docente_id, :estudiante_id, :curso_id, :nota1, :nota2, :nota3, :nota4, :promedio, :fyh_creacion, :estado)');
     
    $sentencia->bindParam(':docente_id',$id_docente);
    $sentencia->bindParam(':estudiante_id',$id_estudiante);
    $sentencia->bindParam(':curso_id',$id_curso);
    $sentencia->bindParam(':nota1',$nota1);
    $sentencia->bindParam(':nota2',$nota2);
    $sentencia->bindParam(':nota3',$nota3);
    $sentencia->bindParam(':nota4',$nota4);
    $sentencia->bindParam(':promedio',$promedio);
    $sentencia->bindParam(':fyh_creacion',$fechaAHora);
    $sentencia->bindParam(':estado',$estado_registro);

    $sentencia->execute();

}
?>