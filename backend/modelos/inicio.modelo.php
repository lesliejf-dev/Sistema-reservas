<?php

require_once "conexion.php";

class ModeloInicio{

    /*=============================================
	Mostrar Notificaciones
	=============================================*/

	static public function mdlMostrarNotificaciones($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	Actualizar notificaciones
	=============================================*/

	static public function mdlActualizarNotificaciones($tabla, $tipo, $cantidad){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET cantidad = :cantidad WHERE tipo = :tipo");

		$stmt -> bindParam(":cantidad", $cantidad, PDO::PARAM_STR);
		$stmt -> bindParam(":tipo", $tipo, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			echo "\nPDO::errorInfo():\n";
    		print_r(Conexion::conectar()->errorInfo());

		}

		$stmt -> close();

		$stmt = null;


	}	


}