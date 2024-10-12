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
            
          <table class="table table-striped table-bordered table-hover table-sm">
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




