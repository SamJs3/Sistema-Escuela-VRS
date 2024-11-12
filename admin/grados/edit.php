<?php

$id_grado = $_GET['id'];
include ('../../app/config.php');
include ('../../admin/layout/apartado1.php');
include ('../../app/controllers/grados/datos_grados.php');
include ('../../app/controllers/niveles/listado_de_niveles.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <h1>Editar grado: <?=$grado1;?> <?=$seccion;?></h1>
            </div>
            <br>
            <div class="row">

                <div class="col-md-6">
                    <div class="card card-outline card-success">
                        <div class="card-header">
                            <h3 class="card-title">Llene los datos</h3>
                        </div>
                        <div class="card-body">
                            <form action="<?=APP_URL;?>/app/controllers/grados/update.php" method="post">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Nivel</label>
                                            <input type="text" name="id_grado" value="<?=$id_grado;?>" hidden>
                                            <select name="nivel_id" id="" class="form-control">
                                                <?php
                                                foreach ($niveles as $nivele){
                                                    ?>
                                                    <option value="<?=$nivele['id_nivel'];?>"<?=$nivel_id==$nivele['id_nivel'] ? 'selected' : ''?>><?=$nivele['nivel']?></option>
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
                                            <label for="">Curso</label>
                                            <select name="grado" id="" class="form-control">
                                            <option value="Parvulos" <?=$grado=='Parvulos' ? 'selected' : ''?>>Parvulos</option>
                                            <option value="Primero" <?=$grado=='Primero' ? 'selected' : ''?>>Primero</option>
                                            <option value="Segundo" <?=$grado=='Segundo' ? 'selected' : ''?>>Segundo</option>
                                            <option value="Tercero" <?=$grado=='Tercero' ? 'selected' : ''?>>Tercero</option>
                                            <option value="Cuarto" <?=$grado=='Cuarto' ? 'selected' : ''?>>Cuarto</option>
                                            <option value="Quinto" <?=$grado=='Quinto' ? 'selected' : ''?>>Quinto</option>
                                            <option value="Sexto" <?=$grado=='Sexto' ? 'selected' : ''?>>Sexto</option>


                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Seccion</label>
                                            <select name="seccion" id="" class="form-control">
                                                <option value="A"<?=$seccion=='A' ? 'selected' : ''?>>A</option>
                                                <option value="B"<?=$seccion=='B' ? 'selected' : ''?>>B</option>
                                                <option value="C"<?=$seccion=='C' ? 'selected' : ''?>>C</option>
                                            </select>
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
                                            <a href="<?=APP_URL;?>/admin/grados" class="btn btn-secondary">Cancelar</a>
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
