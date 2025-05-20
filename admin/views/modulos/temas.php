<?php 
    if(isset($_POST) && !empty($_POST)){
        $tema=new CtrCrud();
        $nuevo=$tema->ctrCreateTheme();
    }
    include "views/partials/temas.view.php";