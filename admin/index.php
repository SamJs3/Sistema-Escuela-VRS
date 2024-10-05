<?php 
include ('../app/config.php');
include ('../admin/layout/apartado1.php');
include ('../app/controllers/roles/listado_de_roles.php');
include ('../app/controllers/usuarios/listado_de_usuarios.php');
include ('../app/controllers/niveles/listado_de_niveles.php');
include ('../app/controllers/grados/listado_grados.php');
include ('../app/controllers/cursos/listado_de_cursos.php');
include ('../app/controllers/administrativo/listado_de_administrativos.php');
include ('../app/controllers/docentes/listado_docentes.php');
include ('../app/controllers/estudiantes/listado_estudiantes.php');
?>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <div style="position: absolute; top: 60px; right: 10px;">
    <img src="../Asset/Umg.png" class="img-fluid" style="max-width: 85px; height: auto;" alt="Logo esquina derecha">
  </div>


    <br>
    <!-- Main content -->
    <div class="container">
  
      <div class="container">
    
        <div class="row">
          <h1>MÓDULOS</h1> 
        </div>

  
        <br>
 

          <div class="row">
            <!-- configuracion del widget de estudiantes -->
            <div class="col-lg-4 col-6">
              <div class="small-box" style="background: linear-gradient(to right, #ff9966, #ff5e62);">
                  <div class="inner text-white">
                    <?php
                    $contador_estudiante = 0;
                    foreach($estudiantes as $estudiante){
                        $contador_estudiante++;
                    }
                    ?>
                    <h3><?=$contador_estudiante?></h3>
                    <p> Estudiantes registrados</p>
                  </div>
                  <div class="icon">
                  <i class="bi bi-person-badge"></i>
                  </div>
                  <a href="<?=APP_URL?>/admin/estudiantes" class="small-box-footer text-white">
                    Modulo Estudiantes <i class="fas fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div>


              <!-- configuracion del widget de docentes -->
            <div class="col-lg-4 col-6">
              <div class="small-box bg-primary">
                <div class="inner">
                  <?php
                  $contador_docentes = 0;
                  foreach($docentes as $docente){
                      $contador_docentes= $contador_docentes+1;
                  }
                  ?>
              <h3><?=$contador_docentes?></h3>
              <p>Docentes registrados</p>
              </div>
             <div class="icon">
             <i class="bi bi-person-vcard"></i>
             </div>
              <a href="<?=APP_URL?>/admin/docentes" class="small-box-footer">
              Modulo Docentes <i class="fas fa-arrow-circle-right"></i>
             </a>
             <p>  </p>
                </div>
            </div>


            <div class="col-lg-4 col-6">
                <div class="small-box" style="background: linear-gradient(to right, #ff8008, #ffc837, #a65432);">
                  <div class="inner text-white">
                    <?php
                    $contador_cursos = 0;
                    foreach($cursos as $curso){
                        $contador_cursos++;
                    }
                    ?>
                    <h3><?=$contador_cursos?></h3>
                    <p>Cursos registrados</p>
                  </div>
                  <div class="icon">
                  <i class="bi bi-journals"></i>
                  </div>
                  <a href="<?=APP_URL?>/admin/cursos" class="small-box-footer text-white">
                    Modulo Cursos <i class="fas fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div>



            <!-- configuracion del widget de grados -->
            <div class="col-lg-4 col-6">
                <div class="small-box" style="background: linear-gradient(to right, #6a11cb, #2575fc);">
                  <div class="inner text-white">
                    <?php
                    $contador_grados = 0;
                    foreach($grados as $grado){
                        $contador_grados++;
                    }
                    ?>
                    <h3><?=$contador_grados?></h3>
                    <p>Grados registrados</p>
                  </div>
                  <div class="icon">
                  <i class="bi bi-list-ol"></i>
                  </div>
                  <a href="<?=APP_URL?>/admin/grados" class="small-box-footer text-white">
                    Modulo Grados <i class="fas fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div>


              <!-- configuracion del widget de niveles -->
             <div class="col-lg-4 col-6">
              <div class="small-box" style="background: linear-gradient(to right, #6a11cb, #03a9f4);">
                <div class="inner text-white">
                  <?php
                  $contador_niveles = 0;
                  foreach($niveles as $nivele){
                      $contador_niveles= $contador_niveles+1;
                  }
                  ?>
              <h3><?=$contador_niveles?></h3>
              <p>Niveles registrados</p>
              </div>
             <div class="icon">
             <i class="bi bi-bar-chart-steps"></i>
             </div>
              <a href="<?=APP_URL?>/admin/niveles" class="small-box-footer">
              Modulo Niveles <i class="fas fa-arrow-circle-right"></i>
             </a>
                </div>
             </div>


            <div class="col-lg-4 col-6">
              <div class="small-box bg-primary">
                <div class="inner">
                  <?php
                  $contador_roles = 0;
                  foreach($roles as $role){
                      $contador_roles= $contador_roles+1;
                  }
                  ?>
              <h3><?=$contador_roles?></h3>
              <p>Roles registrados</p>
              </div>
              
             <div class="icon">
             <i class="bi bi-tags"></i>
             </div>
              <a href="<?=APP_URL?>/admin/roles" class="small-box-footer">
              Modulo Roles<i class="fas fa-arrow-circle-right"></i>
             </a>
                </div>
            </div>
            
            <!-- configuracion del widget de usuarios -->
            <div class="col-lg-4 col-6">
              <div class="small-box bg-info">
                <div class="inner">
                  <?php
                  $contador_usuarios = 0;
                  foreach($usuarios as $usuario){
                      $contador_usuarios= $contador_usuarios+1;
                  }
                  ?>
              <h3><?=$contador_usuarios?></h3>
              <p>Usuarios registrados</p>
              </div>
             <div class="icon">
             <i class="bi bi-people"></i>
             </div>
              <a href="<?=APP_URL?>/admin/usuarios" class="small-box-footer">
              Modulo Usuarios <i class="fas fa-arrow-circle-right"></i>
             </a>
                </div>
            </div>

              

              <div class="col-lg-4 col-6">
                <div class="small-box" style="background: linear-gradient(to right, #ff8008, #ffc837, #a65432);">
                  <div class="inner text-white">
                    <?php
                    $contador_administrativo = 0;
                    foreach($administrativos as $administrativo){
                        $contador_administrativo++;
                    }
                    ?>
                    <h3><?=$contador_administrativo?></h3>
                    <p> Usuarios registrados</p>
                  </div>
                  <div class="icon">
                  <i class="bi bi-person-fill-check"></i>
                  </div>
                  <a href="<?=APP_URL?>/admin/administrativo" class="small-box-footer text-white">
                    Modulo Administrativo <i class="fas fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div>

              <div class="col-lg-4 col-6">
              <div class="small-box" style="background: linear-gradient(to right, #ff9966, #ff5e62);">
                  <div class="inner text-white">
                    <?php
                    $contador_administrativo = 0;
                    foreach($administrativos as $administrativo){
                        $contador_administrativo++;
                    }
                    ?>
                    <h3><?=$contador_administrativo?></h3>
                    <p>Usuarios Administrativos</p>
                  </div>
                  <div class="icon">
                  <i class="bi bi-person-fill-check"></i>
                  </div>
                  <a href="<?=APP_URL?>/admin/administrativo" class="small-box-footer text-white">
                    Modulo Administrativo <i class="fas fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div>


              <div class="col-lg-4 col-6">
                <div class="small-box" style="background: linear-gradient(to right, #ff9966, #ff5e62);">
                  <div class="inner text-white">
                    <h3 class="text-responsive">Config</h3>
                    <p class="text-responsive">Varios</p>
                  </div>
                  <div class="icon">
                    <i class="bi bi-sliders"></i>
                  </div>
                  <a href="<?=APP_URL?>/admin/configuraciones" class="small-box-footer text-white">
                   Configuraciones <i class="fas fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div>



















          </div>

        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php 
include ('../admin/layout/apartado2.php'); //se llama la separacion de apartado 2
include ('../layout/mensajes.php');
?>

