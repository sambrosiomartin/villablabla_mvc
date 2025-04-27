<?php
require_once "conexion.php";
require_once "tablas.php";
class MdlViajes extends Tablas
{
    static public function mdlHacerReserva(){
        $conection = Conexion::conection();
        /*$sql = "INSERT INTO " . $table . " (fecha, hora_salida, origen, destino, direccion_origen, direccion_destino, tiempo_estimado, regularidad, descripcion, id_usuario, id_coche) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
        $query = $conection->prepare($sql);
        if ($query->execute(array(
            $datos['fecha'],
            $datos['hora_salida'],
            $datos['origen'],
            $datos['destino'],
            $datos['direccion_origen'],
            $datos['direccion_destino'],
            $datos['tiempo_estimado'],
            $datos['regularidad'],
            $datos['descripcion'],
            $datos['id_usuario'],
            $datos['id_coche']
        ))) {
            return true;
        } else {
            return false;
        }*/
    }
}