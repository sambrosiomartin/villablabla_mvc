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
                <table style="border: 1px solid black; width: 100%; text-align: center;">

                    <tr>
                        <th>usuario</th>
                        <th>foto</th>
                        <th>Origen</th>
                        <th>Destino</th>
                        <th>dia</th>
                        <th>hora</th>
                        <th>Regularidad</th>
                        <th></th>
                    </tr>
                    <?php
                    foreach ($viajes_semana as $value) {
                        $usuario = tablas::showValueField('usuarios', 'nombre', 'id', 2);
                        //var_dump($usuario);
                    ?>
                        <tr>
                            <td>
                                <?= $usuario['nombre'] ?>
                            </td>
                            <td>
                                <img src="views/images/users/default.jpg" alt="imagen de usuario" width="10%">
                            </td>
                            <td>
                                <?= $value['origen'] ?>
                            </td>
                            <td>
                                <?= $value['destino'] ?>
                            </td>
                            <!--convertir fecha en ingles a castellano-->
                            <!--poner dia de la semana, para que se vea el dia de la semana del viaje-->
                            <td>
                                <?= $value['fecha'] ?>
                            </td>
                            <td>
                                <?= $value['hora_salida'] ?>
                            </td>
                            <td>
                                <?= $value['regularidad'] ?>
                            </td>
                            <td>
                                <a class="btn btn-primary" href="#" role="button">ir a viaje...</a>
                            </td>
                        </tr>

                    <?php
                    }
                    ?>
                </table>
            </div> <!-- end of row -->
            <!--tabla de viajes de la semana-->

        </div> <!-- end of container -->
    </div> <!-- end of cards-1 -->
    <!-- end of small features -->
</section> <!-- end of text-container -->