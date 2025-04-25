<?php
require_once "conexion.php";
require_once "tablas.php";
class MdlUsers extends Tablas
{
    //CREATE - CREAR UN USUARIO - REGISTRO
    static public function mdlRegister($table, $datos)
    {
        $conection = Conexion::conection();
        $sql = "INSERT INTO " . $table . " ( nombre, apellido1, apellido2, username, password, telefono, foto, direccion, email) VALUES (?,?,?,?,?,?,?,?,?) ";
        $query = $conection->prepare($sql);
        if ($query->execute(array(
            $datos['nombre'],
            $datos['apellido1'],
            $datos['apellido2'],
            $datos['username'],
            $datos['password'],
            $datos['telefono'],
            $datos['foto'],
            $datos['direccion'],
            $datos['email']
        ))) {
            return true;
        } else {
            return false;
        }
    }
    //UPDATE - MODIFICAR DATOS DEL USUARIO
    //////////UPDATE
    static public function mdlUpdate($table, $datos)
    {
        $conection = Conexion::conection();
        $sql = "UPDATE " . $table . " SET nombre = ?, apellido1 = ?, apellido2 = ?, email = ?, telefono = ?, direccion = ?, foto = ? WHERE id= ?";
        $query = $conection->prepare($sql);
        if (
            $query->execute(
                array(
                    $datos['nombre'],
                    $datos['apellido1'],
                    $datos['apellido2'],
                    $datos['email'],
                    $datos['telefono'],
                    $datos['direccion'],
                    $datos['foto'],
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
