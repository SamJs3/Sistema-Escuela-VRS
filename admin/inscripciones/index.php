<!-- Llamada al resto de configuraciones -->
<?php 
include ('../../app/config.php');
include ('../../admin/layout/apartado1.php');
include ('../../app/controllers/docentes/listado_docentes.php');
?>


<div class="content-wrapper">
  <br>

  <div class="content">
    <div class="container">
      <div class="row">
        <!-- Título de la página -->
        <h1>Inscripciones: <?=$anio_actual;?></h1> 
      </div>
      <br>
            <div class="row">

              <!-- <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                  <span class="info-box-icon bg-primary"><i class="bi bi-person-badge"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Inscripciones</span>
                    <a href="create.php" class="btn btn-primary btn-sm">Nuevo Estudiante</a>
                  </div>
                </div>
              </div> -->

              <div class="col-lg-4 col-6">
                <div class="small-box" style="background: linear-gradient(to right, #ff9966, #ff5e62);">
                  <div class="inner text-white">
                    <h3 class="text-responsive">Nuevo</h3>
                    <p class="text-responsive">Estudiante</p>
                  </div>
                  <div class="icon">
                    <i class="bi bi-sliders"></i>
                  </div>
                  <a href="<?=APP_URL?>/admin/inscripciones/create.php" class="small-box-footer text-white">
                    Llenar formulario <i class="fas fa-arrow-circle-right"></i>
                  </a>
                </div>
              </div>

            </div> 

          </div> 
        
      </div> 
    </div> 


<!-- Llamada a las demás separaciones y mensajes -->
<?php 
include ('../../admin/layout/apartado2.php'); // Se llama la separación de apartado 2
include ('../../layout/mensajes.php');
?>
