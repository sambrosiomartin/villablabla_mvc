<?php
//datos para rellenar la página del viaje
    if(isset($_GET) && !empty($_GET)){
        $datos=new CtrTablas();
        $reserva=new CtrReservas();
        $viaje=new CtrViajes();
        $opciones=new CtrOpciones();
        $table_viajes="viajes";
        $table_usuarios="usuarios";
        $table_auto="automoviles";
        $table_reserva="reservas";
        $table_paradas="paradas";
        $table_opciones="opciones";
        $datos_viaje=$datos->ctrShowRegister($table_viajes, "id", $_GET['id']);
        $datos_conductor=$datos->ctrShowRegister($table_usuarios,"id",$datos_viaje[0]['id_usuario']);
        $datos_auto=$datos->ctrShowRegister($table_auto,"id",$datos_viaje[0]['id_coche']);
        if(isset($_SESSION['username']) && !empty($_SESSION['username'])){
            $id_viajero=$datos->ctrshowValueField($table_usuarios,"id","username",$_SESSION['username']);
        }
        $reservas_viaje=$datos->ctrShowRegister($table_reserva,'id_viaje',$datos_viaje[0]['id']);
        //para listado de opciones del viaje
        $opcionesViaje=$opciones->ctrMostrarOpcionesViaje($datos_viaje[0]['id']);
        $listadoOpciones=$opciones->ctrOpcionesRestantes($opcionesViaje);
        //coches del conductor
        $coches_conductor=$datos->ctrShowRegister($table_auto,"id_usuario",$datos_viaje[0]['id_usuario']);
        //var_dump($coches_conductor);
    //numero de asientos vacios
        $reserva=new CtrReservas();
        $num_asientos_ocupados=$reserva->ctrAsientosOcupados($datos_viaje[0]['id']);
        $num_asientos_vacios=$datos_auto[0]['numero_plazas'] - $num_asientos_ocupados['suma'];
    //paradas 
        $paradas=$datos->ctrShowRegister($table_paradas,"id_viaje",$datos_viaje[0]['id']);
    }
//creación de reserva
    if(isset($_POST['hacer_reserva']) && !empty($_POST)){
        $reseva_enviada=$reserva->ctrHacerReserva();
    }
//cambiar el estado de reserva, según si el conductor acepta o deniega la reserva de un viajero
if(isset($_POST['cambiar_estado_reserva']) && !empty($_POST)){
    $reseva_enviada=$reserva->ctrUpdate('estado');
}
//editar datos de un viaje
if(isset($_POST['editar_viaje']) && !empty($_POST)){
    $editar_viaje=$viaje->ctrUpdate();
}
//añadir parada a un viaje
if(isset($_POST['addParada']) && !empty($_POST)){
    $addParada=$viaje->ctrAddParada();
}
//eliminar parada
if(isset($_POST['eliminarParada']) && !empty($_POST)){
    $eliminarParada=$viaje->ctrDeleteParada();
}
//eliminar viaje
if(isset($_POST['eliminarViaje']) && !empty($_POST)){
    $eliminarViaje=$viaje->ctrDeleteViaje();
}
//insertar opciones de viaje
if(isset($_POST['insertarOpciones']) && !empty($_POST)){
    $insertarOpciones=$opciones->ctrInsertarOpcionViaje($_POST['idViaje']);
}
    include "views/partials/paginaViaje.view.php";