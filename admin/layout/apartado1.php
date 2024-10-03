<?php
//aca verificamos que si existe una sesion y verificamos el correo que se ingreo para ver si tiene acceso a el panel de admin
session_start();
if (isset($_SESSION['email recibido'])) {
  //echo "El usuario inicio sesion";
  $email_sesion = $_SESSION['email recibido'];

  // Query que permite buscar el nombre del usuario activo en sesión y su rol
  $query_sesion = $pdo->prepare("
      SELECT u.correo, r.nombre_rol
      FROM usuarios u
      JOIN roles r ON u.rol_id = r.id_rol
      WHERE u.correo = :email_sesion AND u.estado = '1' AND r.estado = '1' ");
  $query_sesion->bindParam(':email_sesion', $email_sesion, PDO::PARAM_STR);
  $query_sesion->execute();

  $datos_usuario = $query_sesion->fetchAll(PDO::FETCH_ASSOC);
  foreach ($datos_usuario as $datos_usuario) {
      $nombre_usuario = $datos_usuario['correo'];
      $nombre_rol = $datos_usuario['nombre_rol'];
  }
}
else{
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

  <!-- Datatables -->
  <link rel="stylesheet" href="<?=APP_URL;?>/public/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?=APP_URL;?>/public/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?=APP_URL;?>/public/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

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
    <a href="<?=APP_URL;?>/admin" class="brand-link" >
    <img src="https://cdn-icons-png.flaticon.com/128/15016/15016157.png" alt="Icono de Escuela" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Menú de inicio</span>

    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="https://cdn-icons-png.flaticon.com/128/1896/1896561.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?=$nombre_rol;?></a>
        </div>     
      </div>



      

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item">
            <a href="#" class="nav-link active">
              <!-- nombre segunda opcion de barra izquierda -->
              <i class="nav-icon fas"><i class="bi bi-bar-chart-steps"></i></i>
              <p>
                Niveles
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <!-- configuracion y llamado a opcion de listado de -->
                <a href="<?=APP_URL;?>/admin/niveles" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listado de niveles</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item">
            <a href="#" class="nav-link active">
              <!-- nombre segunda opcion de barra izquierda -->
              <i class="nav-icon fas"><i class="bi bi-list-ol"></i></i>
              <p>
                Grados
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <!-- configuracion y llamado a opcion de listado de -->
                <a href="<?=APP_URL;?>/admin/grados" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listado de grados</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item">
            <a href="#" class="nav-link active">
              <!-- nombre segunda opcion de barra izquierda -->
              <i class="nav-icon fas"><i class="bi bi-journals"></i></i>
              <p>
                Cursos
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <!-- configuracion y llamado a opcion de listado de -->
                <a href="<?=APP_URL;?>/admin/cursos" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listado de cursos</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item">
            <a href="#" class="nav-link active">
              <!-- nombre segunda opcion de barra izquierda -->
              <i class="nav-icon fas"><i class="bi bi-person-vcard"></i></i>
              <p>
                Docentes
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <!-- configuracion y llamado a opcion de listado de -->
                <a href="<?=APP_URL;?>/admin/docentes" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listado de docentes</p>
                </a>
              </li>
            </ul>
          </li>

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
                  <p>Listado de roles</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link active">
              <!-- nombre segunda opcion de barra izquierda -->
              <i class="nav-icon fas"><i class="bi bi-people"></i></i>
              <p>
                Usuarios
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <!-- configuracion y llamado a opcion de listado de -->
                <a href="<?=APP_URL;?>/admin/usuarios" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listado de usuarios</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item">
            <a href="#" class="nav-link active">
              <!-- nombre segunda opcion de barra izquierda -->
              <i class="nav-icon fas"><i class="bi bi-person-fill-check"></i></i>
              <p>
                Personal Administrativo
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <!-- configuracion y llamado a opcion de listado de -->
                <a href="<?=APP_URL;?>/admin/administrativo" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listado de personal</p>
                </a>
              </li>
            </ul>
          </li>


          
          


          <li class="nav-item">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas"><i class="bi bi-gear-fill"></i></i>
              <p>
                Configuraciones
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <!-- configuracion y llamado a opcion de listado de -->
                <a href="<?=APP_URL;?>/admin/configuraciones" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Varios</p>
                </a>
              </li>
            </ul>
          </li>
          

          
    


          <li class="nav-item">
           <!--  codigo para cerrar sesion -->
            <a href="<?=APP_URL;?>/login/logout.php" class="nav-link" style="background-color: #ffc107; color: #000;">
              <i class="nav-icon fas"><i class="bi bi-door-open"></i></i>
              <p>Cerrar Sesión</p>
            </a>

            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>