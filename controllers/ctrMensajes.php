<?php
require_once "models/mdlMensajes.php";
class CtrMensajes
{
    public function ctrShowMensajes($idEmisor, $idReceptor)
    {
        $table = "mensajes";
        $mensajes = MdlMensajes::mdlShowMensajes($table, $idEmisor, $idReceptor);
        return $mensajes;
    }
    //metodo para mostrar número de mensajes sin leer
    public function ctrShowMensajesSinLeer($value, $idReceptor)
    {
        $table = "mensajes";
        $mensajesSinLeer = MdlMensajes::mdlShowMensajesSinLeer($table, $value, $idReceptor);
        return $mensajesSinLeer;
    }
    //metodo para mostrar mensajes sin leer agrupados por emisor
    public function ctrShowMensajesSinLeerAgrupado($idReceptor)
    {
        $table = "mensajes";
        $mensajesSinLeerAgrupado = MdlMensajes::mdlShowMensajesSinLeerAgrupado($table, $idReceptor);
        return $mensajesSinLeerAgrupado;
    }
    //METODO LEER TODAS LAS CONVERSACIONES Y NUMERO DE MENSAJES
    public function ctrShowConversaciones()
    {
        $table = "mensajes";
        $conversaciones = MdlMensajes::mdlShowConversaciones($table);
        return $conversaciones;
    }
    public function ctrRegister()
    {
        //VALIDACION
        if (isset($_POST) && !empty($_POST)) {
            $cuerpoMensaje = Utilidades::validate($_POST['cuerpoMensaje'], 'texto');
            if ($cuerpoMensaje) {
                //var_dump($_POST);
                $datos = array(
                    "cuerpoMensaje" => $_POST['cuerpoMensaje'],
                    "idEmisor" => $_POST['idEmisor'],
                    "idReceptor" => $_POST['idReceptor'],
                    "status" => "noLeido"
                );
                $mensaje = MdlMensajes::mdlRegister("mensajes", $datos);
                $emisor = Tablas::showValueField("usuarios", "username", "id", $datos['idEmisor']);
                if ($mensaje == true) {
                    echo "<script>.
                            window.alert(" . $datos['cuerpoMensaje'] . ");
                        </script>";
                }
            } else {
                echo "<script>
                window.alert('Error en alguno de los datos introducidos');
                </script>";
            }
        }
    }
    public function ctrCambiarStatus($idEmisor, $idReceptor)
    {
        $table = "mensajes";
        $cambiarStatus = MdlMensajes::mdlCambiarStatus($table, $idEmisor, $idReceptor);
        if ($cambiarStatus) {
            echo "<script>
                    window.alert('Tiene mensajes sin leer');
                    window.location(mensajes#escribir);
                </script>";
        } else {
            return false;
        }
    }
    //metodo controlador para eliminar mensajes
    public function ctrEliminarMensajes($cantidad)
    {
        if (isset($_POST) && !empty($_POST)) {
            $table = "mensajes";
            if ($cantidad == 1) {
                $id=$_POST['id'];
                $delete = MdlMensajes::mdlEliminarMensaje($table, $id);
            }
            else{
                $idEmisor = $_POST['idEmisor'];
                $idReceptor = $_POST['idReceptor'];
                $delete=MdlMensajes::mdlEliminarConversacion($table, $idEmisor, $idReceptor);
            }
             
                if ($delete) {
                    if($cantidad == 1){
                        echo "<script>
                        window.alert('Se ha borrado con éxito');
                    </script>";
                    return true;
                    }
                    else{
                        echo "<script>
                        window.alert('Se ha borrado la conversación con éxito');
                        </script>";
                    }
                } else {
                    echo "<script>
                        window.alert('No se ha podido eliminar el registro');
                    </script>";
                    return false;
                }
        } else {
            echo "<script>
                window.alert('Se ha producido un error');
            </script>";
        }
    }
}
