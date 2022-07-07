<?php

require_once "../controladores/reservas.controlador.php";
require_once "../modelos/reservas.modelo.php";



class AjaxUsuarios{

	/*=============================================
	Sumar reservas de usuarios
	=============================================*/	

	public $idUsuarioR;

	public function ajaxSumarReservas(){

		$respuesta = ControladorReservas::ctrMostrarReservas("id_usuario", $this->idUsuarioR);

		echo json_encode($respuesta);

	}

}

/*=============================================
Sumar reservas de usuarios
=============================================*/	

if(isset($_POST["idUsuarioR"])){

	$sumaReserva = new AjaxUsuarios();
	$sumaReserva -> idUsuarioR = $_POST["idUsuarioR"];
	$sumaReserva -> ajaxSumarReservas();

}

