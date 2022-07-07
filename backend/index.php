<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/ruta.controlador.php";

require_once "controladores/administradores.controlador.php";
require_once "modelos/administradores.modelo.php";

require_once "controladores/servicios.controlador.php";
require_once "modelos/servicios.modelo.php";

require_once "controladores/reservas.controlador.php";
require_once "modelos/reservas.modelo.php";

require_once "controladores/usuarios.controlador.php";
require_once "modelos/usuarios.modelo.php";

require_once "controladores/inicio.controlador.php";
require_once "modelos/inicio.modelo.php";


$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();