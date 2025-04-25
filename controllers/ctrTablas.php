<?php
require_once "models/mdlViajes.php";
require_once "utilidades.php";
class CtrTablas
{
    public function ctrShowRegister($table, $id,$value){
        $values=MdlViajes::showRegister($table,$id,$value);
        return $values;
    }
}