<?php 
     $datosOpciones=new CtrOpciones();
    $listadoOpciones=$datosOpciones->ctrOpciones("opciones",null,null);
    if(isset($_POST['crearOpcion']) && !empty($_POST)){
          $crearOpcion=$datosOpciones->ctrInsertarOpcion();
    }
    if(isset($_POST['updateOpciones']) && !empty($_POST)){
          $updateOpcion=$datosOpciones->ctrUpdateOpcion();
    }
    include "views/partials/opciones.view.php";

