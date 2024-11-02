<!-- llamada al resto de configuraciones -->
<?php 
include ('../../app/config.php');
include ('../../admin/layout/apartado1.php');
include ('../../app/controllers/docentes/listado_docentes.php');
include ('../../app/controllers/niveles/listado_de_niveles.php');
include ('../../app/controllers/grados/listado_grados.php');
include ('../../app/controllers/cursos/listado_de_cursos.php');
include ('../../app/controllers/asignaciones/listado_asignaciones.php');
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          
        <h1>Cursos asignados a docentes</h1> 
        
        <!-- empieza la configuracion de la tabla de roles -->
        </div>
        <br>
        <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-primary">
          <div class="card-header">
          <h3 class="card-title">Cursos asignados</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_asignacion">
                  <i class="bi bi-plus-square"></i> Asignar nuevo curso
            </button>
          </div>

          </div>

          <div class="card-body">
          <table id="example1" class="table table-striped table-bordered table-hover table-sm">
            <thead class="thead-dark">
                <tr>
                    <th><center>Nro</center></th>
                    <th><center>Nombres</center></th>
                    <th><center>Apellidos</center></th>
                    <th><center>Rol</center></th>
                    <th><center>Estado</center></th>
                    <th><center>Cursos Asignados</center></th>
                    
                </tr>
            </thead>  
            <tbody>
              <!-- logica que hace el llamado a la consulta sql y permite ingresar los datos a la tabla -->
              <?php
              $contador_docentes =0; //el contador permite mostrar numeracion sin que afecte cuando se borran datos
              foreach ($docentes as $docente){
              $id_docente = $docente['id_docente'];
              $contador_docentes = $contador_docentes+1;?>
              <tr>
                  <td style="text-align: center"><?=$contador_docentes;?></td>
                  <td style="text-align: center"><?=$docente['nombres'];?></td>
                  <td style="text-align: center"><?=$docente['apellidos'];?></td>
                  
                  <td style="text-align: center"><?=$docente['nombre_rol'];?></td>
                  
                  
                  <td style="text-align: center">
                          <?php
                          if ($docente['estado'] == "1") {
                              echo "Activo";
                          } else {
                              echo "Inactivo";
                          }
                          ?>
                  </td>
                  <td>
                      <center>
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal_materias<?=$id_docente;?>">
                           <i class="bi bi-eye"></i> Ver Cursos Asignados
                        </button>
                      </center>

                      <div class="modal fade" id="modal_materias<?=$id_docente;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                              <div class="modal-header" style="background-color: #137BFA">
                                <h5 class="modal-title" id="exampleModalLabel"><b>Cursos Asignados</b></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <b>Docente: <?=$docente['nombres']." ".$docente['apellidos']?></b>
                                <hr>
                                  <table class="table table-bordered table-striped table-sm table-hover">
                                      <tr>
                                          <th><center>Nro</center></th>
                                          <th><center>Nivel</center></th>
                                          <th><center>Grado</center></th>
                                          <th><center>Seccion</center></th>
                                          <th><center>Curso</center></th>
                                          <th><center>Acciones</center></th>
                                      </tr>

                                      <?php
                                        $contador = 0;
                                        foreach($asignaciones as $asignacione){
                                          $id_asignacion=$asignacione['id_asignacion'];
                                          if($asignacione['docente_id']==$id_docente) { $contador = $contador+1; ?>
                                            <tr>
                                              <td><center><?=$contador;?></center></td>
                                              <td><center><?=$asignacione['nivel'];?></center></td>
                                              <td><center><?=$asignacione['grado'];?></center></td>
                                              <td><center><?=$asignacione['seccion'];?></center></td>
                                              <td><center><?=$asignacione['nombre_curso'];?></center></td>
                                              <td style="text-align: center">
                                                  <div class="btn-group" role="group" aria-label="Basic example">
                                                      <a data-toggle="modal" data-target="#modal_edicion<?=$id_asignacion;?>" type="button" 
                                                      class="btn btn-success">Editar</a>
                                                      <div class="modal fade" id="modal_edicion<?=$id_asignacion;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                          <div class="modal-dialog">
                                                            <div class="modal-content">
                                                              <div class="modal-header" style="background-color: #28A745">
                                                                <h5 class="modal-title" id="exampleModalLabel"><b>Editar Asignacion</b></h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                  <span aria-hidden="true">&times;</span>
                                                                </button>
                                                              </div>
                                                              <div class="modal-body">
                                                                <form action="<?=APP_URL;?>/app/controllers/asignaciones/update.php" method="post">
                                                                    <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                          <input type="text" name="id_asignacion" value="<?=$id_asignacion?>" hidden>
                                                                          <label for="">Niveles</label>
                                                                          <select name="id_nivel" id="" class="form-control">
                                                                              <?php
                                                                              foreach ($niveles as $nivele){
                                                                                $id_nivel = $nivele['id_nivel'];?>
                                                                                <option value="<?=$id_nivel;?>"<?=$nivele['id_nivel']==$asignacione['nivel_id']? 'selected': ''?>><?=$nivele['nivel']?></option>

                                                                              <?php    
                                                                              }
                                                                              ?>
                                                                          </select>
                                                                        </div>
                                                                    </div>
                                                              


                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                          <label for="">Grados</label>
                                                                          <select name="id_grado" id="" class="form-control">
                                                                              <?php
                                                                              foreach ($grados as $grado){
                                                                                $id_grado = $grado['id_grado'];?>
                                                                                <option value="<?=$id_grado;?>"<?=$grado['id_grado']==$asignacione['grado_id']? 'selected': ''?>><?=$grado['grado']." - ".$grado['seccion']?></option>

                                                                              <?php    
                                                                              }
                                                                              ?>
                                                                          </select>
                                                                        </div>
                                                                    </div>


                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                          <label for="">Cursos</label>
                                                                          <select name="id_curso" id="" class="form-control">
                                                                              <?php
                                                                              foreach ($cursos as $curso){
                                                                                $id_curso = $curso['id_curso'];?>
                                                                                <option value="<?=$id_curso;?>"<?=$curso['id_curso']==$asignacione['curso_id']? 'selected': ''?>><?=$curso['nombre_curso']?></option>

                                                                              <?php    
                                                                              }
                                                                              ?>
                                                                          </select>
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
                                                                                                              

                                                      <form action="<?=APP_URL;?>/app/controllers/asignaciones/delete.php" onclick="preguntar<?=$id_asignacion;?>(event)" method="post" id="miFormulario<?=$id_asignacion;?>">
                                                          <input type="text" name="id_asignacion" value="<?=$id_asignacion;?>" hidden>
                                                          <button type="submit" class="btn btn-danger" style="border-radius: 0px 5px 5px 0px;">Eliminar</button>
                                                      </form>
                                                          <script>
                                                              function preguntar<?=$id_asignacion;?>(event) {
                                                                  event.preventDefault();
                                                                  Swal.fire({
                                                                      title: 'Eliminar registro',
                                                                      text: '¿Desea eliminar este registro?',
                                                                      icon: 'question',
                                                                      showDenyButton: true,
                                                                      confirmButtonText: 'Eliminar',
                                                                      confirmButtonColor: '#a5161d',
                                                                      denyButtonColor: '#270a0a',
                                                                      denyButtonText: 'Cancelar',
                                                                  }).then((result) => {
                                                                      if (result.isConfirmed) {
                                                                          var form = $('#miFormulario<?=$id_asignacion;?>');
                                                                          form.submit();
                                                                      }
                                                                  });
                                                              }
                                                          </script>
                                                      </div>
                                              </td>

                                              
                                            </tr>

                                          <?php
                                          }
                                        }
                                      ?>
                                  </table>
                                
                              
                               
                              </div>
                     
                            </div>
                          </div>
                    </div>


                  </td>
              </tr>
            
            <?php                                         
              }
            ?>
          </tbody>
          </table> 
          </div>

            <!-- Boton Volver -->
            <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <a href="<?=APP_URL;?>/admin" class="btn btn-secondary ml-3">Volver</a>
              </div>
            </div>
          </div>

          </div>

          </div>  
         
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php 
include ('../../admin/layout/apartado2.php'); //se llama la separacion de apartado 2
include ('../../layout/mensajes.php');
?>




