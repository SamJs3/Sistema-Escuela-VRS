<!-- Llamada al resto de configuraciones -->
<?php 
include ('../../app/config.php'); // Archivo de configuración principal
include ('../../admin/layout/apartado1.php'); // Apartado 1 del layout
?>

<!-- Content Wrapper. Contiene el contenido de la página -->
<div class="content-wrapper">
  <br>
  
  <!-- Contenido principal -->
  <div class="content">
    <div class="container">
      
      <!-- Título de la página -->
      <div class="row">
        <h1>Configuraciones del sistema</h1>
      </div>
      <br>
      
      <!-- coonfiguracion de la primer fila de opciones -->
      <div class="row">
        
      <div class="col-md-4 col-sm-6 col-12">
          <div class="info-box">
            <span class="info-box-icon bg-info"><i class="bi bi-info-circle"></i></span>
            <div class="info-box-content">
              <span class="info-box-"><b>Información de la institución</b></span>
              <a href="institucion" class="btn btn-primary btn-sm">Ir a configuración</a>
            </div>
          </div>
      </div> 

      <div class="col-md-4 col-sm-6 col-12">
          <div class="info-box">
            <span class="info-box-icon bg-info"><i class="bi bi-calendar-date"></i></span>
            <div class="info-box-content">
              <span class="info-box-"><b>Datos año en curso</b></span>
              <a href="datos_año" class="btn btn-primary btn-sm">Ir a configuración</a>
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
// Llamada al resto de apartados y mensajes
include ('../../admin/layout/apartado2.php'); // Apartado 2 del layout
include ('../../layout/mensajes.php'); // Mensajes y alertas
?>
