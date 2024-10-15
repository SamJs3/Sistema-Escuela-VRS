<?php
include ('../app/config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <!-- esto permite que el diseño sea responsive en dispositivos moviles -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?=APP_NAME;?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=APP_URL;?>/public/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?=APP_URL;?>/public/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=APP_URL;?>/public/dist/css/adminlte.min.css">
  <!-- Aca se incluye la libreria que permite usar Sweetalert2, para estilizar alertas -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    /* Cambiar el color de fondo de la página de login */
    body.login-page {
      background: #f4f6f9; /color fondo
    }
  </style>
 
</head>
<body class="hold-transition login-page">
<!-- <div class="position-absolute top-0 end-0 p-2">
  <img src="../Asset/Umg.png" class="img-fluid" style="max-width: 80px;" alt="Logo esquina">
</div> -->


<div class="login-box">
  <div class="login-logo">
  <center>
        <br>
        <img src="../Asset/logo.jpg"
             width="225px" alt=""><br><br>
    </center>

  <div class="login-logo">
        <h3 href=""><b>Escuela</b></h3>
        <h3 href=""><b>Vicente R. Sanchez</b></h3>
    </div>

  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Inicio de Sesión</p>
      <hr>
      <!-- el action="controller_login.ph" me permite enviar los datos hacia la base de datos -->
      <form action="controller_login.php" method="post">
        <div class="input-group mb-3">
          <!-- informacion de box de correo -->
          <input type="email" name="correo" class="form-control" placeholder="Usuario">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <!-- informacion de box para ingresar password -->
          <input type="password" name="password" class="form-control" placeholder="Contraseña">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
       <hr>
       <!-- /.Boton para iniciar sesion -->
        <div class="input-group mb-3">
          <button class="btn btn-primary btn-block" type="submit">Ingresar</button>
        </div>
        
      </form>


      <!-- Aca se define el mensaje que indica que la contraseña es incorrecta -->
      <?php
      session_start();
      if(isset($_SESSION['mensaje'])){
          $mensaje = $_SESSION['mensaje'];
          ?>
          <script>
              Swal.fire({
                position: "top-middle",
                icon: "error",
                title: "Las datos introducidos son incorrectos. Vuelva a intentarlo",
                showConfirmButton: false,
                timer: 3000
              });
          </script>
      <!-- session destroy nos permite eliminar la sesion que se abre para que la alerta solo se muestre una vez -->
       <?php
       session_destroy();
      }
       ?>   

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?=APP_URL;?>/public/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=APP_URL;?>/public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=APP_URL;?>/public/dist/js/adminlte.min.js"></script>
</body>
</html>
