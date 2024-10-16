<!-- llamada al resto de configuraciones -->
<!-- llamada al resto de configuraciones -->
<?php 
include ('../../app/config.php');
include ('../../admin/layout/apartado1.php');
//include ('../../app/controllers/docentes/listado_docentes.php');
include ('../../app/controllers/asignaciones/listado_asignaciones.php');

$grado = "";
$seccion ="";
foreach ($asignaciones as $asignacione) {
  if($correo_usuario == $asignacione['correo']){
    $grado = $asignacione ['grado'];
    $seccion = $asignacione ['seccion'];
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
          
        <h1>Grado Asignado: <?=$grado." ".$seccion?></h1> 
        
        <!-- empieza la configuracion de la tabla de roles -->
        </div>
        <br>
        <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-primary">
          <div class="card-header">
          <h3 class="card-title">Cursos Asignados</h3>
          

          </div>

          <div class="card-body">
          <table id="example1" class="table table-striped table-bordered table-hover table-sm">
            <thead class="thead-dark">
                <tr>
                     <!-- <th><center>Nro</center></th> -->
                     <th><center>Nivel</center></th>
                    <th><center>Grado</center></th>
                    <th><center>Seccion</center></th>
                    <th><center>Curso</center></th>
                    <th><center>Acciones</center></th>
                </tr>
            </thead>  
            <tbody>
            <?php
                    $contador =0;
                    foreach ($asignaciones as $asignacione){

                        $id_curso  = $asignacione['id_curso'];
                        $id_grado  = $asignacione['id_grado'];
                        if($correo_usuario == $asignacione['correo']){
                            $contador = $contador+1; ?>
                               
                            <tr>
                                <!-- <td><center><?=$contador?></center></td> -->
                                <td><center><?=$asignacione['nivel'];?></center></td>
                                <td><center><?=$asignacione['grado'];?></center></td>
                                <td><center><?=$asignacione['seccion'];?></center></td>
                                <td><center><?=$asignacione['nombre_curso'];?></center></td>
                                <td style="text-align: center">
                                    <a href="create.php?id_grado=<?=$id_grado;?>&&id_docente=<?=$asignacione['docente_id'];?>&&id_curso=<?=$asignacione['curso_id'];?>"class="btn btn-primary">Ingresar Calificaciones</a>
                                </td>

 
                            </tr>

                        <?php    
                        }
                    }
                    ?>


          </tbody>
          </table> 
          </div>

            <!-- Boton Volver -->
            <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <a href="<?=APP_URL;?>/admin" class="btn btn-secondary ml-3">Volver</a>
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
      /* "buttons": [
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
      ], */
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
