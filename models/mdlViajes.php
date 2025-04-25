<?php
require_once "conexion.php";
require_once "tablas.php";
class MdlViajes extends Tablas
{
    //METODO LISTAR VIAJES SEMANA
    static public function mdlViajesSemana()
    {
        $conection = Conexion::conection();
        $sql = "SELECT * FROM viajes";
        $sql .= " WHERE fecha BETWEEN CURDATE() AND (CURDATE() + 7) order by destino ASC";
        $query = $conection->query($sql);
        $values = $query->fetchAll();
        return $values;
    }
    //METODO PARA EVITAR DOS VIAJES IGUALES
    public static function mdlEvitarViajesIguales($table,$datos){
        $conection = Conexion::conection();
        $sql = "SELECT * FROM ".$table." WHERE fecha = ? AND hora_salida = ? AND origen = ? AND destino = ? AND id_usuario = ?";
        $query=$conection->prepare($sql);
        $query->execute(array($datos['fecha'],$datos['hora_salida'],$datos['origen'],$datos['destino'],$datos['id_usuario']));
        $return_value=$query->fetch();
        return $return_value;
    }
    //METODO CREAR UN VIAJE
    public static function mdlCreateViaje($table, $datos)
    {
        $conection = Conexion::conection();
        $sql = "INSERT INTO " . $table . " (fecha, hora_salida, origen, destino, direccion_origen, direccion_destino, tiempo_estimado, regularidad, descripcion, id_usuario, id_coche) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
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
        }
    }
}
