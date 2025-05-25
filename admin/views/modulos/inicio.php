<?php
    $datos_usuario=new CtrUsers();
    $listado_usuarios = $datos_usuario->ctrGetAllUsers("usuarios", null, null);
    if(isset($_POST) && !empty($_POST)){
        $deleteUser= $datos_usuario->ctrDeleteUser("usuarios", "id", $_POST['id']);
    }
    include "views/partials/inicio.view.php";