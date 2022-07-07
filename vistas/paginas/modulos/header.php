<?php
$categorias = ControladorCategorias::ctrMostrarCategorias();

if(isset($_SESSION["validarSesion"])){

	if($_SESSION["validarSesion"] == "ok"){

		$item = "id_u";
		$valor = $_SESSION["id"];

		$usuario = ControladorUsuarios::ctrMostrarUsuario($item, $valor);

	}
}


$servidor = ControladorRuta::ctrServidor();
?>

<!--=====================================
HEADER
======================================-->

<header class="container-fluid p-0 bg-white">
	
	<div class="container p-0">
		
		<div class="grid-container py-2" >

			<!-- LOGO -->
			
			<div class="grid-item">

				<a href="<?php echo $ruta;  ?>">
				
					<img src="img/icono.png" class="img-fluid">

				</a>

			</div>

			<div class="grid-item d-none d-lg-block"></div>

			<!-- Calendario Y RESERVA -->

			<div class="grid-item d-none d-lg-block bloqueReservas">
				
				<div class="py-2 campana-y-reserva mostrarBloqueReservas" modo="abajo">

					<i class="fas fa-calendar lead mx-2"></i>

					<i class="fas fa-caret-up lead mx-2 flechaReserva"></i>

				</div>	

				<!--=====================================
				FORMULARIO DE RESERVAS
				======================================-->
				<form action="<?php echo $ruta; ?>reservas" method="post">

					<div class="formReservas py-1 py-lg-2 px-4">
						
						<div class="form-group my-4">
							<select class="form-control form-control-lg selectTipoServicio" required>

							<option value="">Tipo de servicio</option>

							<?php foreach ($categorias as $key => $value): ?>

							<option value="<?php echo $value["ruta"]; ?>"><?php echo $value["tipo"]; ?></option>
							
							<?php endforeach ?>
								
							</select>
						</div>

						<div class="form-group my-4">
							<select class="form-control form-control-lg selectServicio" name="id-servicio" required>
								<option value="">Servicios</option>

							</select>
						</div>
						
						<input type="hidden" id="ruta" name="ruta">

						<div class="row">
							
							<div class="col-6 input-group input-group-lg pr-1">
							
								<input type="text" class="form-control datepicker entrada" autocomplete="off" placeholder="Entrada" name="fecha-ingreso" required>

								<div class="input-group-append">
									
									<span class="input-group-text p-2">
										<i class="far fa-calendar-alt small text-gray-dark"></i>
									</span>
								
								</div>

							</div>

							<!-- <div class="col-6 input-group input-group-lg pl-1">
							
								<input type="text" class="form-control datepicker salida" placeholder="Salida" name="fecha-salida" required>

								<div class="input-group-append">
									
									<span class="input-group-text p-2">
										<i class="far fa-calendar-alt small text-gray-dark"></i>
									</span>
								
								</div>

							</div> -->

							<!-- HORA --> 
							<div class="col-6 input-group input-group-lg pl-1">
							
								<div class="form-group-text P-2">
									<select class="form-control form-control-lg datepicker hora" name="hora-reserva" required>
										<option value="">Seleccion Hora</option>
										<option>10:00</option>
										<option>11:00</option>
										<option>12:00</option>
										<option>13:00</option>
										<option>14:00</option>
										<option>16:00</option>
										<option>17:00</option>
										<option>18:00</option>
										<option>19:00</option>
										<option>20:00</option>
									</select>
								</div>

							</div>

						</div>

						<input type="submit" class="btn btn-block btn-lg my-4 text-white" value="Ver disponibilidad">
						

					</div>
				</form>		
				<!-- Fin Formulario -->

			</div>

			<!-- === INGRESO DE USUARIOS === -->

			<div class="grid-item d-none d-lg-block mt-2">

			<?php if(isset($_SESSION["validarSesion"])): ?>

				<?php if($_SESSION["validarSesion"] == "ok"): ?>

					<a href="<?php echo $ruta.'perfil'; ?>">

					<?php if($usuario["foto"] == ""): ?>

						<i class="fas fa-user"></i>

					<?php else: ?>

						

							<img src="<?php echo $servidor.$usuario["foto"]; ?>" class="img-fluid rounded-circle" style="width:30px">


					<?php endif ?>

					</a>

				<?php endif ?>

			<?php else: ?>

				<a href="#modalIngreso" data-toggle="modal"><i class="fas fa-user"></i></a>

			<?php endif ?>

			</div>
	
			<!-- MENÚ HAMBURGUESA -->

			<div class="grid-item mt-1 mt-sm-3 mt-md-4 mt-lg-2 botonMenu">
				
				<i class="fas fa-bars lead"></i>

			</div>

		</div>
		
	</div>

	<!-- enlace a zona admin -->
	<li class="nav-item">

      <a class="nav-link" href="<?php echo $servidor;?>">

        <i class="fas fa-sign-out-alt" style="color:#dfdad4">admin</i>

      </a>   

    </li>

