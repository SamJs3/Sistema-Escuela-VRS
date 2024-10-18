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
    <!-- Imagen de la esquina superior derecha -->
    <div style="position: absolute; top: 60px; right: 10px;">
        <img src="../Asset/Umg.png" class="img-fluid" style="max-width: 85px; height: auto;" alt="Logo esquina derecha">
    </div>

    <br>

    <!-- Main content -->
    <div class="container">

        <!-- Encabezado de Módulos -->
        <div class="row">
            <h1>MÓDULOS</h1> 
        </div>

        <br>


<!-- WIDGETS HABILITADOS PARA EL DOCENTE -->
        <?php if($rol_sesion_usuario == "DOCENTE"){ ?>

        <div class="row">
            <!-- Widget de Estudiantes -->
            <div class="col-lg-4 col-6">
                <div class="small-box" style="background: url('https://www.transparenttextures.com/patterns/cubes.png'), linear-gradient(to right, #6a11cb, #2575fc); background-blend-mode: overlay;">
                    <div class="inner text-white">
                        <?php
                        $contador_estudiante = 0;
                        foreach($estudiantes as $estudiante){
                            $contador_estudiante++;
                        }
                        ?>
                        <h3><?=$contador_estudiante?></h3>
                        <p>Estudiantes registrados</p>
                    </div>
                    <div class="icon">
                        <i class="bi bi-person-badge"></i>
                    </div>
                    <a href="<?=APP_URL?>/admin/estudiantes" class="small-box-footer text-white">
                        Modulo Estudiantes <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <!-- Widget de Calificaciones -->
            <div class="col-lg-4 col-6">
                <div class="small-box" style="background: url('https://www.transparenttextures.com/patterns/cubes.png'), linear-gradient(to right, #43cea2, #185a9d); background-blend-mode: overlay; border-radius: 12px;">
                    <div class="inner text-white">
                        <?php $contador_estudiante = count($estudiantes); ?>
                        <h3>Modulo</h3>
                        <p>Calificaciones</p>
                    </div>
                    <div class="icon" style="font-size: 48px; color: white;">
                        <i class="bi bi-card-checklist"></i>
                    </div>
                    <a href="<?=APP_URL?>/admin/calificaciones" class="small-box-footer text-white" style="color: #43cea2;">
                        Módulo Calificaciones <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <!-- Widget de Observaciones -->
            <div class="col-lg-4 col-6">
                <div class="small-box" style="background: url('https://www.transparenttextures.com/patterns/cubes.png'), linear-gradient(to right, #43cea2, #185a9d); background-blend-mode: overlay; border-radius: 12px;">
                    <div class="inner text-white">
                        <?php $contador_estudiante = count($estudiantes); ?>
                        <h3>Modulo</h3>
                        <p>Observaciones</p>
                    </div>
                    <div class="icon">
                        <i class="bi bi-exclamation-square-fill"></i>
                    </div>
                    <a href="<?=APP_URL?>/admin/observaciones" class="small-box-footer text-white" style="color: #43cea2;">
                        Módulo de Observaciones <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <?php } ?> 
<!-- Fin de Widgets para el Docente -->


<!-- WIDGETS HABILITADOS PARA EL ESTUDIANTE -->
        <?php if($rol_sesion_usuario == "ESTUDIANTE"){ 
            foreach($estudiantes as $estudiante){
                if($email_sesion == $estudiante['correo']){
                    $id_estudiante = $estudiante['id_estudiante'];
                    $nivel = $estudiante['nivel'];
                    $grado = $estudiante['grado'];
                    $seccion = $estudiante['seccion'];
                }
            }
        ?>

        <div class="row">
            <!-- Datos del Estudiante -->
            <div class="col-md-6">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Datos del estudiante</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm table-bordered table-hover table-striped">
                            <tr>
                                <td><b>Nombres y Apellidos:</b></td>
                                <td><?php echo $nombres_usuario." ".$apellidos_usuario;?></td>
                            </tr>
                            <tr>
                                <td><b>CUI:</b></td>
                                <td><?php echo $cui_sesion_usuario;?></td>
                            </tr>
                            <tr>
                                <td><b>Nivel:</b></td>
                                <td><?php echo $nivel;?></td>
                            </tr>
                            <tr>
                                <td><b>Grado:</b></td>
                                <td><?php echo $grado;?></td>
                            </tr>
                            <tr>
                                <td><b>Sección:</b></td>
                                <td><?php echo $seccion;?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Widget de Calificaciones -->
            <div class="col-lg-4 col-6">
                <div class="small-box" style="background: url('https://www.transparenttextures.com/patterns/cubes.png'), linear-gradient(to right, #43cea2, #185a9d); background-blend-mode: overlay; border-radius: 12px;">
                    <div class="inner text-white">
                        <?php $contador_estudiante = count($estudiantes); ?>
                        <h3>Modulo</h3>
                        <p>Calificaciones</p>
                    </div>
                    <div class="icon" style="font-size: 48px; color: white;">
                        <i class="bi bi-card-checklist"></i>
                    </div>
                    <a href="<?=APP_URL?>/admin/calificaciones/vista_estudiante.php?id_estudiante=<?=$id_estudiante?>" class="small-box-footer text-white" style="color: #43cea2;">
                        Módulo Calificaciones <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <!-- Widget de Observaciones -->
            <div class="col-lg-4 col-6">
                <div class="small-box" style="background: url('https://www.transparenttextures.com/patterns/cubes.png'), linear-gradient(to right, #43cea2, #185a9d); background-blend-mode: overlay; border-radius: 12px;">
                    <div class="inner text-white">
                        <?php $contador_estudiante = count($estudiantes); ?>
                        <h3>Modulo</h3>
                        <p>Observaciones</p>
                    </div>
                    <div class="icon">
                        <i class="bi bi-exclamation-square-fill"></i>
                    </div>
                    <a href="<?=APP_URL?>/admin/observaciones/vista_estudiante.php?id_estudiante=<?=$id_estudiante?>" class="small-box-footer text-white" style="color: #43cea2;">
                        Modulo Observaciones <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <?php } ?> 
