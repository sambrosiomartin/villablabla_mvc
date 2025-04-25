<?php 
//MODELOS
   require_once "models/conexion.php";
   require_once "models/tablas.php";
   require_once "models/mdlUsers.php";
   require_once "models/mdlBuscador.php";
   require_once "models/mdlViajes.php";
   require_once "models/mdlAutomovil.php";
//CONTROLADORES
   require_once "controllers/ctrPlantilla.php";
   require_once "controllers/utilidades.php";
   require_once "controllers/ctrTablas.php";
   require_once "controllers/ctrUsers.php";
   require_once "controllers/ctrBuscador.php";
   require_once "controllers/ctrViajes.php";
   require_once "controllers/ctrAutomovil.php";
   $plantilla=new CtrPlantilla();
    $plantilla->ctrPlantilla();