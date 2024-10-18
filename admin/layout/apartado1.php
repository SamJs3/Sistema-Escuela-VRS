<?php
//aca verificamos que si existe una sesion y verificamos el correo que se ingreo para ver si tiene acceso a el panel de admin
session_start();
if (isset($_SESSION['email recibido'])) {
  //echo "El usuario inicio sesion";
  $email_sesion = $_SESSION['email recibido'];
 /*  $query_sesion = $pdo->prepare("
      SELECT u.nombres, r.correo, u.apellidos
      FROM personas u
      JOIN usuarios r ON u.usuario_id = r.id_usuario
      WHERE r.correo = :email_sesion AND u.estado = '1' AND r.estado = '1' ");
  $query_sesion->bindParam(':email_sesion', $email_sesion, PDO::PARAM_STR);
  $query_sesion->execute(); */

  $query = $pdo->prepare("SELECT * FROM usuarios AS usu
  INNER JOIN roles AS rol ON rol.id_rol = usu.rol_id
  INNER JOIN personas AS per ON per.usuario_id = usu.id_usuario
  WHERE usu.correo = '$email_sesion' AND usu.estado = '1' ");
$query->execute();

  $datos_usuarios = $query->fetchAll(PDO::FETCH_ASSOC);
  
  foreach($datos_usuarios as $dato_usuario){
    $correo_usuario = $dato_usuario['correo'];
    $id_rol_sesion_usuario = $dato_usuario['id_rol'];
    $rol_sesion_usuario = $dato_usuario['nombre_rol'];
    $nombres_usuario = $dato_usuario['nombres'];
    $apellidos_usuario = $dato_usuario['apellidos'];
    $cui_sesion_usuario = $dato_usuario['cui'];
    

    
  }

  if($rol_sesion_usuario == "ESTUDIANTE"){
      //header('Location: ' . APP_URL . "/login");
  
  }


  /* $url = $_SERVER["PHP_SELF"]; //Con PHP_URI traigo lo que viene la ruta donde estoy ingresando con el index.php
  $contador = strlen($url); //Cuento los caracteres que tiene dicha ruta
  $rest = substr($url, 23, $contador); //Voy a sustraer y el restante que voy a sustraer
                                            //va a ser de la url pero va a contar el fin ($contador) y el inicio 23 (nombre de la url + /)
    $sql_roles_permisos = "SELECT * FROM roles_permisos AS rolper
    INNER JOIN permisos AS per ON per.id_permiso = rolper.permiso_id
    INNER JOIN roles AS rol ON rol.id_rol = rolper.rol_id
    WHERE rolper.estado = '1'";
    
    $query_roles_permisos = $pdo->prepare($sql_roles_permisos);
    $query_roles_permisos->execute();
    
    $roles_permisos = $query_roles_permisos->fetchAll(PDO::FETCH_ASSOC);

//Para saber los permisos que tiene el usuario logeado
    $contador_rol_permiso = 0; 
    foreach($roles_permisos as $role_permiso){
      if($id_rol_sesion_usuario == $role_permiso['rol_id']){
        //$role_permiso['url'];
        //Si el restante es igual a la url del permiso
        if($rest == $role_permiso['url']){
          //echo "Usuario autorizado";
          $contador_rol_permiso++;
        }else{
          //echo "Usuario no autorizado";
        }
      }
      
    }
    if($contador_rol_permiso>0){
      //echo "ruta habilitada";
    }else{
      //echo "ruta no habilitada";
      header('Location:'.APP_URL."/admin/no_autorizado.php");
    }
//Para saber los permisos que tiene el usuario logeado */

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

  <!-- jQuery -->
<script src="<?php echo APP_URL;?>/public/plugins/jquery/jquery.min.js"></script>
  
  
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
      <!-- Boton pantalla completa -->
    
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>



  <!-- Icono y titulo principal de barra izquierda del menu principal -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?=APP_URL;?>/admin" class="brand-link" >
    <img src="https://cdn-icons-png.flaticon.com/128/15016/15016157.png" alt="Icono de Escuela" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Menú de inicio</span>

    </a>

    <!-- Icono y nombres del usuario -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="https://cdn-icons-png.flaticon.com/128/17612/17612839.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <?php
          // Separar el nombre completo y los apellidos
          $nombre_partes = explode(" ", $nombres_usuario);
          $apellido_partes = explode(" ", $apellidos_usuario);

          // Tomar el primer nombre y el primer apellido
          $primer_nombre = $nombre_partes[0];
          $primer_apellido = $apellido_partes[0];
        ?>
        <div class="info">
          <a href="#" class="d-block"><?= $primer_nombre . " " . $primer_apellido; ?></a>
            <div class="d-block" style="margin-top: 5px;">
              <a href="#" class="d-block"><?= $rol_sesion_usuario; ?></a>
            </div>
            <!-- <div class="d-block" style="margin-top: 5px;">
              <a href="#" class="d-block"><?= $email_sesion; ?></a>
            </div> -->
        </div>
        
      


        <!-- <div class="info">
          <a href="#" class="d-block"><?=$nombres_usuario." ".$apellidos_usuario;?></a>
        </div>      -->
      </div>



      

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <!-- vuelve un poco mas interactivo el boton / le da un tono de sombra al pasar el mouse encima  -->
          <style>
          .nav-link.active:hover {
              box-shadow: 4px 4px 12px rgba(0,0,0,0.3); /* Aumenta la sombra al pasar el mouse */
              transform: translateY(-2px); /* Pequeño efecto de desplazamiento */
          }
          </style>



          <li class="nav-item">
              <a href="#" class="nav-link active" style="background: linear-gradient(to right, #6a11cb, #2575fc); color: white; transition: all 0.3s ease;">
                  <i class="nav-icon fas bi bi-person-badge" style="font-size: 1.2em;"></i>
                  <p>
                      Estudiantes
                      <i class="right fas fa-angle-left"></i>
                  </p>
              </a>
              <ul class="nav nav-treeview">
                  <li class="nav-item">
                      <a href="<?=APP_URL;?>/admin/estudiantes" class="nav-link active">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Listado de estudiantes</p>
                      </a>
                  </li>
              </ul>
          </li>


          <li class="nav-item">
            <a href="#" class="nav-link active" style="background: linear-gradient(to right, #6a11cb, #2575fc); color: white; transition: all 0.3s ease;">
              <!-- nombre segunda opcion de barra izquierda -->
              <i class="nav-icon fas"><i class="bi bi-card-checklist"></i></i></i>
              <p>
                Calificaciones
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <!-- configuracion y llamado a opcion de listado de -->
                <a href="<?=APP_URL;?>/admin/calificaciones" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ingresar calificaciones</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item">
            <a href="#" class="nav-link active" style="background: linear-gradient(to right, #6a11cb, #2575fc); color: white; transition: all 0.3s ease;">
              <!-- nombre segunda opcion de barra izquierda -->
              <i class="nav-icon fas"><i class="bi bi-exclamation-square-fill"></i></i></i>
              <p>
                Observaciones
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <!-- configuracion y llamado a opcion de listado de -->
                <a href="<?=APP_URL;?>/admin/observaciones" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Nueva observacion</p>
                </a>
              </li>
            </ul>
          </li>



          <li class="nav-item">
            <a href="#" class="nav-link active" style="background: linear-gradient(to right, #6a11cb, #2575fc); color: white; transition: all 0.3s ease;">
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
              <li class="nav-item">
                <!-- configuracion y llamado a opcion de listado de -->
                <a href="<?=APP_URL;?>/admin/asignaciones" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Asignar cursos</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item">
            <a href="#" class="nav-link active" style="background: linear-gradient(to right, #6a11cb, #2575fc); color: white; transition: all 0.3s ease;">
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
            <a href="#" class="nav-link active" style="background: linear-gradient(to right, #6a11cb, #2575fc); color: white; transition: all 0.3s ease;">
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
            <a href="#" class="nav-link active" style="background: linear-gradient(to right, #6a11cb, #2575fc); color: white; transition: all 0.3s ease;">
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
            <a href="#" class="nav-link active" style="background: linear-gradient(to right, #6a11cb, #2575fc); color: white; transition: all 0.3s ease;">
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
            <a href="#" class="nav-link active" style="background: linear-gradient(to right, #6a11cb, #2575fc); color: white; transition: all 0.3s ease;">
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
            <a href="#" class="nav-link active" style="background: linear-gradient(to right, #6a11cb, #2575fc); color: white; transition: all 0.3s ease;">
              <i class="nav-icon fas"><i class="bi bi-person-plus"></i></i>
              <p>
                Inscripciones
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <!-- configuracion y llamado a opcion de listado de -->
                <a href="<?=APP_URL;?>/admin/inscripciones" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Formulario de inscripción</p>
                </a>
              </li>
            </ul>
          </li>



          <li class="nav-item">
            <a href="#" class="nav-link active" style="background: linear-gradient(to right, #6a11cb, #2575fc); color: white; transition: all 0.3s ease;">
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
            <a href="#" class="nav-link active" style="background: linear-gradient(to right, #6a11cb, #2575fc); color: white; transition: all 0.3s ease;">
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