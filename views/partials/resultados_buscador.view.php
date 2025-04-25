<!--listado de viajes buscados-->
<section class="container">
    <div class="row">
        <div class="col-lg-12">
            <?php
//var_dump($viajes_buscados);
            if (!empty($viajes_buscados)) {
            ?>
                <h4 style="text-align:center;margin:2%;">VIAJES QUE COINCIDEN CON SU BÚSQUEDA</h4>
                <table style="border: 1px solid black; width: 100%; text-align: center;">
                    <tr>
                        <th colspan="6" style="border:1px solid black;">
                            <?php
                            echo $viajes_buscados[0]['origen'] . " - " . $viajes_buscados[0]['destino'];
                            ?>
                        </th>
                    </tr>
                    <tr>
                        <td>usuario</td>
                        <td>foto</td>
                        <td>dia</td>
                        <td>hora</td>
                        <td>Regularidad</td>
                        <td>Ir a viaje...</td>
                    </tr>
                    <?php
/*foreach*/ 
                    foreach ($viajes_buscados as $value) {
                        $conductor=new CtrTablas();
                        $datos_conductor=$conductor->ctrShowRegister("usuarios","id",$value['id_usuario']);
                    ?>
                        <tr>
                            <td>
                                <?= $datos_conductor[0]['nombre'] . " " . $datos_conductor[0]['apellido1'] ?>
                            </td>
                            <td>
                                <img src="views/images/users/default.jpg" alt="imagen de usuario" width="10%">
                            </td>
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
<!--else-->
                    <?php
                    }
                    ?>
                </table>
            <?php
            } else {
            ?>
                <h4 style="text-align:center;margin-top:5%;">No hay viajes que coincidan con los datos introducidos</h4>
            <?php
            }
            ?>
<!--end of if-->
        </div>
    </div>
</section>
<!--end of listado de viajes buscados-->