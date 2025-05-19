<?php 
    $datos= new CtrTablas();
    $opciones=new CtrOpciones();
    $tableUsuarios="usuarios";
    $tableViajes="viajes";
    $tableOpciones="opciones";
    $datosUsuario=$datos->ctrShowRegister($tableUsuarios,"username",$_SESSION['username']);
    $datosViaje=$datos->ctrShowLastRow($tableViajes, "id_usuario",$datosUsuario[0]['id']);
    $datosOpciones=$datos->ctrShowRegister($tableOpciones,null,null);
    if(isset($_POST) && !empty($_POST)){
        $opciones->ctrInsertarOpcionViaje($datosViaje[0]['id']);
    }
    include "views/partials/insertarOpciones.view.php";