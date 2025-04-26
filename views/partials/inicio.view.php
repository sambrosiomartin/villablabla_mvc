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
            <div class="col-lg-12" style="background:#E9F1FA;border:2px solid grey; padding: 25px; margin-top:-10%;">
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
</section> 
<!-- end of section buscador -->
<!-- que es villablabla Start -->
<section id="about" class="container-fluid py-5 about-style">
        <div class="container pt-5">
            <div class="row">
                <div class="col-lg-6" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100" src="views/images/about/about1.jpg" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 pt-5 pb-lg-5">
                    <div class="about-text bg-white p-4 p-lg-5 my-lg-5">
                        <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">¿Que es Villablabla?</h6>
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
                        <a href="#buscador" class="btn btn-primary mt-1">Busca tu viaje ahora...</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- que es villablabla End -->