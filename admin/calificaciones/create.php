<!-- llamada al resto de configuraciones -->
<?php 
$id_grado = $_GET['id_grado'];
$id_docente_get = $_GET['id_docente'];
$id_curso_get = $_GET['id_curso'];

include ('../../app/config.php');
include ('../../admin/layout/apartado1.php');
include ('../../app/controllers/estudiantes/listado_estudiantes.php');
include ('../../app/controllers/asignaciones/listado_asignaciones.php');
include ('../../app/controllers/calificaciones/listado_calificaciones.php');



$grado = "";
$seccion ="";
foreach ($estudiantes as $estudiante) {
    if($id_grado == $estudiante['id_grado']){
    $grado = $estudiante ['grado'];
    $seccion = $estudiante ['seccion'];
}
}


foreach ($asignaciones as $asignacion) {
    if($id_curso_get == $asignacion['id_curso']){
    $nombre_curso = $asignacion['nombre_curso'];

}
} 




?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          
        <h1>Estudiantes del curso: <?=$nombre_curso;?></h1> 
        
        <!-- empieza la configuracion de la tabla de roles -->
        </div>
        <br>
        <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-primary">
          <div class="card-header">
          <h3 class="card-title"><b>Ingrese las notas</b></h3>
          

          </div>

          <div class="card-body">
          <table id="example1" class="table table-striped table-bordered table-hover table-sm">
            <thead class="thead-dark">
                <tr>
                    <th><center>Nro</center></th>
                    <th><center>Nombres</center></th>
                    <th><center>Apellidos</center></th>
                    <th><center>Grado</center></th>
                    <th><center>Seccion</center></th>
                    <th><center>Primera Unidad</center></th>
                    <th><center>Segunda Unidad</center></th>
                    <th><center>Tercera Unidad</center></th>
                    <th><center>Cuarta Unidad</center></th>
                    <th><center>Promedio</center></th>
                </tr>
            </thead>  
            <tbody>
              <!-- logica que hace el llamado a la consulta sql y permite ingresar los datos a la tabla -->
              <?php
              $contador_estudiantes =0; //el contador permite mostrar numeracion sin que afecte cuando se borran datos
              foreach ($estudiantes as $estudiante){
                if($id_grado == $estudiante['grado_id']){
                    $id_estudiante = $estudiante['id_estudiante'];
                    $contador_estudiantes = $contador_estudiantes+1;?>
                    <tr>
                        <td style="text-align: center">
                            <input type="text" id="estudiante_<?=$contador_estudiantes;?>" 
                            value="<?=$id_estudiante;?>" hidden>
                            <?=$contador_estudiantes;?>
                        </td>
                        <td style="text-align: center"><?=$estudiante['nombres'];?></td>
                        <td style="text-align: center"><?=$estudiante['apellidos'];?></td>
                        <td style="text-align: center"><?=$estudiante['grado'];?></td>
                        <td style="text-align: center"><?=$estudiante['seccion'];?></td>

                        <?php
                                                            
                          $nota1 = ""; //La declaro vacio para que no de error cuando no haya registros cargados en la BD
                          $nota2 = ""; //La declaro vacio para que no de error cuando no haya registros cargados en la BD
                          $nota3 = ""; //La declaro vacio para que no de error cuando no haya registros cargados en la BD
                          $nota4 = "";
                          $promedio = "";

                          foreach($calificaciones as $calificacion){
                           if( ($calificacion['docente_id']==$id_docente_get) && 
                                ($calificacion['estudiante_id']==$id_estudiante) &&
                                ($calificacion['curso_id']==$id_curso_get) ){

                                       $nota1 = $calificacion['nota1'];
                                       $nota2 = $calificacion['nota2'];
                                       $nota3 = $calificacion['nota3'];
                                       $nota4 = $calificacion['nota4'];
                                       $promedio = $calificacion['promedio'];
                               }
                             }
                        ?>
                        <td>
                            <input style="text-align: center" value="<?=$nota1;?>" id="nota1_<?=$contador_estudiantes;?>" type="number" class="form-control">
                        </td>
                        <td>
                            <input style="text-align: center" value="<?=$nota2;?>" id="nota2_<?=$contador_estudiantes;?>" type="number" class="form-control">
                        </td>
                        <td>
                            <input  style="text-align: center" value="<?=$nota3;?>" id="nota3_<?=$contador_estudiantes;?>" type="number" class="form-control">
                        </td>
                        <td>
                            <input  style="text-align: center" value="<?=$nota4;?>" id="nota4_<?=$contador_estudiantes;?>" type="number" class="form-control">
                        </td>
                        <td>
                            <input  style="text-align: center" value="<?=$promedio;?>" id="promedio_<?=$contador_estudiantes;?>" type="number" class="form-control" disabled>
                        </td>
  
            
                    </tr>
                    <?php                
                }                                    
              }
              $contador_estudiantes=$contador_estudiantes;
            ?>
          </tbody>
          </table> 
                <hr>
                <button class="btn btn-primary" id="btn_registrar">Registrar Notas</button>
                <!-- JQuery para leer los datos -->
                <script>
                   $('#btn_registrar').click(function(){
                        var n = '<?=$contador_estudiantes;?>';
                        var i = 1;
                        var id_docente = '<?=$id_docente_get?>';
                        var id_curso = '<?=$id_curso_get?>';
                        
                        
                         for (i = 1; i <= n; i++) {
                            var a = '#nota1_' + i;
                            var nota1 = parseFloat($(a).val()) || 0;

                            var b = '#nota2_' + i;
                            var nota2 = parseFloat($(b).val()) || 0;

                            var c = '#nota3_' + i;
                            var nota3 = parseFloat($(c).val()) || 0;

                            var d = '#nota4_' + i;
                            var nota4 = parseFloat($(d).val()) || 0;

                            var f = '#estudiante_' + i;
                            var id_estudiante = $(f).val();
                            //alert("id_docente:"+id_docente+"-id_estudiante:"+id_estudiante+"-id_curso:"+id_curso);
                               
                            // Calculo del promedio
                            // Contar cuántas notas se han ingresado
                            var notas = [nota1, nota2, nota3, nota4];
                            var sumaNotas = 0;
                            var cantidadNotas = 0;

                            // Sumar las notas y contar solo las válidas (incluir notas de valor 0)
                            for (var j = 0; j < notas.length; j++) {
                            // Validar que la nota fue ingresada y no es un campo vacio - la nota 0 es válida si fue ingresada
                            if (!isNaN(notas[j]) && notas[j] !== null && $('#nota' + (j+1) + '_'+i).val() !== "") {
                                sumaNotas += notas[j];
                                cantidadNotas++;
                            }
                        }
                                                    

                            // Calcular el promedio solo si hay al menos una nota válida
                            var promedio = cantidadNotas > 0 ? (sumaNotas / cantidadNotas) : 0;

                            // Asignar el promedio en el campo correspondiente
                            var e = '#promedio_' + i;
                            $(e).val(promedio.toFixed(2)); // Mostrar el promedio con dos decimales

                            

                            var url = "../../app/controllers/calificaciones/create.php";
                            $.get(url,{id_docente:id_docente,id_estudiante:id_estudiante,id_curso:id_curso,nota1:nota1,nota2:nota2,nota3:nota3,nota4:nota4,promedio:promedio},function (datos){
                                    
                                    $('#respuesta').html(datos); 
                                    //alert("mando datos");
                            });
                        }
                        Swal.fire({
                            position: "top-middle",
                            icon: "success",
                            title: "Las notas han sido actualizadas correctamente",
                            showConfirmButton: false,
                            timer: 4000
                        });
                    });

                </script>
                <div id="respuesta" hidden></div>
          </div>
          
            <!-- Boton Volver -->
            <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <a href="<?=APP_URL;?>/admin/calificaciones" class="btn btn-secondary ml-3">Volver</a>
              </div>
            </div>
          </div>

          </div>

          </div>  
         
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php 
include ('../../admin/layout/apartado2.php'); //se llama la separacion de apartado 2
include ('../../layout/mensajes.php');
?>




