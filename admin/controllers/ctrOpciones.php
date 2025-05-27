<?php
require_once "models/mdlOpciones.php";
class CtrOpciones
{
    //listar opciones
    public function ctrOpciones($table, $field, $value)
    {
        $opciones = MdlLugares::showRegister($table, $field, $value);
        return $opciones;
    }
    //crear o insertar nueva opción
    public function ctrInsertarOpcion()
    {
        //VALIDACION
        if (isset($_POST) && !empty($_POST)) {
            $tipo_opcion = Utilidades::validate($_POST['tipo_opcion'], 'texto');
            $descripcion = Utilidades::validate($_POST['descripcion'], 'texto');
            if ($tipo_opcion && $descripcion) {
                $query = MdlOpciones::showRegister("opciones", "tipo_opcion", $_POST['tipo_opcion']);
                if (empty($query)) {
                    $table = "opciones";
                    $datos = array(
                        "tipo_opcion" => $_POST['tipo_opcion'],
                        "descripcion" => $_POST['descripcion']
                    );
                    $crearOpcion=MdlOpciones::mdlInsertarOpcion($table,$datos);
                    if($crearOpcion){
                        echo "<script>
                            window.alert('La nueva opción se ha creado con éxito');
                            window.location='opciones';
                        </script>";
                    }
                    else{
                         echo "<script>
                            window.alert('Ha habido algún error, inténtelo de nuevo');
                        </script>";
                    }
                } else {
                    echo "<script>
                        window.alert('Ya existe la opción ');
                    </script>";
                }
            } else {
                echo "<script>
                        window.alert('Error en alguno de los datos introducidos');
                    </script>";
            }
        } else {
            echo "<script>
                    window.alert('No han podido llegar los datos, inténtelo de nuevo');
                </script>";
        }
    }
    
    //metodo controlador editar datos opción
    public function ctrUpdateOpcion()
    {
        //VALIDACION
        if (isset($_POST) && !empty($_POST)) {
            $tipo_opcion = Utilidades::validate($_POST['tipo_opcion'], 'texto');
            $descripcion = Utilidades::validate($_POST['descripcion'], 'texto');
            if ($tipo_opcion && $descripcion) {
                $table = "opciones";
                $field = "id";
                $value = $_POST['id'];
                $query = MdlOpciones::showRegister($table, $field, $value);
                if (!empty($query)) {
                    $datos = array(
                        "tipo_opcion" => $_POST['tipo_opcion'],
                        "descripcion" => $_POST['descripcion'],
                        "id" => $_POST['id']
                    );
                    $updateOpcion = MdlOpciones::mdlUpdateOpcion($table, $datos);
                    if ($updateOpcion == true) {
                        echo "<script>
                            window.alert('Los datos de la opción se han modificado con éxito');
                            window.location='opciones';
                        </script>";
                        return true;
                    } else {
                        echo "<script>
                            window.alert('No se ha podido modificar los datos de la opción');
                        </script>";
                        return false;
                    }
                } else {
                    echo "<script>
                        window.alert('No se encuentra la opción en los registros');
                    </script>";
                }
            } else {
                echo "<script>
                    window.alert('Error en alguno de los datos introducidos');
                </script>";
            }
        }
    }
}
