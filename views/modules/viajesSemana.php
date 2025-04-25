<?php 
    $viajes=new ctrViajes();
    $viajes_semana=$viajes->ctrViajesSemana();
    //var_dump($viajes_semana);
    include "views/partials/viajesSemana.view.php";