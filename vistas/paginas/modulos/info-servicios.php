<?php
$valor = $_GET["pagina"];
$servicios = ControladorServicios::ctrMostrarServicios($valor);
?>


<!--=====================================
INFO SERVICIOS
======================================-->

<div class="infoServicio container-fluid bg-white p-0 pb-5">
	
	<div class="container">
		
		<div class="row">

			<!--=====================================
			BLOQUE IZQ
			======================================-->
			
			<div class="col-12 col-lg-8 colIzqServicios p-0">
				
				<!--=====================================
				CABECERA SERVICIOS
				======================================-->
				
				<div class="pt-4 cabeceraServicio">

					<a href="<?php echo $ruta;  ?>" class="float-left lead text-white pt-1 px-3">
						<h5><i class="fas fa-chevron-left"></i> Regresar</h5>
					</a>

					<h2 class="float-right text-white px-3 categoria text-uppercase"><?php echo $servicios[0]["tipo"] ?></h2>

					<div class="clearfix"></div>

					<ul class="nav nav-justified mt-lg-4">	
						<?php foreach ($servicios as $key => $value): ?>
						<li class="nav-item">

							<!-- en este caso $key seria el indice del array 0, 1, 2, etc -->
							<a class="nav-link text-white" orden="<?php echo $key; ?>" ruta="<?php echo $_GET["pagina"]; ?>" href="#">
								 <?php echo $value["nombre_servicio"]; ?>
							</a>

						</li>

						<?php endforeach ?>

						
					</ul>

				</div>


				<!--=====================================
				DESCRIPCIÓN SERVICIOS
				======================================-->	

				<div class="descripcionServicio px-3">
					<br>
					<br>
					<h1 class="colorTitulos float-left"><?php echo $servicios[0]["nombre_servicio"]." ".$servicios[0]["tipo"] ?></h1>

					<div class="clearfix mb-4"></div>	
					<div class="d-servicio">
						<?php echo $servicios[0]["descripcion_s"]; ?>
					</div>
					<br>


					<!--FORMULARIO para hacer la cita desde servicios-->
					<form action="<?php echo $ruta; ?>reservas" method="post">

						<input type="hidden" name="id-servicio" value="<?php echo $servicios[0]["id_s"]; ?>">

						<input type="hidden" name="ruta" value="<?php echo $servicios[0]["ruta"]; ?>">


						<div class="container">

							<div class="row py-2" style="background:#d7957c">

								<div class="col-6 col-md-3 input-group pr-1">
								
									<input type="text" class="form-control datepicker entrada" autocomplete="off" placeholder="Entrada" name="fecha-ingreso"  required>

									<div class="input-group-append">
										
										<span class="input-group-text"><i class="far fa-calendar-alt small text-gray-dark"></i></span>
									
									</div>

								</div>


								<!-- HORA -->
								<div class="col-6 col-md-3 input-group pl-1">
									<select class="form-control datepicker hora" name="hora-reserva"  required>
										<option>Seleccion Hora</option>
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

				</div>

			</div>
			
			<!--=====================================
			BLOQUE servicios
			======================================-->

			<div class="col-12 col-lg-4 colDerServicios">

				<!-- SERVICIOS -->
				<div class="servicios" id="servicios">

					<div class="container">

						<div class="row">

						<?php 
							$categorias = ControladorCategorias::ctrMostrarCategorias();
						?>

						<?php foreach ($categorias as $key => $value): ?>

							<?php if($_GET["pagina"] != $value["ruta"]): ?>
		
							<div class="col-12 pb-3 px-0 px-lg-3">

							<a href="<?php echo $ruta.$value["ruta"];  ?>">
					
								<figure class="text-center">
									
									<img src="<?php echo $servidor.$value["img"]; ?>" class="img-fluid" width="100%">

									
									<h5 class="py-2 text-gray-dark border">Ver detalles <i class="fas fa-chevron-right ml-2"></i></h5>
									
									<h1 class="text-white p-3 mx-auto w-50 lead" style="background:<?php echo $value["color"]; ?>"><?php echo $value["tipo"]; ?></h1>

								</figure>

							</a>

							</div>
							<?php endif ?>

						<?php endforeach ?>



						</div>

					</div>

				</div>

			</div>

		</div>

	</div>

</div>