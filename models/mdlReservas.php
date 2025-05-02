<?php
require_once "conexion.php";
require_once "tablas.php";
class MdlReservas extends Tablas
{
    static public function mdlHacerReserva($table, $datos){
        $conection = Conexion::conection();
        $sql = "INSERT INTO " . $table . " (num_plazas_reservadas, estado, id_viaje, id_usuario) VALUES (?,?,?,?)";
        $query = $conection->prepare($sql);
        if ($query->execute(array(
            $datos['num_plazas_reservadas'],
            $datos['estado'],
            $datos['id_viaje'],
            $datos['id_usuario'],
        ))) {
            return true;
        } else {
            return false;
        }
    }
    static public function mdlAsientosOcupados($table,$id_viaje){
        $conection = Conexion::conection();
        $sql = "SELECT SUM(num_plazas_reservadas) as suma FROM ".$table." WHERE id_viaje = ? and estado in ('aceptada','espera')";
        $query=$conection->prepare($sql);
        $query->execute(array($id_viaje));
        $return_value=$query->fetch();
        return $return_value;
    }
    //update reservas
    static public function mdlUpdate($table, $field,$value,$id)
    {
        $conection = Conexion::conection();
        $sql = "UPDATE " . $table . " SET ".$field." = ? WHERE id= ?";
        $query = $conection->prepare($sql);
        if (
            $query->execute(
                array(
                    $value,
                    $id
                )
            )
        ) {
            return true;
        } else {
            return false;
        }
    }
}