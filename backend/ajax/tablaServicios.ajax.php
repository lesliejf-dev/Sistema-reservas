<?php

require_once "../controladores/servicios.controlador.php";
require_once "../modelos/servicios.modelo.php";

class TablaServicios{

	/*=============================================
	Tabla Categorías
	=============================================*/ 

	public function mostrarTabla(){

		$servicios = ControladorServicios::ctrMostrarServicios(null);

		if(count($servicios)== 0){

 			$datosJson = '{"data": []}';

			echo $datosJson;

			return;

 		}

 		$datosJson = '{

	 	"data": [ ';

	 	foreach ($servicios as $key => $value) {

			$datosJson.= '[
							
						"'.($key+1).'",
						"'.$value["tipo"].'",
						"'.$value["nombre_servicio"].'",
						"€ '.$value["precio"].'"				
				],';

		}

		$datosJson = substr($datosJson, 0, -1);

		$datosJson.=  ']

		}';

		echo $datosJson;

	}

}

/*=============================================
Tabla Servicios
=============================================*/ 

$tabla = new TablaServicios();
$tabla -> mostrarTabla();
