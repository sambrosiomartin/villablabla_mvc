
<?php
require_once "models/mdlOpciones.php";
require_once "utilidades.php";
class CtrOpciones
{
    //METODO PARA VER ORIGEN DEL ID DE VIAJE, SI ES RECIEN CREADO O SI ES A POSTERIORI
    public function ctrIdViaje($idViaje){
        if($idViaje==null){
            $idUsuario = Tablas::showValueField("usuarios", "id", "username", $_SESSION['username']);
            $lastTravel=Tablas::showLastRow("viajes","id_usuario",$idUsuario['id']);
            $idViaje = $lastTravel[0]['id'];
        }
        else{
            if(isset($_POST) && !empty($_POST)){
                $idViaje=$_POST['idViaje'];
            }
            else{
                echo "<script>
                        window.alert('No se han insertado los datos');
                        window.location='paginaUsuario';
                    </script>";
            }
        }
        return $idViaje;
    }
    //METODO INSERTAR OPCIONES MEDIANTE ARRAY DE OPCIONES EN SELECTOR MÚLTIPLE
    public function ctrInsertarOpcionViaje($idViaje)
    {
        if (isset($_POST) && !empty($_POST)) {
            $table = "viajesopciones";
            $opciones = $_POST['opciones'];
            $interruptor = true;
            foreach ($opciones as $key=> $value) {
                $insertOpcion = MdlOpciones::mdlInsertarOpcionViaje($table, $idViaje, $value);
                if (!$insertOpcion) {
                    $interruptor = false;
                }
            }
            if ($interruptor == true) {
                echo "<script>
                        window.alert('Se han insertado los datos correctamente');
                        window.location='paginaUsuario';
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
    //METODO PARA MOSTRAR OPCIONES DE VIAJE
    public function ctrMostrarOpcionesViaje($idViaje){
        $table = "viajesopciones";
        $opcionesViaje = MdlOpciones::showRegister($table,"idViaje",$idViaje);
        $opcionesName=array();
        foreach($opcionesViaje as $value){
            $opcionesName[] = MdlOpciones::showRegister("opciones","id",$value['idOpcion']);
        }
        return $opcionesName;
    }
    //METODO OPCIONES QUE QUEDAN PARA ELEGIR
    public function ctrOpcionesRestantes($opcionesViaje){
        $listadoOpciones=Tablas::showRegister("opciones",null,null);
        $opcionesRestantes=array();
        foreach($listadoOpciones as $value){
            $encontrado = false;
            foreach($opcionesViaje as $value2){
                if($value['id']==$value2[0]['id']){
                    $encontrado = true;
                }
            }
            if(!$encontrado){
                $opcionesRestantes[]=$value;
            }
        }
        return $opcionesRestantes;
    }
}
