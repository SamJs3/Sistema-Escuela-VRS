<!-- llamada al resto de configuraciones -->
<?php 
include ('../../app/config.php');
include ('../../admin/layout/apartado1.php');
include('../../app/controllers/estudiantes/listado_estudiantes.php');
include ('../../app/controllers/docentes/listado_docentes.php');
include ('../../app/controllers/asignaciones/listado_asignaciones.php');
include ('../../app/controllers/observaciones/listado_observaciones.php');

$grado = "";
$seccion ="";
foreach ($asignaciones as $asignacione) {
  if($correo_usuario == $asignacione['correo']){
    $grado = $asignacione ['grado'];
    $seccion = $asignacione ['seccion'];
}
}


?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          
        <h1>Grado Asignado: <?=$grado." ".$seccion?></h1> 
        
        <!-- empieza la configuracion de la tabla de roles -->
        </div>
        <br>
       
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Cursos asignados</h3>
                        
                    </div><!-- /.card-header -->
                    
                        <div class="card-body">
                            <table id="example1" class = "table table-striped table-bordered table-hover table-sm">
                                <thead class="thead-dark">
                                    <tr style = "text-align:center">
                                        <th>Nro</th>
                                        <th>Grado</th>
                                        <th>Seccion</th>
                                        <th>Curso</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                
                                <tbody>

                                <?php 
                                    $contador_asignaciones = 0;
                                    foreach($asignaciones as $asignacion){

                                        //este if pregunta si el email con el que se inicio sesión es igual el email
                                        if($email_sesion == $asignacion['correo']){
                                            $id_asignacion = $asignacion['id_asignacion'];
                                            $id_grado = $asignacion['id_grado'];
                                            $docente_id = $asignacion['docente_id'];
                                            $contador_asignaciones++;?>
                                            <tr>
                                                <td style = "text-align:center"><?php echo $contador_asignaciones;?></td>
                                                <td style = "text-align:center"><?php echo $asignacion['grado'];?></td>
                                                <td style = "text-align:center"><?php echo $asignacion['seccion'];?></td>
                                                <td style = "text-align:center"><?php echo $asignacion['nombre_curso'];?></td>
                                             
                                                <td>
                                                    <center>
                                                        <a class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModal<?php echo $id_asignacion;?>">
                                                            <i class="bi bi-clipboard-check"></i> Agregar observacion
                                                        </a>
                                                    </center>
                                                    
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleModal<?php echo $id_asignacion;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                            <div class="modal-header" style="background-color:  #f5304b ">
                                                                <h5 class="modal-title" id="exampleModalLabel" style="color:  #faf8f8 ">
                                                                    Observaciones del curso: <?php echo $asignacion['nombre_curso']; ?>
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="<?php echo APP_URL;?>/app/controllers/observaciones/create.php" method="post">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label for="">Fecha de observacion</label>
                                                                                    <input type="text" name="docente_id" value="<?php echo $docente_id;?>" hidden>
                                                                                    <input type="date" name="fecha" class="form-control">
                                                                                </div>
                                                                            </div>
                                                                        </div>


                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label for="">Estudiante</label>
                                                                                    <select name="estudiante_id" id="" class="form-control">
                                                                                        <?php
                                                                                            foreach($estudiantes as $estudiante){
                                                                                                if($estudiante['id_grado'] == $asignacion['grado_id']){
                                                                                                                $id_estudiante = $estudiante['id_estudiante'];
                                                                                                ?>
                                                                                                <option value="<?php echo $id_estudiante;?>"><?php echo $estudiante['nombres']. " " .$estudiante['apellidos'] ;?></option>
                                                                                        <?php
                                                                                                }
                                                                                        
                                                                                            }
                                                                                        ?>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>


                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label for="">Curso</label>
                                                                                    <input type="text" class="form-control" value = "<?php echo $asignacion['nombre_curso'];?>" disabled>
                                                                                    <input type="text" name ="curso_id" class="form-control" value = "<?php echo $asignacion['id_curso'];?>" hidden>
                                                                                </div>
                                                                            </div>
                                                                        </div>


                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label for="">Observación</label>
                                                                                    <select name="observacion" id="" class="form-control">
                                                                                        <option value="DISCIPLINA">DISCIPLINA</option>
                                                                                        <option value="ASISTENCIA">ASISTENCIA</option>
                                                                                        <option value="RENDIMIENTO ACADÉMICO">RENDIMIENTO ACADÉMICO</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label for="">Nota</label>
                                                                                    <textarea name="nota" id="" cols="30" rows="3" class="form-control"></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>                    

                                                            </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                                            <button type="submit" class="btn btn-danger">Registrar</button>
                                                                        </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </td>
                                            </tr>
                                        <?php    
                                        }
                                    }
                                ?>

                                </tbody>

                            </table>
                        </div><!-- /.card-body -->
                
                </div><!-- /.card -->
            
        </div>
        </div><!-- /.row -->
        
        <br>

        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h3 class="card-title">Observaciones registradas</h3>
                        
                    </div><!-- /.card-header -->
                    
                        <div class="card-body">
                            <table id="example2" class = "table table-striped table-bordered table-hover table-sm">
                                <thead>
                                    <tr style = "text-align:center">
                                        <th>Nro</th>
                                        <th>Estudiante</th>
                                        <th>Curso</th>
                                        <th>Fecha de observacion</th>
                                        <th>Observación</th>
                                        <th>Nota</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                
                                <tbody>

                                <?php 
                                    $contador_observacion = 0;
                                    foreach($observaciones as $observacion){

                                        //este if pregunta si el email con el que se inicio sesión es igual el email
                                        if($email_sesion == $observacion['correo']){
                                            $id_observacion = $observacion['id_observacion'];
                                            $estudiante_id = $observacion['estudiante_id'];
                                            $grado_id = $observacion['grado_id'];
                                            $contador_observacion++;?>
                                            <tr>
                                                <td style = "text-align:center"><?php echo $contador_observacion;?></td>

                                                <?php
                                                    foreach($estudiantes as $estudiante){
                                                        if($estudiante['id_estudiante'] == $observacion['estudiante_id']){ ?>
                                                            <td style = "text-align:center"><?php echo $estudiante['nombres']." ".$estudiante['apellidos'];?></td>
                                                            <td style = "text-align:center"><?php echo $observacion['nombre_curso'];?></td>
                                                            <td style = "text-align:center"><?php echo $observacion['fecha'];?></td>
                                                            <td style = "text-align:center"><?php echo $observacion['observacion'];?></td>
                                                            <td style = "text-align:center"><?php echo $observacion['nota'];?></td>
                                                    <?php
                                                        }
                                                    }
                                                ?>

                                                <td>
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#ModalEditar<?php echo $id_observacion;?>"><i>Editar</i>
                                                        </a>
                                                        <form action="<?php echo APP_URL;?>/app/controllers/observaciones/delete.php" onclick="preguntar<?php echo $id_observacion;?>(event)" method="post" id="miFormulario<?php echo $id_observacion;?>">
                                                            <input type="text" name="id_observacion" value="<?php echo $id_observacion;?>" hidden>
                                                            <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 0px 5px 5px 0px"><i></i>Eliminar</button>
                                                        </form>
                                                    
                                                        <script>
                                                            function preguntar<?php echo $id_observacion;?>(event){
                                                                event.preventDefault()
                                                                Swal.fire({
                                                                    title: 'Eliminar Registro',
                                                                    text:  '¿Desea eliminar este registro?',
                                                                    icon:  'question',
                                                                    showDenyButton: true,
                                                                    confirmButtonText: 'Eliminar',
                                                                    confirmButtonColor: '#a5161d',
                                                                    denyButtonColor: '#270a0a',
                                                                    denyButtonText: 'Cancelar',
                                                                }).then ((result) =>{
                                                                    if(result.isConfirmed){
                                                                        var form = $('#miFormulario<?php echo $id_observacion;?>')
                                                                        form.submit()
                                                                    }
                                                                })
                                                            }
                                                        </script>
                                                    </div>

                                                    
                                               
                                                    
                                                    
                                                    
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="ModalEditar<?php echo $id_observacion;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                            <div class="modal-header" style="background-color:  #078e2e ">
                                                                <h5 class="modal-title" id="exampleModalLabel" style="color:  #faf8f8 ">
                                                                    Editar observacion
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="<?php echo APP_URL;?>/app/controllers/observaciones/update.php" method="post">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label for="">Fecha de reporte</label>
                                                                                    <input type="text" value="<?php echo $id_observacion; ?>" name ="id_observacion" hidden>
                                                                                    <input type="text" name="docente_id" value="<?php echo $docente_id;?>" hidden>
                                                                                    <input type="date" name="fecha" class="form-control" value = "<?php echo $observacion['fecha'];?>">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label for="">Estudiante</label>
                                                                                    <select name="estudiante_id" id="" class="form-control">
                                                                                        <?php
                                                                                            foreach($estudiantes as $estudiante){
                                                                                                if($estudiante['id_grado'] == $grado_id){
                                                                                                        $id_estudiante = $estudiante['id_estudiante'];
                                                                                                ?>
                                                                                                <option value="<?php echo $id_estudiante;?>" <?php echo $id_estudiante==$estudiante_id ? 'selected' : '' ?> ><?php echo $estudiante['nombres']. " " .$estudiante['apellidos'] ;?></option>
                                                                                        <?php
                                                                                                }
                                                                                        
                                                                                            }
                                                                                        ?>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>


                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label for="">Curso</label>
                                                                                    <input type="text" value ="<?php echo $observacion['nombre_curso'];?>" class="form-control" disabled>
                                                                                    <input type="text" name ="curso_id" class="form-control" value = "<?php echo $observacion['id_curso'];?>" hidden>
                                                                                </div>
                                                                            </div>
                                                                        </div>


                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label for="">Observación</label>
                                                                                    <select name="observacion" id="" class="form-control">
                                                                                        <option value="DISCIPLINA" <?php echo $observacion['observacion']== "DISCIPLINA" ? 'selected' : '' ?>>DISCIPLINA</option>
                                                                                        <option value="ASISTENCIA" <?php echo $observacion['observacion']== "ASISTENCIA" ? 'selected' : '' ?>>ASISTENCIA</option>
                                                                                        <option value="RENDIMIENTO ACADÉMICO" <?php echo $observacion['observacion']== "RENDIMIENTO ACADÉMICO" ? 'selected' : '' ?>>RENDIMIENTO ACADÉMICO</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label for="">Nota</label>
                                                                                    <textarea name="nota" id="" cols="30" rows="3" class="form-control"><?php echo $observacion['nota'];?></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>                    

                                                            </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                                            <button type="submit" class="btn btn-success">Actualizar</button>
                                                                        </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </td>
                                            </tr>
                                        <?php    
                                        }
                                    }
                                ?>

                                </tbody>

                            </table>
                        </div><!-- /.card-body -->
                 <!-- Boton Volver -->
                 <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <a href="<?=APP_URL;?>/admin" class="btn btn-secondary ml-3">Volver</a>
                              </div>
                            </div>
                          </div>
                </div><!-- /.card -->
            
            </div>
        </div>

    </div><!-- /.container-fluid -->
    </div><!-- /.content -->
    
