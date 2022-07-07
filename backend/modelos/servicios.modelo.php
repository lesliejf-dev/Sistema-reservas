<?php

require_once "conexion.php";

class ModeloServicios{

	/*=============================================
	MOSTRAR CATEGORIAS-SERVICIOS CON INNER JOIN
	=============================================*/

	static public function mdlMostrarServicios($tabla1, $tabla2, $valor){

		if($valor != null){
			//tabla1 = categorias y tabla2= servicios

			$stmt = Conexion::conectar()->prepare("SELECT $tabla1.*, $tabla2.* FROM $tabla1 INNER JOIN $tabla2 ON $tabla1.id_cat = $tabla2.tipo_s WHERE id_s = :id_s");

			$stmt -> bindParam(":id_s", $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT $tabla1.*, $tabla2.* FROM $tabla1 INNER JOIN $tabla2 ON $tabla1.id_cat = $tabla2.tipo_s ORDER BY $tabla2.id_s DESC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

	

}