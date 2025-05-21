<?php 
//MODELOS
   require_once "models/tablas.php";
   //require_once "models/mdlUsers.php";
//CONTROLADORES
   require_once "controllers/plantillaController.php";
   require_once "controllers/utilidades.php";
    //require_once "controllers/ctrUsers.php";
    $plantilla=new PlantillaController();
    $plantilla->ctrPlantilla();