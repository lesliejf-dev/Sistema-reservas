<?php
require_once "conexion.php";

Class ModeloCategorias{
    //Mostrar categorias
    static public function mdlMostrarCategorias($tabla){
        //llamo a la clase conexion y ejecuto el metodo conectar
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

        $stmt -> execute();
        //retornamos varias filas con fetchAll
        return $stmt ->fetchAll();
        
        $stmt -> close();
        $stmt = null;
        
    }

    //MOSTRAR UNA CATEGORIA 
    static public function mdlMostrarCategoria($tabla, $valor){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_cat = :id_cat");

        $stmt -> bindParam(":id_cat", $valor, PDO::PARAM_INT);  
        
        $stmt -> execute();

        return $stmt ->fetch();

        $stmt -> close();
        $stmt = null;

    }

    
}