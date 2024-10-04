<!-- Configuración del formulario para crear un nuevo rol -->
<?php 
$id_estudiante = $_GET['id'];
include ('../../app/config.php');
include ('../../admin/layout/apartado1.php');
include ('../../app/controllers/estudiantes/datos_estudiante.php');

?>

<!-- Content Wrapper. Contiene el contenido de la página -->
<div class="content-wrapper">
    <br>
    <!-- Contenido principal -->
    <div class="content">
        <div class="container">
            <div class="row">
                <h1>Datos del Estudiante: <?=$nombres." ".$apellidos;?></h1> 
            </div>
            <br>

            <div class="row">
                <!-- Tamaño del formulario -->
                <div class="col-md-12">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <h3 class="card-title">Datos personales registrados</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <!-- Selección del rol -->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Nombre del rol</label>
                                        <p><?=$nombre_rol;?></p>
                                    </div>
                                </div>

                                <!-- Campo Nombres -->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Nombres</label>
                                        <p><?=$nombres; ?></p>
                                    </div>
                                </div>

                                <!-- Campo Apellidos -->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Apellidos</label>
                                        <p><?=$apellidos;?></p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <!-- Campo Fecha de nacimiento -->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Fecha de nacimiento</label>
                                        <p><?=$fecha_nacimiento;?></p>
                                    </div>
                                </div>  
  
                                
                                <!-- Campo Correo -->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Correo</label>
                                        <p><?=$correo;?></p>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Código único de identificación (CUI)</label>
                                        <p><?=$cui;?></p>
                                    </div>
                                </div>



                            </div>

                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Número de teléfono</label>
                                        <p><?=$celular;?></p>
                                    </div>
                                </div>

                                <!-- Campo Dirección -->
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="">Dirección</label>
                                        <p><?=$direccion;?></p>
                                    </div>
                                </div>         
                            </div>


                        </div> <!-- Cierre de card-body -->
                    </div> <!-- Cierre de card -->
                </div> <!-- Cierre de col-md-12 -->
            </div> <!-- Cierre de row -->


            <div class="row">
                <!-- Tamaño del formulario -->
                <div class="col-md-12">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <h3 class="card-title">Datos académicos registrados</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Nivel</label>
                                        <p><?=$nivel;?></p>    
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Grado</label>
                                        <p><?=$grado;?></p> 
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Seccion</label>
                                        <p><?=$seccion;?></p> 
                                    </div>
                                </div>
                            

                            </div>
               

                        </div> <!-- Cierre de card-body -->
                    </div> <!-- Cierre de card -->
                </div> <!-- Cierre de col-md-12 -->
            </div> <!-- Cierre de row -->


            <div class="row">
                <!-- Tamaño del formulario -->
                <div class="col-md-12">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <h3 class="card-title">Datos registrados de la persona encargada </h3>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Nombres</label>
                                        <p><?=$nombres_pf;?></p> 
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Apellidos</label>
                                        <p><?=$apellidos_pf;?></p> 
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Parentezco</label>
                                        <p><?=$parentezco;?></p> 
                                    </div>
                                </div>


                                

                                
                            </div>

                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Número de teléfono</label>
                                        <p><?=$celular_pf;?></p> 
                                        
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Código único de identificación (CUI)</label>
                                        <p><?=$cui_pf;?></p> 
                                    </div>
                                </div>

                                

                                
                            </div>

                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Nombre del encargado #2</label>
                                        <p><?=$encargado_dos;?></p> 
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Número de teléfono Encargado #2</label>
                                        <p><?=$numero_dos;?></p> 
                                    </div>
                                </div>

                                
                            </div>
               

                        </div> <!-- Cierre de card-body -->
                    </div> <!-- Cierre de card -->
                </div> <!-- Cierre de col-md-12 -->
            </div> <!-- Cierre de row -->

            <hr>

            <div class="row">
                <div class="col-md-12">
                   <div class="form-group">
                       <!-- Botones del formulario -->

                       <a href="<?=APP_URL;?>/admin/estudiantes" class="btn btn-secondary ">Volver</a>
                  </div>
                 </div>
            </div>
                                          

            
        </div> <!-- /.container-fluid -->
    </div> <!-- /.content -->
</div> <!-- /.content-wrapper -->

<!-- Llamada a la segunda parte del layout y mensajes -->
<?php 
include ('../../admin/layout/apartado2.php');
include ('../../layout/mensajes.php');
?>
