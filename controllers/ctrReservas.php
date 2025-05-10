<?php
require_once "models/mdlReservas.php";
require_once "utilidades.php";
class CtrReservas
{
    //metodo de reserva de viaje
    public function ctrHacerReserva()
    {
        //VALIDACION
        if (isset($_POST) && !empty($_POST)) {
            $num_plazas_reservadas = Utilidades::validate($_POST['num_plazas_reservadas'], 'entero');
            $estado = Utilidades::validate($_POST['estado'], 'nombre');
            if ($num_plazas_reservadas && $estado) {
                $existe_viaje = Tablas::showRegister("viajes", "id", $_POST['id_viaje']);
                //si existe el viaje y no se ha borrado 
                if (!empty($existe_viaje)) {
                    $table = "reservas";
                    $datos = array(
                        "num_plazas_reservadas" => $_POST['num_plazas_reservadas'],
                        "estado" => $_POST['estado'],
                        "id_viaje" => $_POST['id_viaje'],
                        "id_usuario" => $_POST['id_usuario']
                    );
                    $efectuar_reserva = MdlReservas::mdlHacerReserva($table, $datos);
                    //si el método se ha aplicado bien
                    if ($efectuar_reserva) {
                        echo "<script>
                            window.alert('La reserva se ha creado con éxito');
                            window.location='inicio';
                        </script>";
                        return true;
                    } else {
                        echo "<script>
                            window.alert('La reserva no se ha podido crear, por favor, vuelva a intentarlo');
                        </script>";
                    }
                } else {
                }
            } else {
                echo "<script>
                        window.alert('Error en alguno de los datos introducidos');
                    </script>";
            }
        }
    }
    public function ctrAsientosOcupados($id_viaje)
    {
        $table = "reservas";
        $value = MdlReservas::mdlAsientosOcupados($table, $id_viaje);
        return $value;
    }
    //metodo que avisa si hay reservas en espera
    public function ctrReservasEspera($id_viaje)
    {
        $reservas = Tablas::showRegister("reservas", "id_viaje", $id_viaje);
        $interruptor = false;
        foreach ($reservas as $value) {
            if ($value['estado'] == "espera") {
                $interruptor = true;
            }
        }
        return $interruptor;
    }
    //metodo update QUE SERVIRÁ PARA CAMIBAR EL ESTADO DE RESERVA Y EL NÚMERO DE ASIENTOS RESERVADOS
    public function ctrUpdate($field)
    {
        if (isset($_POST) && !empty($_POST)) {
            $table = "reservas";
            $campo = "id";
            $id = $_POST['id'];
            $read = MdlReservas::showRegister($table, $campo, $id);
            if (!empty($read)) {
                $update = MdlReservas::mdlUpdate($table, $field, $_POST['value_field'], $id);
                if ($update == true) {
                    echo "<script>
                            window.alert('Los datos de la reserva se han modificado con éxito');
                            window.location='paginaUsuario';
                        </script>";
                    return true;
                } else {
                    echo "<script>
                            window.alert('Se ha producido algún error, vuélvalo a intentar');
                        </script>";
                    return false;
                }
            } else {
                echo "<script>
                    window.alert('La reserva no existe');
                </script>";
                return false;
            }
        }
        else{
            echo "<script>
                    window.alert('Vuelva a intentarlo');
                </script>";
        }
    }
}
