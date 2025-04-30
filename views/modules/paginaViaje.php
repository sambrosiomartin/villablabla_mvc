<?php
    if(isset($_GET) && !empty($_GET)){
        $datos=new CtrTablas();
        $table_viajes="viajes";
        $table_usuarios="usuarios";
        $table_auto="automoviles";
        $datos_viaje=$datos->ctrShowRegister($table_viajes, "id", $_GET['id']);
        $datos_conductor=$datos->ctrShowRegister($table_usuarios,"id",$datos_viaje[0]['id_usuario']);
        $datos_auto=$datos->ctrShowRegister($table_auto,"id",$datos_viaje[0]['id_coche']);
        $id_viajero=$datos->ctrshowValueField($table_usuarios,"id","username",$_SESSION['username']);
    }
    include "views/partials/paginaViaje.view.php";