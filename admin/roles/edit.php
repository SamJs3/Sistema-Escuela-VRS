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

        <h1>EDITAR ROL: <?=$nombre_rol;?></h1>

        <!-- empieza la configuracion de la tabla de roles -->
      </div>
      <br>
      <div class="row">
        <!-- aca se le da el tamaño al formulario  -->
        <div class="col-md-6">
          <div class="card card-outline card-success">
            <div class="card-header">
              <h3 class="card-title">Datos registrados</h3>
            </div>
            <div class="card-body">
                <form action="<?=APP_URL;?>/app/controllers/roles/update.php" method="post">
                    <!-- aca esta la accion que envia los datos al apartado de create y este los envia a la base de datos -->
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="">Nombre del rol</label>
                                <input type="text" name="id_rol" value="<?=$id_rol;?>" hidden>
                                <input type="text" class="form-control" name="nombre_rol" value="<?=$nombre_rol?>">
                              </div>
                              <div class="form-group">
                                <label for="">Fecha y hora de creación</label>
                                <p><?=$fyh_creacion?></p>
                              </div>
                              <div class="form-group">
                                <label for="">Estado</label>
                                <input type="text" class="form-control" name="estado" value="<?=$estado?>">
                              </div>
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <button type="submit" class="btn btn-success">Guardar cambios</button>
                                <a href="<?=APP_URL;?>/admin/roles" class="btn btn-secondary">Volver</a>
                              </div>
                            </div>
                          </div>
                </form>
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
