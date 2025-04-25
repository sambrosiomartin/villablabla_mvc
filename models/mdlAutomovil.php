<?php
require_once "conexion.php";
require_once "tablas.php";
class MdlAutomovil extends Tablas
{
    //METODO registrar un auomovil
    public static function mdlRegisterAuto($table, $datos)
    {
        $conection = Conexion::conection();
        $sql = "INSERT INTO " . $table . " ( marca, modelo, numero_plazas, color, id_usuario) VALUES (?,?,?,?,?) ";
        $query = $conection->prepare($sql);
        if ($query->execute(array(
            $datos['marca'],
            $datos['modelo'],
            $datos['numero_plazas'],
            $datos['color'],
            $datos['id_usuario']
        ))) {
            return true;
        } else {
            return false;
        }
    }
    //UPDATE - MODIFICAR DATOS DEL VEHICULO
    //////////UPDATE
    static public function mdlUpdateVehiculo($table, $datos)
    {
        $conection = Conexion::conection();
        $sql = "UPDATE " . $table . " SET marca = ?, modelo = ?, numero_plazas = ?, color = ? WHERE id= ?";
        $query = $conection->prepare($sql);
        if (
            $query->execute(
                array(
                    $datos['marca'],
                    $datos['modelo'],
                    $datos['numero_plazas'],
                    $datos['color'],
                    $datos['id']
                )
            )
        ) {
            return true;
        } else {
            return false;
        }
    }
      //DELETE - ELIMINAR VEHÍCULO
      static public function mdlDeleteVehiculo($table, $datos)
      {
          $conection = Conexion::conection();
          $sql = "DELETE FROM " . $table . " WHERE id = ?";
          $query = $conection->prepare($sql);
          if (
              $query->execute(array($datos['id']))
          ) {
              return true;
          } else {
              return false;
          }
      }
}
