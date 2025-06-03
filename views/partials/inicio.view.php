<!-- Carousel Start -->
 <section>
<div class="container-fluid p-0 carousel-margin">
    <div id="header-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="w-100" src="views/images/iniciocarousel/carousel1.jpg" alt="Image">
                <div class="d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3 text-center carousel-pages">
                        <h4 class="text-blue text-uppercase mb-md-3">Frente al aislamiento</h4>
                        <h1 class="display-3 text-white mb-md-4">Comparte Tu Viaje</h1>
                    </div>
                </div>
            </div>
            <?php
            for ($i = 2; $i <= 4; $i++) {
            ?>
                <div class="carousel-item">
                    <img class="w-100" src="views/images/iniciocarousel/carousel<?= $i ?>.jpg" alt="Image">
                    <div class="d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3 text-center carousel-pages">
                            <h4 class="text-red text-uppercase mb-md-3">Frente al aislamiento</h4>
                            <h1 class="display-3 text-blue mb-md-4">Comparte Tu Viaje</h1>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
        <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
            <div class="btn btn-dark" style="width: 45px; height: 45px;">
                <span class="carousel-control-prev-icon mb-n2"></span>
            </div>
        </a>
        <a class="carousel-control-next" href="#header-carousel" data-slide="next">
            <div class="btn btn-dark" style="width: 45px; height: 45px;">
                <span class="carousel-control-next-icon mb-n2"></span>
            </div>
        </a>
    </div>
</div>
</section>
<!-- Carousel End -->
<!-- section buscador -->
<section id="buscador" class="basic-1 bg-section">
    <!--formulario buscador-->
    <div class="container">
        <div class="row">
            <div class="col-lg-12 rounded-50 " style="background:#E9F1FA; padding: 25px; margin-top:-10%;">
                <div class="form-container ">
                    <form method="POST" action="">
                        <div class="row">
                            <div class="form-group col-lg-6 text-center">
                                <label class="textOrigen subrayado-1" for="forOrigen">Seleccione desde donde sale</label>
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
                                <!--input oculto de otros origenes--->
                                <div class="col-lg-12" id="BlockotrosOrigenes" style="display: none;">
                                    <label class="textOrigen subrayado-1" for="forOtrosOrigenes">Escriba el origen si no se encuentra en la lista de
                                        lugares de salida frecuentes</label>
                                    <input type="text" name="otros_origenes" id="forOtrosOrigenes" class="form-control"
                                        placeholder="" aria-describedby="helpId">
                                </div>
                            </div>
                            <div class="form-group col-lg-6 text-center">
                                <label class="textDestino subrayado-2" for="forDestino">Seleccione hacia donde va</label>
                                <select name="destino" class="form-control-select" id="forDestino" required>
                                    <option class="select-option" value="" disabled selected>Seleccione una opción de
                                        destino</option>
                                    <?php
                                    foreach ($paradas_buscador as $key => $value) {
                                    ?>
                                        <option class="select-option" value="<?= $value ?>"><?= $key ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                                  <!--input oculto de otros origenes--->
                                <div class="col-lg-12" id="BlockotrosDestinos" style="display: none;">
                                    <label class="textDestino subrayado-2" for="forOtrosDestinos">Escriba el destino si no se encuentra en la lista de
                                        destinos frecuentes</label>
                                    <input type="text" name="otros_destinos" id="forOtrosDestinos" class="form-control"
                                        placeholder="" aria-describedby="helpId">
                                </div>
                            </div>
                        </div>
                        <div class="row text-center">
                            <div class="col-lg-3"></div>
                            <div class="form-group col-lg-6">
                                <label class="subrayado-3" for="forFecha">Elija aquí el día y mes de su viaje</label>
                                <input type="date" name="fecha" id="forFecha" class="form-control" placeholder=""
                                    aria-describedby="helpId" />
                            </div>

                        </div>
                        <div class="form-group col-lg-12 text-center">
                            <button type="submit" class="form-control-submit-button col-4">Pulse aquí para buscar
                                viaje</button>
                        </div>
                        <div class="form-message">
                            <div id="pmsgSubmit" class="h3 text-center hidden"></div>
                        </div>
                    </form>
                </div> <!-- end of formulario container -->
            </div>
        </div>

    </div>
    <?php
    if (isset($viajes_buscados)) {
        include "views/partials/resultados_buscador.view.php";
    }
    ?>
</section>
<!-- end of section buscador -->
<!-- que es villablabla Start -->
<section id="about" class="container-fluid py-5 about-style bg-gray">
    <div class="container pt-5 rounded-50-white" >
        <div class="row">
            <div class="col-lg-6">
                <div class="position-relative h-75">
                    <img class="position-absolute w-100 h-100 img-rounded" src="views/images/about/about1.jpg" style="object-fit: cover; height:50px;">
                </div>
            </div>
            <div class="col-lg-6 pt-5 pb-lg-5">
                <div class="about-text p-4 p-lg-5 my-lg-5">
                    <h6 class="text-purple text-uppercase " style="letter-spacing: 5px; margin-top:-35%;">¿Que es Villablabla?</h6>
                    <h3 class="mb-3">Una aplicación para que puedas moverte libremente por tu zona</h3>
                    <p>En las últimas decadas, las distancias se han acortado gracias a la evolución de los medios de transporte.
                        Sin embargo, cuando vives en una zona rural aislada o que carece de medios de transporte eficaces, las distancias
                        son igual de grandes que hace 50 años. Donde las grandes aplicaciones no llegan, está <span>VILLABLABLA</span> para
                        que puedas buscar a un vecino de tu zona que vaya a donde necesitas ir y compartir el coche y los gastos de viaje con esa persona.

                    <h4>Donde no llega nadie, queremos llegar nosotr@s.</h4>
                    </p>
                    <div class="row mb-4">
                        <div class="col-6">
                            <img class="img-fluid" src="img/about-1.jpg" alt="">
                        </div>
                        <div class="col-6">
                            <img class="img-fluid" src="img/about-2.jpg" alt="">
                        </div>
                    </div>
                    <a href="#buscador" class="btn btn-primary mt-1 rounded-pill">Busca tu viaje ahora...</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- que es villablabla End -->