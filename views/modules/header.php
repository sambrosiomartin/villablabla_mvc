<?php
$mensajes = new CtrMensajes();
$datos = new CtrTablas();
if (isset($_SESSION['username'])) {
   $datosUsuario = $datos->ctrshowValueField("usuarios", "id", "username", $_SESSION['username']);
   $mensajesSinLeer = $mensajes->ctrShowMensajesSinLeer("COUNT(*)",$datosUsuario['id']);
}
$paradas_buscador = array(
   "Villablanca" => "villablanca",
   "Ayamonte" => "ayamonte",
   "Lepe" => "lepe",
   "Isla Cristina" => "islacristina",
   "Cartaya" => "cartaya",
   "Huelva centro" => "huelvacentro",
   "Huelva - Infanta Elena" => "infantaelena",
   "Huelva - Vázquez Díaz" => "vazquezdiaz",
   "Sevilla" => "sevilla",
   "Otros" => "otros"
);
include "views/partials/header.view.php";
