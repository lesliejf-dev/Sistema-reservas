<?php
require_once "conexion.php";

Class ModeloBanner{
    //Mostrar banner
    static public function mdlMostrarBanner($tabla){
        //llamo a la clase conexion y ejecuto el metodo conectar
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

        $stmt -> execute();
        //retornamos varias filas con fetchAll
        return $stmt ->fetchAll();
        
        $stmt -> close();
        $stmt = null;
        
    }
}