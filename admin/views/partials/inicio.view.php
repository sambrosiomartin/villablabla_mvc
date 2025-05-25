<div class="container col-md-9">
    <div class="row">
        <div class="col py-3">
            <h3>GESTIÓN DE USUARIOS</h3>
            <p class="lead">
                En esta página podrá ver un listado de los usuarios y podrá eliminar en caso de algún tipo de error externo que no pueda solucionar un usuario de la aplicación</p>
        </div>
        <table id="myTableUsers" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre Completo</th>
                    <th>Nombre Usuario</th>
                    <th>E-mail</th>
                    <th>Teléfono</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <!--AQUI COMIENZA EL FOREACH-->
                <?php foreach ($listado_usuarios as $value) {
                ?>
                    <tr>
                        <td>
                            <?= $value['id'] ?>
                        </td>
                        <td>
                            <?= $value['nombre']." ".$value['apellido1']." ".$value['apellido2'] ?>
                        </td>
                        <td>
                            <?= $value['username'] ?>
                        </td>
                        <td>
                            <?= $value['email'] ?>
                        </td>
                        <td>
                            <?= $value['telefono']?>
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteUserModal<?= $value['id'] ?>">
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
<!--MODAL ELIMINAR USUARIO-->
<?php
foreach ($listado_usuarios as $value) {
?>
    <div class="modal fade" id="deleteUserModal<?= $value['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-center" id="exampleModalLabel">¿Está seguro de que quiere eliminar al usuario <?=$value['username']?>?</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form enctype="multipart/form-data" action="" method="POST" class="row g-3">
                        <input type="hidden" name="id" value="<?= $value['id'] ?>">
                        <div class="col-md-12" style="margin-top:5%;">
                            <button type="submit" class="btn btn-primary">Eliminar</button>
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