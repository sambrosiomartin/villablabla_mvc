<section id="viajes" class="text-container">
    <!-- Small Features -->
    <div class="cards-1" style="background:#E9F1FA;">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">

                    <!-- Card -->

                    <div class="card">
                        <div class="card-image blue">
                            <i class="fas fa-rocket"></i>
                        </div>
                    </div>
                    <!-- end of card -->

                </div> <!-- end of col -->

                <div class="col-lg-8">
                    <hr>
                    <h1>VIAJES DE LA SEMANA</h1>
                    <hr>
                </div>
                <div class="col-lg-2">

                    <!-- Card -->

                    <div class="card">
                        <div class="card-image blue">
                            <i class="fas fa-rocket"></i>
                        </div>
                    </div>
                    <!-- end of card -->

                </div> <!-- end of col -->
                <?php
                if (!empty($viajes_semana)) {
                ?>
                    <table class="table-1" style="">

                        <tr>
                            <th>usuario</th>
                            <th>foto</th>
                            <th>Origen</th>
                            <th>Destino</th>
                            <th>dia</th>
                            <th>hora</th>
                            <th>Regularidad</th>
                            <th>Opciones</th>
                        </tr>
                        <?php
                        foreach ($viajes_semana as $value) {
                            $datos_conductor=$conductor->ctrShowRegister("usuarios","id",$value['id_usuario']);
                            //var_dump($usuario);
                        ?>
                            <tr>
                                <td>
                                    <?= $datos_conductor[0]['nombre'] ?>
                                </td>
                                <td>
                                    <img src="<?= Utilidades::imagenUsuario($datos_conductor[0]['username'], $datos_conductor[0]['foto']) ?>" class="rounded-circle img-fluid" alt="imagen de usuario" width="10%" />
                                </td>
                                <td>
                                    <?= $value['origen'] ?>
                                </td>
                                <td>
                                    <?= $value['destino'] ?>
                                </td>
                                <!--poner dia de la semana, para que se vea el dia de la semana del viaje-->
                                <td>
                                    <?= Utilidades::english_date_to_spanish($value['fecha']) ?>
                                </td>
                                <td>
                                    <?= Utilidades::change_hour($value['hora_salida']) ?>
                                </td>
                                <td>
                                    <?= $value['regularidad'] ?>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-outline-primary"><a href="index.php?ruta=paginaViaje&id=<?= $value['id'] ?>">Ir a viaje...</a></button>
                                </td>
                            </tr>

                        <?php
                        }
                        ?>
                    </table>
                <?php
                } else {
                ?>
                    <div class="col-12 text-center">
                        <h3>No hay viajes programados para esta semana</h3>
                    </div>
                <?php
                }
                ?>
            </div> <!-- end of row -->
            <!--tabla de viajes de la semana-->

        </div> <!-- end of container -->
    </div> <!-- end of cards-1 -->
    <!-- end of small features -->
</section> <!-- end of text-container -->