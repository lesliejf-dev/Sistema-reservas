<?php
require_once "conexion.php";

Class ModeloReservas{
    //Mostrar Servicios-Reservas-Categorias con INNER JOIN
    static public function mdlMostrarReservas($tabla1, $tabla2, $tabla3, $valor){

        //Tabla1 = Servicios    Tabla2= Reservas    Tabla3= Categorias
        $stmt = Conexion::conectar()->prepare("SELECT $tabla1.*, $tabla2.*, $tabla3.* FROM $tabla1 INNER JOIN $tabla2 ON $tabla1.id_s = $tabla2.id_servicio INNER JOIN $tabla3 ON $tabla1.tipo_s = $tabla3.id_cat WHERE id_s = :id_s");

        $stmt -> bindParam(":id_s", $valor, PDO::PARAM_STR);
        $stmt -> execute();
        //retornamos varias filas con fetchAll
        return $stmt ->fetchAll();
        
        $stmt -> close();
        $stmt = null;
        
    }

    //Mostrar codigo Reserva
    static public function mdlMostrarCodigoReserva($tabla, $valor){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE codigo_r = :codigo_r");

        $stmt -> bindParam(":codigo_r", $valor, PDO::PARAM_STR);
        $stmt -> execute();

        return $stmt ->fetch();
        
        $stmt -> close();
        $stmt = null;
    }

    //GUARDAR RESERVA
    static public function mdlGuardarReserva($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_servicio, id_usuario, precio_r, codigo_r, descripcion_r, fecha_ingreso, hora_cita) VALUES (:id_servicio, :id_usuario, :precio_r, :codigo_r, :descripcion_r, :fecha_ingreso, :hora_cita)");

        $stmt->bindParam(":id_servicio", $datos["id_servicio"], PDO::PARAM_STR);
        $stmt->bindParam(":id_usuario", $datos["id_usuario"], PDO::PARAM_STR);
        $stmt->bindParam(":precio_r", $datos["precio_r"], PDO::PARAM_STR);
        $stmt->bindParam(":codigo_r", $datos["codigo_r"], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion_r", $datos["descripcion_r"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha_ingreso", $datos["fecha_ingreso"], PDO::PARAM_STR);
        $stmt->bindParam(":hora_cita", $datos["hora_cita"], PDO::PARAM_STR);

        if($stmt->execute()){

            return "ok";

        }else{
            return "error";
        }

        $stmt-> close();
        $stmt = null;
    }

    /* MOSTRAR RESERVA POR USUARIO */
    static public function mdlMostrarReservasUsuario($tabla, $valor){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_usuario = :id_usuario ORDER BY id_r DESC LIMIT 5");

        $stmt -> bindParam(":id_usuario", $valor, PDO::PARAM_INT);

        $stmt -> execute();

        return $stmt -> fetchAll();

        $stmt -> close();

        $stmt = null;
    }

    /* MOSTRAR NOTIFICACIONES */
    static public function mdlMostrarNotificaciones($tabla, $valor){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE tipo = :tipo");

		$stmt -> bindParam(":tipo", $valor, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;
    }

    /* ACTUALIZAR NOTIFICACIONES */
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