<?php
    $table_temas = "temas";
    $temas = new CtrCrud();
    $themes = $temas->ctrRead($table_temas, null, null);
    $table = "portfolio";
    if (isset($_POST["idtema"]) && $_POST["idtema"]!=-1) {
        $field = "idtema";
        $value = $_POST['idtema'];
    } else {
        $field = null;
        $value = null;
    }
    $portfolio = new CtrCrud();
    $products = $portfolio->ctrRead($table, $field, $value);
    include "views/partials/inicio.view.php";