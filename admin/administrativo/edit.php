<!-- Configuración del formulario para crear un nuevo rol -->
<?php 
$id_administrativo = $_GET['id'];
include ('../../app/config.php');
include ('../../admin/layout/apartado1.php');
include ('../../app/controllers/roles/listado_de_roles.php');
include ('../../app/controllers/administrativo/datos_administrativo.php');
?>

<!-- Content Wrapper. Contiene el contenido de la página -->
<div class="content-wrapper">
    <br>
    <!-- Contenido principal -->
    <div class="content">
        <div class="container">
            <div class="row">
                <h1>Usuario administrativo: <?=$nombres." ".$apellidos?> </h1> 
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
                            <form action="<?=APP_URL;?>/app/controllers/administrativo/update.php" method="post">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="text" name="id_administrativo" value="<?=$id_administrativo;?>" hidden>
                                            <input type="text" name="id_usuario" value="<?=$id_usuario;?>" hidden>
                                            <input type="text" name="id_persona" value="<?=$id_persona;?>" hidden>

                                            <label for="">Nombre del rol</label>
                                            <!-- Lista desplegable para seleccionar el rol -->
                                            <div class="form-inline">
                                                <select name="rol_id" id="" class="form-control">
                                                    <?php foreach ($roles as $role){ ?>
                                                        <option value="<?=$role['id_rol'];?>" <?php if($nombre_rol==$role['nombre_rol']){?> selected="selected" <?php } ?> ><?=$role['nombre_rol'];?></option>
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
                                            <label for="">Nombres</label>
                                            <input type="text" name="nombres" value="<?=$nombres;?>" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Apellidos</label>
                                            <input type="Text" name="apellidos" value="<?=$apellidos;?>" class="form-control" required>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Codigo Unico de Identificacion (CUI)</label>
                                            <input type="number" name="cui" value="<?=$cui;?>" class="form-control" required>
                                        </div>
                                    </div>  


                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Fecha de nacimiento</label>
                                            <input type="date" name="fecha_nacimiento" value="<?=$fecha_nacimiento;?>" class="form-control" required>
                                        </div>
                                    </div>  

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Número de teléfono</label>
                                            <input type="number" name="celular" value="<?=$celular;?>" class="form-control" required>
                                        </div>
                                    </div>             
                                                           

                                </div>


                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Correo</label>
                                            <input type="email" name="correo" value="<?=$correo;?>" class="form-control" required>
                                        </div>
                                    </div> 
                                    
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="">Direccion</label>
                                            <input type="text" name="direccion" value="<?=$direccion;?>" class="form-control" required>
                                        </div>
                                    </div>         
                                    
                                </div>


                                <hr>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <!-- Botones del formulario -->
                                            <button type="submit" class="btn btn-success">Actualizar</button>
                                            <a href="<?=APP_URL;?>/admin/administrativo" class="btn btn-secondary">Cancelar</a>
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
