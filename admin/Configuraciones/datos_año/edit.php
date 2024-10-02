<?php
$id_periodo = $_GET['id'];
include ('../../../app/config.php');
include ('../../../admin/layout/apartado1.php');
include ('../../../app/controllers/configuraciones/datos_año/datos_año.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <h1>Modificación de año escolar: <?=$periodo;?></h1>
            </div>
            <br>
            <div class="row">

                <div class="col-md-6">
                    <div class="card card-outline card-success">
                        <div class="card-header">
                            <h3 class="card-title">Llene los datos</h3>
                        </div>
                        <div class="card-body">
                            <form action="<?=APP_URL;?>/app/controllers/configuraciones/datos_año/update.php" method="post">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" name="id_periodo" value="<?=$id_periodo;?>" hidden>
                                            <label for="">Año Escolar</label>
                                            <input type="text" value="<?=$periodo;?>" name="periodo" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Estado</label>
                                            <select name="estado" id="" class="form-control">
                                                <?php
                                                if($estado == "1"){ ?>
                                                <option value="ACTIVO">ACTIVO</option>
                                                <option value="INACTIVO">INACTIVO</option>
                                                <?php
                                                }else{ ?>
                                                    <option value="ACTIVO">ACTIVO</option>
                                                    <option value="INACTIVO" selected="selected">INACTIVO</option>
                                                <?php
                                                }?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success">Actualizar</button>
                                            <a href="<?=APP_URL;?>/admin/configuraciones/datos_año" class="btn btn-secondary">Cancelar</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
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

include ('../../../admin/layout/apartado2.php');
include ('../../../layout/mensajes.php');

?>
