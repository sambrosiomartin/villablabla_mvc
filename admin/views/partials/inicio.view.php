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