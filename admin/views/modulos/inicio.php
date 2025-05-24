<?php
    $datos_usuario=new CtrUsers();
    $listado_usuarios = $datos_usuario->ctrGetAllUsers("usuarios", null, null);
    include "views/partials/inicio.view.php";