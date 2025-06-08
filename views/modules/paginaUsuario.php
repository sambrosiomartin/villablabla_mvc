<?php 
    $table="usuarios";
    $usuarioValues=tablas::showRegister($table,"username",$_SESSION['username']);
    $valores=new CtrUsers();
    $mensajes=new CtrMensajes();
    //MOSTRAR MENSAJES NO LEIDOS
    $mensajesSinLeerAgrupado=$mensajes->ctrShowMensajesSinLeerAgrupado($usuarioValues[0]['id']);
        //var_dump($automovilValues);
     //EDITAR PERFIL USUARIO
    if(isset($_POST['update_user']) && !empty($_POST)){
            //var_dump($_FILES);
        $update_valores=$valores->ctrUpdate($_SESSION['username']);
    }
    //crud vehiculo
    $vehiculo=new CtrAutomovil();
    $table2="automoviles";
    $automovilValues=tablas::showRegister($table2,"id_usuario",$usuarioValues[0]['id']);
        //var_dump($automovilValues);
    //REGISTRAR VEHICULO
    if(isset($_POST['registrar_vehiculo']) && !empty($_POST)){
            //var_dump($_POST);
        $registrar_vehiculo=$vehiculo->ctrRegisterAuto($_SESSION['username']);
    }
    //EDITAR DATOS VEHÍCULO
    if(isset($_POST['editar_vehiculo']) && !empty($_POST)){
            //var_dump($_POST);
        $editar_vehiculo=$vehiculo->ctrUpdateVehiculo();
    }
    //ELIMINAR VEHÍCULO
    if(isset($_POST['eliminar_vehiculo']) && !empty($_POST)){
        $eliminar_vehiculo=$vehiculo->ctrDeleteVehiculo();
    }
    //crud viajes
    $viaje=new CtrViajes();
    $table3="viajes";
    $viajeValues=$viaje->ctrViajesActivos($usuarioValues[0]['id'],">=");
    $viajesPasados=$viaje->ctrViajesActivos($usuarioValues[0]['id'],"<");
    //controlador reservas
    $reserva=new CtrReservas();
    $reservas_activas=$reserva->ctrReservasActivas(true);
    $reservas_pasadas=$reserva->ctrReservasActivas(false);
    //var_dump($reservas_activas);
    include "views/partials/paginaUsuario.view.php";