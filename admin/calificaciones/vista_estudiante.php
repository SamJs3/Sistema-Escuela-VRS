<!-- llamada al resto de configuraciones -->
<?php 
/* $id_grado = $_GET['id_grado'];
$id_docente_get = $_GET['id_docente'];
$id_curso_get = $_GET['id_curso']; */
$id_estudiante_get = $_GET['id_estudiante'];

include ('../../app/config.php');
include ('../../admin/layout/apartado1.php');
include ('../../app/controllers/estudiantes/listado_estudiantes.php');
include ('../../app/controllers/asignaciones/listado_asignaciones.php');
include ('../../app/controllers/calificaciones/listado_calificaciones.php');



$grado = "";
$seccion ="";
foreach ($estudiantes as $estudiante) {
    if($id_estudiante_get == $estudiante['id_estudiante']){
    $grado = $estudiante ['grado'];
    $seccion = $estudiante ['seccion'];
    $nombres = $estudiante ['nombres'];
    $apellidos = $estudiante ['apellidos'];
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
          
        <h1>Calificaciones del estudiante: <?=$nombres." ".$apellidos?></h1> 
        
        <!-- empieza la configuracion de la tabla de roles -->
        </div>
        <br>
        <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-primary">
          <div class="card-header">
          <h3 class="card-title"><b>Calificaciones Registradas</b></h3>
          

          </div>

          <div class="card-body">
          <table id="example1" class="table table-striped table-bordered table-hover table-sm">
            <thead class="thead-dark">
                <tr>
                    <th><center>Nro</center></th>
                    <th><center>Curso</center></th>
                    <th><center>I Unidad</center></th>
                    <th><center>II Unidad</center></th>
                    <th><center>III Unidad</center></th>
                    <th><center>IV Unidad</center></th>
                    <th><center>Promedio</center></th>
                </tr>
            </thead>  
            
            <tbody>
                                    <?php 
                                        $contador_calificacion = 0;
                                        $nota1 = ""; //La declaro vacio para que no de error cuando no haya registros cargados en la BD
                                        $nota2 = ""; //La declaro vacio para que no de error cuando no haya registros cargados en la BD
                                        $nota3 = "";
                                        $nota4 = "";
                                        $promedio = ""; //La declaro vacio para que no de error cuando no haya registros cargados en la BD
                                        foreach($calificaciones as $calificacione){
                                            if($id_estudiante_get == $calificacione['estudiante_id']){
                                                
                                                            $contador_calificacion++; ?>
                                                        <tr>
                                                            <td style = "text-align:center"><?php echo $contador_calificacion;?></td>
                                                            <td style = "text-align:center"><?php echo $calificacione['nombre_curso'];?></td>
                                                            <td style = "text-align:center"><?php echo $calificacione['nota1'];?></td>
                                                            <td style = "text-align:center"><?php echo $calificacione['nota2'];?></td>
                                                            <td style = "text-align:center"><?php echo $calificacione['nota3'];?></td>
                                                            <td style = "text-align:center"><?php echo $calificacione['nota4'];?></td>
                                                            <td style = "text-align:center"><?php echo $calificacione['promedio'];?></td>

                                                        </tr>   
                                    <?php         }
                                        }     
                                    ?>
                                    
                                </tbody>
                                        
                            </table>
                            
                            
                        </div><!-- /.card-body -->
                        <div class="col-md-12">
                          <div class="form-group">
                            <a href="<?=APP_URL;?>/admin" class="btn btn-secondary ml-3">Volver</a>
                          </div>
                        </div>
                </div><!-- /.card -->
            
        </div>
        
        </div><!-- /.row -->
        
        
    </div><!-- /.container-fluid -->
    </div><!-- /.content -->
    
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
