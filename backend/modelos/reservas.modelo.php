<?php

require_once "conexion.php";

class ModeloReservas{

	/*=============================================
	MOSTRAR USUARIOS-RESERVAS CON INNER JOIN
	=============================================*/

	static public function mdlMostrarReservas($tabla1, $tabla2, $item, $valor){

		if($item != null && $valor != null){

            //tabla1 = usuarios y tabla2 = reservas
			$stmt = Conexion::conectar()->prepare("SELECT $tabla1.*, $tabla2.* FROM $tabla1 INNER JOIN $tabla2 ON $tabla1.id_u = $tabla2.id_usuario WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT $tabla1.*, $tabla2.* FROM $tabla1 INNER JOIN $tabla2 ON $tabla1.id_u = $tabla2.id_usuario ORDER BY $tabla2.id_r DESC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	Cambiar reserva
	=============================================*/

	static public function mdlCambiarReserva($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET fecha_ingreso = :fecha_ingreso, hora_cita = :hora_cita WHERE id_r = :id_r");

		$stmt->bindParam(":fecha_ingreso", $datos["fecha_ingreso"], PDO::PARAM_STR);
		$stmt->bindParam(":hora_cita", $datos["hora_cita"], PDO::PARAM_STR);
		$stmt->bindParam(":id_r", $datos["id_r"], PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";

		}else{

			echo "\nPDO::errorInfo():\n";
    		print_r(Conexion::conectar()->errorInfo());

		}

		$stmt-> close();

		$stmt = null;

	}


}