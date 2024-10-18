<!-- llamada al resto de configuraciones -->
<?php 
include ('../../app/config.php');
include ('../../admin/layout/apartado1.php');
include ('../../app/controllers/observaciones/listado_observaciones.php');

$id_estudiante = $_GET['id_estudiante'];
?>


   <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
      <br>
    <div class="content">
    <div class="container">
        <div class="row">
            <h1>Listado de observaciones</h1>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h3 class="card-title">Observaciones registradas</h3>
                        
                    </div><!-- /.card-header -->
                    
                        <div class="card-body">
                            <table id="example1" class = "table table-striped table-bordered table-hover table-sm">
                                <thead>
                                    <tr style = "text-align:center">
                                        <th>Nro</th>
                                        <th>Curso</th>
                                        <th>Fecha de observacion</th>
                                        <th>Observación</th>
                                        <th>Nota</th>
                                    </tr>
                                </thead>
                                
                                <tbody>

                                <?php 
                                    $contador_observacion = 0;
                                    foreach($observaciones as $observacion){

                                        //este if pregunta si el email con el que se inicio sesión es igual el email
                                        if($id_estudiante == $observacion['estudiante_id']){
                                            $id_observacion = $observacion['id_observacion'];
                                            $nombre_curso = $observacion['nombre_curso'];
                                            $fecha = $observacion['fecha'];
                                            $observacionE = $observacion['observacion'];
                                            $nota = $observacion['nota'];
                                            $contador_observacion++;?>
                                            <tr>
                                                <td style = "text-align:center"><?php echo $contador_observacion;?></td>
                                                <td style = "text-align:center"><?php echo $nombre_curso;?></td>
                                                <td style = "text-align:center"><?php echo $fecha;?></td>
                                                <td style = "text-align:center"><?php echo $observacionE;?></td>
                                                <td style = "text-align:center"><?php echo $nota;?></td>

                                            </tr>
                                        <?php    
                                        }
                                    }
                                ?>

                                </tbody>

                            </table>
                        </div><!-- /.card-body -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <a href="<?=APP_URL;?>/admin" class="btn btn-secondary ml-3">Volver</a>
                                </div>
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
      "pageLength": 15,
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
