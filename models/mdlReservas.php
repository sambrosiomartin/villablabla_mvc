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
}