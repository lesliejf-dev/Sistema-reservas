<?php

class ControladorInicio{


    /*=============================================
	Mostrar notificaciones
	=============================================*/

	static public function ctrMostrarNotificaciones(){

		$tabla = "notificaciones";

		$respuesta = ModeloInicio::mdlMostrarNotificaciones($tabla);
		
		return $respuesta;

	}	

	/*=============================================
	Actualizar notificaciones
	=============================================*/

	static public function ctrActualizarNotificaciones($tipo, $cantidad){

		$tabla = "notificaciones";

		$respuesta = ModeloInicio::mdlActualizarNotificaciones($tabla, $tipo, $cantidad);
		
		return $respuesta;

	}	
    
}