<!-- llamada al resto de configuraciones -->
<?php 
include ('../../app/config.php');
include ('../../admin/layout/apartado1.php');
include ('../../app/controllers//roles/listado_de_roles.php');
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          
        <h1>Listado de Roles</h1> 
        
        <!-- empieza la configuracion de la tabla de roles -->
        </div>
        <br>
        <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-primary">
          <div class="card-header">
          <h3 class="card-title">Roles registrados</h3>
          <div class="card-tools">
            <a href="create.php" class="btn btn-primary">Crear nuevo rol</a>
          </div>

          </div>

          <div class="card-body">
          <table class="table table-striped table-bordered table-hover table-sm">
            <thead class="thead-dark">
                <tr>
                    <th><center>Nro</center></th>
                    <th><center>Nombre del rol</center></th>
                    <th><center>Acciones</center></th>
                </tr>
            </thead>  
            <tbody>
              <!-- logica que hace el llamado a la consulta sql y permite ingresar los datos a la tabla -->
              <?php
              $contador_rol =0; //el contador permite mostrar numeracion sin que afecte cuando se borran datos
              foreach ($roles as $role){
              $id_rol = $role['id_rol'];
              $contador_rol = $contador_rol+1;?>
              <tr>
                  <td style="text-align: center"><?=$contador_rol;?></td>
                  <td style="text-align: center"><?=$role['nombre_rol'];?></td>
                  <td style="text-align: center">
                    <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-primary">Ver</button>
                    <button type="button" class="btn btn-success">Editar</button>
                    <button type="button" class="btn btn-danger">Eliminar</button>
                    </div>
                  </td>
              </tr>
            
            <?php                                         
              }
            ?>
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
include ('../../admin/layout/apartado2.php'); //se llama la separacion de apartado 2
include ('../../layout/mensajes.php');
?>
