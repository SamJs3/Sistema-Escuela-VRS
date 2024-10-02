<?php
include ('../../../app/config.php');
include ('../../../admin/layout/apartado1.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <h1>Registro de nuevo año escolar</h1>
            </div>
            <br>
            <div class="row">

                <div class="col-md-6">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Ingrese los datos</h3>
                        </div>
                        <div class="card-body">
                            <form action="<?=APP_URL;?>/app/controllers/configuraciones/datos_año/create.php" method="post">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Año escolar</label>
                                            <input type="text" name="periodo" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Estado</label>
                                            <select name="estado" id="" class="form-control">
                                                <option value="ACTIVO">ACTIVO</option>
                                                <option value="INACTIVO">INACTIVO</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Registrar</button>
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
