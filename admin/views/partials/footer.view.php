<footer class="footer">
  <div class="container">
    <p class="text-muted text-center">Desarrollado por Alumn@</a></p>
  </div>
</footer>
<script>
  let tableUsers = new DataTable('#myTableUsers', {
    perPage: 5,
    perPageSelect: [5, 10, 15, 20],
    searchable: true,
    sortable: true,
    labels: {
      placeholder: "Buscar...",
      perPage: "{select} registros por página",
      noRows: "No se encontraron registros",
      info: "Mostrando {start} a {end} de {rows} registros"
    }
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