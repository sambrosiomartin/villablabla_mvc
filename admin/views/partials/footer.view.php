      </div>
    </div>
  </section>
<footer class="footer">
  <div class="container">
    <p class="text-muted text-center">Desarrollado por Alumn@</a></p>
  </div>
</footer>
<script>
  let tableUsers = new DataTable('#myTableUsers', {
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
<script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="sidebars.js"></script>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/views/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="views/js/scripts.js"></script>
</body>

</html>