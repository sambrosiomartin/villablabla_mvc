<?php
session_start();    
    include("views/modules/header.php");
    if (isset($_GET['ruta'])) {
        if (
            $_GET['ruta'] == "inicio" ||
            $_GET['ruta'] == "registro" ||
            $_GET['ruta'] == "login" ||
            $_GET['ruta'] == "logout" ||
            $_GET['ruta'] == "paginaUsuario" ||
            $_GET['ruta'] == "crearViaje" ||
            $_GET['ruta'] == "paginaViaje"
        ) {
            if(!isset($_SESSION['username'])){
//SI NO HAY SESION NO SE PODRA ACCEDER POR LA RUTA AL LOGOUT
                if($_GET['ruta']!="logout"){
                    include("views/modules/" . $_GET['ruta'] . ".php");
                }
            }
            else{
                if($_GET['ruta']!="registro" && $_GET['ruta']!="login"){
//SI HAY SESION ABIERTA, NO SE PODRA ACCEDER POR LA RUTA A LOGIN Y REGISTRO
                    include("views/modules/" . $_GET['ruta'] . ".php");
                }
            }
        } else {
            include("views/modules/404.php");
        }
    } else {
        include("views/modules/inicio.php");
    }
    include("views/modules/footer.php");

