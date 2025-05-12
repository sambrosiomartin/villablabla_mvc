 //script para ocultar/mostrar input type text de origen segun select origen sea o no = "otros" 
 document.addEventListener("DOMContentLoaded", function () {
        let selectOrigen = document.getElementById("forOrigen");
        const groupOtrosOrigenes = document.getElementById("BlockotrosOrigenes");
        let inputOtrosOrigenes = document.getElementById("forOtrosOrigenes");
         let selectDestino = document.getElementById("forDestino");
        const groupOtrosDestinos = document.getElementById("BlockotrosDestinos");
        let inputOtrosDestinos = document.getElementById("forOtrosDestinos");

        // función para mostrar/ocultar el input
        const toggleOtrosOrigenes = () => {
            if (selectOrigen.value === "otros") {
                groupOtrosOrigenes.style.display = "block";
            } else {
                groupOtrosOrigenes.style.display = "none";
                groupOtrosOrigenes.value = ""; // se despeja el value de otros origenes
                inputOtrosOrigenes.value = ""; // se despeja el value del input
               
            }
        };

        // función para mostrar/ocultar el input
        const toggleOtrosDestinos = () => {
            if (selectDestino.value === "otros") {
                groupOtrosDestinos.style.display = "block";
            } else {
                groupOtrosDestinos.style.display = "none";
                groupOtrosDestinos.value = ""; // se despeja el value de otros origenes
                inputOtrosDestinos.value = ""; // se despeja el value del input
               
            }
        };

        //se inicia la función al cargar la página
        toggleOtrosOrigenes();
        toggleOtrosDestinos();

        //añade el evento listener al elemento select
        selectOrigen.addEventListener("change", toggleOtrosOrigenes);
        selectDestino.addEventListener("change", toggleOtrosDestinos);
    });
 //script para ocultar/mostrar input type text de destino segun select destino sea o no = "otros" 