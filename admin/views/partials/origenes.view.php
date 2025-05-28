<div class="container col-md-9">
    <div class="row">
        <div class="col py-3">
            <h3>GESTIÓN DE LUGARES - ORIGEN</h3>
            <p class="lead">
                En esta página podrá ver un listado de los lugares que los ususarios pueden elegir y crean y podrá gestionar creación, modificación y eliminación</p>
        </div>
        <table id="myTableUsers" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Nombre Origen</th>
                    <th>Repetición</th>
					<th>Opciones</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <!--AQUI COMIENZA EL FOREACH-->
                <?php foreach ($origenesCuenta as $value) {
					//var_dump($value);
                ?>
                    <tr>
                        <td>
                            <?= $value['origen'] ?>
                        </td>
                        <td>
                            <?= $value['COUNT(*)'] ?>
                        </td>
						<td>
							<button type="button" class="btn btn-primary" data-dismiss="modal">Modificar</button>
						</td>
                    </tr>
                <?php } ?>
                <!--AQUI TERMINA EL FOREACH-->
            <tfoot>

            </tfoot>
        </table>
    </div>
</div>
