<?php
Class ControladorCategorias{
    //Mostrar categorias
    static public function ctrMostrarCategorias(){
        //nombre de la tabla de la bd
        $tabla= "categorias";
        $respuesta = ModeloCategorias::mdlMostrarCategorias($tabla);

        return $respuesta;
    }

    //Mostrar una CATEGORIA
    static public function ctrMostrarCategoria($valor){
      
        $tabla= "categorias";

        $respuesta = ModeloCategorias::mdlMostrarCategoria($tabla, $valor);

        return $respuesta;
    }
}