<?php
require_once "models/mdlViajes.php";
require_once "utilidades.php";
class CtrViajes
{
    //metodo ayuda a viajes activos y semanales sabiendo que hay plazas o no para que aparezcan visibles
    public function ctrViajesConAsientos($values)
    {
        $finalvalues = array();
        foreach ($values  as $onetravelvalues) {
            $num_plazas = Tablas::showValueField("automoviles", "numero_plazas", "id", $onetravelvalues['id_coche']);
            $plazas_ocupadas = MdlReservas::mdlAsientosOcupados("reservas", $onetravelvalues['id']);
            $plazas_vacias = $num_plazas['numero_plazas'] - $plazas_ocupadas['suma'];
            if ($plazas_vacias > 0) {
                $finalvalues[] = $onetravelvalues;
            }
        }
        return $finalvalues;
    }
    //método de todos los viajes de la semana
    public function ctrViajesSemana()
    {
        $values = mdlViajes::mdlViajesSemana();
        $viaje = new CtrViajes();
        $finalvalues = $viaje->ctrViajesConAsientos($values);
        return $finalvalues;
    }
    //metodo listar viajes activos del usuario
    public function ctrViajesActivos($value)
    {
        $values = MdlViajes::mdlViajesActivos($value);
        $viaje = new CtrViajes();
        $finalvalues = $viaje->ctrViajesConAsientos($values);
        return $finalvalues;
    }

    //metodo crear viaje
    public function ctrCrearViaje()
    {
        //VALIDACION
        if (isset($_POST) && !empty($_POST)) {
            if ($_POST['origen'] != "otros") {
                $origen = $_POST['origen'];
            } else {
                $origen = $_POST['otros_origenes'];
            }
            if ($_POST['destino'] != "otros") {
                $destino = $_POST['destino'];
            } else {
                $destino = $_POST["otros_destinos"];
            }
            $fecha = Utilidades::minimumDate($_POST['fecha']);
            $validar_origen = Utilidades::validate($origen, 'apellido');
            $validar_destino = Utilidades::validate($destino, 'apellido');
            $direccion_origen = Utilidades::validate($_POST['direccion_origen'], 'texto');
            $direccion_destino = Utilidades::validate($_POST['direccion_destino'], 'texto');
            $tiempo_estimado = $_POST['tiempo_estimado'];
            $tiempo_estimado_final = Utilidades::validate($tiempo_estimado, 'entero');
            $regularidad = Utilidades::validate($_POST['regularidad'], 'texto');
            $descripcion = Utilidades::campoVacio($_POST['descripcion']);
            $descripcion_final = Utilidades::validate($descripcion, 'texto');
            if ($fecha && $validar_origen && $validar_destino && $direccion_origen && $direccion_destino && $tiempo_estimado >= 1 && $tiempo_estimado_final && $regularidad && $descripcion_final) {
                $table = "viajes";
                $datos = array(
                    "fecha" => $_POST['fecha'],
                    "hora_salida" => $_POST['hora_salida'],
                    "origen" => $origen,
                    "destino" => $destino,
                    "direccion_origen" => $_POST['direccion_origen'],
                    "direccion_destino" => $_POST['direccion_destino'],
                    "tiempo_estimado" => $_POST['tiempo_estimado'],
                    "regularidad" => $_POST['regularidad'],
                    "descripcion" => $descripcion,
                    "id_usuario" => $_POST['id_usuario'],
                    "id_coche" => $_POST['id_coche']
                );
                $existe_viaje = MdlViajes::mdlEvitarViajesIguales($table, $datos);
                if (empty($existe_viaje)) {
                    $viaje = MdlViajes::mdlCreateViaje($table, $datos);
                    if ($viaje) {
                        echo "<script>
                            window.alert('El viaje se ha creado con éxito');
                            window.location='inicio';
                        </script>";
                        return true;
                    } else {
                        echo "<script>
                            window.alert('El viaje no se ha podido registrar');
                        </script>";
                    }
                } else {
                    echo "<script>
                            window.alert('Ya existe el viaje a la misma hora, fecha, origen y destino');
                        </script>";
                }
            } else {
                echo "<script>
                        window.alert('Error en alguno de los datos introducidos');
                    </script>";
            }
        }
    }
    //metodo controlador update viaje
    public function ctrUpdate()
    {
        if (isset($_POST) && !empty($_POST)) {
            $fecha = Utilidades::minimumDate($_POST['fecha']);
            $direccion_origen = Utilidades::validate($_POST['direccion_origen'], 'texto');
            $direccion_destino = Utilidades::validate($_POST['direccion_destino'], 'texto');
            $tiempo_estimado = $_POST['tiempo_estimado'];
            $tiempo_estimado_final = Utilidades::validate($tiempo_estimado, 'entero');
            $regularidad = Utilidades::validate($_POST['regularidad'], 'texto');
            $descripcion = Utilidades::campoVacio($_POST['descripcion']);
            $descripcion_final = Utilidades::validate($descripcion, 'texto');
            if ($fecha && $direccion_origen && $direccion_destino && $tiempo_estimado >= 1 && $tiempo_estimado_final && $regularidad && $descripcion_final) {
                $table = "viajes";
                $datos = array(
                    "fecha" => $_POST['fecha'],
                    "hora_salida" => $_POST['hora_salida'],
                    "destino" => $_POST['destino'],
                    "origen" => $_POST['origen'],
                    "id_usuario" => $_POST['id_usuario'],
                    "direccion_origen" => $_POST['direccion_origen'],
                    "direccion_destino" => $_POST['direccion_destino'],
                    "tiempo_estimado" => $_POST['tiempo_estimado'],
                    "regularidad" => $_POST['regularidad'],
                    "descripcion" => $descripcion,
                    "id_coche" => $_POST['id_coche'],
                    "id" => $_POST['id']
                );
                $existe_viaje = MdlViajes::showRegister($table, "id", $datos['id']);
                if (!empty($existe_viaje)) {
                    $viajes_iguales = Utilidades::DatosCambiadosViaje($table, $datos);
                    if ($viajes_iguales) {
                        $viaje = MdlViajes::mdlUpdateViaje($table, $datos);
                        if ($viaje) {
                            echo "<script>
                                window.alert('El viaje se ha modificado con éxito');
                                window.location='paginaUsuario';
                            </script>";
                            return true;
                        } else {
                            echo "<script>
                                window.alert('El viaje no se ha podido modificar');
                            </script>";
                        }
                    } else {
                        echo "<script>
                            window.alert('Ya tiene otro viaje con los mismos datos');
                        </script>";
                    }
                } else {
                    echo "<script>
                            window.alert('No existe el viaje que intenta modificar');
                        </script>";
                }
            } else {
                echo "<script>
                window.alert('Alguno de los valores introducidos es incorrecto');
            </script>";
                return false;
            }
        }
    }
}
