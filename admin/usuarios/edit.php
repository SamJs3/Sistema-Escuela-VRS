<!-- Configuración del formulario para crear un nuevo rol -->
<?php 

$id_usuario = $_GET['id'];

include ('../../app/config.php');
include ('../../admin/layout/apartado1.php');
include ('../../app/controllers/usuarios/datos_usuario.php');
include ('../../app/controllers/roles/listado_de_roles.php');

?>

<!-- Content Wrapper. Contiene el contenido de la página -->
<div class="content-wrapper">
    <br>
    <!-- Contenido principal -->
    <div class="content">
        <div class="container">
            <div class="row">
                <h1>Editar usuario: <?=$correo;?></h1> 
            </div>
            <br>
            <div class="row">
                <!-- Tamaño del formulario -->
                <div class="col-md-12">
                    <div class="card card-outline card-success">
                        <div class="card-header">
                            <h3 class="card-title">Ingrese los datos</h3>
                        </div>
                        <div class="card-body">
                            <!-- Formulario que envía los datos al controlador -->
                            <form action="<?=APP_URL;?>/app/controllers/usuarios/update.php" method="post">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Rol del usuario</label>
                                            <input type="text" name="id_usuario" value="<?=$id_usuario;?>" hidden>
                                            <!-- Lista desplegable para seleccionar el rol -->
                                            <div class="form-inline">
                                                <select name="rol_id" id="" class="form-control">
                                                    <?php 
                                                    foreach ($roles as $role){
                                                    $nombre_rol_tabla = $role['nombre_rol'];?>
                                                        <option value="<?=$role['id_rol'];?>" <?php if($nombre_rol==$nombre_rol_tabla){?> selected="selected" <?php } ?> ><?=$role['nombre_rol'];?></option>
                                                        <?php } ?>
                                                </select>
                                                <!-- Botón para redirigir al formulario de crear nuevo rol -->
                                                <a href="<?=APP_URL;?>/admin/roles/create.php" style="margin-left: 5px" class="btn btn-success">
                                                    <i class="bi bi-plus-circle"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Estado</label>
                                            <select name="estado" id="" class="form-control">
                                                <?php
                                                if($estado == "1"){ ?>
                                                <option value="ACTIVO">ACTIVO</option>
                                                <option value="INACTIVO">INACTIVO</option>
                                                <?php
                                                }else{ ?>
                                                    <option value="ACTIVO">ACTIVO</option>
                                                    <option value="INACTIVO" selected="selected">INACTIVO</option>
                                                <?php
                                                }?>
                                            </select>
                                        </div>
                                    </div>  

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Correo electrónico</label>
                                            <input type="email" name="correo" value="<?=$correo?>" class="form-control" required>
                                        </div>
                                    </div>   


                                </div>

                                <div class="row">                                                 

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Contraseña</label>
                                            <input type="password" name="password" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Confirma la contraseña</label>
                                            <input type="password" name="password_confirmada" class="form-control">
                                        </div>
                                    </div>
                                </div>

                               


                                <hr>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <!-- Botones del formulario -->
                                            <button type="submit" class="btn btn-success">Actualizar</button>
                                            <a href="<?=APP_URL;?>/admin/usuarios" class="btn btn-secondary">Cancelar</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
    </div>
</div>

<?php 
include ('../../admin/layout/apartado2.php'); // Llamada a la segunda parte del layout
include ('../../layout/mensajes.php');
?>
