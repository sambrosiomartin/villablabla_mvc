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
                        <th class="foto">foto</th>
                        <th>usuario</th>
                        <th>dia</th>
                        <th>hora</th>
                        <th>Regularidad</th>
                        <th>Opciones</th>
                    </tr>
                    <?php
/*foreach*/ 
                    foreach ($viajes_buscados as $value) {
                        if(Utilidades::minimumDate($value['fecha'])){
                        $datos_conductor=$conductor->ctrShowRegister("usuarios","id",$value['id_usuario']);
                    ?>
                        <tr> 
                            <td >
                                <img src="<?= Utilidades::imagenUsuario($datos_conductor[0]['username'], $datos_conductor[0]['foto']) ?>" class="rounded-circle img-fluid" alt="imagen de usuario"/>
                            </td>
                            <td>
                                <?= $datos_conductor[0]['nombre'] . " " . $datos_conductor[0]['apellido1'] ?>
                            </td>
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
                                <a class="btn btn-primary rounded-pill" href="index.php?ruta=paginaViaje&id=<?= $value['id'] ?>" role="button" target="_blank" rel="noopener">ir a viaje...</a>
                            </td>
                        </tr>
<!--else-->
                    <?php
                        }
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