<div style="margin-top:10em;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12" style="border:2px solid grey; padding: 25px;">
                <form enctype="multipart/form-data" action="" method="POST" class="row g-3">
                    <div class="col-md-4">
                        <label for="inputNombre" class="form-label">Nombre</label>
                        <input type="text" name="nombre" class="form-control" id="inputNombre" placeholder="Nombre" required />
                    </div>
                    <div class="col-md-4">
                        <label for="inputApellido1" class="form-label">Primer apellido</label>
                        <input type="text" name="apellido1" class="form-control" id="inputApellido1" placeholder="Primer apellido" required />
                    </div>
                    <div class="col-md-4">
                        <label for="inputApellido2" class="form-label">Segundo apellido</label>
                        <input type="text" name="apellido2" class="form-control" id="inputApellido2" placeholder="Segundo apellido" />
                    </div>
                    <div class="col-md-8">
                        <label for="inputDireccion" class="form-label">Dirección completa</label>
                        <input type="text" name="direccion" class="form-control" id="inputDireccion" placeholder="Introduzca dirección completa" />
                    </div>
                    <div class="col-md-4">
                        <label for="inputTelefono" class="form-label">Teléfono</label>
                        <input type="text" name="telefono" class="form-control" id="inputPhone" placeholder="Introduzca número de teléfono" maxlength="12" required />
                    </div>
                    <div class="col-md-6">
                        <label for="inputUsuario" class="form-label">Nombre de usuario</label>
                        <input type="text" name="username" class="form-control" id="inputUsuario" placeholder="Introduzca un nombre de usuario" required />
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword" class="form-label">Contraseña</label>
                        <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Introduzca una contraseña" required />
                    </div>
                    <div class="col-md-12">
                        <label for="inputEmail" class="form-label">Correo electrónico</label>
                        <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Introduzca una dirección de correo electrónico" />
                    </div>
                    <div class="col-md-4">
                        <label for="inputFoto" class="form-label">Imagen opcional</label>
                        <input type="file" id="inputFoto" class="imagen" name="foto">
                        <p class="help-block">Peso máximo de la foto: 2Mb</p>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Enviar datos</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>