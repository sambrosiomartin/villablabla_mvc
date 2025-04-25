<?php
require_once "conexion.php";
class Tablas
{
    static public function showRegister($table, $campo, $valor)
    {
        $conection = Conexion::conection();
        if ($campo == null) {
            $sql = "SELECT * FROM " . $table;
            $query = $conection->query($sql);
            $valors = $query->fetchAll();
        } else {
            $sql = "SELECT * FROM " . $table . " WHERE " . $campo . " = ?";
            $query = $conection->prepare($sql);
            $query->execute(array($valor));
            $valors = $query->fetchAll();
        }
        return $valors;
    }
    static public function showValueField($table,$field1,$field2,$value){
        $conexion=Conexion::conection();
        $sql="SELECT ".$field1." FROM ".$table." WHERE ".$field2." = ?";
        $query=$conexion->prepare($sql);
        $query->execute(array($value));
        $return_value=$query->fetch();
        return $return_value;
    }
    static public function queryRandom($query,$field,$value){
        $conexion=Conexion::conection();
        $sql=$query." AND ".$field." = ?";
        $query=$conexion->prepare($sql);
        $query->execute(array($value));
        $values=$query->fetchAll();
        return $values;
    }
}