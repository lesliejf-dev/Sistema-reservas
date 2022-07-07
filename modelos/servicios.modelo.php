<?php
require_once "conexion.php";

Class ModeloServicios{
    //Mostrar categorias de servicios con inner join
    static public function mdlMostrarServicios($tabla1, $tabla2, $valor){
        //llamo a la clase conexion y ejecuto el metodo conectar
        $stmt = Conexion::conectar()->prepare("SELECT $tabla1.*, $tabla2.* FROM $tabla1 INNER JOIN $tabla2 ON $tabla1.id_cat = $tabla2.tipo_s WHERE ruta = :ruta");

        $stmt -> bindParam(":ruta", $valor, PDO::PARAM_STR);
        $stmt -> execute();
        //retornamos varias filas con fetchAll
        return $stmt ->fetchAll();
        
        $stmt -> close();
        $stmt = null;
        
    }

    //MOSTRAR UN SERVICIO 
    static public function mdlMostrarServicio($tabla, $valor){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_s = :id_s");

        $stmt -> bindParam(":id_s", $valor, PDO::PARAM_INT);  
        
        $stmt -> execute();

        return $stmt ->fetch();

        $stmt -> close();
        $stmt = null;

    }
}