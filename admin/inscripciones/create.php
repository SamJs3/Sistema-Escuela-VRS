<!-- Configuración del formulario para crear un nuevo rol -->
<?php 
include ('../../app/config.php');
include ('../../admin/layout/apartado1.php');
include ('../../app/controllers/roles/listado_de_roles.php');
include ('../../app/controllers/niveles/listado_de_niveles.php');
include ('../../app/controllers/grados/listado_grados.php');
?>

<!-- Content Wrapper. Contiene el contenido de la página -->
<div class="content-wrapper">
    <br>
    <!-- Contenido principal -->
    <div class="content">
        <div class="container">
            <div class="row">
                <h1>Crear nuevo Estudiante</h1> 
            </div>
            <br>

        <form action="<?=APP_URL;?>/app/controllers/inscripciones/create.php" method="post">
            <div class="row">
                <!-- Tamaño del formulario -->
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Ingrese los datos personales del Estudiante</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <!-- Selección del rol -->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Nombre del rol</label>
                                        <!-- Lista desplegable para seleccionar el rol -->
                                        <div class="form-inline">
                                            <select name="rol_id" id="" class="form-control">
                                                <?php foreach ($roles as $role){ ?>
                                                    <option value="<?=$role['id_rol'];?>" <?=$role['nombre_rol']=="ESTUDIANTE" ? 'selected': ''?>>
                                                        <?=$role['nombre_rol'];?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- Campo Nombres -->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Nombres</label>
                                        <input type="text" name="nombres" class="form-control" required>
                                    </div>
                                </div>

                                <!-- Campo Apellidos -->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Apellidos</label>
                                        <input type="text" name="apellidos" class="form-control" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <!-- Campo Fecha de nacimiento -->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Fecha de nacimiento</label>
                                        <input type="date" name="fecha_nacimiento" class="form-control" required>
                                    </div>
                                </div>  
  
                                
                                <!-- Campo Correo -->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Correo</label>
                                        <input type="email" name="correo" class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Código único de identificación (CUI)</label>
                                        <input type="number" name="cui" class="form-control" required>
                                    </div>
                                </div>



                            </div>

                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Número de teléfono</label>
                                        <input type="number" name="celular" class="form-control" required>
                                    </div>
                                </div>

                                <!-- Campo Dirección -->
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="">Dirección</label>
                                        <input type="text" name="direccion" class="form-control" required>
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
                            <h3 class="card-title">Ingrese los datos académicos del Estudiante</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Nivel</label>
                               
                                        <div class="form-inline">
                                            <select name="nivel_id" id="" class="form-control">
                                                <?php foreach ($niveles as $nivele){ ?>
                                                    <option value="<?=$nivele['id_nivel'];?>"><?=$nivele['nivel'];?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Grados</label>
                               
                                        <div class="form-inline">
                                            <select name="grado_id" id="" class="form-control">
                                                <?php foreach ($grados as $grado){ ?>
                                                    <option value="<?=$grado['id_grado'];?>"><?=$grado['grado']." - ".$grado['seccion'];?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
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
                    <div class="card card-outline card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Ingrese los datos de la persona encargada</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Nombres</label>
                                        <input type="text" name="nombres_pf" class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Apellidos</label>
                                        <input type="text" name="apellidos_pf" class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Parentezco</label>
                                        <input type="text" name="parentezco" class="form-control" required>
                                    </div>
                                </div>
 

                                
                            </div>

                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Número de teléfono</label>
                                        <input type="number" name="celular_pf" class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Código único de identificación (CUI)</label>
                                        <input type="number" name="cui_pf" class="form-control" required>
                                    </div>
                                </div>

                                

                                
                            </div>

                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Nombre y apellido del encargado #2</label>
                                        <input type="text" name="encargado_dos" class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Número de teléfono Encargado #2</label>
                                        <input type="number" name="numero_dos" class="form-control" required>
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
                      <button type="submit" class="btn btn-primary ">Registrar</button>
                       <a href="<?=APP_URL;?>/admin/estudiantes" class="btn btn-secondary ">Cancelar</a>
                  </div>
                 </div>
            </div>

        </form>                                               

            
        </div> <!-- /.container-fluid -->
    </div> <!-- /.content -->
</div> <!-- /.content-wrapper -->

<!-- Llamada a la segunda parte del layout y mensajes -->
<?php 
include ('../../admin/layout/apartado2.php');
include ('../../layout/mensajes.php');
?>
