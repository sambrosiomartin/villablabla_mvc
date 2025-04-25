<?php 
    $viajes=new ctrViajes();
    $viajes_semana=$viajes->ctrViajesSemana();
    
    include "views/partials/viajesSemana.view.php";