<!-- Fin de Widgets para el Estudiante -->


 
<!-- WIDGETS HABILITADOS PARA EL ADMINISTRADOR -->
          <?php
          if($rol_sesion_usuario == "ADMINISTRADOR" || $rol_sesion_usuario == "DIRECTOR" ){ ?>
             <div class="row">

            <!-- configuracion del widget de estudiantes -->
              <div class="col-lg-4 col-6">
              <div class="small-box" style="background: url('https://www.transparenttextures.com/patterns/cubes.png'), linear-gradient(to right, #6a11cb, #2575fc); background-blend-mode: overlay;">
                  <div class="inner text-white">
                    <?php
                    $contador_estudiante = 0;
                    foreach($estudiantes as $estudiante){
                        $contador_estudiante++;
                    }
                    ?>
                    <h3><?=$contador_estudiante?></h3>
                    <p>Estudiantes registrados</p>
                  </div>
                  <div class="icon">
                    <i class="bi bi-person-badge"></i>
                  </div>
                  <a href="<?=APP_URL?>/admin/estudiantes" class="small-box-footer text-white">
                    Modulo Estudiantes <i class="fas fa-arrow-circle-right"></i>
                  </a>
              </div>
            </div>


            <!-- configuracion del widget de calificaciones -->
              <div class="col-lg-4 col-6">
              <div class="small-box" style="background: url('https://www.transparenttextures.com/patterns/cubes.png'), linear-gradient(to right, #43cea2, #185a9d); background-blend-mode: overlay; border-radius: 12px;">
                  <div class="inner text-white">
                      <?php $contador_estudiante = count($estudiantes); ?>
                      <h3>Modulo</h3>
                      <p>Calificaciones</p>
                  </div>
                  <div class="icon" style="font-size: 48px; color: white;">
                      <i class="bi bi-card-checklist"></i>
                  </div>
                  <a href="<?=APP_URL?>/admin/calificaciones" class="small-box-footer text-white" style="color: #43cea2;">
                      Módulo Calificaciones <i class="fas fa-arrow-circle-right"></i>
                  </a>
              </div>
              </div>

               <!-- configuracion del widget de observaciones -->
               <div class="col-lg-4 col-6">
              <div class="small-box" style="background: url('https://www.transparenttextures.com/patterns/cubes.png'), linear-gradient(to right, #43cea2, #185a9d); background-blend-mode: overlay; border-radius: 12px;">
                  <div class="inner text-white">
                      <?php $contador_estudiante = count($estudiantes); ?>
                      <h3>Modulo</h3>
                      <p>Observaciones</p>
                  </div>
                  <div class="icon" style="font-size: 48px; color: grey;">
                  <div class="icon">
                  <i class="bi bi-exclamation-square-fill"></i>
                  </div>
                  <a href="<?=APP_URL?>/admin/observaciones" class="small-box-footer text-white" style="color: #43cea2;">
                      Módulo de Observaciones <i class="fas fa-arrow-circle-right"></i>
                  </a>
              </div>
              </div>


              <!-- configuracion del widget de docentes -->
              <div class="col-lg-4 col-6">
              <div class="small-box" style="background: url('https://www.transparenttextures.com/patterns/cubes.png'), linear-gradient(to right, #00c6ff, #0072ff); background-blend-mode: overlay;">
                  <div class="inner text-white">
                      <?php
                      $contador_docentes = 0;
                      foreach($docentes as $docente){
                          $contador_docentes++;
                      }
                      ?>
                      <h3><?=$contador_docentes?></h3>
                      <p>Docentes registrados</p>
                  </div>
                  <div class="icon">
                      <i class="bi bi-person-vcard"></i>
                  </div>
                  <a href="<?=APP_URL?>/admin/docentes" class="small-box-footer text-white">
                      Modulo Docentes <i class="fas fa-arrow-circle-right"></i>
                  </a>
              </div>
          </div>



            <!-- configuracion del widget de cursos -->
            <div class="col-lg-4 col-6">
                <div class="small-box" style="background: url('https://www.transparenttextures.com/patterns/cubes.png'), linear-gradient(to right, #11998e, #38ef7d); background-blend-mode: overlay;">
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
                        Módulo Cursos <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>




            <!-- configuracion del widget de grados -->
            <div class="col-lg-4 col-6">
                <div class="small-box" style="background: url('https://www.transparenttextures.com/patterns/cubes.png'), linear-gradient(to right, #00c6ff, #0072ff); background-blend-mode: overlay;">
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
                        Módulo Grados <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>



              <!-- configuracion del widget de niveles -->
              <div class="col-lg-4 col-6">
                    <div class="small-box" style="background: url('https://www.transparenttextures.com/patterns/cubes.png'), linear-gradient(to right, #4e54c8, #8f94fb); background-blend-mode: overlay;">
                        <div class="inner text-white">
                            <?php
                            $contador_niveles = 0;
                            foreach($niveles as $nivele){
                                $contador_niveles++;
                            }
                            ?>
                            <h3><?=$contador_niveles?></h3>
                            <p>Niveles registrados</p>
                        </div>
                        <div class="icon">
                            <i class="bi bi-bar-chart-steps"></i>
                        </div>
                        <a href="<?=APP_URL?>/admin/niveles" class="small-box-footer text-white">
                            Módulo Niveles <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>


            
            <!-- configuracion del widget de roles -->
            <div class="col-lg-4 col-6">
                <div class="small-box" style="background: url('https://www.transparenttextures.com/patterns/cubes.png'), linear-gradient(to right, #6a11cb, #2575fc); background-blend-mode: overlay;">
                    <div class="inner text-white">
                        <?php
                        $contador_roles = 0;
                        foreach($roles as $role){
                            $contador_roles++;
                        }
                        ?>
                        <h3><?=$contador_roles?></h3>
                        <p>Roles registrados</p>
                    </div>
                    <div class="icon">
                        <i class="bi bi-tags"></i>
                    </div>
                    <a href="<?=APP_URL?>/admin/roles" class="small-box-footer text-white">
                        Módulo Roles <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            

            <!-- configuracion del widget de usuarios -->
            <div class="col-lg-4 col-6">
                <div class="small-box" style="background: url('https://www.transparenttextures.com/patterns/cubes.png'), linear-gradient(to right, #00c6ff, #0072ff); background-blend-mode: overlay;">
                    <div class="inner text-white">
                        <?php
                        $contador_usuarios = 0;
                        foreach($usuarios as $usuario){
                            $contador_usuarios++;
                        }
                        ?>
                        <h3><?=$contador_usuarios?></h3>
                        <p>Usuarios registrados</p>
                    </div>
                    <div class="icon">
                        <i class="bi bi-people"></i>
                    </div>
                    <a href="<?=APP_URL?>/admin/usuarios" class="small-box-footer text-white">
                        Módulo Usuarios <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>


              
              <!-- configuracion del widget de usuarios administrativos -->
              <div class="col-lg-4 col-6">
                <div class="small-box" style="background: url('https://www.transparenttextures.com/patterns/cubes.png'), linear-gradient(to right, #11998e, #38ef7d); background-blend-mode: overlay;">
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
                        Módulo Administrativo <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
              </div>


              <div class="col-lg-4 col-6">
              <div class="small-box" style="background: url('https://www.transparenttextures.com/patterns/cubes.png'), linear-gradient(to right, #4e54c8, #8f94fb); background-blend-mode: overlay;">
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

          </div> <!-- /.row -->

          <?php
          }?>
<!-- Fin de Widgets para el Administrador -->
          




      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
<!--   </div> -->
  <!-- /.content-wrapper -->

<?php 
include ('../admin/layout/apartado2.php'); //se llama la separacion de apartado 2
include ('../layout/mensajes.php');
?>

