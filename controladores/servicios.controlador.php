<?php
Class ControladorServicios{
    //Mostrar categorias de servicios con inner join
    static public function ctrMostrarServicios($valor){
        //nombre de la tabla de la bd
        $tabla1= "categorias";
        $tabla2= "servicios";
        $respuesta = ModeloServicios::mdlMostrarServicios($tabla1, $tabla2, $valor);

        return $respuesta;
    }

    //Mostrar Servicio
    static public function ctrMostrarServicio($valor){
      
        $tabla= "servicios";

        $respuesta = ModeloServicios::mdlMostrarServicio($tabla, $valor);

        return $respuesta;
    }
    
}