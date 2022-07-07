<?php

require_once "../controladores/habitaciones.controlador.php";
require_once "../modelos/habitaciones.modelo.php";

class AjaxHabitaciones{

	public $tipo_s;
	public $tipo;
    public $nombre_servicio;
    public $precio;
    public $descripcion_s;
    public $idServicio;

	/*=============================================
	Nuevo Servicio
	=============================================*/	

	public function ajaxNuevoServicio(){
	
		$datos = array( "tipo_s" => $this->tipo_s,
						"nombre_servicio" => $this->nombre_servicio,
						"precio" => $this->precio,
						"descripcion_s" => $this->descripcion_s);

		$respuesta = ControladorServicios::ctrNuevoServicio($datos);

		echo $respuesta;

	}

	/*=============================================
	Editar servicio
	=============================================*/	

	public function ajaxEditarServicio(){
	
		$datos = array( "idServicio" => $this->idServicio,
						"tipo_s" => $this->tipo_s,
						"nombre_servicio" => $this->nombre_servicio,
						"precio" => $this->precio,
						"descripcion" => $this->descripcion);

		$respuesta = ControladorHabitaciones::ctrEditarHabitacion($datos);

		echo $respuesta;

	}

	/*=============================================
	Eliminar habitación
	=============================================*/	

	public $idEliminar;
	public $galeriaHabitacion;
	public $recorridoHabitacion;

	public function ajaxEliminarHabitacion(){
	
		$datos = array( "idEliminar" => $this->idEliminar,
						"galeriaHabitacion" => $this->galeriaHabitacion,
						"recorridoHabitacion" => $this->recorridoHabitacion);

		$respuesta = ControladorHabitaciones::ctrEliminarHabitacion($datos);

		echo $respuesta;

	}

}

/*=============================================
Guardar habitación
=============================================*/	

if(isset($_POST["tipo"])){

	$habitacion = new AjaxHabitaciones();
	$habitacion -> tipo_h = $_POST["tipo_h"];
	$habitacion -> tipo = $_POST["tipo"];
    $habitacion -> estilo = $_POST["estilo"];
    $habitacion -> galeria = $_POST["galeria"];
    $habitacion -> galeriaAntigua = $_POST["galeriaAntigua"];
    $habitacion -> video = $_POST["video"];
    $habitacion -> recorrido_virtual = $_POST["recorrido_virtual"];
    $habitacion -> antiguoRecorrido = $_POST["antiguoRecorrido"];
    $habitacion -> descripcion = $_POST["descripcion"];

    if($_POST["idHabitacion"] != ""){

    	$habitacion -> idHabitacion = $_POST["idHabitacion"];
    	$habitacion -> ajaxEditarHabitacion();

    }else{

    	$habitacion -> ajaxNuevaHabitacion();

    }
  
}

/*=============================================
Eliminar habitación
=============================================*/	

if(isset($_POST["idEliminar"])){

	$eliminar = new AjaxHabitaciones();
    $eliminar -> idEliminar = $_POST["idEliminar"];
    $eliminar -> galeriaHabitacion = $_POST["galeriaHabitacion"];
    $eliminar -> recorridoHabitacion = $_POST["recorridoHabitacion"];
    $eliminar -> ajaxEliminarHabitacion();
	
}