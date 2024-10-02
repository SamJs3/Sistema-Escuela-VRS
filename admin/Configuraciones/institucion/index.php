<!-- llamada al resto de configuraciones -->
<?php 
include ('../../../app/config.php');
include ('../../../admin/layout/apartado1.php');
include ('../../../app/controllers/configuraciones/institucion/datos_institucion.php');
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          
          <h1><?=APP_NAME;?></h1> 
        
          <!-- empieza la configuracion de la tabla de roles -->
        </div>
        <br>
        <div class="row">
          <div class="col-md-12">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Detalles de la institución</h3>
                <!-- <div class="card-tools">
                  <a href="create.php" class="btn btn-primary">Crear nueva institucion</a>
                </div> -->
              </div>

              <div class="card-body">
                <table id="example1" class="table table-striped table-bordered table-hover table-sm">
                  <thead class="thead-dark">
                    <tr>
                      <th><center>Nro</center></th>
                      <th><center>Nombre de la Institución</center></th>
                      <th><center>Logotipo</center></th>
                      <th><center>Dirección</center></th>
                      <th><center>Telefono</center></th>
                      <th><center>Correo</center></th>
                      <th><center>Estado</center></th>
                      <th><center>Acciones</center></th>
                    </tr>
                  </thead>  
                  <tbody>
                    <!-- logica que hace el llamado a la consulta sql y permite ingresar los datos a la tabla -->
                    <?php
                      $contador_institucion = 0; //el contador permite mostrar numeracion sin que afecte cuando se borran datos
                      foreach ($instituciones as $institucion) {
                        $id_inst_config = $institucion['id_inst_config'];
                        $contador_institucion++;
                    ?>
                    <tr>
                      <td style="text-align: center"><?=$contador_institucion;?></td>
                      <td style="text-align: center"><?=$institucion['nombre_institucion'];?></td>
                      <td>
                          <img src="<?=APP_URL."/public/images/configuracion".$institucion['logo'];?>" width="100" alt="">
                      </td>
                      <td style="text-align: center"><?=$institucion['direccion'];?></td>
                      <td style="text-align: center"><?=$institucion['telefono'];?></td>
                      <td style="text-align: center"><?=$institucion['correo'];?></td>
                      <td style="text-align: center">
                                            <?php
                                                 if($institucion['estado'] == "1") echo "Activo";
                                                   else echo "Inactivo";
                                             ?>         
                      </td>
                      <td style="text-align: center">
                        <div class="btn-group" role="group" aria-label="Basic example">
                          <a href="show.php?id=<?=$id_inst_config;?>" type="button" class="btn btn-primary">Ver</a>
                          <a href="edit.php?id=<?=$id_inst_config;?>" type="button" class="btn btn-success">Editar</a>
                        </div>


                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table> 
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
include ('../../../admin/layout/apartado2.php'); //se llama la separacion de apartado 2
include ('../../../layout/mensajes.php');
?>


<!-- Configuracion de opciones de la tabla de listado de roles -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "pageLength": 5,
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
        "paginate": {
          "first": "Primero",
          "last": "Último",
          "next": "Siguiente",
          "previous": "Anterior"
        },
        "info": "Mostrando _START_ a _END_ de _TOTAL_ resultados",
        "lengthMenu": "Mostrar _MENU_ resultados por página",
        "search": "Buscar:",
        "emptyTable": "No hay datos disponibles en la tabla",
        "infoEmpty": "Mostrando 0 a 0 de 0 resultados",
        "infoFiltered": "(filtrado de _MAX_ resultados totales)",
        "zeroRecords": "No se encontraron coincidencias"
      }
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>
