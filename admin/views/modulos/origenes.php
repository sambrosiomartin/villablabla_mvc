<?php 
   $datosOrigenes=new ctrLugares();
   $origenesCuenta=$datosOrigenes->ctrCountLugares("viajes","origen");
include "views/partials/origenes.view.php";