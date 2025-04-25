<?php
///ESTA CLASE CONTIENE MÉTODOS QUE NO VAN A GESTIONAR LA BASE DE DATOS SINO QUE TIENE FUNCIONALIDADES LATERALES PARA LA APLICACION EN CURSO
class Utilidades
{
    /////////VALIDACION
    static public function validate($value, $value_type)
    {
        $expresion = array(
            'nombre' => '/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/',
            'apellido' => '/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ -]+$/',
            'username' => '/^[a-zA-Z0-9ñÑ-]+$/',
            'password' => '/^[a-zA-Z0-9!@#$&%*()\\-.+,]+$/',
            'telefono' => '/^[0-9+]+$/',
            'texto' => '/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ !@#$&%*()\\-.+,]+$/',
            'entero' => '/^[0-9]+$/'
        );
        if (preg_match($expresion[$value_type], $value)) {
            return true;
        } else {
            return false;
        }
    }
    static public function validate_email($value)
    {
        if ($value != "") {
            $value_sin_espacios = trim($value);
            $value = filter_var($value_sin_espacios, FILTER_SANITIZE_EMAIL);
            if (!filter_var($value_sin_espacios, FILTER_VALIDATE_EMAIL)) {
                return false;
            } else {
                return true;
            }
        } else {
            return true;
        }
    }
    static public function encriptPassword($value)
    {
        $encriptada = crypt($value, '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
        return $encriptada;
    }
    ////////IMAGENES
    //PARA LA RUTA DE LA IMAGENES
    static public function rutaImagen($ruta_carpeta){
        return $ruta_carpeta;
    }
    static public function imagenUsuario($carpetaImagen,$imagen)
    {
        $ruta="views/images/users/";
        if($imagen!=null){
            $imagenVista=$ruta.$carpetaImagen."/".$imagen;
        }
        else{
            $imagenVista=$ruta."default.jpg";
        }
        return $imagenVista;
    }
    //COPIAR IMAGEN EN DISCO
    static public function saveImagedisc($image, $ruta_carpeta, $name_file)
    {
        $ruta = "";
        if (!empty($image["tmp_name"])) {
            $dimensiones = getimagesize($image["tmp_name"]);
            $ancho = $dimensiones[0];
            $alto = $dimensiones[1];
            $nuevoAncho = 350;
            $nuevoAlto = 350;
            $rutaImagen = Utilidades::rutaImagen($ruta_carpeta);
            $directorio = $rutaImagen . $name_file;

            mkdir($directorio, 0755);

            /*SI ES IMAGEN JPG*/
            if ($image['type'] == "image/jpeg") {
                $ruta = $rutaImagen . $name_file . "/" . $image['name'];
                $origen = imagecreatefromjpeg($image['tmp_name']);
                $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                if (imagejpeg($destino, $ruta)) {
                    return true;
                } else {
                    return false;
                }
            }
            /*SI ES IMAGEN PNG*/
            if ($image['type'] == "image/png") {
                $ruta = $rutaImagen . $name_file . "/" . $image['name'];
                $origen = imagecreatefrompng($image['tmp_name']);
                $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                if (imagepng($destino, $ruta)) {
                    return true;
                } else {
                    return false;
                }
            }
        } else {
            return false;
        }
    }
    static public function existImage($image, $ruta_carpeta, $name_file)
    {
        if (!empty($image['tmp_name'])) {
            Utilidades::saveImageDisc($image, $ruta_carpeta, $name_file);
            return $image['name'];
        } else {
            $image_default = "default.jpg";
            return $image_default;
        }
    }
    static function editarFotos($table, $username, $ruta, $image)
    {
        //NOMBRE CARPETA POR USER O PRODUCTO PUEDE SER EL ID O USERNAME, ALGO QUE NO SE REPITA
        if (!empty($image['tmp_name'])) {
            $file = Tablas::showValueField(
                $table,
                'foto',
                'username',
                $username
            );
            $path = Utilidades::rutaImagen($ruta);
            $path_file = $path . $username . "/" . $file['imagen'];
            //var_dump($path_file);
            if (file_exists($path_file)) {
                unlink($path_file);
                rmdir($path . $username);
                echo "<script>
                        window.alert('se ha borrado la foto');
                        </script>";
            }
        }
    }
    //////////SI CAMPO ESTA VACIO Y NO ES NECESARIO EN LA TABLA
    static public function campoVacio($campo_entra)
    {
        if ($campo_entra == "") {
            $campo_sale = "-";
        } else {
            $campo_sale = $campo_entra;
        }
        return $campo_sale;
    }
    /////////FECHAS
    static public function sumarDias($fecha, $num_dias_mas)
    {
        $date = date_create_from_format('Y-m-d', $fecha);
        $dia = date_format($date, 'd');
        $mes = date_format($date, 'm');
        $ano = date_format($date, 'Y');
        $dia_mas = $dia + $num_dias_mas;
        $date_more = date_create_from_format("Y-m-d", $ano . "-" . $mes . "-" . $dia_mas);
        $final_date = date_format($date_more, 'Y-m-d');
        return $final_date;
    }
    //CONVERSOR DE FECHAS INGLESAS A ESPAÑOLAS
    static public function english_date_to_spanish($date)
    {
        $english_date = date_create_from_format('Y-m-d', $date);
        $spanish_date = date_format($english_date, 'd-m-Y');
        return $spanish_date;
    }
    //DE FECHA INGLESA A FECHA STRING
    static public function change_date_to_string($date)
    {
        $meses = array('enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre');
        $english_date = date_create_from_format('Y-m-d', $date);
        $dia = date_format($english_date, 'd');
        $mes = date_format($english_date, 'm');
        $mes_i = intval($mes);
        $fecha_completa = $dia . " de " . $meses[$mes_i - 1];
        return $fecha_completa;
    }
    static public function minimumDate($date)
    {
        $fechaMinima = new DateTime(date("Y-m-d"));
        $fechaUsuario = new DateTime($date);

        if ($fechaUsuario < $fechaMinima) {
            return false;
        } else {
            return true;
        }
    }

}
