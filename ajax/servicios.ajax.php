<?php
require_once "../controladores/servicios.controlador.php";
require_once "../modelos/servicios.modelo.php";


class AjaxServicios{

    public $ruta;

    public function ajaxTraerServicio(){

        $valor = $this->ruta;

        $respuesta = ControladorServicios::ctrMostrarServicios($valor);

        echo json_encode($respuesta);
    }

}

if(isset($_POST["ruta"])){

    $ruta = new AjaxServicios();
    $ruta -> ruta = $_POST["ruta"];
    $ruta -> ajaxTraerServicio();
}