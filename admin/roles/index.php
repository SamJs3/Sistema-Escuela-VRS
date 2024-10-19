<?php
include('../../app/config.php');
include('../../admin/layout/apartado1.php');
include('../../app/controllers/roles/listado_de_roles.php');
include('../../app/controllers/permisos/listado_permisos.php');
include('../../app/controllers/permisos/listado_roles_permisos.php');
?>


  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
      <br>
    <div class="content">
    <div class="container">
        <div class="row">
            <h1>Listado de Roles</h1>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Roles registrados</h3>

                        <div class="card-tools">
                            <a href="create.php" class = "btn btn-primary"><i class="bi bi-plus-square"></i> Crear nuevo rol</a>
                        </div><!-- /.card-tools -->
                        
                    </div><!-- /.card-header -->
                    
                        <div class="card-body">
                            <table id="example1" class = "table table-striped table-bordered table-hover table-sm">
                                <thead>
                                    <tr style = "text-align:center">
                                        <th>Nro</th>
                                        <th>Nombre del Rol</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php 
                                        $contador_rol = 0;
                                        foreach($roles as $rol){
                                            $id_rol = $rol['id_rol'];
                                            $contador_rol++; ?>
                                        <tr>
                                            <td style = "text-align:center"><?php echo $contador_rol;?></td>
                                            <td><?php echo $rol['nombre_rol'];?></td>
                                            <td style = "text-align:center">
                                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">

                                                <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-warning " data-toggle="modal" data-target="#Modal_asignacion<?php echo $id_rol;?>">
                                                        Permisos</i>
                                                    </button>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="Modal_asignacion<?php echo $id_rol;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header" style = "background-color:  #f7dc6f ">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Asignar permisos</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="col-md-3">
                                                                                <input type="text" name="rol_id" id="rol_id<?=$id_rol;?>" value="<?=$id_rol;?>" hidden>
                                                                                <label>ROL: <?=$rol['nombre_rol'];?></label>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <select name="permiso_id" id="permiso_id<?=$id_rol;?>" class="form-control">
                                                                                            <?php
                                                                                                foreach($permisos as $permiso){
                                                                                                $id_permiso = $permiso['id_permiso']; ?>
                                                                                                <option value="<?php echo $id_permiso;?>"><?php echo $permiso['nombre_url'];?></option>
                                                                                            <?php    
                                                                                            }
                                                                                            ?>
                                                                                        </select>
                                                                            </div>
                                                                                <div class="col-md-3">
                                                                                    <button type="submit" class="btn btn-primary mb-2" id="btn_reg<?=$id_rol;?>">Asignar</button>
                                                                                </div>
                                                                                <!---Script para registrar desde AJAX--->
                                                                                    <script>
                                                                                        $('#btn_reg<?=$id_rol;?>').click(function(){
                                                                                            var rol = $('#rol_id<?=$id_rol;?>').val()
                                                                                            var permiso = $('#permiso_id<?=$id_rol;?>').val()
                                                                                           /* alert(rol+"-"+permiso); */
                                                                                            var url = "../../app/controllers/permisos/asignar_permiso.php";
                                                                                            $.get(url,{rol_id:rol, permiso_id:permiso},function(datos){
                                                                                                $('#respuesta<?=$id_rol;?>').html(datos)
                                                                                                $('#tabla<?=$id_rol;?>').css('display', 'none')
                                                                                                

                                                                                                Swal.fire({
                                                                                                    position:"middle-end",
                                                                                                    icon:"success",
                                                                                                    title:"Se asignó el permiso de forma correcta en la base de datos",
                                                                                                    showConfirmButton:false,
                                                                                                    timer:5000
                                                                                                });
                                                                                            });
                                                                                        });
                                                                                    </script>        
                                                                                <!---Script para registrar desde AJAX--->
                                                                                
                                                              
                                                                                   
                                                                            </div>
                                                                            <hr>
                                                                            <div id="respuesta<?=$id_rol;?>"></div>  
                                                                           <div class="row" id="tabla<?=$id_rol;?>">
                                                                              <table class="table table-bordered table-sm table-striped table-hover" >
                                                                                <tr>
                                                                                  <th style = "text-align: center">Nro</th>
                                                                                    <th style = "text-align: center">Rol</th>
                                                                                    <th style = "text-align: center">Permiso</th>
                                                                                    <th style = "text-align: center">Acción</th>
                                                                                </tr>
                                                                                <?php
                                                                                    $contador_rol_permiso = 0;
                                                                                    foreach($roles_permisos as $role_permiso){
                                                                                        if($id_rol == $role_permiso['rol_id']){
                                                                                            $id_rol_permiso = $role_permiso['id_rol_permiso'];
                                                                                            $contador_rol_permiso++;?>
                                                                                            
                                                                                <tr>
                                                                                    <td><?php echo $contador_rol_permiso; ?></td>
                                                                                    <td><?php echo $role_permiso['nombre_rol']; ?></td>
                                                                                    <td><?php echo $role_permiso['nombre_url']; ?></td>
                                                                                    <td>
                                                                                    <form action="<?php echo APP_URL;?>/app/controllers/permisos/delete_rol_permiso.php" onclick="preguntar<?php echo $id_rol_permiso;?>(event)" method="post" id="miFormulario<?php echo $id_rol_permiso;?>">
                                                                                        <input type="text" name="id_rol_permiso" value="<?php echo $id_rol_permiso;?>" hidden>
                                                                                        <button type="submit" class="btn btn-danger btn-sm" ><i class="bi bi-trash3"></i></button>
                                                                                    </form>
                                                                                    
                                                                                    <script>
                                                                                        function preguntar<?php echo $id_rol_permiso;?>(event){
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
                                                                                                    var form = $('#miFormulario<?php echo $id_rol_permiso;?>')
                                                                                                    form.submit()
                                                                                                }
                                                                                            })
                                                                                        }
                                                                                    </script>
                                                                                    </td>
                                                                                </tr>
                                                                                    <?php
                                                                                    }
                                                                                                    
                                                                                    } ?>
                                                                                          
                                                                                  </table>
                                                                           </div> 
                                                                      </div>
                                                                  </div>
                                                              </div>
                                                              </div>


                                                    <a href="show.php?id=<?php echo $id_rol;?>" type="button" class="btn btn-info ">Ver</a>
                                                    <a href="edit.php?id=<?php echo $id_rol;?>" type="button" class="btn btn-success ">Editar</a>
                                                    <form action="<?php echo APP_URL;?>/app/controllers/roles/delete.php" onclick="preguntar<?php echo $id_rol;?>(event)" method="post" id="miFormulario<?php echo $id_rol;?>">
                                                        <input type="text" name="id_rol" value="<?php echo $id_rol;?>" hidden>
                                                        <button type="submit" class="btn btn-danger " style="border-radius: 0px 5px 5px 0px">Eliminar</button>
                                                    </form>
                                                    
                                                    <script>
                                                        function preguntar<?php echo $id_rol;?>(event){
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
                                                                    var form = $('#miFormulario<?php echo $id_rol;?>')
                                                                    form.submit()
                                                                }
                                                            })
                                                        }
                                                    </script>
                                                </div>
                                            </td>
                                        </tr>    
                                    <?php        
                                        }
                                    ?>
                                </tbody>

                            </table>
                        </div><!-- /.card-body -->
                
                </div><!-- /.card -->
            
        </div>
        </div><!-- /.row -->
        
    </div><!-- /.container-fluid -->
    </div><!-- /.content -->
    
</div>
<!-- /.content-wrapper -->


<?php
include('../../admin/layout/apartado2.php');
include('../../layout/mensajes.php');
?>

<!-- Configuracion de opciones de la tabla de listado de permisos -->
<script>
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
</script>
