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
                <h1>INFORME DETALLADO</h1> 
            </div>
            <br>
            <div class="row">
                <!-- Tamaño del formulario -->
                <div class="col-md-12">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <h3 class="card-title">Datos de la institución</h3>
                        </div>
                        <div class="card-body">
                            
                            
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="nombre">Nombre</label>  
                                                    <p><?=$nombre_institucion;?></p> 
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="correo">Correo</label>  
                                                    <p><?=$correo;?></p> 
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="telefono">Teléfono</label>  
                                                    <p><?=$telefono;?></p>  
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="direccion">Dirección</label>  
                                                    <p><?=$direccion;?></p> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <label for="file">Logotipo de la institución</label>  
                                                <center>
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
                                            <button onclick="window.print();" class="btn btn-primary">Imprimir</button>
                                            <a href="<?=APP_URL;?>/admin/configuraciones/institucion" class="btn btn-secondary">Volver</a>
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
