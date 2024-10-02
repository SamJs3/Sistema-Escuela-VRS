<!-- llamada al resto de configuraciones -->
<?php 
include ('../../../app/config.php');
include ('../../../admin/layout/apartado1.php');
include ('../../../app/controllers/configuraciones/datos_año/listado_de_años.php');
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          
          <h1>Listado de Años Escolares</h1> 
        
          <!-- empieza la configuracion de la tabla de roles -->
        </div>
        <br>
        <div class="row">
          <div class="col-md-12">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Años registrados</h3>
                <div class="card-tools">
                  <a href="create.php" class="btn btn-primary">Crear nuevo año escolar</a>
                </div>
              </div>

              <div class="card-body">
                <table id="example1" class="table table-striped table-bordered table-hover table-sm">
                  <thead class="thead-dark">
                    <tr>
                      <th><center>Nro</center></th>
                      <th><center>Año Escolar</center></th>                      
                      <th><center>Fecha y hora de creacion</center></th>
                      <th><center>Estado</center></th>
                      <th><center>Acciones</center></th>
                    </tr>
                  </thead>  
                  <tbody>
                    <!-- logica que hace el llamado a la consulta sql y permite ingresar los datos a la tabla -->
                    <?php
                      $contador_año = 0; //el contador permite mostrar numeracion sin que afecte cuando se borran datos
                      foreach ($años_escolares as $añoEscolar) {
                        $id_periodo = $añoEscolar['id_periodo'];
                        $contador_año++;
                    ?>
                    <tr>
                      <td style="text-align: center"><?=$contador_año;?></td>
                      <td style="text-align: center"><?=$añoEscolar['periodo'];?></td>
                      <td style="text-align: center"><?=$añoEscolar['fyh_creacion'];?></td>
                      <td style="text-align: center">
                            <?php
                                if($añoEscolar['estado'] == "1") echo "ACTIVO";
                                else echo "INACTIVO";
                            ?>         
                       </td>
                      <td style="text-align: center">
                        <div class="btn-group" role="group" aria-label="Basic example">
                          <a href="show.php?id=<?=$id_periodo;?>" type="button" class="btn btn-primary">Ver</a>
                          <a href="edit.php?id=<?=$id_periodo;?>" type="button" class="btn btn-success">Editar</a>
                          <!-- <form action="<?=APP_URL;?>/app/controllers/configuraciones/institucion/delete.php" onclick="preguntar<?=$id_gestion;?>(event)" method="post" id="miFormulario<?=$id_gestion;?>">
                                                    <input type="text" name="id_config_institucion" value="<?=$id_gestion;?>" hidden>
                                                    <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 0px 5px 5px 0px"><i class="bi bi-trash"></i></button>
                                                </form>
                                                <script>
                                                    function preguntar<?=$id_gestion;?>(event) {
                                                        event.preventDefault();
                                                        Swal.fire({
                                                            title: 'Eliminar registro',
                                                            text: '¿Desea eliminar este registro?',
                                                            icon: 'question',
                                                            showDenyButton: true,
                                                            confirmButtonText: 'Eliminar',
                                                            confirmButtonColor: '#a5161d',
                                                            denyButtonColor: '#270a0a',
                                                            denyButtonText: 'Cancelar',
                                                        }).then((result) => {
                                                            if (result.isConfirmed) {
                                                                var form = $('#miFormulario<?=$id_gestion;?>');
                                                                form.submit();
                                                            }
                                                        });
                                                    }
                                                </script> -->
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
