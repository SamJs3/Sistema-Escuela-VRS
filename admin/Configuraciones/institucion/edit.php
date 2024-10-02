<!-- Configuración del formulario para crear un nuevo rol -->
<?php 
$id_inst_config = $_GET['id'];
include ('../../../app/config.php');
include ('../../../admin/layout/apartado1.php');
include ('../../../app/controllers/configuraciones/institucion/info_instituciones.php');
?>

<!-- Content Wrapper. Contiene el contenido de la página -->
<div class="content-wrapper">
    <br>
    <!-- Contenido principal -->
    <div class="content">
        <div class="container">
            <div class="row">
                <h1>EDITAR DATOS DE LA INSTITUCION</h1> 
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
                            <form action="<?=APP_URL;?>/app/controllers/configuraciones/institucion/update.php" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" name="id_inst_config" value="<?=$id_inst_config;?>" hidden>
                                                    <input type="text" name="logo" value="<?=$logo;?>" hidden>
                                                    <label for="nombre">Nombre</label>  
                                                    <input type="text" name="nombre_institucion" value="<?=$nombre_institucion;?>" id="nombre" class="form-control" required> 
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="correo">Correo</label>  
                                                    <input type="email" name="correo" value="<?=$correo;?>" id="correo" class="form-control" required> 
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="telefono">Teléfono</label>  
                                                    <input type="number" name="telefono" value="<?=$telefono;?>" id="telefono" class="form-control" required> 
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="direccion">Dirección</label>  
                                                    <input type="text" name="direccion" value="<?=$direccion;?>" id="direccion" class="form-control" required> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="file">Logotipo de la institución</label>  
                                                <input type="file" name="file" id="file" class="form-control" >
                                                <br>
                                                <center id="list">
                                                <img src="<?=APP_URL."/public/images/configuracion".$logo;?>" width="200" alt="">
                                                </center>
                                            </div>
                                        </div>
                                    </div>    
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <!-- Botones del formulario -->
                                            <button type="submit" class="btn btn-success">Actualizar</button>
                                            <a href="<?=APP_URL;?>/admin/configuraciones/institucion" class="btn btn-secondary">Cancelar</a>
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
include ('../../../admin/layout/apartado2.php'); // Llamada a la segunda parte del layout
include ('../../../layout/mensajes.php');
?>

<script>
function archivo(evt) {
    var files = evt.target.files; // Obtener los archivos seleccionados
    for (var i = 0, f; f = files[i]; i++) {
        if (!f.type.match('image.*')) { // Verificar si el archivo es una imagen
            continue;
        }

        var reader = new FileReader();
        reader.onload = (function(theFile) {
            return function(e) {
                // Mostrar la imagen cargada en el elemento con id "list"
                document.getElementById("list").innerHTML = '<img class="thumb thumbnail" src="' + e.target.result + '" width="300px" title="' + theFile.name + '">';
            };
        })(f);
        reader.readAsDataURL(f); // Leer el archivo como URL
    }
}

// Agregar el listener al input con id "file"
document.getElementById('file').addEventListener('change', archivo, false);
</script>
