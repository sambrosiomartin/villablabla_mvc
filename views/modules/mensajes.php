<?php
$datos = new CtrTablas();
$mensajes = new CtrMensajes();
$idUsuario = $datos->ctrshowValueField("usuarios", "id", "username", $_SESSION['username']);
if (isset($_POST['todosMensajes']) && !empty($_POST)) {
    if(isset($_POST['eliminarConversacion']) && !empty($_POST)){
        $mensajeEliminado = $mensajes->ctrEliminarMensajes(2);
    }
    $todosMensajes = $mensajes->ctrShowConversaciones();
    include "views/partials/historialMensajes.view.php";
} else {
    if (isset($_POST['enviarMensaje']) && !empty($_POST)) {
        //var_dump($_POST);
        $mensajeEnviado = $mensajes->ctrRegister();
    }
    if (isset($_POST['leerMensajes']) && !empty($_POST)) {
        $mensajeEnviado = $mensajes->ctrCambiarStatus($_POST['idEmisor'], $_POST['idReceptor']);
    }
    if(isset($_POST['eliminarMensaje']) && !empty($_POST)){
        $mensajeEliminado = $mensajes->ctrEliminarMensajes(1);
    }
    
    if (isset($_POST) && !empty($_POST)) {
        $conversacion = $mensajes->ctrShowMensajes($_POST['idEmisor'], $_POST['idReceptor']);
        if ($conversacion[0]['idReceptor'] != $idUsuario['id']) {
            $receptor = $conversacion[0]['idReceptor'];
        }
        if ($conversacion[0]['idEmisor'] != $idUsuario['id']) {
            $receptor = $conversacion[0]['idEmisor'];
        }
    }
    
    include "views/partials/mensajes.view.php";
}
