<section style="background-color: #eee; margin-top:5%;">
    <div class="container py-5">
        <!--crear breadcrumbs-->
        <!--div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="bg-body-tertiary rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">User</a></li>
                        <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                    </ol>
                </nav>
            </div>
        </div-->
        <div style="text-align: center;">
            <h2>Página de usuario</h2>
        </div>

        <div class="row">
            <div class="container rounded bg-white mb-5">
                <div class="row">
                    <div class="col-md-3 border-right">
                        <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                            <?php
                            foreach ($usuarioValues as $values) {
                            ?>
                                <img src="<?= Utilidades::imagenUsuario($_SESSION['username'], $values['foto']) ?>" alt="avatar"
                                    class="rounded-circle img-fluid" style="width: 150px;">
                                <h5 class="my-3"><?= $values['nombre'] . " " . $values['apellido1'] ?></h5>
                            <?php
                            }
                            ?>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalEdicionPerfil" data-whatever="@mdo">Editar datos perfil</button>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="p-3 py-5">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="text-right">Perfil del usuario</h4>
                            </div>
                            <div class="row mt-2">
                                <?php
                                foreach ($usuarioValues as $values) {
                                ?>
                                    <div class="col-sm-3">
                                        <p class="mb-0"><b>Nombre completo</b></p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"><?= $values['nombre'] . " " . $values['apellido1'] ?></p>
                                    </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Correo electrónico</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"><?= $values['email'] ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Teléfono</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"><?= $values['telefono'] ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Dirección</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"><?= $values['direccion'] ?></p>
                                </div>
                            </div>
                        <?php
                                }
                        ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-5">
            <div class="container rounded bg-white">
                <div class="row">
                    <div class="col-12 text-center">
                        <?php if (!empty($automovilValues)) {  ?>
                            <h4 class="text-center" style="margin:1% 1%;">Datos automovil</h4>
                            <table style="width:100%; margin:2% 2%;">
                                <thead>
                                    <tr>
                                        <th>
                                            Marca
                                        </th>
                                        <th>
                                            Modelo
                                        </th>
                                        <th>
                                            color
                                        </th>
                                        <th>
                                            Número de plazas
                                        </th>
                                        <th>
                                            Opciones
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($automovilValues as $values) {
                                    ?>
                                        <tr>
                                            <td>
                                                <?= $values['marca'] ?>
                                            </td>
                                            <td>
                                                <?= $values['modelo'] ?>
                                            </td>
                                            <td>
                                                <?= $values['color'] ?>
                                            </td>
                                            <td>
                                                <?= $values['numero_plazas'] . " plazas" ?>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#ModalEditarAuto<?= $values['id'] ?>" data-whatever="@mdo">Editar automovil</button>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#ModalEliminarAuto<?= $values['id'] ?>" data-whatever="@mdo">Eliminar automovil</button>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        <?php } ?>
                        <div style="margin:2% 2%;">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalRegistroAuto" data-whatever="@mdo">Registrar automovil</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-5">
            <div class="container rounded bg-white">
                <div class="row">
                    <div class="col-12 text-center">
                        <h4 class="text-center" style="margin:1% 1%;">Viajes activos</h4>
                        <table style="border:1px solid black;width:100%;">
                            <tr>
                                <th>Origen</th>
                                <th>Destino</th>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Número de plazas</th>
                                <th>Regularidad</th>
                                <th>Opciones</th>
                            </tr>
                            <?php
                            foreach ($viajeValues as $values) {
                                $plazas=tablas::showValueField("automoviles","numero_plazas","id",$values['id_coche'])
                            ?>
                                <tr>
                                    <td><?= $values['origen'] ?></td>
                                    <td><?= $values['destino'] ?></td>
                                    <td><?= $values['fecha'] ?></td>
                                    <td><?= $values['hora_salida'] ?></td>
                                    <td><?=$plazas['numero_plazas']?></td>
                                    <td><?= $values['regularidad'] ?></td>
                                    <td>
                                        <button type="button" class="btn btn-outline-primary"><a href="index.php?ruta=paginaViaje&id=<?= $values['id']?>">Ir a viaje...</a></button>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </table>
                        <div style="margin:2% 2%;">
                            <button type="button" class="btn btn-primary"><a href="crearViaje" style="color:white; text-decoration:none;">Crear Viaje</a></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-5">
            <div class="container rounded bg-white">
                <div class="row">
                    <div class="col-12 text-center">
                        <h4 class="text-center" style="margin:1% 1%;">Reservas activas</h4>
                        <table style="border:1px solid black;width:100%;">
                            <tr>
                                <th>Origen</th>
                                <th>Destino</th>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Opciones</th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-5">
            <div class="container rounded bg-white">
                <div class="row">
                    <div class="col-12 text-center">
                        <h4 class="text-center" style="margin:1% 1%;">Viajes pasados</h4>
                        <table id="myTable" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Origen</th>
                                    <th>Destino</th>
                                    <th>Fecha</th>
                                    <th>Hora</th>
                                    <th>Regularidad</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!--AQUI COMIENZA EL FOREACH-->
                                <?php //foreach ($values_table as $value) { 
                                ?>

                                <?php //} 
                                ?>
                                <!--AQUI TERMINA EL FOREACH-->
                            <tfoot>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-5">
            <div class="container rounded bg-white">
                <div class="row">
                    <div class="col-12 text-center">
                        <h4 class="text-center" style="margin:1% 1%;">Reservas pasadas</h4>
                        <table id="myTable2" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Origen</th>
                                    <th>Destino</th>
                                    <th>Fecha</th>
                                    <th>Hora</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!--AQUI COMIENZA EL FOREACH-->
                                <?php //foreach ($values_table as $value) { 
                                ?>

                                <?php //} 
                                ?>
                                <!--AQUI TERMINA EL FOREACH-->
                            <tfoot>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--MODAL EDICIÓN PERFIL USUARIO-->
<?php
foreach ($usuarioValues as $values) {
?>
    <div class="modal fade" id="ModalEdicionPerfil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Aquí puede cambiar datos de su perfil</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form enctype="multipart/form-data" action="" method="POST" class="row g-3">
                        <input type="hidden" name="update_user">
                        <input type="hidden" name="id" value="<?= $values['id'] ?>">
                        <div class="col-md-4">
                            <label for="inputNombre" class="form-label">Nombre</label>
                            <input type="text" name="nombre" value="<?= $values['nombre'] ?>" class="form-control" id="inputNombre" required />
                        </div>
                        <div class="col-md-4">
                            <label for="inputApellido1" class="form-label">Primer apellido</label>
                            <input type="text" name="apellido1" value="<?= $values['apellido1'] ?>" class="form-control" id="inputApellido1" placeholder="Primer apellido" required />
                        </div>
                        <div class="col-md-4">
                            <label for="inputApellido2" class="form-label">Segundo apellido</label>
                            <input type="text" name="apellido2" value="<?= $values['apellido2'] ?>" class="form-control" id="inputApellido2" placeholder="Segundo apellido" />
                        </div>
                        <div class="col-md-8">
                            <label for="inputDireccion" class="form-label">Dirección completa</label>
                            <input type="text" name="direccion" value="<?= $values['direccion'] ?>" class="form-control" id="inputDireccion" placeholder="Introduzca dirección completa" />
                        </div>
                        <div class="col-md-4">
                            <label for="inputTelefono" class="form-label">Teléfono</label>
                            <input type="text" name="telefono" value="<?= $values['telefono'] ?>" class="form-control" id="inputPhone" placeholder="Introduzca número de teléfono" maxlength="12" required />
                        </div>
                        <div class="col-md-12">
                            <label for="inputEmail" class="form-label">Correo electrónico</label>
                            <input type="email" name="email" value="<?= $values['email'] ?>" class="form-control" id="inputEmail" placeholder="Introduzca una dirección de correo electrónico" />
                        </div>
                        <div class="col-md-12">
                            <label for="inputFoto" class="form-label">Editar foto de perfil</label><br>
                            <input type="file" id="inputFoto" class="imagen" name="foto">
                            <p class="help-block">Peso máximo de la foto: 2Mb</p>
                        </div>
                        <div class="col-md-12">
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
<!---FIN MODAL EDICION USUARIO-->
<!--MODAL REGISTRO AUTOMOVIL-->
<div class="modal fade" id="ModalRegistroAuto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Introduzca los datos del automovil que usará para los viajes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" action="" method="POST" class="row g-3">
                    <input type="hidden" name="registrar_vehiculo">
                    <div class="col-md-6">
                        <label for="inputMarca" class="form-label">Marca</label>
                        <input type="text" name="marca" class="form-control" id="inputMarca" required />
                    </div>
                    <div class="col-md-6">
                        <label for="inputModelo" class="form-label">Modelo</label>
                        <input type="text" name="modelo" class="form-control" id="inputModelo" placeholder="modelo" required />
                    </div>
                    <div class="col-md-6">
                        <label for="inputNumeroPlazas" class="form-label">Número de plazas</label>
                        <input type="number" name="numero_plazas" class="form-control" id="inputNumeroPlazas" />
                    </div>
                    <div class="col-md-6">
                        <label for="inputColor" class="form-label">Color</label>
                        <input type="text" name="color" class="form-control" id="inputColor" placeholder="color" />
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
<!---FIN MODAL REGISTRO AUTO-->
<!--MODAL EDITAR VEHICULO-->
<?php
foreach ($automovilValues as $values) {
?>
    <div class="modal fade" id="ModalEditarAuto<?= $values['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Introduzca los datos del automovil que usará para los viajes</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form enctype="multipart/form-data" action="" method="POST" class="row g-3">
                        <input type="hidden" name="editar_vehiculo">
                        <input type="hidden" name="id" value="<?= $values['id'] ?>">
                        <div class="col-md-6">
                            <label for="inputMarca" class="form-label">Marca</label>
                            <input type="text" name="marca" value="<?= $values['marca'] ?>" class="form-control" id="inputMarca" placeholder="marca" required />
                        </div>
                        <div class="col-md-6">
                            <label for="inputModelo" class="form-label">Modelo</label>
                            <input type="text" name="modelo" value="<?= $values['modelo'] ?>" class="form-control" id="inputModelo" placeholder="modelo" required />
                        </div>
                        <div class="col-md-6">
                            <label for="inputNumeroPlazas" class="form-label">Número de plazas</label>
                            <input type="number" name="numero_plazas" value="<?= $values['numero_plazas'] ?>" class="form-control" id="inputNumeroPlazas" />
                        </div>
                        <div class="col-md-6">
                            <label for="inputColor" class="form-label">Color</label>
                            <input type="text" name="color" value="<?= $values['color'] ?>" class="form-control" id="inputColor" placeholder="color" />
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
<!--FIN MODAL EDITAR VEHICULO-->
<!--MODAL ELIMINAR VEHICULO-->
<?php
foreach ($automovilValues as $values) {
?>
    <div class="modal fade" id="ModalEliminarAuto<?= $values['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Está seguro de que quiere eliminar este vehículo</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form enctype="multipart/form-data" action="" method="POST" class="row g-3">
                        <input type="hidden" name="eliminar_vehiculo">
                        <input type="hidden" name="id" value="<?= $values['id'] ?>">
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
<!--FIN MODAL ELIMINAR VEHICULO-->