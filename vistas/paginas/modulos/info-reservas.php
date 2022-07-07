<?php 
if(isset($_POST["id-servicio"])){

	//echo '<pre class="bg-white">'; print_r($_POST["id-servicio"]); echo '</pre>';

	//echo '<pre class="bg-white">'; print_r($_POST["id-servicio"]); echo '</pre>';
	//echo '<pre class="bg-white">'; print_r($_POST["fecha-ingreso"]); echo '</pre>';
	//echo '<pre class="bg-white">'; print_r($_POST["fecha-salida"]); echo '</pre>';
	//echo '<pre class="bg-white">'; print_r($_POST["hora-reserva"]); echo '</pre>';

	$valor = $_POST["id-servicio"];

	$reservas = ControladorReservas::ctrMostrarReservas($valor);

	$indice = 0;

	if(!$reservas){

		$valor = $_POST["ruta"];
		$reservas = ControladorServicios::ctrMostrarServicios($valor);

		foreach ($reservas as $key => $value){

			if($value["id_s"] == $_POST["id-servicio"]){

				$indice = $key;
			}
		}

	}

	//echo '<pre class="bg-white">'; print_r($reservas); echo '</pre>';

}else{
	echo '<script> window.location="'.$ruta.'"</script>';
}
?>

<!--INFO RESERVAS-->