</div>
<!-- /.content-wrapper -->

<?php 
include ('../../admin/layout/apartado2.php'); //se llama la separacion de apartado 2
include ('../../layout/mensajes.php');
?>


<script>
  $(function () {
    // Configuración para la primera tabla (example1)
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "pageLength": 5,
      "language": {
        // Opciones de idioma
        "decimal": ",",
        "thousands": ".",
        "sProcessing": "Procesando...",
        "sLengthMenu": "Mostrar _MENU_ registros",
        "sZeroRecords": "No se encontraron resultados",
        "sEmptyTable": "Ningún dato disponible en esta tabla",
        "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
        "sSearch": "Buscar:",
        "oPaginate": {
          "sFirst": "Primero",
          "sLast": "Último",
          "sNext": "Siguiente",
          "sPrevious": "Anterior"
        },
        "oAria": {
          "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
          "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
      }
    });

    // Configuración para la segunda tabla (example2)
    $("#example2").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "language": {
        // Opciones de idioma
        "decimal": ",",
        "thousands": ".",
        "sProcessing": "Procesando...",
        "sLengthMenu": "Mostrar _MENU_ registros",
        "sZeroRecords": "No se encontraron resultados",
        "sEmptyTable": "Ningún dato disponible en esta tabla",
        "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
        "sSearch": "Buscar:",
        "oPaginate": {
          "sFirst": "Primero",
          "sLast": "Último",
          "sNext": "Siguiente",
          "sPrevious": "Anterior"
        },
        "oAria": {
          "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
          "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
      }
    });
  });
</script>
