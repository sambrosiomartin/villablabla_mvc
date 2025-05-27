<?php 

//MODELOS
   require_once "models/conexion.php";
   require_once "models/tablas.php";
   require_once "models/mdlUsers.php";
   require_once "models/mdlViajes.php";
   require_once "models/mdlLugares.php";
   require_once "models/mdlOpciones.php";
//CONTROLADORES
   require_once "controllers/plantillaController.php";
   require_once "controllers/utilidades.php";
    require_once "controllers/ctrUsers.php";
    require_once "controllers/ctrViajes.php";
    require_once "controllers/ctrLugares.php";
    require_once "controllers/ctrOpciones.php";
    $plantilla=new PlantillaController();
    $plantilla->ctrPlantilla();