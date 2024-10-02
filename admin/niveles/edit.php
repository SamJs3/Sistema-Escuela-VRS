<?php
$id_nivel = $_GET['id'];
include ('../../app/config.php');
include ('../../admin/layout/apartado1.php');

include ('../../app/controllers/niveles/datos_nivel.php');
include ('../../app/controllers/configuraciones/datos_año/listado_de_años.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <h1>Modificar nivel: <?=$nivel;?></h1>
            </div>
            <br>
            <div class="row">

                <div class="col-md-6">
                    <div class="card card-outline card-success">
                        <div class="card-header">
                            <h3 class="card-title">Ingrese los datos</h3>
                        </div>
                        <div class="card-body">
                            <form action="<?=APP_URL;?>/app/controllers/niveles/update.php" method="post">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Año escolar</label>
                                            <input type="text" name="id_nivel" value="<?=$id_nivel;?>" hidden>
                                            <select name="periodo_id" id="" class="form-control">
                                                <?php
                                                foreach ($años_escolares as $año){
                                                    if($año['estado']=="1"){ ?>
                                                        <option value="<?=$año['id_periodo'];?>"
                                                            <?php if($periodo_id==$año['id_periodo']){ ?> selected="selected" <?php } ?> >
                                                            <?=$año['periodo'];?>
                                                        </option>
                                                        <?php
                                                    } ?>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Niveles</label>
                                            <select name="nivel" id="" class="form-control">
                                                <option value="Pre-primaria"<?php if($nivel=='Pre-primaria'){ ?> selected="selected" <?php } ?>>Pre-primaria</option>
                                                <option value="Primaria"<?php if($nivel=='Primaria'){ ?> selected="selected" <?php } ?>>Primaria</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Turnos</label>
                                            <select name="turno" id="" class="form-control">
                                                <!-- <option value="Mañana"<?php if($turno=='Mañana'){ ?> selected="selected" <?php } ?>>Mañana</option> -->
                                                <option value="Tarde"<?php if($turno=='Tarde'){ ?> selected="selected" <?php } ?>>Tarde</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success">Actualizar</button>
                                            <a href="<?=APP_URL;?>/admin/niveles" class="btn btn-secondary">Cancelar</a>
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

include ('../../admin/layout/apartado2.php');
include ('../../layout/mensajes.php');

?>
