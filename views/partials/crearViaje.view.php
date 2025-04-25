<!--FORMULARIO CREAR VIAJE-->

<div style="margin-top:10em;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12" style="font-size:2.5rem;border:2px solid grey; padding: 25px; text-align:center;">FORMULARIO CREACIÓN VIAJE</div>
            <form enctype="multipart/form-data" action="" method="POST" class="row g-3">
                <div class="col-md-6">
                    <label for="inputFecha" class="form-label">Fecha</label>
                    <input type="date" name="fecha" class="form-control" id="inputFecha" required />
                </div>
                <div class="col-md-6">
                    <label for="inputHoraSalida" class="form-label">Hora de salida</label>
                    <input type="time" name="hora_salida" class="form-control" id="inputHoraSalida" required />
                </div>
                <div class="col-md-6">
                    <label for="forOrigen">Seleccione desde donde sale</label>
                    <select name="origen" class="form-control-select" id="forOrigen" required>
                        <option class="select-option" value="" disabled selected>Seleccione una opción de origen
                        </option>
                        <option class="select-option" value="villablanca">VILLABLANCA</option>
                        <option class="select-option" value="lepe">Lepe</option>
                        <option class="select-option" value="otros">Otros</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="forOrigen">Seleccione su destino</label>
                    <select name="destino" class="form-control-select" id="forDestino" required>
                        <option class="select-option" value="" disabled selected>Seleccione una opción de destino
                        </option>
                        <option class="select-option" value="villablanca">VILLABLANCA</option>
                        <option class="select-option" value="lepe">Lepe</option>
                        <option class="select-option" value="otros">Otros</option>
                    </select>
                </div>
                <div class="form-group col-lg-6">
                    <label for="forOtrosOrigenes">Escriba el origen si no se encuentra en la lista de
                        orígenes</label>
                    <input type="text" name="otros_origenes" id="forOtrosOrigenes" class="form-control"
                        placeholder="" aria-describedby="helpId">
                </div>
                <div class="form-group col-lg-6">
                    <label for="forOtrosDestinos">Escriba el destino si no se encuentra en la lista de
                        destinos</label>
                    <input type="text" name="otros_destinos" id="forOtrosDestinos" class="form-control"
                        placeholder="" aria-describedby="helpId">
                </div>
                <div class="col-md-6">
                    <label for="forDireccionOrigen" class="form-label">Dirección de origen</label>
                    <input type="text" name="direccion_origen" class="form-control" id="forDireccionOrigen" required />
                </div>
                <div class="col-md-6">
                    <label for="forDireccionDestino" class="form-label">Dirección de destino</label>
                    <input type="text" name="direccion_destino" class="form-control" id="forDireccionDestino" required />
                </div>
                <div class="col-md-6">
                    <label for="forTiempoEstimado" class="form-label">Tiempo estimado del viaje</label>
                    <input type="number" name="tiempo_estimado" class="form-control" id="forTiempoEstimado" required />
                </div>
                <div class="col-md-6">
                    <label for="forRegularidad">Seleccione cada cuanto hace el viaje</label>
                    <select name="regularidad" class="form-control-select" id="forRegularidad">
                        <option class="select-option" value="no_regular">No regular</option>
                        <option class="select-option" value="diario">Diario</option>
                        <option class="select-option" value="semanal">Semanal</option>
                        <option class="select-option" value="mensual">Mensual</option>
                    </select>
                </div>
                <div class="col-md-12">
                    <label for="forDescripcion" class="form-label">Indique algo que añadir</label>
                    <textarea class="form-control" name="descripcion" id="input" rows="3"></textarea>
                </div>
                <div class="col-md-12">
                    <label for="forRegularidad">Seleccione el automovil con el que realizará el viaje</label>
                    <select name="id_coche" class="form-control-select" id="forCoche" required>
                        <option class="select-option" value="">Elija el automovil</option>
                        <?php foreach ($automovilValues as $value) { ?>
                            <option class="select-option" value="<?= $value['id'] ?>"><?= $value['marca'] . " " . $value['modelo'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <input type="hidden" name="id_usuario" value="<?= $usuarioValues[0]['id'] ?>">
                <div class="col-md-12 text-center" style="margin:5%;">
                    <button type="submit" class="btn btn-primary">Enviar datos</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<?php 
    var_dump($_POST);
?>

<!---FIN FORMULARIO CREAR VIAJE-->