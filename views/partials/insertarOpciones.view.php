<!--FORMULARIO INSERTAR OPCIONES PARA EL VIAJE-->
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 rounded-pill bg-white" style="border:2px solid grey; padding: 25px; text-align:center;">
                <h5>Aquí podrá elegir las preferencias para el viaje, si no tiene ninguna puede pulse en saltar</h5>
                <h5>También podrá elegir preferencias en la página del viaje</h5>
            </div>
            <div class="col-lg-12" >
               <div class="col-lg-12 text-center" style="padding:2em;">
                      <button class="btn btn-primary rounded-pill"><a href="paginaUsuario">Saltar</a></button>
               </div> 
               <div class="col-lg-12" >
                <form enctype="multipart/form-data" action="" method="POST" class="row g-3">
                    <div class="col-md-2"></div>
                <div class="col-md-8" >
                   
                  
                        <?php
                        foreach ($datosOpciones as $value) {
                        ?>
                            <div class="form-check rounded-pill bg-white" style="border:2px solid black; padding:10px 0 10px 50px;margin-bottom:5px;">
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
        </div>
    </div>
</section>
