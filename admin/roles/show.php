<?php

$id_rol = $_GET['id'];

include ('../../app/config.php');
include ('../../admin/layout/apartado1.php');
include('../../app/controllers/roles/datos_del_rol.php');

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          
        <h1>DETALLES ROL: <?=$nombre_rol;?></h1> 
        
        <!-- empieza la configuracion de la tabla de roles -->
        </div>
        <br>
        <div class="row">
          <!-- aca se le da el tamaño al formulario  -->
        <div class="col-md-6">
          <div class="card card-outline card-primary">
          <div class="card-header">
          <h3 class="card-title">Datos registrados</h3>
          
          </div>
            <div class="card-body">
              <!-- aca esta la accion que envia los datos al apartado de create y este los envia a la base de datos -->
                  <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                          <label for="">Nombre del rol</label>
                          <p><?=$nombre_rol?></p>
                        </div>
                        <div class="form-group">
                          <label for="">Fecha y hora de creación</label>
                          <p><?=$fyh_creacion?></p>
                        </div>
                        <div class="form-group">
                          <label for="">Estado</label>
                          <p><?=$estado?></p>
                      </div>
                    </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <a href="<?=APP_URL;?>/admin/roles" class="btn btn-secondary">Volver</a>
                  </div>
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
