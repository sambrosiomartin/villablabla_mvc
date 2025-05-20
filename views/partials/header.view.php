<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- SEO Meta Tags -->
    <meta name="description"
        content="Sync is a landing page HTML template built with Bootstrap 4 for presenting mobile apps to the online audience and for getting visitors to become users.">
    <meta name="author" content="Inovatik">
    <!--JS DATATABLES-->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
    <!--CSS DATATABLES-->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.css" />
    <!--MODAL-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
    <meta property="og:site_name" content="" /> <!-- website name -->
    <meta property="og:site" content="" /> <!-- website link -->
    <meta property="og:title" content="" /> <!-- title shown in the actual shared post -->
    <meta property="og:description" content="" /> <!-- description shown in the actual shared post -->
    <meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
    <meta property="og:url" content="" /> <!-- where do you want your post to link to -->
    <meta property="og:type" content="article" />

    <!-- Webpage Title -->
    <title>Sync - Mobile App Landing Page HTML Template</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700&display=swap&subset=latin-ext"
        rel="stylesheet">
    <link href="views/css/bootstrap.css" rel="stylesheet">
    <link href="views/css/fontawesome-all.css" rel="stylesheet">
    <link href="views/css/swiper.css" rel="stylesheet">
    <link href="views/css/magnific-popup.css" rel="stylesheet">
    <link href="views/css/styles.css" rel="stylesheet">

    <!-- Favicon  -->
    <link rel="icon" href="views/images/favicon.png">
    <style>
        .button-padding{
            padding: 2.5%;   
        }
        .carousel-margin{
            margin-top: 7%;
        }
        .navegador-caracteristicas{
            background:#E9F1FA;
        }
        .carousel-pages{
            max-width: 900px;
            margin-top:-75%;
        }
        .about-style{
            margin-bottom: 5%;
           
        }
        .btn{
            text-decoration: none;
        }
        span{
            font-weight: 900;
        }
        .textOrigen{
            font-weight: 900;
            background: greenyellow;
        }   
        .textDestino{
            font-weight:900;
            background: lightblue;
        }
        .table-1{
            border: 1px solid black; 
            width: 100%; 
            text-align: center;
        }
        td{
            padding: 1%;
        }
        h2{
            color: blueviolet;
        }
    </style>
</head>

<body data-spy="scroll" data-target=".fixed-top">

    <!-- Preloader -->
    <div class="spinner-wrapper">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>
    <!-- end of preloader -->


    <!-- Navigation -->

    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top navegador-caracteristicas " >
        <div class="container">
            <!-- Text Logo - Use this if you don't have a graphic logo -->
            <!-- <a class="navbar-brand logo-text page-scroll" href="index.html">Sync</a> -->

            <!-- Image Logo -->
            <a class="navbar-brand logo-image" style="text-decoration:none; color: purple;"
                href="inicio">VILLABLABLA</a>

            <!-- Mobile Menu Toggle Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
                aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-awesome fas fa-bars"></span>
                <span class="navbar-toggler-awesome fas fa-times"></span>
            </button>
            <!-- end of mobile menu toggle button -->

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="inicio#buscador">Busca tu viaje</a> <span
                            class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="inicio#about">Que es Villablabla</a> <span
                            class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="inicio#viajes">Viajes de la semana</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#otros">Otros transportes</a>
                    </li>
                    <?php
                    if (!isset($_SESSION['username'])) {
                        //SI NO EXISTE LA SESION SE VERAN EL BOTON DE REGISTRO Y LOGIN
                    ?>
                        <li class="nav-item">
                            <a class="nav-link page-scroll" href="registro">Registro</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link page-scroll" href="login">Login</a>
                        </li>
                    <?php
                    } else
                    //SI HAY SESION ABIERTA SE VERA EL NOMBRE DEL USUARIO Y EL LOGOUT
                    {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link page-scroll" href="logout">Cerrar sesión</a>
                        </li>
                        <span class="nav-item">
                            <a class="btn-outline-sm page-scroll" href="paginaUsuario"><?= $_SESSION['username'] ?></a>
                        </span>
                    <?php
                    }
                    ?>

                    <!-- Dropdown Menu -->
                    <!--li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle page-scroll" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">EXTRA</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="article-details.html"><span class="item-text">ARTICLE DETAILS</span></a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="terms-conditions.html"><span class="item-text">TERMS CONDITIONS</span></a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="privacy-policy.html"><span class="item-text">PRIVACY POLICY</span></a>
                        </div>
                    </li-->
                    <!-- end of dropdown menu -->
                </ul>
                <!--PODRIA USAR ESTE TIPO DE BOTONES PARA EL LOGIN, REGISTRO Y USUARIO??-->

            </div>
        </div> <!-- end of container -->
    </nav> <!-- end of navbar -->
    <!-- end of navigation -->
