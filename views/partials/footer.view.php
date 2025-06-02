<!-- Footer -->
<section class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="footer-col first">
                    <p><b>ENLACES INTERESANTES</b></p>
                    <p>
                        <a href="https://damas-sa.es/">DAMAS</a>
                    </p>
                    <p>
                        <a href="https://www.blablacar.es/">BLABLACAR</a>
                    </p>
                    <p>
                        <a href="https://www.renfe.com/es/es">RENFE</a>
                    </p>

                </div> <!-- end of footer-col -->

            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</section> <!-- end of footer -->
<!-- end of footer -->


<!-- Copyright -->
<div class="copyright">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <p class="p-small">Copyright © 2025 <a href="#">Sergio Ambrosio Martín</a> - All rights reserved
                </p>
            </div> <!-- end of col -->
        </div> <!-- enf of row -->
    </div> <!-- end of container -->
</div> <!-- end of copyright -->
<!-- end of copyright -->


<!-- Scripts -->
<script>
    let table = new DataTable('#myTable', {
    //array para cambiar en función de datatable el idioma de los elementos
    language: {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Entradas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
            "first": "Primero",
            "last": "Último",
            "next": "Siguiente",
            "previous": "Anterior"
        }
    },
    //opciones de cantidad de filas representadas en el datatable
    "lengthMenu": [[5, 10, 20, 40, 80, -1], [5, 10, 20, 40, 80, "Todos"]], // Opciones personalizadas
    "pageLength": 5 // Longitud de página predeterminada
  });
    let table2 = new DataTable('#myTable2', {
    //array para cambiar en función de datatable el idioma de los elementos
    language: {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Entradas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
            "first": "Primero",
            "last": "Último",
            "next": "Siguiente",
            "previous": "Anterior"
        }
    },
    //opciones de cantidad de filas representadas en el datatable
    "lengthMenu": [[5, 10, 20, 40, 80, -1], [5, 10, 20, 40, 80, "Todos"]], // Opciones personalizadas
    "pageLength": 5 // Longitud de página predeterminada
  });
</script>
<script src="views/js/jquery.min.js"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
<script src="views/js/popper.min.js"></script> <!-- Popper tooltip library for Bootstrap -->
<script src="views/js/bootstrap.min.js"></script> <!-- Bootstrap framework -->
<script src="views/js/jquery.easing.min.js"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
<script src="views/js/swiper.min.js"></script> <!-- Swiper for image and text sliders -->
<script src="views/js/jquery.magnific-popup.js"></script> <!-- Magnific Popup for lightboxes -->
<script src="views/js/validator.min.js"></script> <!-- Validator.js - Bootstrap plugin that validates forms -->
<script src="views/js/scripts.js"></script> <!-- Custom scripts -->
<script src="views/js/addedScripts.js"></script> <!--scripts añadidos para la aplicación villablabla-->
</body>

</html>