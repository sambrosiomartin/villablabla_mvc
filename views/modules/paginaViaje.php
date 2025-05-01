<?php
//datos para rellenar la página del viaje
    if(isset($_GET) && !empty($_GET)){
        $datos=new CtrTablas();
        $table_viajes="viajes";
        $table_usuarios="usuarios";
        $table_auto="automoviles";
        $datos_viaje=$datos->ctrShowRegister($table_viajes, "id", $_GET['id']);
        $datos_conductor=$datos->ctrShowRegister($table_usuarios,"id",$datos_viaje[0]['id_usuario']);
        $datos_auto=$datos->ctrShowRegister($table_auto,"id",$datos_viaje[0]['id_coche']);
        $id_viajero=$datos->ctrshowValueField($table_usuarios,"id","username",$_SESSION['username']);
    //numero de asientos vacios
        $reserva=new CtrReservas();
        $num_asientos_ocupados=$reserva->ctrAsientosOcupados($datos_viaje[0]['id']);
        $num_asientos_vacios=$datos_auto[0]['numero_plazas'] - $num_asientos_ocupados['suma'];
    }
//creación de reserva
    if(isset($_POST) && !empty($_POST)){
        $reserva=new CtrReservas();
        $reseva_enviada=$reserva->ctrHacerReserva();
    }
    include "views/partials/paginaViaje.view.php";