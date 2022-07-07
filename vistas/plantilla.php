<?php

session_start();

$ruta = ControladorRuta::ctrRuta();
$servidor = ControladorRuta::ctrServidor();

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">	

	<title>Infinite</title>

	<base href="vistas/">

	<link rel="icon" href="img/icon.png">

	<!--=====================================
	VÍNCULOS CSS
	======================================-->

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

	<!-- Fuente Open Sans y Ubuntu -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300|Ubuntu" rel="stylesheet">

	<!-- bootstrap datepicker -->
	<link rel="stylesheet" href="css/plugins/bootstrap-datepicker.standalone.min.css">

	<!-- jdSlider -->
	<link rel="stylesheet" href="css/plugins/jquery.jdSlider.css">

	 <!-- fullCalendar -->
	<link rel="stylesheet" href="css/plugins/fullcalendar.min.css">

	<!-- Hoja de estilo personalizada -->
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/servicios.css">
	<link rel="stylesheet" href="css/reservas.css">
	<link rel="stylesheet" href="css/perfil.css">

	<!--=====================================
	VÍNCULOS JAVASCRIPT
	======================================-->

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

	<!-- bootstrap datepicker -->
	<script src="js/plugins/bootstrap-datepicker.min.js"></script>

	<script src="js/plugins/jquery.easing.js"></script>

	<!-- https://markgoodyear.com/labs/scrollup/ -->
	<script src="js/plugins/scrollUP.js"></script>

	<!-- jdSlider -->
	<script src="js/plugins/jquery.jdSlider-latest.js"></script>

	<!-- fullCalendar -->
	<!-- https://momentjs.com/ -->
	<script src="js/plugins/moment.js"></script>
	<!-- https://fullcalendar.io/docs/background-events-demo -->	
	<script src="js/plugins/fullcalendar.min.js"></script>
	
	<!-- sweet alert2-->
	<script src="js/plugins/sweetalert2.all.js"></script>


</head>
<body>

<?php

include "paginas/modulos/header.php";
include "paginas/modulos/modal.php";

/*=============================================
PÁGINAS
=============================================*/

if(isset($_GET["pagina"])){
	$rutasCategorias = ControladorCategorias::ctrMostrarCategorias();

	$validarRuta = "";

	foreach ($rutasCategorias as $key =>$value){

		//ruta es la ruta de la tabla categorias en la bbdd
		if($_GET["pagina"] == $value["ruta"]){

			$validarRuta = "servicios";
		}
	}

	/* VALIDAR EMAIL */
	$item = "email_encriptado";
	$valor = $_GET["pagina"];

	//si el email encriptado coincide con el email de la bbdd entonces

	$validarEmail = ControladorUsuarios::ctrMostrarUsuario($item, $valor);

	if($validarEmail["email_encriptado"] == $_GET["pagina"]){

		//actualiza el valor0 a valor1 de la bbdd
		$id = $validarEmail["id_u"];
		$item = "verificacion";
		$valor = 1;

		$verificarUsuario = ControladorUsuarios::ctrActualizarUsuario($id, $item, $valor);

		if($verificarUsuario == "ok"){

			echo'<script>

						swal({
								type:"success",
								title: "¡CORRECTO!",
								text: "Su cuenta ha sido verificada",
								showConfirmButton: true,
								confirmButtonText: "Cerrar"
							
						}).then(function(result){

								if(result.value){   
									history.back();
								} 
						});

					</script>';

				return;

		}


	}



	/* LISTA PAGINAS INTERNAS */

	
	if($_GET["pagina"] == "reservas" || $_GET["pagina"] == "perfil" || $_GET["pagina"] == "salir"){

		include "paginas/".$_GET["pagina"].".php";
		
	}else if($validarRuta != ""){

		include "paginas/servicios.php";

	}else{
		
		echo '<script>

		window.location = "'.$ruta.'";
		
		</script>';
	}

}else{

	include "paginas/inicio.php";

}


/*=============================================
PÁGINAS
=============================================*/


include "paginas/modulos/footer.php";


?>

<input type="hidden" value="<?php echo $ruta; ?>" id="urlPrincipal">
<input type="hidden" value="<?php echo $servidor; ?>" id="urlServidor">

<script src="js/plantilla.js"></script>
<script src="js/menu.js"></script>
<script src="js/servicios.js"></script>
<script src="js/reservas.js"></script>
<script src="js/usuarios.js"></script>
	
</body>
</html>