<section style="background-color: #eee; margin-top:5%;">
    <div class="container py-5">
        <!--titulo-->
        <div style="text-align: center;">
            <h2>Viaje <b><?= $datos_viaje[0]['origen'] ?> - <b><?= $datos_viaje[0]['destino'] ?></b></h2>
        </div>
        <!--inicio datos viaje-->
        <div class="row">
            <div class="container rounded bg-white mb-5">
                <div class="row">
                    <div class="col-md-12">
                        <?php
                        foreach ($datos_viaje as $values) {
                        ?>
                            <h3>Origen: <?= $values['origen'] . " - Sale a las " . $values['hora_salida'] ?></h3>

                            <h3>Destino: <?= $values['destino'] . " - llega a las (hora salida) + " . $values['tiempo_estimado'] ?></h3>
                            <hr>
                            <h4>Quedan <?= $num_asientos_vacios ?> plazas</h4>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>

            <!--fin de datos viaje-->
            <!--datos del conductor--->

            <div class="container rounded bg-white mb-5">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h3>Datos del conductor</h3>

                    </div>
                    <div class="col-md-3 border-right">
                        <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                            <?php
                            foreach ($datos_conductor as $values) {
                            ?>
                                <img src="<?= Utilidades::imagenUsuario($values['username'], $values['foto']) ?>" alt="avatar"
                                    class="rounded-circle img-fluid" style="width: 150px;">
                                <h5 class="my-3"><?= $values['nombre'] . " " . $values['apellido1'] ?></h5>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="p-3 py-5">
                            <div class="row mt-2">
                                <?php
                                foreach ($datos_conductor as $values) {
                                ?>
                                    <div class="col-sm-3">
                                        <p class="mb-0"><b>Nombre completo</b></p>
                                    </div>
                                    <div class="col-sm-9">
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
            <div class="container rounded bg-white mb-5">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h3>Detalles del viaje</h3>
                    </div>
                    <ul>
                        <!--AQUI VA UN FOREACH CON LAS OPCIONES DE VIAJE QUE HAYA ELEGIDO EL CONDUCTOR PARA SU VIAJE-->
                        <li>
                            Descripción: <?= $datos_viaje[0]['descripcion'] ?>
                        </li>
                    </ul>
                </div>
            </div>
            <!--fin de detalles y descripcion del viaje-->
            <!--datos del auto-->
            <div class="container rounded bg-white mb-5">
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
            <!--fin de datos del auto-->
            <!--LA CAJA DE RESERVA SOLO LA VERÁN AQUELLXS QUE NO SEAN EL CONDUCTOR-->
            <!--caja de reserva-->
            <div class="container rounded bg-white mb-5">
                <div class="row">
                    <div class="col-lg-12 text-center button-padding">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalReserva" data-whatever="@mdo">Reservar plaza</button>
                    </div>
                </div>
            </div>
            <!--fin de caja de reserva-->
            <!--AQUI ESTARÁN LAS OPCIONES PARA EL CONDUCTOR, SOLO PODRÁ VERLAS EL CONDUCTOR-->
            <!--el conductor puede ver las reservas y su estado-->
            <div class="container rounded bg-white mb-5" >
                <div class="row">
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
                                    foreach($reservas_viaje as $values){
                                    $viajero=$datos->ctrShowRegister("usuarios",'id',$values['id_usuario']);
                                ?>
                                    <td><?=$values['id']?></td>
                                    <td><?=$viajero[0]['nombre']." ".$viajero[0]['apellido1']?></td>
                                    <td><?=$values['num_plazas_reservadas']?></td>
                                    <td>
<!--si tengo tiempo, convertir esto en un partial aparte y usar jquery-->
<!--cambiar colores de estado de reserva según esté en espera, negada o afirmada--->
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#ModalCambiarEstadoReserva" data-whatever="@mdo">Reserva <?=$values['estado']?></button>

                                    </td>
                                <?php    
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--fin de sección-->
            <div class="container rounded bg-white mb-5">
                <div class="row">
                    <div class="col-lg-12 text-center button-padding">
                        <h3>Opciones</h3>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#ModalEditarViaje" data-whatever="@mdo">Editar datos viaje</button>
                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#ModalAddParadas" data-whatever="@mdo">Añadir/eliminar paradas</button>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#ModalEliminarviaje" data-whatever="@mdo">Eliminar viaje</button>
                    </div>
                </div>
            </div>
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
<div class="modal fade" id="ModalCambiarEstadoReserva" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <input type="hidden" name="id" value="<?= $reservas_viaje[0]['id'] ?>">
                    <input type="hidden" name="cambiar_estado_reserva" value="">
                    <div class="col-md-12">
                        <label for="inputCambiarEstado" class="form-label">Cambiar estado</label>
                        <select name="value_field" id="inputCambiarEstado">
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