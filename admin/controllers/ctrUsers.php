<?php
require_once "models/mdlUsers.php";
class CtrUsers
{
    public function ctrGetAllUsers($table,$field,$value){
        $listadoUsuarios = MdlUsers::showRegister($table, $field, $value);
        return $listadoUsuarios;
    }
}