<?php 
    require_once "conexion.php";
    require_once "tablas.php";
    class MdlBuscador extends Tablas{
        static public function mdlBuscar($origen, $destino, $fecha){
            $conection=Conexion::conection();
            $sql="SELECT * FROM viajes";
//PARA EL BUSCADOR PONER LOS % Y COMILLAS DENTRO DE LAS COMAS PARA QUE NO HAYA ERRORES
            $sql.=" WHERE origen LIKE ? AND destino LIKE ? AND fecha LIKE ?";
            $query = $conection->prepare($sql);
            $query->execute(array($origen, $destino, $fecha));
            $values = $query->fetchAll();
            return $values;
        }
    }