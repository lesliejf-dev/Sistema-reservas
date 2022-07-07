<?php

require_once "../controladores/reservas.controlador.php";
require_once "../modelos/reservas.modelo.php";

class AjaxReservas{

	/*=============================================
	Mostrar Reservas
	=============================================*/	

	public $idServicio;

	public function ajaxMostrarReservas(){

		$respuesta = ControladorReservas::ctrMostrarReservas("id_Servicio", $this->idServicio);

		echo json_encode($respuesta);

	}

	/*=============================================
	Cambiar Reservas
	=============================================*/	

	public $idReserva;
	public $fechaIngreso;
    public $hora;
	//public $fechaSalida;

	public function ajaxCambiarReserva(){

		$datos = array("id_r" => $this->idReserva,
					   "fecha_ingreso" => $this->fechaIngreso,
                       "hora_cita" => $this->hora);
					  // "fecha_salida" => $this->fechaSalida

		$respuesta = ControladorReservas::ctrCambiarReserva($datos);

		echo $respuesta;

	}


}

/*=============================================
Mostrar Reservas
=============================================*/	

if(isset($_POST["idServicio"])){

	$editar = new AjaxReservas();
	$editar -> idServicio = $_POST["idServicio"];
	$editar -> ajaxMostrarReservas();

}

/*=============================================
Cambiar Reservas
=============================================*/	

if(isset($_POST["idReserva"])){

	$guardar = new AjaxReservas();
	$guardar -> idReserva = $_POST["idReserva"];
	$guardar -> fechaIngreso = $_POST["fechaIngreso"];
    $guardar -> hora = $_POST["hora"];
	//$guardar -> fechaSalida = $_POST["fechaSalida"];
	$guardar -> ajaxCambiarReserva();

}