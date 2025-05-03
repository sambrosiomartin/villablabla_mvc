<?php
// --- PARTE PHP (Procesamiento del POST) ---
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['opcion'])) {
    $opcionSeleccionada = $_POST['opcion'];
    $respuesta = "Dato recibido: " . htmlspecialchars($opcionSeleccionada);
    // Aquí puedes procesar el dato (ej: guardar en BD)
    echo $respuesta; // Envía la respuesta al frontend
    exit; // Termina la ejecución para evitar mezclar HTML
}
include "views/partials/prueba.view.php";
