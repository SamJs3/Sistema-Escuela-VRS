<!-- llamada al resto de configuraciones -->
<?php 
include ('../../app/config.php');
include ('../../admin/layout/apartado1.php');
include ('../../app/controllers/estudiantes/listado_estudiantes.php');
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          
        <h1>Listado de Estudiantes</h1> 
        
        <!-- empieza la configuracion de la tabla de roles -->
        </div>
        <br>
        <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-primary">
          <div class="card-header">
          <h3 class="card-title">Estudiantes registrados</h3>
          <div class="card-tools">
            <a href="../inscripciones/create.php" class="btn btn-primary">Crear nuevo estudiante</a>
          </div>

          </div>

          <div class="card-body">
          <table id="example1" class="table table-striped table-bordered table-hover table-sm">
            <thead class="thead-dark">
                <tr>
                    <th><center>Nro</center></th>
                    <th><center>Nombres</center></th>
                    <th><center>Apellidos</center></th>
                    <th><center>CUI</center></th>
                    <th><center>Fecha de nacimiento</center></th>
                    <th><center>Grado</center></th>
                    <th><center>Seccion</center></th>
                    <th><center>Nivel</center></th>
                    <th><center>Estado</center></th>
                    <th><center>Acciones</center></th>
                </tr>
            </thead>  
            <tbody>
              <!-- logica que hace el llamado a la consulta sql y permite ingresar los datos a la tabla -->
              <?php
              $contador_estudiantes =0; //el contador permite mostrar numeracion sin que afecte cuando se borran datos
              foreach ($estudiantes as $estudiante){
              $id_estudiante = $estudiante['id_estudiante'];
              $contador_estudiantes = $contador_estudiantes+1;?>
              <tr>
                  <td style="text-align: center"><?=$contador_estudiantes;?></td>
                  <td style="text-align: center"><?=$estudiante['nombres'];?></td>
                  <td style="text-align: center"><?=$estudiante['apellidos'];?></td>
                  <td style="text-align: center"><?=$estudiante['cui'];?></td>
                  <td style="text-align: center"><?=$estudiante['fecha_nacimiento'];?></td>
                  <td style="text-align: center"><?=$estudiante['grado'];?></td>
                  <td style="text-align: center"><?=$estudiante['seccion'];?></td>
                  <td style="text-align: center"><?=$estudiante['nivel'];?></td>
                  
                  <td style="text-align: center">
                      <p>
                          <?php
                          if ($estudiante['estado'] == "1") {
                              echo "Activo";
                          } else {
                              echo "Inactivo";
                          }
                          ?>
                      </p>
                  </td>
                  
                  <td style="text-align: center">
                    <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="show.php?id=<?=$id_estudiante;?>" type="button" class="btn btn-primary">Ver</a>
                    <a href="edit.php?id=<?=$id_estudiante;?>" type="button" class="btn btn-success">Editar</a>
                    <form action="<?=APP_URL;?>/app/controllers/estudiantes/delete.php" onclick="preguntar<?=$id_estudiante;?>(event)" method="post" id="miFormulario<?=$id_estudiante;?>">
                        <input type="text" name="id_estudiante" value="<?=$id_estudiante;?>" hidden>
                        <button type="submit" class="btn btn-danger" style="border-radius: 0px 5px 5px 0px;">Eliminar</button>
                    </form>
                    <script>
                        function preguntar<?=$id_estudiante;?>(event){
                            event.preventDefault();
                            Swal.fire({
                              title: 'Eliminar registro',
                              text: '¿Deseas eliminar este registro?',
                              icon: 'question',
                              showDenyButton: 'true',
                              confirmButtonText: 'Eliminar',
                              confirmButtonColor: '#a5161d',
                              denyButtonColor: '#270a0a',
                              denyButtonText: 'Cancelar'
                            }).then((result)=>{
                                  if (result.isConfirmed){
                                    var form = $('#miFormulario<?=$id_estudiante;?>');
                                    form.submit();
                                    //Swal.fire('Eliminado', 'Se elimino el registro', 'success');
                                  }
                            });
                        }
                    </script>

                    </div>
                  </td>
              </tr>
            
            <?php                                         
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
