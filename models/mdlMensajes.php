<?php
require_once "conexion.php";
require_once "tablas.php";
class MdlMensajes extends Tablas
{
    //MOSTRAR LOS MENSAJES
    static public function mdlShowMensajes($table, $idEmisor, $idReceptor)
    {
        $conection = Conexion::conection();
        if ($idEmisor == $idReceptor) {
            $sql = "SELECT * FROM " . $table . " WHERE idEmisor=? OR idReceptor=? ORDER BY fechaHora ASC";
            $query = $conection->prepare($sql);
            $query->execute(array(
                $idEmisor,
                $idReceptor
            ));
        } else {
            $sql = "SELECT * FROM " . $table . " WHERE (idEmisor=? AND idReceptor=?) OR (idReceptor=? AND idEmisor=?) ORDER BY fechaHora ASC";
            $query = $conection->prepare($sql);
            $query->execute(array(
                $idEmisor,
                $idReceptor,
                $idEmisor,
                $idReceptor
            ));
        }
        $values = $query->fetchAll();
        return $values;
    }
    //METODO MOSTRAR NUMERO DE MENSAJES SIN LEER
    static public function mdlShowMensajesSinLeer($table, $value, $idReceptor)
    {
        $conection = Conexion::conection();
        $sql = "SELECT " . $value . " FROM " . $table . " WHERE idReceptor = ? AND status = 'noLeido'";
        $query = $conection->prepare($sql);
        $query->execute(array($idReceptor));
        $values = $query->fetch();
        return $values;
    }
    //METODO MOSTRAR MENSAJES SIN LEER GROUP ID EMISOR
    static public function mdlShowMensajesSinLeerAgrupado($table, $idReceptor)
    {
        $conection = Conexion::conection();
        $sql = "SELECT idEmisor, COUNT(*) as mensajesEmisor FROM " . $table . " WHERE idReceptor = ? and status = 'noLeido' GROUP BY idEmisor";
        $query = $conection->prepare($sql);
        $query->execute(array($idReceptor));
        $values = $query->fetchAll();
        return $values;
    }
    //METODO MOSTRAR CONVERSACIONES
    static public function mdlShowConversaciones($table)
    {
        $conection = Conexion::conection();
        $sql = "SELECT idEmisor, idReceptor, COUNT(*) as conversaciones FROM " . $table . " GROUP BY idEmisor,idReceptor ORDER BY COUNT(*) DESC";
        $query = $conection->prepare($sql);
        $query = $conection->query($sql);
        $values = $query->fetchAll();
        return $values;
    }
    //CREATE - CREAR UN MENSAJE - REGISTRO
    static public function mdlRegister($table, $datos)
    {
        $conection = Conexion::conection();
        $sql = "INSERT INTO " . $table . " ( cuerpoMensaje, idEmisor, idReceptor, status) VALUES (?,?,?,?) ";
        $query = $conection->prepare($sql);
        if ($query->execute(array(
            $datos['cuerpoMensaje'],
            $datos['idEmisor'],
            $datos['idReceptor'],
            $datos['status']
        ))) {
            return true;
        } else {
            return false;
        }
    }
    //metodo update mensajes
    static public function mdlCambiarStatus($table, $idEmisor, $idReceptor)
    {
        $conection = Conexion::conection();
        $sql = "UPDATE " . $table . " SET status = 'leido' WHERE idEmisor = ? AND idReceptor = ?";
        $query = $conection->prepare($sql);
        if (
            $query->execute(
                array(
                    $idEmisor,
                    $idReceptor
                )
            )
        ) {
            return true;
        } else {
            return false;
        }
    }
    //metodo eliminar mensaje a la vez
    static public function mdlEliminarMensaje($table,$id)
    {
        $conection = Conexion::conection();
        $sql = "DELETE FROM " . $table . " WHERE id = ?";
        $query = $conection->prepare($sql);
        if (
            $query->execute(array($id))
        ) {
            return true;
        } else {
            return false;
        }
    }
    //metodo eliminar conversacion entera
    static public function mdlEliminarConversacion($table,$idEmisor,$idReceptor)
    {
        $conection = Conexion::conection();
        $sql = "DELETE FROM " . $table . " WHERE (idEmisor = ? AND idReceptor = ?) OR (idEmisor = ? AND idReceptor = ?)";
        $query = $conection->prepare($sql);
        if (
            $query->execute(array(
                $idEmisor,
                $idReceptor,
                $idReceptor,
                $idEmisor
            ))
        ) {
            return true;
        } else {
            return false;
        }
    }   
}
