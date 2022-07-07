<?php

require_once "../controladores/reservas.controlador.php";
require_once "../modelos/reservas.modelo.php";

class TablaReservas{

	/*=============================================
	Tabla Reservas
	=============================================*/ 

	public function mostrarTabla(){

		$reservas = ControladorReservas::ctrMostrarReservas(null, null);

		if(count($reservas)== 0){

 			$datosJson = '{"data": []}';

			echo $datosJson;

			return;

 		}

 		$datosJson = '{

	 	"data": [ ';

	 	foreach ($reservas as $key => $value) {
			
			/*=============================================
			ACCIONES
			=============================================*/

			$fechaIngreso = new DateTime($value["fecha_ingreso"]);
			$fechaSalida = new DateTime($value["fecha_salida"]);
            $hora = $value["hora_cita"];
			$diff = $fechaIngreso->diff($fechaSalida);
			$dias = $diff->days;

			if($value["fecha_ingreso"] != "0000-00-00" && $value["hora_cita"] != "0000-00-00"){

				$acciones = "<div class='btn-group'><button class='btn btn-warning btn-sm editarReserva' data-toggle='modal' data-target='#editarReserva' idReserva='".$value["id_r"]."' idServicio='".$value["id_servicio"]."' fechaIngreso='".$value["fecha_ingreso"]."' fechaSalida='".$value["fecha_salida"]."' hora='".$value["hora_cita"]."' descripcion='".$value["descripcion_r"]."' diasReserva='".$dias."'><i class='fas fa-pencil-alt text-white'></i></button><button class='btn btn-danger btn-sm eliminarReserva' idReserva='".$value["id_r"]."'><i class='fas fa-trash-alt'></i></button></div>";	

			}else{

				$acciones = "<button class='btn btn-dark btn-sm'>Cancelada</button>";	
			}


			$datosJson.= '[
							
						"'.($key+1).'",
						"'.$value["codigo_r"].'",
						"'.$value["descripcion_r"].'",
						"'.$value["nombre"].'",
						"€ '.number_format($value["precio_r"],  2, ",", ".").'",
						"'.$value["fecha_ingreso"].'",
						"'.$value["fecha_salida"].'",
                        "'.$value["hora_cita"].'",
						"'.$acciones.'"
						
				],';

		}

		$datosJson = substr($datosJson, 0, -1);

		$datosJson.=  ']

		}';

		echo $datosJson;

	}

}

/*=============================================
Tabla Reservas
=============================================*/ 

$tabla = new TablaReservas();
$tabla -> mostrarTabla();
