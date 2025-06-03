<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <!--SWEETALERT-->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!--MODAL-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <!--JS DATATABLES-->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <link href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.css" rel="stylesheet" type="text/css" />
  <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
  <!--CSS DATATABLES-->
  <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.css" />
  <!--cdn y css bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
</head>

<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
  <!-- Fixed navbar -->
  <!--nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#"></a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li class="active"><a href="inicio"><i class='glyphicon glyphicon-film'></i> BackEnd PortFolio</a></li>
          <li><a href="../inicio" target="_blank"><i class='glyphicon glyphicon-blackboard'></i> FrontEnd PortFolio</a></li>
          <li><a href="../logout"> Logout</a></li>
          <li></li>
        </ul>
        </li>
      </div>
  </nav>
  <div class="container">
    <div class="row">
      <ol class="breadcrumb">
        <li><a href="#">Inicio</a></li>
        <li class="active"><?= $_SERVER['REQUEST_URI'] ?></li>

      </ol-->

  <!--a class="btn btn-primary" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
        Link with href
      </a>
      <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
        Button with data-bs-target
      </button-->
  <section>
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">Offcanvas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <div>
          Some text as placeholder. In real life you can have the elements you have chosen. Like, text, images, lists, etc.
        </div>
        <div class="dropdown mt-3">
          <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
            Dropdown button
          </button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
          <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
            <a href="#" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
              <span class="fs-5 d-none d-sm-inline">Bienvenido <?= $_SESSION['username'] ?></span>
            </a>
            <div class="dropdown pb-4">
              <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="views/img/banner/1.jpg" alt="hugenerd" width="30" height="30" class="rounded-circle">
                <span class="d-none d-sm-inline mx-1">Opciones</span>
              </a>
              <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                <!--li><a class="dropdown-item" href="#">New project...</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li-->
                <li class="nav-item text-center">
                  <a href="../inicio" class="nav-link align-middle px-0" target="_blank">
                    <span>Frontend</span>
                  </a>
                </li>
                <hr class="dropdown-divider">
                </li>
                <li class="text-center"><a class="dropdown-item" href="../logout">Cerrar Sesión</a></li>
              </ul>
            </div>
            <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">

              <li>
                <a href="inicio" class="nav-link px-0 align-middle">
                  <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Usuarios</span> </a>
              </li>
              <li>
                <a href="viajes" class="nav-link px-0 align-middle">
                  <i class="fs-4 bi-bag"></i> <span class="ms-1 d-none d-sm-inline">Viajes</span></a>
              </li>
              <li>
                <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle ">
                  <i class="fs-4 bi-geo-alt"></i> <span class="ms-1 d-none d-sm-inline">Lugares</span></a>
                <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                  <li class="w-100">
                    <a href="origenes" class="nav-link px-0 align-middle">
                      <i class="fs-4 bi-arrow-right"></i> <span class="ms-1 d-none d-sm-inline">Orígenes</span> </a>
                  </li>
                  <li>
                    <a href="destinos" class="nav-link px-0 align-middle">
                      <i class="fs-4 bi-arrow-left"></i> <span class="ms-1 d-none d-sm-inline">Destinos</span> </a>
                  </li>
                </ul>
              </li>
               <li>
                <a href="opciones" class="nav-link px-0 align-middle">
                  <i class="fs-4 bi-circle"></i> <span class="ms-1 d-none d-sm-inline">Opciones</span> </a>
              </li>
              <li>
                <a href="#" class="nav-link px-0 align-middle">
                  <i class="fs-4 bi-bar-chart"></i> <span class="ms-1 d-none d-sm-inline">Estadísticas</span> </a>
              </li>
            </ul>
            <hr>

          </div>
        </div>