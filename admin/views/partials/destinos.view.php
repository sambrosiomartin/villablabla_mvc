<div class="container col-md-9">
    <div class="row">
        <div class="col py-3">
            <h3>GESTIÓN DE LUGARES - DESTINO</h3>
            <p class="lead">
                En esta página podrá ver un listado de los lugares que los ususarios pueden elegir y crean y podrá gestionar creación, modificación y eliminación</p>
        </div>
        <table id="myTableUsers" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Nombre Destino</th>
                    <th>Repetición</th>
					<th>Opciones</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <!--AQUI COMIENZA EL FOREACH-->
                <?php foreach ($destinosCuenta as $value) {
                ?>
                    <tr>
                        <td>
                            <?= $value['destino'] ?>
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