<?php
require_once "models/mdlViajes.php";
class ctrViajes
{
    public function ctrGetAllViajes($table,$field,$value){
        $listadoViajes = MdlUsers::showRegister($table, $field, $value);
        return $listadoViajes;
    }
    
    public function ctrDeleteTravel($table, $field, $id){
        $deleteTravel = MdlViajes::deleteRow($table, $field, $id);
        if($deleteTravel){      
            $deleteParadas=Tablas::deleteRow("paradas", "id_viaje", $id);
            $deleteOpcionesViaje=Tablas::deleteRow("viajesopciones", "idViaje", $id);
            $deleteReservas=Tablas::deleteRow("reservas", "id_viaje", $id);
            echo "<script>
                    window.alert('Se ha eliminado el viaje y subtablas con éxito');
                    window.location='inicio';
                </script>";
        }
        else{
            echo "<script>
                    window.alert('Se ha producido un error');
                </script>";
        }
    }
}