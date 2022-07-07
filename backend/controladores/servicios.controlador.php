<?php

class ControladorServicios{

	/*=============================================
	MOSTRAR CATEGORIAS-SERVICIOS CON INNER JOIN
	=============================================*/

	static public function ctrMostrarServicios($valor){

		$tabla1 = "categorias";
		$tabla2 = "servicios";

		$respuesta = ModeloServicios::mdlMostrarServicios($tabla1, $tabla2, $valor);

		return $respuesta;

	}



}