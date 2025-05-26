<?php 
    $datosViaje=new CtrViajes();
    $datosUsuario=new CtrUsers();
    $listadoViajes=$datosViaje->ctrGetAllViajes("viajes",null,null);
    if(isset($_POST) && !empty($_POST)){
        $deleteUser= $datosViaje->ctrDeleteTravel("usuarios", "id", $_POST['id']);
    }
    include "views/partials/viajes.view.php";