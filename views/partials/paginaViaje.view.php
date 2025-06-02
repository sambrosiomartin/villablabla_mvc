<section style="background-color: #eee;">
    <div class="container py-5 ">
        <!--titulo-->
        <div style="text-align: center;">
            <h2> <b><?= $datos_viaje[0]['origen'] ?> - <b><?= $datos_viaje[0]['destino'] ?></b></h2>
        </div>
        <!--inicio datos viaje-->
        <div class="row">
            <div class="container col-lg-5 rounded-50 bg-white mb-5 ">

                <div class="col-md-12">
                    <?php
                    foreach ($datos_viaje as $values) {
                    ?>
                        <h4>Origen: <?= $values['origen'] . " - Sale a las " . $values['hora_salida'] . " desde " . $values['direccion_origen'] ?></h4>
                        <ul>
                            <?php
                            foreach ($paradas as $values_parada) {
                            ?>
                                <li><?= $values_parada['poblacion'] ?></li>
                            <?php
                            }
                            ?>
                        </ul>
                        <h4>Destino: <?= $values['destino'] . " - llega a las (hora salida) + " . $values['tiempo_estimado'] . " a " . $values['direccion_destino'] ?></h4>
                        <hr>
                        <h4>Quedan <?= $num_asientos_vacios ?> plazas</h4>
                    <?php
                    }
                    ?>
                </div>

            </div>

            <!--fin de datos viaje-->
            <!--datos del conductor--->

            <div class="container col-lg-5 rounded-50 bg-white mb-5">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h3>Datos del conductor</h3>
                    </div>
                    <div class="col-md-4 border-right">
                        <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                            <?php
                            foreach ($datos_conductor as $values) {
                            ?>
                                <img src="<?= Utilidades::imagenUsuario($values['username'], $values['foto']) ?>" alt="avatar"
                                    class="rounded-circle img-fluid" style="width: 150px;border: 2px solid purple;">

                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="p-3 py-5">
                            <div class="row mt-2">
                                <?php
                                foreach ($datos_conductor as $values) {
                                ?>
                                    <div class="col-sm-12">
                                        <p class="text-muted mb-0"><?= $values['nombre'] . " " . $values['apellido1'] ?></p>
                                    </div>
                            </div>
                            <hr>
                            <!--se verá el numero de telefono cuando el viajero reserve plaza-->
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Teléfono</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"><?= $values['telefono'] ?></p>
                                </div>
                            </div>
                            <hr>
                        <?php
                                }
                        ?>
                        </div>
                    </div>
                </div>
            </div>
            <!---fin de los datos del conductor-->
            <!--detalles y descripción del viaje-->
            <div class="container col-lg-5 rounded-50 bg-white mb-5 container-pill">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h3>Detalles del viaje</h3>
                    </div>
                    <ul>
                        <!--AQUI VA UN FOREACH CON LAS OPCIONES DE VIAJE QUE HAYA ELEGIDO EL CONDUCTOR PARA SU VIAJE-->
                        <li>
                            Descripción del viaje: <?= $datos_viaje[0]['descripcion'] ?>
                        </li>
                        <?php
                        //var_dump($opcionesViaje);
                        foreach ($opcionesViaje as $value) {
                        ?>

                            <li>
                                <?= $value[0]['tipo_opcion'] ?>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="buttonCreateOption text-center" style="margin-bottom: 2rem;">
                    <button type="button" class="btn btn-success rounded-pill" data-toggle="modal" data-target="#createOptionModal" data-whatever="@mdo">Más opciones</button>
                </div>

            </div>
            <!--fin de detalles y descripcion del viaje-->
            <!--datos del auto-->
            <div class="container col-lg-5 rounded-50 bg-white mb-5">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h3>Detalles del automovil</h3>
                    </div>
                    <ul>
                        <?php
                        foreach ($datos_auto as $values) {
                        ?>
                            <li><b>Marca y modelo: </b><?= $values['marca'] . " " . $values['modelo'] ?></li>
                            <li>Color: <?= $values['color'] ?></li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <?php
            if (isset($_SESSION['username'])) {
            ?>
                <!--tabla de reservas-->
                <div class="container rounded-50 bg-white mb-5">
                    <div class="row">

                        <div class="col-lg-12 text-center button-padding">
                            <button type="button" class="btn btn-primary rounded-pill" data-toggle="modal" data-target="#ModalReserva" data-whatever="@mdo">Reservar plaza</button>
                        </div>

                        <div class="col-lg-12 text-center">
                            <table style="width:100%;">
                                <thead>
                                    <tr>
                                        <td>Id</td>
                                        <td>Viajero</td>
                                        <td>Número de asientos reservados</td>
                                        <td>Estado de la reserva</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($reservas_viaje as $values) {
                                        $viajero = $datos->ctrShowRegister("usuarios", 'id', $values['id_usuario']);
                                    ?>
                                        <tr>
                                            <td><?= $values['id'] ?></td>
                                            <td><?= $viajero[0]['nombre'] . " " . $viajero[0]['apellido1'] ?></td>
                                            <td><?= $values['num_plazas_reservadas'] ?></td>
                                            <?php
                                            if ($_SESSION['username'] == $datos_conductor[0]['username']) {
                                            ?>
                                                <td>
                                                    <button type="button" class="btn btn-success rounded-pill" data-toggle="modal" data-target="#ModalCambiarEstadoReserva<?= $values['id'] ?>" data-whatever="@mdo">Reserva <?= $values['estado'] ?></button>
                                                </td>
                                            <?php
                                            } else {
                                            ?>
                                                <td>
                                                    <button type="button" class="btn btn-success rounded-pill" data-toggle="modal" data-target="#">Reserva <?= $values['estado'] ?></button>
                                                </td>
                                            <?php
                                            }
                                            ?>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
            <!--fin de tabla de reservas-->
            <!--botones de gestión del viaje para uso de conductor-->
            <?php
            if (isset($_SESSION['username']) && $_SESSION['username'] == $datos_conductor[0]['username']) {
            ?>
                <div class="container rounded-50 bg-white mb-5">
                    <div class="row">
                        <div class="col-lg-12 text-center button-padding">
                            <h3>Opciones</h3>
                            <button type="button" class="btn btn-success rounded-pill" data-toggle="modal" data-target="#ModalEditarViaje" data-whatever="@mdo">Editar datos viaje</button>
                            <button type="button" class="btn btn-outline-primary rounded-pill" data-toggle="modal" data-target="#ModalTableParadas" data-whatever="@mdo">paradas viaje</button>
                            <button type="button" class="btn btn-danger rounded-pill" data-toggle="modal" data-target="#ModalEliminarviaje" data-whatever="@mdo">Eliminar viaje</button>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
            <!--fin de botones de gestión del viaja - uso de conductor-->
        </div>
    </div>
</section>
<!--MODALES-->
<!---MODAL DE RESERVA DE PLAZA/S EN VIAJE-->
<div class="modal fade" id="ModalReserva" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Puede reservar de 1 a <?= $num_asientos_vacios ?> plazas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" action="" method="POST" class="row g-3">
                    <input type="hidden" name="hacer_reserva" />
                    <input type="hidden" name="id_usuario" value="<?= $id_viajero['id'] ?>">
                    <input type="hidden" name="id_viaje" value="<?= $datos_viaje[0]['id'] ?>">
                    <input type="hidden" name="estado" value="espera">
                    <div class="col-md-12">
                        <label for="inputPlazasReservadas" class="form-label">Numero de plazas a reservar</label>
                        <input type="number" name="num_plazas_reservadas" min="1" max="<?= $num_asientos_vacios ?>" class="form-control" id="inputPlazasReservadas" />
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
<!--fin de modal hacer reserva-->
<!--modal cambiar estado de la reserva-->
<?php
foreach ($reservas_viaje as $values) {
?>
    <div class="modal fade" id="ModalCambiarEstadoReserva<?= $values['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Aquí podrá cambiar el estado de la reserva de los viajeros</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form enctype="multipart/form-data" action="" method="POST" class="row g-3">
                        <input type="hidden" name="id" value="<?= $values['id'] ?>">
                        <input type="hidden" name="cambiar_estado_reserva" value="">
                        <div class="col-md-12">
                            <label for="inputCambiarEstado" class="form-label">Cambiar estado</label>
                            <select name="value_field" id="inputCambiarEstado" required>
                                <option value="">Tipo de estado de reserva</option>
                                <option value="aceptada">Aceptar reserva</option>
                                <option value="denegada">Denegar reserva</option>
                            </select>
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
<!--fin de modal de cambiar de estado de reserva-->
<!--modal de edicion viaje-->
<?php
foreach ($datos_viaje as $value) {
?>
    <div class="modal fade" id="ModalEditarViaje" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Aquí podrá cambiar valores de su viaje</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form enctype="multipart/form-data" action="" method="POST" class="row g-3">
                        <div class="col-md-6">
                            <label for="inputFecha" class="form-label">Fecha</label>
                            <input type="date" name="fecha" value="<?= $value['fecha'] ?>" class="form-control" id="inputFecha" required />
                        </div>
                        <div class="col-md-6">
                            <label for="inputHoraSalida" class="form-label">Hora de salida</label>
                            <input type="time" name="hora_salida" value="<?= $value['hora_salida'] ?>" class="form-control" id="inputHoraSalida" required />
                        </div>
                        <div class="col-md-6">
                            <label for="forDireccionOrigen" class="form-label">Dirección de origen</label>
                            <input type="text" name="direccion_origen" value="<?= $value['direccion_origen'] ?>" class="form-control" id="forDireccionOrigen" required />
                        </div>
                        <div class="col-md-6">
                            <label for="forDireccionDestino" class="form-label">Dirección de destino</label>
                            <input type="text" name="direccion_destino" value="<?= $value['direccion_destino'] ?>" class="form-control" id="forDireccionDestino" required />
                        </div>
                        <div class="col-md-6">
                            <label for="forTiempoEstimado" class="form-label">Tiempo estimado del viaje</label>
                            <input type="number" name="tiempo_estimado" value="<?= $value['tiempo_estimado'] ?>" class="form-control" id="forTiempoEstimado" required />
                        </div>
                        <div class="col-md-6">
                            <label for="forRegularidad">Seleccione cada cuanto hace el viaje</label>
                            <select name="regularidad" class="form-control-select" id="forRegularidad">
                                <option class="select-option" value="<?= $value['regularidad'] ?>"><?= $value['regularidad'] ?></option>
                                <option class="select-option" value="no_regular">No regular</option>
                                <option class="select-option" value="diario">Diario</option>
                                <option class="select-option" value="semanal">Semanal</option>
                                <option class="select-option" value="mensual">Mensual</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="forDescripcion" class="form-label">Indique algo que añadir</label>
                            <textarea class="form-control" name="descripcion" id="input" rows="3"><?= $value['descripcion'] ?></textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="forRegularidad">Seleccione el automovil con el que realizará el viaje</label>
                            <select name="id_coche" class="form-control-select" id="forCoche" required>
                                <option class="select-option" value="<?= $value['id_coche'] ?>">Elija el automovil</option>
                                <?php
                                foreach ($coches_conductor as $value_coche) {
                                ?>
                                    <option class="select-option" value="<?= $value_coche['id'] ?>"><?= $value_coche['marca'] . " " . $value_coche['modelo'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <input type="hidden" name="id_usuario" value="<?= $value['id_usuario'] ?>">
                        <input type="hidden" name="id" value="<?= $value['id'] ?>">
                        <input type="hidden" name="origen" value="<?= $value['origen'] ?>">
                        <input type="hidden" name="destino" value="<?= $value['destino'] ?>">
                        <input type="hidden" name="editar_viaje" />
                        <div class="col-md-12 text-center" style="margin:5%;">
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
<!--fin de modal de edicion viaje-->
<!--modal tabla paradas-->
<div class="modal fade" id="ModalTableParadas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Paradas intermedias de su viaje</h5>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#ModalCreateParadas" data-whatever="@mdo">Añadir una parada</button>
            </div>
            <div class="modal-body text-center">
                <table>
                    <thead>
                        <tr>
                            <td>
                                codigo
                            </td>
                            <td>
                                Población
                            </td>
                            <td>
                                Dirección
                            </td>
                            <td>
                                Tiempo añadido al viaje
                            </td>
                            <td>
                                Opciones
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($paradas as $values_parada) {
                        ?>
                            <tr>
                                <td>
                                    <?= $values_parada['id'] ?>
                                </td>
                                <td>
                                    <?= $values_parada['poblacion'] ?>
                                </td>
                                <td>
                                    <?= $values_parada['direccion'] ?>
                                </td>
                                <td>
                                    <?= $values_parada['add_time'] ?>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#ModalDeleteParada<?= $values_parada['id'] ?>" data-whatever="@mdo">Eliminar</button>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!--fin de modal de tabla de paradas--->
<!--modal añadir parada-->
<div class="modal fade" id="ModalCreateParadas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Aquí podrá añadir paradas intermedias a su viaje</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" action="" method="POST" class="row g-3">
                    <input type="hidden" name="addParada" />
                    <input type="hidden" name="id_viaje" value="<?= $datos_viaje[0]['id'] ?>">
                    <div class="col-md-12">
                        <label for="inputPoblacion" class="form-label">Nombre población parada</label>
                        <input type="name" name="poblacion" class="form-control" id="inputPoblacion" required />
                    </div>
                    <div class="col-md-12">
                        <label for="inputDireccion" class="form-label">Dirección de parada</label>
                        <input type="name" name="direccion" class="form-control" id="inputDireccion" required />
                    </div>
                    <div class="col-md-12">
                        <label for="inputAddTime" class="form-label">Tiempo extra a añadir al viaje</label>
                        <input type="number" name="add_time" min="1" class="form-control" id="inputAddTime" required />
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
<!--final modal añadir parada-->
<!--modal eliminar parada-->
<?php
foreach ($paradas as $values_parada) {
?>
    <div class="modal fade" id="ModalDeleteParada<?= $values_parada['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Seguro que quiere eliminar la parada <?= $values_parada['poblacion'] ?></h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form enctype="multipart/form-data" action="" method="POST" class="row g-3">
                        <input type="hidden" name="eliminarParada">
                        <input type="hidden" name="id" value="<?= $values_parada['id'] ?>">
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
<!--final modal eliminar parada-->
<!--modal eliminar VIAJE COMPLETO, CON PARADAS Y RESERVAS-->
<!--CUANDO SE ELIMINE VIAJE HAY QUE ENVIAR MENSAJE A VIAJEROS-->
<div class="modal fade" id="ModalEliminarviaje" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title" id="exampleModalLabel">Está seguro que quiere eliminar el viaje <?= $datos_viaje[0]['origen'] . " - " . $datos_viaje[0]['destino'] . " el dia " . $datos_viaje[0]['fecha'] ?>, también se eliminarán las reservas y las paradas</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" action="" method="POST" class="row g-3">
                    <input type="hidden" name="eliminarViaje">
                    <input type="hidden" name="id" value="<?= $datos_viaje[0]['id'] ?>">
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
<!--MODAL GESTIÓN OPCIONES DE VIAJE-->
<div class="modal fade" id="createOptionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="height: 100rem;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title" id="exampleModalLabel"></h4>
                <button type="button" class="btn btn-danger rounded-pill" data-dismiss="modal">Cerrar</button>
            </div>
            <div class="modal-body">
                <div class="col-lg-12">
                    <form enctype="multipart/form-data" action="" method="POST" class="row g-3">
                        <input type="hidden" name="idViaje" value="<?= $datos_viaje[0]['id'] ?>">
                        <input type="hidden" name="insertarOpciones" />
                        <?php
                        foreach ($listadoOpciones as $value) {
                        ?>
                            <div class="form-check rounded-pill bg-white col-lg-6" style="border:2px solid black; padding:10px 0 10px 50px;margin-bottom:5px;font-size: 1rem;">
                                <input class="form-check-input" type="checkbox" name="opciones[]" value="<?= $value['id'] ?>" id="opcion<?= $value['id'] ?>">
                                <label class="form-check-label" for="opcion<?= $value['id'] ?>">
                                    <?= $value['tipo_opcion'] ?>
                                </label>
                            </div>
                        <?php
                        }
                        ?>
                </div>
                <div class="col-md-12 text-center" style="padding:2em;">
                    <button type="submit" class="btn btn-success rounded-pill">Enviar datos</button>
                </div>
                </form>

            </div>

        </div>
        <div class="modal-footer">

        </div>
    </div>
</div>
</div>

<!--FIN DE MODAL DE GESTIÓN DE OPCIONES DE VIAJE-->