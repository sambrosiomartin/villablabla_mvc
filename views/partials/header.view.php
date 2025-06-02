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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <style>
        .button-padding {
            padding: 2.5%;
        }

        .navegador-caracteristicas {
            background: #E9F1FA;
        }

        .carousel-pages {
            max-width: 900px;
            margin-top: -75%;
        }

        .about-style {
            margin-bottom: 5%;

        }

        .btn {
            text-decoration: none;
        }

        span {
            font-weight: 900;
        }

        .textOrigen {
            font-weight: 900;
            background: greenyellow;
        }

        .textDestino {
            font-weight: 900;
            background: lightblue;
        }

        .table-1 {
            border: 1px solid black;
            width: 100%;
            text-align: center;
        }

        td {
            padding: 1%;
        }

        h2 {
            color: blueviolet;
        }

        h5 {
            font-weight: 100;
        }

        .subrayado-1 {
            background: none;
            color: #007bff;
            text-decoration: underline;
        }

        .subrayado-2 {
            background: none;
            color: #ff556e;
            text-decoration: underline;
        }

        .subrayado-3 {
            color: purple;
            font-weight: 900;
            text-decoration: underline;
        }

        .foto {
            width: 10%;
        }

        #logo img {
            width: 150px;
            height: 100%;
            filter: brightness(1);
            mix-blend-mode: multiply;
        }

        button {
            width: 11rem;
        }

        button a {
            color: white;
            text-decoration: none;
        }

        button a:hover {
            text-decoration: none;
        }

    

      
       .rounded-50{
            border-radius:50px;
       }
       .rounded-50{
            border-top: 2px solid purple;
            border-bottom:2px solid purple;
            padding-bottom: 2rem;
            padding-top:1rem;
            
       }
       *{
            font-family:helvetica;
       }
      .btn-outline-sm {
        font-family: helvetica;
        color:black;
      }
      .img-rounded{
        border-radius: 15%;
        border:2px solid purple;
      }
      .rounded-circle{
        border:2px solid purple;
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

    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom  navegador-caracteristicas ">
        <div class="container">
            <!-- Image Logo -->
            <a id="logo" class="navbar-brand logo-image" style="margin-bottom:20px;"
                href="inicio"><img src="views/images/logos/logoMain.png"></a>

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
                        <a class="nav-link page-scroll" href="preguntasRespuestas">Preguntas y respuestas</a>
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
                            <?php if ($_SESSION['tipoUsuario'] == "administrador") { ?>
                                <a class="btn-outline-sm page-scroll" href="admin/inicio">Bienvenid@ Administrador@</a>
                            <?php
                            } else {
                            ?>
                                <a class="btn-outline-sm page-scroll" href="paginaUsuario">Bienvenid@ <?= $_SESSION['username'] ?></a>
                            <?php
                            }
                            ?>
                        </span>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div> <!-- end of container -->
    </nav> <!-- end of navbar -->
    <!-- end of navigation -->