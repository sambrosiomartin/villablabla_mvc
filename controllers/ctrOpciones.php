
<?php
require_once "models/mdlOpciones.php";
require_once "utilidades.php";
class CtrOpciones
{
    //METODO INSERTAR OPCIONES MEDIANTE ARRAY DE OPCIONES EN SELECTOR MÚLTIPLE
    public function ctrInsertarOpcionViaje($idViaje)
    {
        if (isset($_POST) && !empty($_POST)) {
            $table = "viajesopciones";
            $opciones = $_POST['opciones'];
            $interruptor = true;
            foreach ($opciones as $value) {
                $insertOpcion = MdlOpciones::mdlInsertarOpcionViaje($table, $idViaje, $value['id']);
                if (!$insertOpcion) {
                    $interruptor = false;
                }
            }
            if ($interruptor == true) {
                echo "<script>
                        window.alert('El viaje se ha creado con éxito');
                        window.location='inicio';
                    </script>";
                return true;
            } else {
                echo "<script>
                    window.alert('Ha habido algún error en la inserción de alguna opción');
                </script>";
                return false;
            }
        } else {
            echo "<script>
                    window.alert('No se han recibido datos');
                </script>";
            return false;
        }
    }
}
