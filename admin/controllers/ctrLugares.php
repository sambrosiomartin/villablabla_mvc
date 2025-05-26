<?php
require_once "models/mdlLugares.php";
class CtrLugares
{
    public function ctrLugares($table, $field, $field2, $value){
        $lugares=MdlLugares::showValueField($table, $field, $field2, $value);
        return $lugares;
    }
    public function ctrCountLugares($table,$field){
        $cuentaLugares=MdlLugares::mdlCuentaLugares($table,$field);
        return $cuentaLugares;
    }
}