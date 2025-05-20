<?php 
    $table_temas="temas";
    $temas=Tablas::showRegister($table_temas,null,null);
    var_dump($_POST);
    var_dump($_FILES);
    if(isset($_POST) && !empty($_POST)){
        //var_dump($_POST);
        $create=new CtrCrud();
        $create_a_new_user=$create->ctrCreate();
    }
    include "views/partials/create.view.php";