<?php 
    if(isset($_POST) && !empty($_POST)){
        $registro=new CtrUsers();
        $insert=$registro->ctrRegister();
    }
    include "views/partials/registro.view.php";