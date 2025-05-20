<?php 
//NUNCA PONER NOMBRE CON GUION BAJO
if(isset($_POST) && $_POST!=""){
   $photo=new CtrCrud();
   $change_photo=$photo->ctrUpdateImage();
}