<div class="infoReservas container-fluid bg-white p-0 pb-5" idServicio="<?php echo $_POST["id-servicio"]; ?>" fechaIngreso="<?php echo $_POST["fecha-ingreso"]; ?>" fechaSalida="<?php echo $_POST["fecha-salida"]; ?>" horaReserva="<?php echo $_POST["hora-reserva"]; ?>">
	
	<div class="container">
		
		<div class="row">

			<!--=====================================
			BLOQUE IZQ
			======================================-->
			
			<div class="col-12 col-lg-8 colIzqReservas p-0">
				
				<!--=====================================
				CABECERA RESERVAS
				======================================-->
				
				<div class="pt-4 cabeceraReservas">
					
					<a href="<?php echo $ruta;  ?>habitaciones" class="float-left lead text-white pt-1 px-3">
						<h5><i class="fas fa-chevron-left"></i> Regresar</h5>
					</a>

					<div class="clearfix"></div>

					<h1 class="float-left text-white p-2 pb-lg-5">RESERVAS</h1>	

					<h6 class="float-right px-3">

					<?php if (isset($_SESSION["validarSesion"])): ?>

						<?php if ($_SESSION["validarSesion"] == "ok"): ?>

							<br>
							<a href="<?php echo $ruta;  ?>perfil" style="color:#d7957c">Ver tus reservas</a>

						<?php endif ?>

					<?php else: ?>

						<br>
						<a href="#modalIngreso" data-toggle="modal" style="color:#d7957c">Ver tus reservas</a>
						
					<?php endif ?>
						
					</h6>

					<div class="clearfix"></div>

				</div>

				<!--=====================================
				CALENDARIO RESERVAS
				======================================	-->

				<div class="bg-white p-4 calendarioReservas">

				<?php if ($valor == $_POST["ruta"]): ?>
					<h1 class="pb-5 float-left">¡Está Disponible!</h1>

					<?php else: ?>
					
					<div class="infoDisponibilidad"></div>

				<?php endif ?>					

					<div class="float-right pb-3">
							
						<ul>
							<li>
								<i class="fas fa-square-full" style="color:#FF0000"></i> No disponible
							</li>

							<li>
								<i class="fas fa-square-full" style="color:#eee"></i> Disponible
							</li>

							<li>
								<i class="fas fa-square-full" style="color:#FFCC29"></i> Tu reserva
							</li>
						</ul>

					</div>

					<div class="clearfix"></div>
			
					<div id="calendar"></div>

					<!--=====================================
					MODIFICAR FECHAS
					======================================	-->

					<h6 class="lead pt-4 pb-2">Puede modificar la fecha de acuerdo a los días disponibles:</h6>

					<form action="<?php echo $ruta; ?>reservas" method="post">

						<input type="hidden" name="id-servicio" value="<?php echo $_POST["id-servicio"]; ?>">

						<input type="hidden" name="ruta" value="<?php echo $_POST["ruta"]; ?>">

						<div class="container mb-3">

							<div class="row py-2" style="background:#d7957c">

								<div class="col-6 col-md-3 input-group pr-1">
								
									<input type="text" class="form-control datepicker entrada" placeholder="Entrada" name="fecha-ingreso" value="<?php echo $_POST["fecha-ingreso"]; ?>" required>

									<div class="input-group-append">
										
										<span class="input-group-text"><i class="far fa-calendar-alt small text-gray-dark"></i></span>
									
									</div>

								</div>

								<!-- fecha salida 
								<div class="col-6 col-md-3 input-group pl-1">
								
									<input type="text" class="form-control datepicker salida" autocomplete="off" placeholder="Salida" name="fecha-salida" value="<?php echo $_POST["fecha-salida"]; ?>" required>

									<div class="input-group-append">
										
										<span class="input-group-text"><i class="far fa-calendar-alt small text-gray-dark"></i></span>
									
									</div>

								</div> -->


								<!-- PRUEBA HORA -->
								<div class="col-6 col-md-3 input-group pl-1">
									<select class="form-control datepicker hora" name="hora-reserva" value="<?php echo $_POST["hora-reserva"]; ?>" required>
										<option value="">Selecciona Hora</option>
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

								<div class="col-12 col-md-6 mt-2 mt-lg-0 input-group">
									
									<input type="submit" class="btn btn-block btn-md text-white" value="Ver disponibilidad" style="background:black">	

								</div>

							</div>

						</div>
					</form>
					<!-- Fin Formulario Modifica -->

				</div>

			</div>

			<!--=====================================
			BLOQUE DER
			======================================-->

			<div class="col-12 col-lg-4 colDerReservas" style="display:none">

				<h4 class="mt-lg-5">Código de la Reserva:</h4>
				<h2 class="colorTitulos"><strong class="codigoReserva"></strong></h2>

				<div class="form-group">
				  <label>Fecha:</label>
				  <input type="date" class="form-control" value="<?php echo $_POST["fecha-ingreso"]; ?>" readonly>
				</div>

				<div class="form-group">
				  <label>Hora:</label>
				  <input type="text" class="form-control" value="<?php echo $_POST["hora-reserva"];?>"  readonly>
				</div>
				
				<div class="form-group">
				  <label>Servicio:</label>
				  <input type="text" class="form-control" value="<?php echo $reservas[$indice]["tipo"]." ".$reservas[$indice]["nombre_servicio"]; ?>" readonly>

			

				  <!-- <img src="img/icono.png" class="img-fluid"> -->

				</div>


				<div class="row py-4">

					<div class="col-12 col-lg-6 col-xl-7 text-center text-lg-left">	
						<h1>€ <?php echo $reservas[$indice]["precio"]; ?></h1>
					</div>
					
					<div class="col-12 col-lg-6 col-xl-5">

					<?php if (isset($_SESSION["validarSesion"])): ?>

						<?php if ($_SESSION["validarSesion"] == "ok"): ?>

							<a href="<?php echo $ruta;?>perfil" 
								class="hacerReserva" 
								idServicio="<?php echo $reservas[$indice]["id_s"]; ?>"
								infoServicio="<?php echo $reservas[$indice]["tipo"]."- ".$reservas[$indice]["nombre_servicio"]; ?>"
								pagoReserva="<?php echo $reservas[$indice]["precio"]; ?>"
								codigoReserva=""
								fechaIngreso="<?php echo $_POST["fecha-ingreso"]; ?>"
								horaReserva="<?php echo $_POST["hora-reserva"];?>">
									<button type="button" class="btn btn-dark btn-lg w-100">HACER <br> RESERVA</button>
							</a>

						<?php endif ?>

					<?php else: ?>

						<a href="#modalIngreso" data-toggle="modal" 
								class="hacerReserva" 
								idServicio="<?php echo $reservas[$indice]["id_s"]; ?>"
								infoServicio="<?php echo $reservas[$indice]["tipo"]."- ".$reservas[$indice]["nombre_servicio"]; ?>"
								pagoReserva="<?php echo $reservas[$indice]["precio"]; ?>"
								codigoReserva=""
								fechaIngreso="<?php echo $_POST["fecha-ingreso"]; ?>"
								horaReserva="<?php echo $_POST["hora-reserva"];?>">
									<button type="button" class="btn btn-dark btn-lg w-100">HACER <br> RESERVA</button>
							</a>
				
						
					<?php endif ?>

					</div>
			
				</div>

			</div> <!--fin de Bloque Der -->

		</div>

	</div>

</div>