<!-- Configuracion de opciones de la tabla de listado de roles -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": [
        {
          extend: 'copy',
          text: 'Copiar'
        },
        {
          extend: 'csv',
          text: 'CSV'
        },
        {
          extend: 'excel',
          text: 'Excel'
        },
        {
          extend: 'pdf',
          text: 'PDF'
        },
        {
          extend: 'print',
          text: 'Imprimir'
        },
        {
          extend: 'colvis',
          text: 'Visibilidad de columnas'
        }
      ],
      "language": {
        "decimal": ",",
        "thousands": ".",
        "sProcessing": "Procesando...",
        "sLengthMenu": "Mostrar _MENU_ registros",
        "sZeroRecords": "No se encontraron resultados",
        "sEmptyTable": "Ningún dato disponible en esta tabla",
        "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix": "",
        "sSearch": "Buscar:",
        "sUrl": "",
        "sInfoThousands": ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
          "sFirst": "Primero",
          "sLast": "Último",
          "sNext": "Siguiente",
          "sPrevious": "Anterior"
        },
        "oAria": {
          "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
          "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        },
        "buttons": {
          "copyTitle": 'Copiado al portapapeles',
          "copySuccess": {
            _: '%d líneas copiadas',
            1: '1 línea copiada'
          },
          "colvis": 'Visibilidad de columnas'
        }
      }
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true
    });
  });
</script>
