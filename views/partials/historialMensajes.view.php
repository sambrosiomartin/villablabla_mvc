<section id="historialMensajes">
    <div class="container">
        <div class="row"></div>
        <h2 class="historial text-center">Historial de mensajes</h2>
        <div class="row mb-5">
            <div class="container rounded-50 bg-white">
                <div class="row">
                    <div class="col-12 text-center">
                        <table id="myTable" class="display text-left" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Emisor</th>
                                    <th>Receptor</th>
                                    <th>Número de mensajes</th>
                                    <th colspan="2">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!--AQUI COMIENZA EL FOREACH-->
                                <?php
                                if ($todosMensajes != null) {
                                    foreach ($todosMensajes as $values) {
                                        $emisor=$datos->ctrShowRegister("usuarios", "id", $values['idEmisor']);
                                        $receptor=$datos->ctrShowRegister("usuarios", "id", $values['idReceptor']);
                                ?>
                                   <tr>
                                    <td >
                                        <?=$emisor[0]['username']; ?>
                                    </td>
                                    <td>
                                        <?=$receptor[0]['username']; ?>
                                    </td>
                                    <td>
                                        <?=$values['conversaciones']; ?>
                                    </td>
                                    <td>
                                        <form action="" method="post">
                                            <input type="hidden" name="idEmisor" value="<?=$values['idEmisor']; ?>">
                                            <input type="hidden" name="idReceptor" value="<?=$values['idReceptor']; ?>">
                                            <button type="submit" class="btn btn-primary rounded-pill" name="leerMensajes">Leer mensajes</button>
                                        </form>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger rounded-pill" data-toggle="modal" data-target="#ModalEliminarConversacion<?= $values['idEmisor'].$values['idReceptor'] ?>" data-whatever="@mdo">X</button>
                                    </td>
                                   </tr>
                                <?php
                                    }
                                } else {
                                    echo "<h5>No encontrados registros antiguos</h5>";
                                }
                                ?>
                                <!--AQUI TERMINA EL FOREACH-->
                            <tfoot>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--MODAL ELIMINAR CONVERSACION-->
<?php
foreach ($todosMensajes as $mensaje) {
?>
    <div class="modal fade" id="ModalEliminarConversacion<?= $mensaje['idEmisor'].$mensaje['idReceptor'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-center" id="exampleModalLabel">¿Está seguro de que quiere eliminar esta conversación?</h3>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
                <div class="modal-body">
                    <form enctype="multipart/form-data" action="" method="POST" class="row g-3">
                        <input type="hidden" name="todosMensajes">
                        <input type="hidden" name="eliminarConversacion">
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
<!--FIN MODAL ELIMINAR CONVERSACION-->