<!-- Configuracion de opciones de la tabla de listado de roles -->
<!-- <script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": [
        {
          extend: 'copy',
          text: 'Copiar'
        },
        {
          extend: 'csv',
          text: 'CSV'
        },
        {
          extend: 'excel',
          text: 'Excel'
        },
        {
          extend: 'pdf',
          text: 'PDF'
        },
        {
          extend: 'print',
          text: 'Imprimir'
        },
        {
          extend: 'colvis',
          text: 'Visibilidad de columnas'
        }
      ],
      "language": {
        "decimal": ",",
        "thousands": ".",
        "sProcessing": "Procesando...",
        "sLengthMenu": "Mostrar _MENU_ registros",
        "sZeroRecords": "No se encontraron resultados",
        "sEmptyTable": "Ningún dato disponible en esta tabla",
        "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix": "",
        "sSearch": "Buscar:",
        "sUrl": "",
        "sInfoThousands": ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
          "sFirst": "Primero",
          "sLast": "Último",
          "sNext": "Siguiente",
          "sPrevious": "Anterior"
        },
        "oAria": {
          "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
          "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        },
        "buttons": {
          "copyTitle": 'Copiado al portapapeles',
          "copySuccess": {
            _: '%d líneas copiadas',
            1: '1 línea copiada'
          },
          "colvis": 'Visibilidad de columnas'
        }
      }
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true
    });
  });
