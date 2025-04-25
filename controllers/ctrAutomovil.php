<?php
require_once "models/mdlUsers.php";
class CtrAutomovil
{
    //metodo controlador registrar vehiculo
    public function ctrRegisterAuto($username)
    {
        //VALIDACION
        if (isset($_POST) && !empty($_POST)) {
            $marca = Utilidades::validate($_POST['marca'], 'texto');
            $modelo = Utilidades::validate($_POST['modelo'], 'texto');
            $color = Utilidades::validate($_POST['color'], 'texto');
            $num_plazas = $_POST['numero_plazas'];
            if ($marca && $modelo && $color && $num_plazas >= 1) {
                $query_id = Tablas::showValueField("usuarios", "id", "username", $username);
                $id = $query_id['id'];
                if (isset($id)) {
                    $table = "automoviles";
                    $datos = array(
                        "marca" => $_POST['marca'],
                        "modelo" => $_POST['modelo'],
                        "color" => $_POST['color'],
                        "numero_plazas" => $num_plazas,
                        "id_usuario" => $id
                    );
                    $registra_auto_nuevo = MdlAutomovil::mdlRegisterAuto($table, $datos);
                    if ($registra_auto_nuevo == true) {
                        echo "<script>
                            window.alert('El automovil se ha registrado con éxito');
                            window.location='paginaUsuario';
                        </script>";
                        return true;
                    } else {
                        echo "<script>
                            window.alert('El registro NO se ha realizado');
                        </script>";
                        return false;
                    }
                } else {
                    echo "<script>
                        window.alert('Intenta registrar una automovil sin estar logueado');
                    </script>";
                }
            } else {
                echo "<script>
                    window.alert('Error en alguno de los datos introducidos');
                </script>";
            }
        }
    }
    //metodo controlador editar datos vehículo
    public function ctrUpdateVehiculo()
    {
        //VALIDACION
        if (isset($_POST) && !empty($_POST)) {
            $marca = Utilidades::validate($_POST['marca'], 'texto');
            $modelo = Utilidades::validate($_POST['modelo'], 'texto');
            $color = Utilidades::validate($_POST['color'], 'texto');
            $num_plazas = $_POST['numero_plazas'];
            if ($marca && $modelo && $color && $num_plazas >= 1) {
                $table = "automoviles";
                $field = "id";
                $value = $_POST['id'];
                $query = MdlUsers::showRegister($table, $field, $value);
                if (!empty($query)) {
                    $datos = array(
                        "marca" => $_POST['marca'],
                        "modelo" => $_POST['modelo'],
                        "color" => $_POST['color'],
                        "numero_plazas" => $num_plazas,
                        "id" => $_POST['id']
                    );
                    $edita_auto = MdlAutomovil::mdlUpdateVehiculo($table, $datos);
                    if ($edita_auto == true) {
                        echo "<script>
                            window.alert('El automovil se ha modificado con éxito');
                            window.location='paginaUsuario';
                        </script>";
                        return true;
                    } else {
                        echo "<script>
                            window.alert('No se ha podido modificar los datos del vehículo');
                        </script>";
                        return false;
                    }
                } else {
                    echo "<script>
                        window.alert('No se encuentra el automovil en los registros');
                    </script>";
                }
            } else {
                echo "<script>
                    window.alert('Error en alguno de los datos introducidos');
                </script>";
            }
        }
    }
    //mÃ©todo controlador eliminar vehículo
    public function ctrDeleteVehiculo()
    {
        if (isset($_POST) && !empty($_POST)) {
            $table="automoviles";
            $datos = array("id" => $_POST['id']);
            $delete = MdlAutomovil::mdlDeleteVehiculo($table,$datos);
            if ($delete) {
                echo "<script>
                    window.alert('Se ha eliminado el registro con éxito');
                    window.location='paginaUsuario';
                </script>";
                return true;
            } else {
                echo "<script>
                    window.alert('No se ha podido eliminar el registro');
                </script>";
                return false;
            }
        }
        else{
            echo "<script>
                    window.alert('Se ha producido un error');
                </script>";
        }
    }
}
