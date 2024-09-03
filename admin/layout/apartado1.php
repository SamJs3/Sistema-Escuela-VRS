<?php
//aca verificamos que si existe una sesion y verificamos el correo que se ingreo para ver si tiene acceso a el panel de admin
session_start();
if(isset($_SESSION['email recibido'])){
    //echo "El usuario inicio sesion";
    $email_sesion = $_SESSION['email recibido'];
    //query que permite buscar el nombre del usuario activo en sesion
    $query_sesion = $pdo->prepare("SELECT * FROM usuarios WHERE correo = '$email_sesion' and estado ='1';");
    $query_sesion->execute();

    $datos_usuario = $query_sesion->fetchAll(PDO::FETCH_ASSOC);
    foreach ($datos_usuario as $datos_usuario){
       $nombre_usuario = $datos_usuario['nombres'];
       $cargo_usuario = $datos_usuario['cargo'];
    }

}else{
  echo "El usuario no inicio sesion";
  header('Location: ' . APP_URL . "/login");
} 
?>

<!DOCTYPE html>




<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?=APP_NAME;?> | Starter</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo APP_URL;?>../public/plugins/fontawesome-free/css/all.min.css"> 
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=APP_URL;?>/public/dist/css/adminlte.min.css">
  
  
  <!-- SweetAlert Extension -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Iconos de Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">



</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <!-- permite redireccionar al menu principal dando click en el nombre del sistema -->
        <a href="<?=APP_URL;?>/admin" class="nav-link"><?=APP_NAME;?></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      

      <!-- Codigo para mensajes del panel principal -->
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?=APP_URL;?>/admin" class="brand-link">
      <img src="https://cdn-icons-png.flaticon.com/128/5766/5766151.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Menú Principal</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="https://cdn-icons-png.flaticon.com/128/1896/1896561.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?=$nombre_usuario;?></a>
        </div>
        <div class="info">
          <br>
          <a href="#" class="d-block"><?=$cargo_usuario;?></a>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link active">
              <!-- nombre primer opcion de barra izquierda -->
              <i class="nav-icon fas"><i class="bi bi-tags"></i></i>
              <p>
                Roles
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <!-- configuracion y llamado a opcion de listado roles -->
                <a href="<?=APP_URL;?>/admin/roles" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>

                  <p>Listado de Roles</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>P2</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
           <!--  codigo para cerrar sesion -->
            <a href="<?=APP_URL;?>/login/logout.php" class="nav-link" style="background-color: #FA160A">
              <i class="nav-icon fas"><i class="bi bi-door-open"></i></i>
              <p>
                Cerrar Sesión
          
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>