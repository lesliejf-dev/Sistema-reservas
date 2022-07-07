<?php
require_once "../controladores/reservas.controlador.php";
require_once "../modelos/reservas.modelo.php";


class AjaxReservas{

    /*===Traer Reserva del servicio ===*/
    public $idServicio;

    public function ajaxTraerReserva(){

        $valor = $this->idServicio;

        $respuesta = ControladorReservas::ctrMostrarReservas($valor);

        echo json_encode($respuesta);
    }

    /* TRAER RESERVA DENTRO DEL CODIGO */
    public $codigoReserva;

    public function ajaxTraerCodigoReserva(){

        $valor = $this->codigoReserva;

        $respuesta = ControladorReservas::ctrMostrarCodigoReserva($valor);

        echo json_encode($respuesta);
    }

}


/*===Traer Reserva del servicio ===*/
if(isset($_POST["idServicio"])){

    $idServicio = new AjaxReservas();
    $idServicio -> idServicio = $_POST["idServicio"];
    $idServicio -> ajaxTraerReserva();
}

/*===Traer Reserva desde CODIGO ===*/
if(isset($_POST["codigoReserva"])){

    $codigoReserva = new AjaxReservas();
    $codigoReserva -> codigoReserva = $_POST["codigoReserva"];
    $codigoReserva -> ajaxTraerCodigoReserva();
}

