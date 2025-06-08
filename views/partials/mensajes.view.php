<section>
    <div class="container">
        <!--conversacion-->
        <?php
        //var_dump($_POST);
        foreach ($conversacion as $mensaje) {

            if ($mensaje['idEmisor'] == $idUsuario['id']) {
                $clase = "col-6";
                $clase2 = "bg-light";
            } else {
                $clase = "col-0";
                $clase2 = "bg-transparent";
            }
        ?>
            <!--globo de dialogo-->
            <div class="row ">
                <div class="<?= $clase ?> "></div>
                <div class="col-6 rounded-50 margin-abajo <?= $clase2 ?>">
                    <div class="row">
                        <div class="col-12">

                            <?= $mensaje['cuerpoMensaje'] ?>
                        </div>

                        <div class="col-12 text-right">
                            <?= $mensaje['fechaHora'] ?>
                            <button type="button" class="btn btn-danger rounded-circle col-1" data-toggle=" modal" data-target="#ModalEliminarMensaje<?= $mensaje['id'] ?>" data-whatever="@mdo"><i class="fa fa-trash"></i></button>
                            <button type="button" class="btn btn-danger rounded-circle col-1" data-toggle="modal" data-target="#ModalEliminarMensaje<?= $mensaje['id'] ?>" data-whatever="@mdo">X</button>
                        </div>
                    </div>


                </div>
            </div>
        <?php
        }
        ?>
        <!--formulario con textarea para escribir y añadir nuevo comentario a la conversacion-->
        <div class="row">
            <div class="col-3 "></div>
            <div id="escribir" class="col-6">
                <form method="POST" action="">
                    <input type="hidden" name="idEmisor" value="<?= $idUsuario['id'] ?>">
                    <input type="hidden" name="idReceptor" value="<?= $receptor ?>">
                    <textarea name="cuerpoMensaje" class="form-control" rows="3" placeholder="Escribe tu mensaje"></textarea>
                    <button type="submit" name="enviarMensaje" class="btn btn-primary mt-2 rounded-pill">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</section>
<!--MODAL ELIMINAR MENSAJE-->
<?php
foreach ($conversacion as $mensaje) {
?>
    <div class="modal fade" id="ModalEliminarMensaje<?= $mensaje['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-center" id="exampleModalLabel">¿Está seguro de que quiere eliminar este mensaje?</h3>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
                <div class="modal-body">
                    <form enctype="multipart/form-data" action="" method="POST" class="row g-3">
                        <h><?=$mensaje['id']?></h>
                        <input type="hidden" name="eliminarMensaje">
                        <input type="hidden" name="id" value="<?= $mensaje['id'] ?>">
                        <input type="hidden" name="idEmisor" value="<?= $mensaje['idEmisor'] ?>">
                         <input type="hidden" name="idReceptor" value="<?= $mensaje['idReceptor'] ?>">
                        <div class="col-md-12" style="margin-top:5%;">
                            <button type="submit" class="btn btn-primary">Eliminar</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
<?php
}
?>
<!--FIN MODAL ELIMINAR MENSAJE-->