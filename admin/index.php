<?php 
   require_once "models/tablas.php";


   require_once "controllers/plantillaController.php";
   require_once "controllers/utilidades.php";

    $plantilla=new PlantillaController();
    $plantilla->ctrPlantilla();