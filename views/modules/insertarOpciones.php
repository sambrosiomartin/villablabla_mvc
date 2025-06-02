<?php 
    $datos= new CtrTablas();
    $opciones=new CtrOpciones();
    $tableOpciones="opciones";
    $viajeId=$opciones->ctrIdViaje(null);
    $datosOpciones=$datos->ctrShowRegister($tableOpciones,null,null);
    if(isset($_POST) && !empty($_POST)){
        //var_dump($_POST);
        $opciones->ctrInsertarOpcionViaje($viajeId);
    }
    include "views/partials/insertarOpciones.view.php";