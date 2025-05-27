<?php
require_once "conexion.php";
require_once "tablas.php";
class MdlOpciones extends Tablas
{
   //método de creación de opciones
    static public function mdlInsertarOpcion($table,$datos){
        $conection = Conexion::conection();
        $sql = "INSERT INTO " . $table . " ( tipo_opcion, descripcion) VALUES (?,?) ";
        $query = $conection->prepare($sql);
        if ($query->execute(array(
            $datos['tipo_opcion'],
            $datos['descripcion']
        ))) {
            return true;
        } else {
            return false;
        }
   }
   //método de modificación de datos de la opción
   //UPDATE - MODIFICAR DATOS DEL VEHICULO
    //////////UPDATE
    static public function mdlUpdateOpcion($table, $datos)
    {
        $conection = Conexion::conection();
        $sql = "UPDATE " . $table . " SET tipo_opcion = ?, descripcion = ? WHERE id= ?";
        $query = $conection->prepare($sql);
        if (
            $query->execute(
                array(
                    $datos['tipo_opcion'],
                    $datos['descripcion'],
                    $datos['id']
                )
            )
        ) {
            return true;
        } else {
            return false;
        }
    }
}