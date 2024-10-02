<?php

$id_nivel = $_GET['id'];
include ('../../app/config.php');
include ('../../admin/layout/apartado1.php');
include ('../../app/controllers/niveles/datos_nivel.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <h1>Nivel: <?=$nivel;?></h1>
            </div>
            <br>
            <div class="row">

                <div class="col-md-6">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <h3 class="card-title">Datos registrados</h3>
                        </div>
                        <div class="card-body">
                            
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Año escolar</label>
                                            <p><?=$periodo;?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Nivel</label>
                                            <p><?=$nivel;?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Turno</label>
                                            <p><?=$turno;?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Fecha y hora de creción</label>
                                            <p><?=$fyh_creacion;?></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Estado</label>
                                            <p>
                                                <?php
                                                if($estado == "1") echo "Activo";
                                                else echo "Inactivo";
                                                ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>



                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                        <button onclick="window.print();" class="btn btn-primary">Imprimir</button>
                                         <a href="<?=APP_URL;?>/admin/niveles" class="btn btn-secondary">Volver</a>
                                        </div>
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
