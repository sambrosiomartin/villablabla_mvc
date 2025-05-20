<div class="container">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#">Inicio</a></li>
			<li><a href="#">PortFolio</a></li>
		</ol>
		<div class="col-md-7">
			<h3><span class="glyphicon glyphicon-edit"></span> Crear Producto</h3>
			<form enctype="multipart/form-data" method="POST" action="" class="form-horizontal" id="editar_banner">
				<div class="form-group">
					<label for="titulo" class="col-sm-3 control-label">Titulo</label>
					<div class="col-sm-9">
						<input type="text" name="titulo" class="form-control" id="titulo" required>
					</div>
				</div>
				<div class="form-group">
					<label for="descripcion_corta" class="col-sm-3 control-label">Descripción corta</label>
					<div class="col-sm-9">
						<input type="text" name="descripcion_corta" class="form-control" id="descripcion_corta"
							required>
					</div>
				</div>
				<div class="form-group">
					<label for="descripcion" class="col-sm-3 control-label">Descripción</label>
					<div class="col-sm-9">
						<textarea class='form-control' name="descripcion" id="descripcion" required>
							</textarea>
					</div>
				</div>
				<div class="form-group">
					<label for="url_web" class="col-sm-3 control-label">Precio</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="precio" name="precio" required>
					</div>
				</div>
				<div class="form-group">
					<label for="url_web" class="col-sm-3 control-label">URL Sitio Web</label>
					<div class="col-sm-9">
						<input type="url" class="form-control" id="url_web" name="url_web" required>
					</div>
				</div>
				<div class="form-group">
					<label for="estado" class="col-sm-3 control-label">Tema</label>
					<div class="col-sm-3">
						<select name="idtema" class="form-control" id="idtema" required >
							<option selected>Indica el tema</option>
							<?php
							foreach ($temas as $value) {
								?>
								<option value="<?= $value['id'] ?>"><?= $value['nombre'] ?></option>
							<?php
							}
							?>
						</select>
					</div>
					<div class="col-sm-2">
						<span class="btn btn-info"><span><a href="temas">Nuevo tema</a></span>
					</div>	
					<label for="estado" class="col-sm-1 control-label">Estado</label>
					<div class="col-sm-3">
						<select class="form-control" id="estado" required name="estado">
							<option value="0" selected>No Disponible</option>
							<option value="1">Activo</option>
						</select>
					</div>
					<input type="file" name="url_image" id="" required>
				</div>
				<div class="form-group">
					<div id='loader'></div>
					<div class='outer_div'></div>
					<hr />
					<div class="col-sm-offset-9 col-sm-3">
						<button type="submit" class="btn btn-success">Nuevo producto</button>
					</div>
				</div>
			</form>
		</div>

	</div>
</div><!-- /container -->