<?php
require_once "models/tablas.php";
require_once "utilidades.php";
class CtrTablas
{
    public function ctrShowRegister($table, $id,$value){
        $values=Tablas::showRegister($table,$id,$value);
        return $values;
    }
    public function ctrshowValueField($table,$field1,$field2,$value){
        $values=Tablas::showValueField($table,$field1,$field2,$value);
        return $values;
    }
}