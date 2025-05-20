<div class="container">		
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">Inicio</a></li>
				<li><a href="#">PortFolio</a></li>
				<li class="active">Editar</li>
			</ol>
			<div class="col-md-7">
				<h3 ><span class="glyphicon glyphicon-edit"></span> Editar PortFolio</h3>
				<form class="form-horizontal" id="editar_banner" enctype="multipart/form-data" method="POST" action="">	
                    <input type="hidden" name="id" value="<?=$product['id']?>"/>	 			 
					<div class="form-group">
						<label for="titulo" class="col-sm-3 control-label">Titulo</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="titulo" value="<?=$product['titulo']?>" required name="titulo">							
						</div>
					</div>
					<div class="form-group">
						<label for="descripcion_corta" class="col-sm-3 control-label">Descripción corta</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="descripcion_corta" value="<?=$product['descripcion_corta']?>" required name="descripcion_corta">
						</div>
					</div>	  			  
					<div class="form-group">
						<label for="descripcion" class="col-sm-3 control-label">Descripción</label>
						<div class="col-sm-9">
							<textarea class='form-control' name="descripcion" id="descripcion" required rows=8><?=$product['descripcion']?>
							</textarea>
						</div>
					</div>					
					<div class="form-group">
						<label for="url_web" class="col-sm-3 control-label">URL Sitio Web</label>
						<div class="col-sm-9">
							<input type="url" class="form-control" id="url_web" value="<?=$product['url_web']?>"  name="url_web">
						</div>
					</div>		
                    <div class="form-group">
						<label for="precio" class="col-sm-3 control-label">Precio</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="precio" value="<?=$product['precio']?>"  name="precio">
						</div>
					</div>	  		  			  
					<div class="form-group">
						<label for="estado" class="col-sm-3 control-label">Tema</label>
						<div class="col-sm-3">
							<select class="form-control" id="tema" required name="idtema">
								<option value="<?=$product['idtema']?>" selected>
                                    <?=$selected_tema['nombre']?>
                                </option>
                                <?php 
                                    foreach($temas as $value){
                                ?>
                                    <option value="<?=$value['id']?>"><?=$value['nombre']?></option>
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
                                <?php 
                                    if($product['estado']=="No Disponible"){
                                ?>
                                    <option value="0" selected>No Disponible</option>
								    <option value="1">Activo</option>	
                                <?php 
                                    }
                                    else
                                    {
                                ?>
                                    <option value="1" selected>Activo</option>
								    <option value="0">No Disponible</option>	
                                <?php         
                                    }
                                ?>
															
							</select>
						</div>
					</div>		  					  
					<div class="form-group">
						<div id='loader'></div>
						<div class='outer_div'></div>
						<hr/>
						<div class="col-sm-offset-9 col-sm-3">
							<button type="submit" class="btn btn-success">Actualizar datos</button>
						</div>
					</div>
				</form>			
			</div>
			<div class="col-md-5">
				<h3 ><span class="glyphicon glyphicon-picture"></span> Imagen</h3> 
				<form class="form-vertical" enctype="multipart/form-data" method="POST" action="editphoto">	
					<input type="hidden" name="id" value="<?=$product['id']?>"/>	 
					<div class="form-group">
						<div class="col-sm-12">
							<div class="fileinput fileinput-new" data-provides="fileinput">
                            <?php 
                            $imagen=Utilidades::rutaImagen('../views/img/banner/').$product['id'].'/'.$product['url_image']
;                            if(file_exists($imagen)){
                        ?>
                            <td>
                                <img src="<?=Utilidades::rutaImagen('../views/img/banner/').$value['id'].'/'.$value['url_image']?>" height="100"/>
                            </td>
                        <?php 
                            }
                            else{
                        ?>
                            <td>
                                <img src="<?=Utilidades::rutaImagen('../views/img/banner/').'default.jpg'?>" height="100"/>
                            </td>
                        <?php
                            }
                        ?>
								<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 250px; max-height: 250px;"></div>
								<div>
									<p class="text-center"><span class="btn btn-warning btn-file"><input type="file" name="url_image" class="form-control-file"></span></a></p>
									<p class="text-center">
										<label class="checkbox-inline"><input type="checkbox" name="delete_photo" value="">Borrar Imagen</label>
									</p>
																		
								</div>
								<div class="col-sm-offset-4 col-sm-3">
								<button type="submit" class="btn btn-success">Actualizar Imagen</button>
						</div>
							</div>
							<div class="upload-msg"></div>					
						</div>			
					</div>	  			  
				</form>
			</div>
		</div> 
	</div><!-- /container -->