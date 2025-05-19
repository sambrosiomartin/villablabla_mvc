<?php 
       $datos= new CtrTablas();
       $table="usuarios";
       $usuarioValues=$datos->ctrShowRegister($table,"username",$_SESSION['username']);
       $table2="automoviles";
       $tableViajes="viajes";
        $automovilValues=$datos->ctrShowRegister($table2,"id_usuario",$usuarioValues[0]['id']);
        if(isset($_POST) && !empty($_POST)){
            $viaje=new CtrViajes();
            $crear_viaje=$viaje->ctrCrearViaje();
        }
    
    include "views/partials/crearViaje.view.php";