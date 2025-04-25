<?php
require_once "models/mdlUsers.php";
class CtrUsers
{
    public function ctrRegister()
    {
        //VALIDACION
        if (isset($_POST) && !empty($_POST)) {
            //var_dump($_FILES['foto']);
            $apellido2 = Utilidades::campoVacio($_POST['apellido2']);
            $direccion = Utilidades::campoVacio($_POST['direccion']);
            $name = Utilidades::validate($_POST['nombre'], 'nombre');
            $surname1 = Utilidades::validate($_POST['apellido1'], 'apellido');
            $surname2 = Utilidades::validate($apellido2, 'apellido');
            $address = Utilidades::validate($direccion, 'texto');
            $phone = Utilidades::validate($_POST['telefono'], 'telefono');
            $username = Utilidades::validate($_POST['username'], 'username');
            $password = Utilidades::validate($_POST['password'], 'password');
            $mail = Utilidades::validate_email($_POST['email']);
            if ($name && $surname1 && $surname2 && $address && $phone && $username && $password && $mail) {
                //SI EXISTE IMAGEN, INGRESARLA AL DISCO
                $table = "usuarios";
                $field = "username";
                $value = $_POST['username'];
                $query = MdlUsers::showRegister($table, $field, $value);
                if (empty($query)) {
                    //SI NO EXISTE EL USUARIO INGRESARLO A LA BBDD
                    $imagen = Utilidades::existImage($_FILES['foto'], 'views/images/users/', $_POST['username']);
                    //var_dump($imagen);
                    //ENCRIPTAR LA CONTRASEÑA
                    $encriptada = Utilidades::encriptPassword($_POST['password']);
                    $datos = array(
                        "nombre" => $_POST['nombre'],
                        "apellido1" => $_POST['apellido1'],
                        "apellido2" => $apellido2,
                        "username" => $_POST['username'],
                        "password" => $encriptada,
                        "telefono" => $_POST['telefono'],
                        "foto" => $imagen,
                        "direccion" => $direccion,
                        "email" => $_POST['email']
                    );
                    $insert = MdlUsers::mdlRegister($table, $datos);
                    if ($insert == true) {
                        echo "<script>
                        window.alert('El registro se ha realizado con éxito');
                        window.location='inicio';
                        </script>";
                        return true;
                    } else {
                        echo "<script>
                        window.alert('El registro NO se ha realizado');
                        </script>";
                    }
                } else {
                    echo "<script>
                        window.alert('El registro ya existe');
                        </script>";
                }
            } else {
                echo "<script>
                window.alert('Error en alguno de los datos introducidos');
                </script>";
            }
        }
    }
    public function ctrUpdate($username)
    {
        if (isset($_POST) && !empty($_POST)) {
            $apellido2 = Utilidades::campoVacio($_POST['apellido2']);
            $direccion = Utilidades::campoVacio($_POST['direccion']);
            $name = Utilidades::validate($_POST['nombre'], 'nombre');
            $surname1 = Utilidades::validate($_POST['apellido1'], 'apellido');
            $surname2 = Utilidades::validate($apellido2, 'apellido');
            $address = Utilidades::validate($direccion, 'texto');
            $phone = Utilidades::validate($_POST['telefono'], 'telefono');
            $mail = Utilidades::validate_email($_POST['email']);
            if ($name && $surname1 && $surname2 && $address && $phone && $mail) {
                $table = "usuarios";
                $field = "username";
                $value = $username;
                $read = MdlUsers::showRegister($table, $field, $value);
                if (!empty($read)) {
                    $ruta = 'views/images/users/';
                    $cambiar_foto = Utilidades::editarFotos($table, $value, $ruta, $_FILES['foto']);
                    $imagen = Utilidades::saveImageDisc($_FILES['foto'], $ruta, $username);
                    $datos = array(
                        "nombre" => $_POST['nombre'],
                        "apellido1" => $_POST['apellido1'],
                        "apellido2" => $_POST['apellido2'],
                        "email" => $_POST['email'],
                        "telefono" => $_POST['telefono'],
                        "direccion" => $_POST['direccion'],
                        "foto" => $_FILES['foto']['name'],
                        "id" => $_POST['id'],
                    );
                    $create = MdlUsers::mdlUpdate($table, $datos);
                    if ($create == true) {
                        echo "<script>
                            window.alert('Se ha modificado los datos de perfil con éxito');
                            window.location='paginaUsuario';
                        </script>";
                        return true;
                    } else {
                        echo "<script>
                            window.alert('No se ha podido modificar los datos de perfil');
                        </script>";
                        return false;
                    }
                } else {
                    echo "<script>
                        window.alert('El usuario ya existe');
                    </script>";
                    return false;
                }
            } else {
                echo "<script>
                window.alert('Alguno de los valores introducidos es incorrecto');
            </script>";
                return false;
            }
        }
    }
    public function ctrLogin()
    {
        if (isset($_POST) && !empty($_POST)) {
            //var_dump($_POST);
            $username = Utilidades::validate($_POST['username'], 'username');
            $password = Utilidades::validate($_POST['password'], 'password');
            if ($username && $password) {
                $table = "usuarios";
                $field = "username";
                $value = $_POST['username'];
                $query = MdlUsers::showRegister($table, $field, $value);
                //var_dump($query);
                $encriptada = Utilidades::encriptPassword($_POST['password']);
                if (!empty($query) && $query[0]['username'] == $_POST['username'] && $query[0]['password'] == $encriptada) {
                    $_SESSION['username'] = $_POST['username'];
                    echo "<script>
                        window.alert('Se ha logueado con éxito');
                        window.location='inicio';
                    </script>";
                } else {
                    echo "<script>
                        window.alert('El usuario o la contraseña es incorrecto');
                    </script>";
                }
            } else {
                echo "<script>
                window.alert('Error en alguno de los datos introducidos');
                </script>";
            }
        }
    }
    public function ctrLogout()
    {
        $_SESSION = array();
        unset($_SESSION['username']);
        session_destroy();
        echo "<script>
                window.alert('Ha cerrado sesión con éxito');
                window.location='inicio';
            </script>";
    }
}
