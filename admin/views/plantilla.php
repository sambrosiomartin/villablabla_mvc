<?php
session_start();
if (isset($_SESSION)) {
    if ($_SESSION['tipoUsuario'] == "administrador") {
        include ("views/modulos/header.php");
        if (isset($_GET['ruta'])) {
            if (
                $_GET['ruta'] == "inicio" ||
                $_GET['ruta'] == "logout" 
                
            ) {
//SOLO ES NECESARIO QUE HAYA LOGOUT PORQUE EL LOGIN Y/O REGISTER ESTARÍAN EN LA PAGINA PRINCIPAL                    
                    if (isset($_SESSION['username'])) {
                        if ($_GET['ruta'] != "logout" ) {
                            include ("views/modulos/" . $_GET['ruta'] . ".php");
                        }
                    } 
            } else {
                include ("views/modulos/404.php");
            }
        } else {
            include ("views/modulos/inicio.php");
        }
        include ("views/modulos/footer.php");
    }
    else{
//SI NO ESTA LA VARIABLE DE SESION DE USUARIO O SE DESLOGUEA EL ADMIN SE RECONDUCE AL INICIO PRINCIPAL
        echo "<script>window.location='../inicio'</script>";
    }
}
