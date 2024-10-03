<!-- Configuración del formulario para crear un nuevo rol -->
<?php 
include ('../../app/config.php');
include ('../../admin/layout/apartado1.php');
include ('../../app/controllers/roles/listado_de_roles.php');
?>

<!-- Content Wrapper. Contiene el contenido de la página -->
<div class="content-wrapper">
    <br>
    <!-- Contenido principal -->
    <div class="content">
        <div class="container">
            <div class="row">
                <h1>Crear nuevo usuario administrativo</h1> 
            </div>
            <br>
            <div class="row">
                <!-- Tamaño del formulario -->
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Ingrese los datos</h3>
                        </div>
                        <div class="card-body">
                            <!-- Formulario que envía los datos al controlador -->
                            <form action="<?=APP_URL;?>/app/controllers/administrativo/create.php" method="post">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Nombre del rol</label>
                                            <!-- Lista desplegable para seleccionar el rol -->
                                            <div class="form-inline">
                                                <select name="rol_id" id="" class="form-control">
                                                    <?php foreach ($roles as $role){ ?>
                                                        <option value="<?=$role['id_rol'];?>"><?=$role['nombre_rol'];?></option>
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
                                            <input type="text" name="nombres" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Apellidos</label>
                                            <input type="Text" name="apellidos" class="form-control" required>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Codigo Unico de Identificacion (CUI)</label>
                                            <input type="number" name="cui" class="form-control" required>
                                        </div>
                                    </div>  


                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Fecha de nacimiento</label>
                                            <input type="date" name="fecha_nacimiento" class="form-control" required>
                                        </div>
                                    </div>  

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Número de teléfono</label>
                                            <input type="number" name="celular" class="form-control" required>
                                        </div>
                                    </div>             
                                                           

                                </div>


                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Correo</label>
                                            <input type="email" name="correo" class="form-control" required>
                                        </div>
                                    </div> 
                                    
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="">Direccion</label>
                                            <input type="text" name="direccion" class="form-control" required>
                                        </div>
                                    </div>         
                                    
                                </div>


                                <hr>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <!-- Botones del formulario -->
                                            <button type="submit" class="btn btn-primary">Registrar</button>
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
