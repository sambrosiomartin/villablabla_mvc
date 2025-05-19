<?php
require_once "conexion.php";
require_once "tablas.php";
class MdlOpciones extends Tablas
{
    static public function mdlInsertarOpcionViaje($table, $idViaje,$idOpcion){
        $conection = Conexion::conection();
        $sql= "INSERT INTO ". $table." (idViaje,idOpcion) VALUES (?,?)";
        $query = $conection->prepare($sql);
        if ($query->execute(array(
            $idViaje,$idOpcion))) {
            return true;
        } else {
            return false;
        }
    }
}