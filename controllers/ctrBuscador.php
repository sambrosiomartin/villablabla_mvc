<?php
require_once "models/mdlBuscador.php";
require_once "utilidades.php";
class CtrBuscador
{
    public function ctrBuscar($origen, $destino, $fecha)
    {
        $origen_validar = Utilidades::validate($origen, 'nombre');
        $destino_validar = Utilidades::validate($destino, 'nombre');
        if ($origen_validar && $destino_validar) {
            if ($origen != $destino) {
                $validar_fecha = Utilidades::minimumDate($fecha);
                if ($validar_fecha) {
                    $origen_final = "%" . $origen . "%";
                    $destino_final = "%" . $destino . "%";
                    $values = mdlBuscador::mdlBuscar($origen_final, $destino_final, $fecha);
                    return $values;
                } else {
                    echo "<script>
                        window.alert('No puede introducir una fecha inferior a la actual');
                        </script>";
                }
            }
            else{
                echo "<script>
                    window.alert('Origen y destino no pueden ser iguales');
                    </script>";
            }
        } else {
            echo "<script>
                    window.alert('Error en origen o destino');
                    </script>";
        }
    }
}