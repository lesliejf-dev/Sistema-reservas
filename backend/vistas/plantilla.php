<?php
session_start();

$ruta = ControladorRuta::ctrRuta();
$rutaBackend = ControladorRuta::ctrRutaBackend();

if(isset($_SESSION["idBackend"])){

	$admin = ControladorAdministradores::ctrMostrarAdministradores("id", $_SESSION["idBackend"]);

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<meta http-equiv="x-ua-compatible" content="ie=edge">

	<title>Infinite | Administrador</title>

	<link rel="icon" href="vistas/img/plantilla/icon.png">

	<!--=====================================
	VÍNCULOS CSS
	======================================-->
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" >

	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css" integrity="zmfNZmXoNWBMemUOo1XUGFfc0ihGGLYdgtJS3KCr/l0=">

	<script src="https://kit.fontawesome.com/b1f779278c.js" crossorigin="anonymous"></script>

	 <!-- Google Font: Source Sans Pro -->
  	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

	<!-- Theme style AdmninLTE -->
  	<link rel="stylesheet" href="vistas/css/plugins/adminlte.min.css">

  	<!-- DataTables -->
	<link rel="stylesheet" href="vistas/css/plugins/dataTables.bootstrap4.min.css">	
	<link rel="stylesheet" href="vistas/css/plugins/responsive.bootstrap.min.css">

	<!-- Bootstrap Color Picker -->
	 <link rel="stylesheet" href="vistas/css/plugins/bootstrap-colorpicker.min.css">

	<!-- iCheck -->
  	<link rel="stylesheet" href="vistas/css/plugins/iCheck-flat-blue.css">	

	<!-- bootstrap datepicker -->
	<link rel="stylesheet" href="vistas/css/plugins/bootstrap-datepicker.standalone.min.css">

	 <!-- fullCalendar -->
	<link rel="stylesheet" href="vistas/css/plugins/fullcalendar.min.css">

	<!--=====================================
	VÍNCULOS JAVASCRIPT
	======================================-->

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
	
	<!-- AdminLTE App -->
	<script src="vistas/js/plugins/adminlte.min.js"></script>

	<!-- DataTables 
	https://datatables.net/-->
  	<script src="vistas/js/plugins/jquery.dataTables.min.js"></script>
  	<script src="vistas/js/plugins/dataTables.bootstrap4.min.js"></script> 
	<script src="vistas/js/plugins/dataTables.responsive.min.js"></script>
  	<script src="vistas/js/plugins/responsive.bootstrap.min.js"></script>	

  	<!-- SWEET ALERT 2 -->	
	<!-- https://sweetalert2.github.io/ -->
	<script src="vistas/js/plugins/sweetalert2.all.js"></script>

	<!-- CKEDITOR -->
	<!-- https://ckeditor.com/ckeditor-5/#classic -->
	<script src="vistas/js/plugins/ckeditor.js"></script>

	<!-- bootstrap color picker 
	https://farbelous.github.io/bootstrap-colorpicker/v2/-->
  	<script src="vistas/js/plugins/bootstrap-colorpicker.min.js"></script>

  	<!-- iCheck -->
	<!-- http://icheck.fronteed.com/ -->
	<script src="vistas/js/plugins/icheck.min.js"></script>

	<!-- bootstrap datepicker -->
	<!-- https://bootstrap-datepicker.readthedocs.io/en/latest/ -->
	<script src="vistas/js/plugins/bootstrap-datepicker.min.js"></script>

	<!-- fullCalendar -->
	<!-- https://momentjs.com/ -->
	<script src="vistas/js/plugins/moment.js"></script>
	<!-- https://fullcalendar.io/docs/background-events-demo -->	
	<script src="vistas/js/plugins/fullcalendar.min.js"></script>


	<style>
		
	.fc-today{
		background:rgba(255,255,255,0) !important;
	}

	</style>

</head>

<?php if(!isset($_SESSION["validarSesionBackend"])):

	include "paginas/login.php";

?> 

<?php else: ?>


<body class="hold-transition sidebar-mini sidebar-collapse">

	<div class="wrapper">

		<?php 

		include "paginas/modulos/header.php";

		include "paginas/modulos/menu.php";

		/*=============================================
		Navagación de páginas
		=============================================*/
		
		if(isset($_GET["pagina"])){

			if($_GET["pagina"] == "inicio" ||
			   $_GET["pagina"] == "administradores" ||
			   $_GET["pagina"] == "servicios" ||
			   $_GET["pagina"] == "reservas" ||
			   $_GET["pagina"] == "usuarios" || 
			   $_GET["pagina"] == "salir"){

				include "paginas/".$_GET["pagina"].".php";

			}else{

				include "paginas/error404.php";

			}


		}else{

			include "paginas/inicio.php";

		}

		include "paginas/modulos/footer.php";


		?>


	</div>

	<script src="vistas/js/administradores.js"></script>
	<script src="vistas/js/servicios.js"></script>
	<script src="vistas/js/reservas.js"></script>
	<script src="vistas/js/usuarios.js"></script>
		
	
</body>

<?php endif ?>

</html>