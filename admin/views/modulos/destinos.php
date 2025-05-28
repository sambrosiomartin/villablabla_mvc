<?php 
     $datosDestinos=new ctrLugares();
    $destinosCuenta=$datosDestinos->ctrCountLugares("viajes","destino");
    include "views/partials/destinos.view.php";