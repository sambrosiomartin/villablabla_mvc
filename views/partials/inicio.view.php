<!-- Carousel Start -->
<div class="container-fluid p-0 carousel-margin">
    <div id="header-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="w-100" src="views/images/iniciocarousel/carousel1.jpg" alt="Image">
                <div class="d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3 text-center carousel-pages">
                        <h4 class="text-white text-uppercase mb-md-3">Frente al aislamiento</h4>
                        <h1 class="display-3 text-white mb-md-4">Comparte viaje</h1>
                        <!--a href="" class="btn btn-primary py-md-3 px-md-5 mt-2">Book Now</a-->
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
                            <h4 class="text-blue text-uppercase mb-md-3">Frente al aislamiento</h4>
                            <h1 class="display-3 text-blue mb-md-4">Comparte viaje</h1>
                            <!--a href="" class="btn btn-primary py-md-3 px-md-5 mt-2">Book Now</a-->
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
<!-- Carousel End -->
<!-- section buscador -->
<section id="buscador" class="basic-1">
    <!--form buscador-->
    <div class="container">
        <div class="row">
            <div class="col-lg-12" style="background:#E9F1FA;border:2px solid grey; padding: 25px; margin-top:-15%;">
                <div class="form-container">
                    <form method="POST" action="">
                        <div class="row">
                            <div class="form-group col-lg-4">
                                <label for="forOrigen">Seleccione desde donde sale</label>
                                <select name="origen" class="form-control-select" id="forOrigen" required>
                                    <option class="select-option" value="" disabled selected>Seleccione una opción de origen
                                    </option>
                                    <option class="select-option" value="villablanca">VILLABLANCA</option>
                                    <option class="select-option" value="lepe">Lepe</option>
                                    <option class="select-option" value="otros">Otros</option>
                                </select>

                            </div>
                            <div class="form-group col-lg-4">
                                <label for="forDestino">Seleccione hacia donde va</label>
                                <select name="destino" class="form-control-select" id="forDestino" required>
                                    <option class="select-option" value="" disabled selected>Seleccione una opción de
                                        destino</option>
                                    <option class="select-option" value="villablanca">VILLABLANCA</option>
                                    <option class="select-option" value="lepe">Lepe</option>
                                    <option class="select-option" value="otros">Otros</option>
                                </select>
                            </div>

                            <div class="form-group col-lg-4">
                                <label for="forFecha">Aquí elija el día y mes de su viaje</label>
                                <input type="date" name="fecha" id="forFecha" class="form-control" placeholder=""
                                    aria-describedby="helpId" required>
                            </div>
                        </div>

                        <!--quitar acentos y poner todo en minusculas donde escriba el usuario-->
                        <!--modo predictivo en buscador-->
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label for="forOtrosOrigenes">Escriba el origen si no se encuentra en la lista de
                                    orígenes</label>
                                <input type="text" name="otros_origenes" id="forFecha" class="form-control"
                                    placeholder="" aria-describedby="helpId">
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="forOtrosDestinos">Escriba el destino si no se encuentra en la lista de
                                    destinos</label>
                                <input type="text" name="otros_destinos" id="forFecha" class="form-control"
                                    placeholder="" aria-describedby="helpId">
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
                </div> <!-- end of form container -->
            </div>
        </div>

    </div>
    <!--end of form buscador-->
    <?php
    if (isset($viajes_buscados)) {
        include "views/partials/resultados_buscador.view.php";
    }
    ?>
</section> <!-- end of section buscador -->