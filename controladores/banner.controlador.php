<?php
Class ControladorBanner{
    //Mostrar imagenes banner
    static public function ctrMostrarBanner(){
        //nombre de la tabla de la bd
        $tabla= "banner";
        $respuesta = ModeloBanner::mdlMostrarBanner($tabla);

        return $respuesta;
    }
}