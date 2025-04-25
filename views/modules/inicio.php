<?php
    if(isset($_POST) && !empty($_POST)){
      //var_dump($_POST);
      if($_POST['origen'] != "otros"){
         $origen=$_POST['origen'];
      }
       else{
         $origen = $_POST['otros_origenes'];
       }
       if($_POST['destino'] != "otros"){
         $destino = $_POST['destino'];
       }
       else{
         $destino = $_POST["otros_destinos"];
       }
       $fecha=$_POST['fecha'];
       $buscador=new ctrBuscador();
       $viajes_buscados=$buscador->ctrBuscar($origen,$destino,$fecha);
    }
    include "views/partials/inicio.view.php";
    include "views/modules/viajesSemana.php";