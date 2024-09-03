<!-- aca se encuentra toda la configuracion del form para crear un nuevo rol -->
<!-- llamada al resto de configuraciones -->
<?php 
include ('../../app/config.php');
include ('../../admin/layout/apartado1.php');

?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          
        <h1>Crear nuevo rol</h1> 
        
        <!-- empieza la configuracion de la tabla de roles -->
        </div>
        <br>
        <div class="row">
          <!-- aca se le da el tamaño al formulario  -->
        <div class="col-md-6">
          <div class="card card-outline card-primary">
          <div class="card-header">
          <h3 class="card-title">Ingrese los datos</h3>
          
          </div>
            <div class="card-body">
              <!-- aca esta la accion que envia los datos al apartado de create y este los envia a la base de datos -->
                <form action="<?=APP_URL;?>/app/controllers/roles/create.php" method="post">
                <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="">Nombre del rol</label>
                    <input type="text" name="nombre_rol" class="form-control" required>
                  </div>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">Registrar</button>
                    <a href="<?=APP_URL;?>/admin/roles" class="btn btn-secondary">Cancelar</a>
                  </div>
                </div>
              </div>
                </form>
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