</script> -->

<!-- Modal -->
<div class="modal fade" id="modal_asignacion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #137BFA">
        <h5 class="modal-title" id="exampleModalLabel"><b>Asignacion de curso</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?=APP_URL;?>/app/controllers/asignaciones/create.php" method="post">
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label for="">Docentes</label>
              <select name="id_docente" id="" class="form-control">
                  <?php
                  foreach ($docentes as $docente){
                    $id_docente = $docente['id_docente'];?>
                    <option value="<?=$id_docente;?>"><?=$docente['nombres']." ".$docente['apellidos']?></option>

                  <?php    
                  }
                  ?>
              </select>
            </div>
          </div>
        

          <div class="col-md-12">
              <div class="form-group">
                <label for="">Niveles</label>
                <select name="id_nivel" id="" class="form-control">
                    <?php
                    foreach ($niveles as $nivele){
                      $id_nivel = $nivele['id_nivel'];?>
                      <option value="<?=$id_nivel;?>"><?=$nivele['nivel']?></option>

                    <?php    
                    }
                    ?>
                </select>
              </div>
          </div>
    


          <div class="col-md-12">
              <div class="form-group">
                <label for="">Grados</label>
                <select name="id_grado" id="" class="form-control">
                    <?php
                    foreach ($grados as $grado){
                      $id_grado = $grado['id_grado'];?>
                      <option value="<?=$id_grado;?>"><?=$grado['grado']." - ".$grado['seccion']?></option>

                    <?php    
                    }
                    ?>
                </select>
              </div>
          </div>


          <div class="col-md-12">
              <div class="form-group">
                <label for="">Cursos</label>
                <select name="id_curso" id="" class="form-control">
                    <?php
                    foreach ($cursos as $curso){
                      $id_curso = $curso['id_curso'];?>
                      <option value="<?=$id_curso;?>"><?=$curso['nombre_curso']?></option>

                    <?php    
                    }
                    ?>
                </select>
              </div>
          </div>

          
        
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Registrar</button>
      </div>
     </form>
    </div>
  </div>
</div>
