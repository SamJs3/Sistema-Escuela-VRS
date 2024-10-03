<!-- Configuración del formulario para crear un nuevo rol -->
<?php 
$id_usuario = $_GET['id'];
include ('../../app/config.php');
include ('../../admin/layout/apartado1.php');
include ('../../app/controllers/usuarios/datos_usuario.php');
?>

<!-- Content Wrapper. Contiene el contenido de la página -->
<div class="content-wrapper">
    <br>
    <!-- Contenido principal -->
    <div class="content">
        <div class="container">
            <div class="row">
                <h1>Detalle usuario: <?=$correo;?> </h1> 
            </div>
            <br>
            <div class="row">
                <!-- Tamaño del formulario -->
                <div class="col-md-8">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Datos registrados</h3>
                        </div>
                        <div class="card-body">
                            <!-- Formulario que envía los datos al controlador -->
                            
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Nombre del rol</label>
                                            <p><?=$nombre_rol;?> </p>
                                            
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Correo electrónico</label>
                                            <p><?=$correo;?> </p>
                                        </div>
                                    </div>                        


                                </div>

                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Fecha y hora de creacion</label>
                                            <p><?=$fyhcreacion;?> </p>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Estado</label>
                                            <p><?php
                                                if($estado == '1'){
                                                    echo "Activo";
                                                }else{
                                                    echo "Inactivo";
                                                }?> </p>
                                        </div>
                                    </div>
                                </div>

                                <hr>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <!-- Botones del formulario -->
                                            <button onclick="window.print();" class="btn btn-primary">Imprimir</button>
                                            <a href="<?=APP_URL;?>/admin/usuarios" class="btn btn-secondary">Volver</a>
                                        </div>
                                    </div>
                                </div>
                            
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