</header>

<!--=====================================
MENÚ
======================================-->

<nav class="menu container-fluid p-0">
	
	<ul class="nav nav-justified py-2">

		<li class="nav-item">
			<a class="nav-link text-white" href="#servicios">Servicios</a>
		</li>

		<li class="nav-item">
			<a class="nav-link text-white" href="#galeria">Galeria</a>
		</li>

		<li class="nav-item">
			<a class="nav-link text-white" href="#equipo">Equipo</a>
		</li>

		<li class="nav-item">
			<a class="nav-link text-white" href="#contactenos">Contáctenos</a>
		</li>



	</ul>


</nav>

<!--=====================================
MENÚ MÓVIL
======================================-->
<div class="menuMovil">
	
	<div class="row">
		
		<div class="col-6">
			
			<a href="#modalIngreso" data-toggle="modal">
				<i class="fas fa-user lead ml-3 mt-4"></i>
			</a>

		</div>	

	</div>

	<form action="<?php echo $ruta; ?>reservas" method="post">

		<div class="formReservas py-1 py-lg-2 px-4">
					
		<div class="form-group my-4">
			<select class="form-control form-control-lg selectTipoServicio" required>

				<option value="">Tipo de servicio</option>

				<?php foreach ($categorias as $key => $value): ?>

				<option value="<?php echo $value["ruta"]; ?>"><?php echo $value["tipo"]; ?></option>

				<?php endforeach ?>
				
			</select>
		</div>

		<div class="form-group my-4">
			<select class="form-control form-control-lg selectServicio" name="id-servicio" required>
				<option value="">Servicios</option>

			</select>
		</div>

		<input type="hidden" id="ruta" name="ruta">

		<div class="row">
			
			 <div class="col-6 input-group input-group-lg pr-1">
			
				<input type="text" class="form-control datepicker entrada" placeholder="Entrada" autocomplete="off" required>

				<div class="input-group-append">
					
					<span class="input-group-text p-2">
						<i class="far fa-calendar-alt small text-gray-dark"></i>
					</span>
				
				</div>

			</div>

			<!-- <div class="col-6 input-group input-group-lg pl-1">
			
				<input type="text" class="form-control datepicker salida" placeholder="Salida" readonly>

				<div class="input-group-append">
					
					<span class="input-group-text p-2">
						<i class="far fa-calendar-alt small text-gray-dark"></i>
					</span>
				
				</div>

			</div> -->

			<div class="col-6 input-group input-group-lg pl-1">
				<select class="form-control form-control-lg datepicker hora" name="hora-reserva" required>
					<option value="">Seleccion Hora</option>
					<option>10:00</option>
					<option>11:00</option>
					<option>12:00</option>
					<option>13:00</option>
					<option>14:00</option>
					<option>16:00</option>
					<option>17:00</option>
					<option>18:00</option>
					<option>19:00</option>
					<option>20:00</option>
					

				</select>
			</div>

		</div>

		<input type="submit" class="btn btn-block btn-lg my-4 text-white" value="Ver disponibilidad" style="background:black">
		
	</div>

	</form>
	

	<ul class="nav flex-column mt-4 pl-4 mb-5">

		<li class="nav-item">
			<a class="nav-link text-white my-2" href="#servicios">Servicios</a>
		</li>

		<li class="nav-item">
			<a class="nav-link text-white my-2" href="#galeria">Galeria</a>
		</li>

		<li class="nav-item">
			<a class="nav-link text-white my-2" href="#equipo">Equipo</a>
		</li>

		<li class="nav-item">
			<a class="nav-link text-white my-2" href="#contactenos">Contáctenos</a>
		</li>

	</ul>

</div>
