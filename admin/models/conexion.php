<?php 
    class Conexion{
        public static function conection(){
            try{
                $conexion = new PDO("mysql:host=localhost;dbname=bd_examen_161222","root","");
            }
            catch(PDOException $e) {
                echo "ERROR: ". $e->getMessage();
            }
            return $conexion;
        }
        
    } 