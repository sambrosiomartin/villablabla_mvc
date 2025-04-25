<?php 
    if(isset($_POST) && !empty($_POST)){
        $login=new CtrUsers();
        $login->ctrLogin();
    }
    include "views/partials/login.view.php";