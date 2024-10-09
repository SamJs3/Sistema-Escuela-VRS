<?php

$id_docente = $_GET['id'];
include ('../../app/config.php');
include ('../../admin/layout/apartado1.php');
include ('../../app/controllers/docentes/datos_docente.php');
include ('../../app/controllers/asignaciones/listado_asignaciones.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <h1>Docente: <?=$nombres;?> <?=$apellidos;?></h1>
                </div>
            <br>
            <div class="row">

                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Cursos Asignados</h3>
                            <!-- <div class="card-tools">
                                <a href="create.php" class="btn btn-primary">Crear nuevo curso</a>
                            </div> -->
                        </div>
                        <div class="card-body" >
                            <table id="example1" class="table table-striped table-bordered table-hover table-sm">
                                <thead class="thead-dark">
                                <tr>
                                    <th><center>Nro</center></th>
                                    <th><center>Nivel</center></th>
                                    <th><center>Grado</center></th>
                                    <th><center>Seccion</center></th>
                                    <th><center>Curso</center></th>
                                    <th><center>Acciones</center></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $contador_asignaciones = 0;
                                foreach ($asignaciones as $asignacione){
                                    $id_docente = $asignacione['id_docente'];
                                    $contador_asignaciones = $contador_asignaciones +1; ?>
                                    <tr>
                                        <td style="text-align: center"><?=$contador_asignaciones;?></td>
                                        <td style="text-align: center"><?=$asignacione['nivel'];?></td>
                                        <td style="text-align: center"><?=$asignacione['grado'];?></td>
                                        <td style="text-align: center"><?=$asignacione['seccion'];?></td>
                                        <td style="text-align: center"><?=$asignacione['nombre_curso'];?></td>
                                        <td >
                                            <center>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                            
                                            <a href="edit.php?id=<?=$id_docente;?>" type="button" class="btn btn-success">Editar</a>
                                            <form action="<?=APP_URL;?>/app/controllers/docentes/delete.php" onclick="preguntar<?=$id_docente;?>(event)" method="post" id="miFormulario<?=$id_docente;?>">
                                                <input type="text" name="id_docente" value="<?=$id_docente;?>" hidden>
                                                <button type="submit" class="btn btn-danger" style="border-radius: 0px 5px 5px 0px;">Eliminar</button>
                                            </form>
                                            <script>
                                                function preguntar<?=$id_docente;?>(event){
                                                    event.preventDefault();
                                                    Swal.fire({
                                                      title: 'Eliminar registro',
                                                      text: '¿Deseas eliminar este registro?',
                                                      icon: 'question',
                                                      showDenyButton: 'true',
                                                      confirmButtonText: 'Eliminar',
                                                      confirmButtonColor: '#a5161d',
                                                      denyButtonColor: '#270a0a',
                                                      denyButtonText: 'Cancelar'
                                                    }).then((result)=>{
                                                          if (result.isConfirmed){
                                                            var form = $('#miFormulario<?=$id_docente;?>');
                                                            form.submit();
                                                            //Swal.fire('Eliminado', 'Se elimino el registro', 'success');
                                                          }
                                                    });
                                                }
                                            </script>

                                            </div>

                                            </center>
                                            
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
                              <a href="<?=APP_URL;?>/admin/asignaciones" class="btn btn-secondary ml-3">Volver</a>
                            </div>
                          </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php

include ('../../admin/layout/apartado2.php');
include ('../../layout/mensajes.php');

?>

<!-- Configuracion de opciones de la tabla de listado de roles -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "pageLength": 5,
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
        "paginate": {
          "first": "Primero",
          "last": "Último",
          "next": "Siguiente",
          "previous": "Anterior"
        },
        "info": "Mostrando _START_ a _END_ de _TOTAL_ resultados",
        "lengthMenu": "Mostrar _MENU_ resultados por página",
        "search": "Buscar:",
        "emptyTable": "No hay datos disponibles en la tabla",
        "infoEmpty": "Mostrando 0 a 0 de 0 resultados",
        "infoFiltered": "(filtrado de _MAX_ resultados totales)",
        "zeroRecords": "No se encontraron coincidencias"
      }
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>



