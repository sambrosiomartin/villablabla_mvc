<?php 
     $datosOpciones=new CtrOpciones();
    $listadoOpciones=$datosOpciones->ctrOpciones("opciones",null,null);
    if(isset($_POST['crearOpcion']) && !empty($_POST)){
          $crearOpcion=$datosOpciones->ctrInsertarOpcion();
    }
    if(isset($_POST['updateOpciones']) && !empty($_POST)){
          $updateOpcion=$datosOpciones->ctrUpdateOpcion();
    }
    if(isset($_POST['deleteOpcion']) && !empty($_POST)){
          $deleteOpcion=$datosOpciones->ctrDeleteOption($_POST['id']);
    }
    include "views/partials/opciones.view.php";

