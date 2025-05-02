<?php
require_once "models/mdlReservas.php";
require_once "utilidades.php";
class CtrReservas
{
    //metodo de reserva de viaje
    public function ctrHacerReserva()
    {
        //VALIDACION
        if(isset($_POST) && !empty($_POST)){
            $num_plazas_reservadas = Utilidades::validate($_POST['num_plazas_reservadas'], 'entero');
            $estado = Utilidades::validate($_POST['estado'], 'nombre');
            if($num_plazas_reservadas && $estado){
                $existe_viaje=Tablas::showRegister("viajes","id",$_POST['id_viaje']);
//si existe el viaje y no se ha borrado 
                if(!empty($existe_viaje)){
                    $table="reservas";
                    $datos = array(
                        "num_plazas_reservadas" => $_POST['num_plazas_reservadas'],
                        "estado" => $_POST['estado'],
                        "id_viaje" => $_POST['id_viaje'],
                        "id_usuario" => $_POST['id_usuario']
                    );
                    $efectuar_reserva=MdlReservas::mdlHacerReserva($table,$datos);
//si el método se ha aplicado bien
                    if($efectuar_reserva){
                        echo "<script>
                            window.alert('La reserva se ha creado con éxito');
                            window.location='inicio';
                        </script>";
                        return true;
                    }
                    else{
                        echo "<script>
                            window.alert('La reserva no se ha podido crear, por favor, vuelva a intentarlo');
                        </script>";
                    }
                }
                else{

                }
            }
            else{
                echo "<script>
                        window.alert('Error en alguno de los datos introducidos');
                    </script>";
            }
        }
       
    }
    public function ctrAsientosOcupados($id_viaje){
        $table="reservas";
        $value=MdlReservas::mdlAsientosOcupados($table,$id_viaje);
        return $value;
    }
    //metodo que avisa si hay reservas en espera
    public function ctrReservasEspera($id_viaje){
        $reservas=Tablas::showRegister("reservas","id_viaje",$id_viaje);
        $interruptor=false;
        foreach($reservas as $value){
            if($value['estado']=="espera"){
                $interruptor=true;
            }
        }
        return $interruptor;
    }
    //metodo update reservas
    public function ctrUpdate($id)
    {
        if (isset($_POST) && !empty($_POST)) {
                $table = "reservas";
                $field = "id";
                $value = $id;
                $read = MdlUsers::showRegister($table, $field, $value);
                /*if (!empty($read)) {
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
            }*/
        }
    }
}