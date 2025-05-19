<!--FORMULARIO INSERTAR OPCIONES PARA EL VIAJE-->

<div style="margin-top:10em;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12" style="font-size:2.5rem;border:2px solid grey; padding: 25px; text-align:center;">FORMULARIO CREACIÓN VIAJE</div>
            <form enctype="multipart/form-data" action="" method="POST" class="row g-3">
                <div class="col-md-6">
                    <label class="textOrigen" for="forOrigen">Seleccione desde donde sale</label>
                    <select name="origen" class="form-control-select" id="forOrigen" required>
                        <option class="select-option" value="" disabled selected>Seleccione una opción de origen
                        </option>
                        <?php
                        foreach ($paradas_buscador as $key => $value) {
                        ?>
                            <option id="selectDestino" class="select-option" value="<?= $value ?>"><?= $key ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-12 text-center" style="margin:5%;">
                    <button type="submit" class="btn btn-primary">Enviar datos</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>