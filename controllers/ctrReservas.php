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
                if(!empty($existe_viaje)){
                    $table="reservas";
                    $datos = array(
                        "num_plazas_reservadas" => $_POST['num_plazas_reservadas'],
                        "estado" => $_POST['estado'],
                        "id_viaje" => $_POST['id_viaje'],
                        "id_usuario" => $_POST['id_usuario']
                    );
                    $efectuar_reserva=MdlReservas::mdlHacerReserva($table,$datos);
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
}