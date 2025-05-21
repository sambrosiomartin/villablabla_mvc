<?php 
   /* $logout=new CtrUsers();
    $logout->ctrLogout();*/
    echo "hola";
    $logout = new CtrUsers();
    $logout->ctrLogout();
    include "views/partials/logout.view.php";