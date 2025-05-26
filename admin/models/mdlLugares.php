<?php
require_once "conexion.php";
require_once "tablas.php";
class MdlLugares extends Tablas
{
    static public function mdlCuentaLugares($table, $field){
        $conection = Conexion::conection();
        $sql = "SELECT ".$field.", COUNT(*) FROM " . $table ." GROUP BY ".$field;
        $query = $conection->query($sql);
        $values = $query->fetchAll();
        return $values;
    }
}