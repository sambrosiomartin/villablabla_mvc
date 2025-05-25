<?php
require_once "models/mdlUsers.php";
class CtrUsers
{
    public function ctrGetAllUsers($table,$field,$value){
        $listadoUsuarios = MdlUsers::showRegister($table, $field, $value);
        return $listadoUsuarios;
    }
    public function ctrDeleteUser($table, $field, $id){
        $deleteUser = MdlUsers::deleteRow($table, $field, $id);
        if($deleteUser){
            $deleteAutos=Tablas::deleteRow("automoviles", "id_usuario", $id);
            $viajes=Tablas::showRegister("viajes","id_usuario", $id);          
            foreach($viajes as $value){
                $deleteParadas=Tablas::deleteRow("paradas", "id_viaje", $value['id']);
                $deleteOpcionesViaje=Tablas::deleteRow("viajesopciones", "idViaje", $value['id']);
                $deleteReservas=Tablas::deleteRow("reservas", "id_viaje", $value['id']);
            }
        $deleteViajes=Tablas::deleteRow("viajes", "id_usuario", $id);
            echo "<script>
                    window.alert('Se ha eliminado al usuario con éxito');
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