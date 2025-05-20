<?php 
    $table="portfolio";
    if(isset($_GET) && !empty($_GET)){
        $value=$_GET['id'];
    }
    $product=MdlCrud::showValueField($table,"*","id",$value);
    $table_temas="temas";
    $temas=MdlCrud::showRegister($table_temas,null,null);
    $selected_tema=MdlCrud::showValueField($table_temas,'nombre','id',$product['idtema']);
    if(isset($_POST) && !empty($_POST)){
        $edit=new CtrCrud();
        $edit_product=$edit->ctrUpdate();
    }
include "views/partials/edit.view.php";