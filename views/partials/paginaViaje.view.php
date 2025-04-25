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
                            <h4>Quedan <?=$datos_auto[0]['numero_plazas']?> (-plazas reservadas) plazas</h4>
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
                            foreach ($datos_usuario as $values) {
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
                                foreach ($datos_usuario as $values) {
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
                            Descripción: <?=$datos_viaje[0]['descripcion']?>
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
                            foreach($datos_auto as $values){
                        ?>
                        <li><b>Marca y modelo: </b><?=$values['marca']." ".$values['modelo']?></li>
                        <li>Color: <?=$values['color']?></li>
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