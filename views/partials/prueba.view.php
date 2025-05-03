<style>
    form{
        margin-top:10%;
    }
</style>
<form>
        <select name="opcion" id="miSelect" onchange="enviarDato()">
            <option value="" disabled selected>Selecciona una opción</option>
            <option value="opcion1">Opción 1</option>
            <option value="opcion2">Opción 2</option>
            <option value="opcion3">Opción 3</option>
        </select>
    </form>
    <div id="respuesta"><?=$respuesta?></div> <!-- Aquí se mostrará la respuesta -->
<script>
     // --- PARTE JAVASCRIPT (Envío automático) ---
     function enviarDato() {
            const select = document.getElementById("miSelect");
            const valor = select.value;

            if (valor) {
                fetch("<?php echo $_SERVER['PHP_SELF']; ?>", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded",
                    },
                    body: `opcion=${encodeURIComponent(valor)}`
                })
                /*.then(response => response.text())
                .then(data => {
                    document.getElementById("respuesta").innerText = data;
                })*/
                .catch(error => {
                    console.error("Error:", error);
                });
            }
        }
</script>
