<?php
Class ControladorReservas{
    //Mostrar reservas
    static public function ctrMostrarReservas($valor){
        
        //nombre de la tabla de la bd
        $tabla1= "servicios";
        $tabla2= "reservas";
        $tabla3= "categorias";
        
        $respuesta = ModeloReservas::mdlMostrarReservas($tabla1, $tabla2, $tabla3, $valor);

        return $respuesta;
    }

    /*MOSTRAR CODIGO RESERVA DE UNO en UNO */
    static public function ctrMostrarCodigoReserva($valor){

        $tabla = "reservas";
        $respuesta = ModeloReservas::mdlMostrarCodigoReserva($tabla, $valor);

        return $respuesta;
    }

    /* GUARDAR RESERVA */
    static public function ctrGuardarReserva($valor){
        $tabla = "reservas";
        $respuesta = ModeloReservas::mdlGuardarReserva($tabla, $valor);

        if($respuesta !=""){
             //notificaciones
            $traerNotificaciones = ModeloReservas::mdlMostrarNotificaciones("notificaciones", "reservas");
            $cantidad = $traerNotificaciones["cantidad"]+1;
            $actualizarNotificaciones = ModeloReservas::mdlActualizarNotificaciones("notificaciones", "reservas", $cantidad);

            return $respuesta;

        }

       

    }

    /* MOSTRAR RESERVA SEGUN USUARIO */
    static public function ctrMostrarReservasUsuario($valor){

        $tabla = "reservas";

        $respuesta = ModeloReservas::mdlMostrarReservasUsuario($tabla, $valor);

        return $respuesta;
    }


}