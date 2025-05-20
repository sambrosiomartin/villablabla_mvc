
        <div class="row">
            <div class="col-xs-12 text-right">
                <a href='create' class="btn btn-default"><span class="glyphicon glyphicon-plus"></span> Agregar al
                    PortFolio</a>
            </div>
        </div>
        <br>


    </div>
</div>
</div> <!-- /container -->
<section class="py-5">
    <div class="container px-5">
        <!-- Eleccion de tema form-->
        <form action="" method="POST">
            <div class="form-group">
                
                <div class="col-sm-3">
                    <p>Tema</p>
                    <select class="form-control" id="tema" required name="idtema">
                        <option value="-1" >
                            Elige un tema para filtrar
                        </option>
                        <?php
                        foreach ($themes as $value) {
                            ?>
                            <option value="<?= $value['id'] ?>"><?= $value['nombre'] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                    <br />
                        <button type="submit" class="btn btn-primary">Filtrar</button>
                </div>
               
            </div>
        </form>

        <!--Tabla -->
        <div class="bg-light rounded-4 py-5 px-4 px-md-5">

            <table class="table table-success table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">TITULO</th>
                        <th scope="col">DESCRIPCION CORTA</th>
                        <th scope="col">DESCRIPCIÓN</th>
                        <th scope="col">IMAGEN</th>
                        <th scope="col">WEB</th>
                        <th scope="col">PRECIO</th>
                        <th scope="col">ESTADO</th>
                        <th scope="col">TEMA</th>
                        <th scope="col">OPCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($products as $value) {
                        ?>
                        <tr>
                            <th scope="row"><?= $value['id'] ?></th>
                            <td><?= $value['titulo'] ?></td>
                            <td><?= $value['descripcion_corta'] ?></td>
                            <td><?= $value['descripcion'] ?></td>
                            <?php
                            $imagen = Utilidades::rutaImagen('../views/img/banner/') . $value['id'] . '/' . $value['url_image']
                            ;
                            if (file_exists($imagen)) {
                                ?>
                                <td>
                                    <img src="<?= Utilidades::rutaImagen('../views/img/banner/') . $value['id'] . '/' . $value['url_image'] ?>"
                                        height="50" />
                                </td>
                                <?php
                            } else {
                                ?>
                                <td>
                                    <img src="<?= Utilidades::rutaImagen('../views/img/banner/') . 'default.jpg' ?>"
                                        height="50" />
                                </td>
                                <?php
                            }
                            ?>

                            <td><?= $value['url_web'] ?></td>
                            <td><?= $value['precio'] ?></td>
                            <td><?= $value['estado'] ?></td>
                            <td><?php $tema = MdlCrud::showValueField("temas", "nombre", "id", $value['idtema']);
                            echo $tema['nombre']
                                ?>
                            </td>
                            <td>
                                <a class="btn btn-info" href="index.php?ruta=edit&id=<?= $value['id'] ?>">Editar
                                    producto</a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>

        </div>
    </div>
</section>