<div class="container col-md-9">
    <div class="row">
        <div class="col py-3">
            <h3>GESTIÓN DE OPCIONES</h3>
            <p class="lead">
                En esta página podrás gestionar las opciones de viaje que podrán elegir los usuarios, listar, insertar nuevas opciones, modificar y eliminar alguna
            </p>
        </div>
        <div class="col-lg-12 text-center">
            <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#createOptionModal">
                Crear nueva opción </button>
        </div>
        <table id="myTableUsers" class="display" style="width:100%">
            <thead>

                <tr>
                    <th>#</th>
                    <th>Tipo de Opción</th>
                    <th>Descripción</th>
                    <th>Gestión de Opciones</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <!--AQUI COMIENZA EL FOREACH-->
                <?php foreach ($listadoOpciones as $value) {
                ?>
                    <tr>
                        <td>
                            <?= $value['id'] ?>
                        </td>
                        <td>
                            <?= $value['tipo_opcion'] ?>
                        </td>
                        <td>
                            <?= $value['descripcion'] ?>
                        </td>
                        <td>
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#updateOptionModal<?= $value['id'] ?>">
                                <i class="bi bi-square"></i> </button>
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteOptionModal<?= $value['id'] ?>">
                                <i class="bi bi-trash"></i> </button>
                        </td>
                    </tr>
                <?php } ?>
                <!--AQUI TERMINA EL FOREACH-->
            <tfoot>

            </tfoot>
        </table>
    </div>
</div>
<!--MODAL CREAR OPCIÓN-->
 <div class="modal fade" id="createOptionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-center" id="exampleModalLabel">Aquí podrá crear una nueva opción para los viajes</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form enctype="multipart/form-data" action="" method="POST" class="row g-3">
                        <input type="hidden" name="crearOpcion">
                        <div class="form-group">
                            <label for="tipoOpcion" class="col-form-label">Tipo de opción</label>
                            <input type="text" name="tipo_opcion" class="form-control" id="tipoOpcion">
                        </div>
                        <div class="form-group">
                            <label for="descripcion" class="col-form-label">Descripción</label>
                            <textarea name="descripcion" class="form-control" id="descripcion"></textarea>
                        </div>
                        <div class="col-md-12" style="margin-top:5%;">
                            <button type="submit" class="btn btn-primary">Enviar datos</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
<!--FINAL MODAL CREAR OPCIÓN-->
<!--MODAL MODIFICAR OPCIÓN-->
<?php
foreach ($listadoOpciones as $value) {
?>
    <div class="modal fade" id="updateOptionModal<?= $value['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-center" id="exampleModalLabel">Aquí podrá modificar los datos de la opción de viaje</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form enctype="multipart/form-data" action="" method="POST" class="row g-3">
                        <input type="hidden" name="id" value="<?= $value['id'] ?>">
                        <input type="hidden" name="updateOpciones" value="<?= $value['id'] ?>">
                        <div class="form-group">
                            <label for="tipoOpcion" class="col-form-label">Tipo de opción</label>
                            <input type="text" name="tipo_opcion" value="<?=$value['tipo_opcion']?>" class="form-control" id="tipoOpcion">
                        </div>
                        <div class="form-group">
                            <label for="descripcion" class="col-form-label">Descripción</label>
                            <textarea name="descripcion" class="form-control" id="descripcion"><?=$value['descripcion']?></textarea>
                        </div>
                        <div class="col-md-12" style="margin-top:5%;">
                            <button type="submit" class="btn btn-primary">Enviar datos</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>
<!--FIN MODAL ELIMINAR USUARIO-->