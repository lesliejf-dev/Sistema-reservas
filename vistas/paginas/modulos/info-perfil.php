<?php

$item = "id_u";
$valor = $_SESSION["id"];

$usuario = ControladorUsuarios::ctrMostrarUsuario($item, $valor);
$reservas = ControladorReservas::ctrMostrarReservasUsuario($valor);

$hoy = date("Y-m-d");
$noVencidas = 0;
$vencidas = 0;

foreach ($reservas as $key => $value){

	if($hoy >= $value["fecha_ingreso"]){
		++$vencidas;

	}else{
		++$noVencidas;
	}
}

?>


<!--=====================================
INFO PERFIL
======================================-->

<div class="infoPerfil container-fluid bg-white p-0 pb-5 pb-5">
	
	<div class="container">
		
		<div class="row">

			<!--=====================================
			BLOQUE IZQ
			======================================-->
			
			<div class="col-12 col-lg-4 colIzqPerfil p-0 px-lg-3">
				
				<div class="cabeceraPerfil pt-4">
					
					<a href="<?php echo $ruta;  ?>salir" class="float-left lead text-white pt-1 px-3 mb-4">
						<h5><i class="fas fa-chevron-left"></i> Cerrar Sesión</h5>
					</a>

					<div class="clearfix"></div>

					<h1 class="text-white p-2 pb-lg-5 text-center text-lg-left">MI PERFIL</h1>	
				</div>

				<!--=====================================
				PERFIL
				======================================-->

				<div class="descripcionPerfil">
					
					<figure class="text-center imgPerfil">

					<?php if ($usuario["foto"] == ""): ?>

						<img src="<?php echo $servidor; ?>vistas/img/usuarios/default/default.png" class="img-fluid rounded-circle">

					<?php else: ?>

						
							<img src="<?php echo $servidor.$usuario["foto"]; ?>" class="img-fluid rounded-circle">
						

					<?php endif ?>

					</figure>

					<div id="accordion">

						<div class="card">

							<div class="card-header">
								<a class="card-link" data-toggle="collapse" href="#collapseOne">
									MIS RESERVAS
								</a>
							</div>

							<div id="collapseOne" class="collapse show" data-parent="#accordion">

								<ul class="card-body p-0">

									<li class="px-2 misReservas" style="background:#FFFDF4"><?php echo $noVencidas; ?> Por realizar</li>
									<li class="px-2 text-white misReservas" style="background:#CEC5B6"><?php echo $vencidas; ?> Realizadas</li>

								</ul>

								<!--=====================================
								TABLA RESERVAS MÓVIL
								======================================-->	

								<?php

								if(!$reservas){

									echo ' <div class="d-lg-none d-flex py-2">No tiene reservas realizadas</div>';


								}

								foreach ($reservas as $key => $value){

									$servicio = ControladorServicios::ctrMostrarServicio($value["id_servicio"]);

									$categoria = ControladorCategorias::ctrMostrarCategoria($servicio["tipo_s"]);

									
									echo '<div class="d-lg-none d-flex py-2">
									
										<div class="p-2 flex-grow-1">

											<h5>'.$categoria["tipo"].'</h5>
											<h5>'.$servicio["nombre_servicio"].'</h5>
											<h5 class="small text-gray-dark">'.$value["fecha_ingreso"].' a las '.$value["hora_cita"].'</h5>

										</div>

										

										</div>
										<hr class="my-0">';
						
									}
								?>			

							</div>

						</div>

						<div class="card">

							<div class="card-header">
								<a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
									MIS DATOS
								</a>
							</div>

							<div id="collapseTwo" class="collapse" data-parent="#accordion">
								<div class="card-body p-0">

									<ul class="list-group">
										
										<li class="list-group-item small"><?php echo $usuario["nombre"]; ?></li>
										<li class="list-group-item small"><?php echo $usuario["email"]; ?></li>


										<?php if ($usuario["modo"] == "directo"): ?>

										<li class="list-group-item small">
											<button class="btn btn-dark btn-sm" data-toggle="modal" data-target="#cambiarClave">Cambiar Contraseña</button>
										</li>
										<!-- MODAL PARA CAMBIAR CLAVE -->
										<div class="modal formulario" id="cambiarClave">

											<div class="modal-dialog">
												<div class="modal-content">
													<form method="post">
														<div class="modal-header">
															<h4 class="modal-title">Cambiar Clave</h4>
															<button type="button" class="close" data-dismiss="modal">&times;</button>
														</div>
														<div class="modal-body">
															<input type="hidden" name="idUsuarioClave" value="<?php echo $usuario["id_u"]; ?>">

															<div class="form-group">
																<input type="password" class="form-control" placeholder="Nueva Clave" name="editarClave" required>
															</div>
														</div>
														<div class="modal-footer d-flex justify-content-between">
															<div>
																<button type="button" class="btn btn-danger" data-dismiss="modal;">Cerrar</button>
															</div>
															<div>
																<button type="submit" class="btn btn-primary" data-dismiss="modal;">Enviar</button>
															</div>
														</div>

														<?php

														$cambiarClave = new ControladorUsuarios();
														$cambiarClave -> ctrCambiarClave();

														?>

													</form>

												</div>

											</div>

										</div>


											<?php endif ?>

										<li class="list-group-item small">
											<button class="btn text-white btn-lg" data-toggle="modal" data-target="#cambiarFotoPerfil" style="background-color:#d7957c">Cambiar Imagen</button>
										</li>

										<!--MODAL para CAMBIAR FOTO DE PERFIL -->
										<div class="modal formulario" id="cambiarFotoPerfil">

											<div class="modal-dialog">
												<div class="modal-content">
													<form method="post" enctype="multipart/form-data">

														<div class="modal-header">
															<h4 class="modal-title">Cambiar imagen</h4>

															<button type="button" class="close" data-dismiss="modal">&times;</button>
														</div>

														<div class="modal-body">
															<input type="hidden" name="idUsuarioFoto" value="<?php echo $usuario["id_u"]; ?>">

															<div class="form-group">
																<input type="file" class="form-control-file border" name="cambiarImagen" required>

																<input type="hidden" name="fotoActual" value="<?php echo $usuario["foto"]; ?>">

															</div>
														</div>
														
														<div class="modal-footer d-flex justify-content-between">
															<div>
																<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
															</div>
															<div>
																<button type="submit" class="btn btn-primary">Enviar</button>
															</div>

														</div>

														<?php 

														$cambiarImagen = new ControladorUsuarios();
														$cambiarImagen -> ctrCambiarFotoPerfil();

														?>

													</form>

												</div>

											</div>

										</div>

									</ul>

								</div>

							</div>

						</div>

					</div>

				</div>

			</div>

			<!--=====================================
			BLOQUE DER
			======================================-->

			<div class="col-12 col-lg-8 colDerPerfil">

				<div class="row">

					<div class="col-6 d-none d-lg-block">
						
						<h4 class="float-left">Hola <?php echo $usuario["nombre"]; ?></h4>

					</div>


					<!-- RESERVAR CITA CENTRO BELLEZA cookies-->

					<div class="col-12">
						<?php if (isset($_COOKIE["codigoReserva"])): ?>

						<form action="<?php echo $ruta. 'perfil'; ?>" method="POST">
							<div class="card">
								<div class="card-header">
									<h4>Resumen:</h4>
								</div>
								<div class="card-body text-center">
									<h4>Dia: <?php echo $_COOKIE["fechaIngreso"]; ?> </h4>
									<h4>Hora: <?php echo $_COOKIE["horaReserva"]; ?> </h4>
									<h4>Servicio de <?php echo $_COOKIE["infoServicio"]; ?></h4>
									<h3>€ <?php echo $_COOKIE["pagoReserva"]; ?></h3>

								</div>
							</div> <!-- fin del card -->
						</form>

							<?php
							$datos = array("id_servicio" => $_COOKIE["idServicio"],
							"id_usuario" => $usuario["id_u"],
							"precio_r" => $_COOKIE["pagoReserva"],
							"codigo_r" => $_COOKIE["codigoReserva"],
							"descripcion_r" => $_COOKIE["infoServicio"],
							"fecha_ingreso" => $_COOKIE["fechaIngreso"],
							"hora_cita" => $_COOKIE["horaReserva"]);

							$respuesta = ControladorReservas::ctrGuardarReserva($datos);
							

							if($respuesta == "ok"){

								echo '<script>

								document.cookie = "idServicio=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path='.$ruta.';";
								document.cookie = "pagoReserva=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path='.$ruta.';";
								document.cookie = "infoServicio=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path='.$ruta.';";
								document.cookie = "codigoReserva=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path='.$ruta.';";
								document.cookie = "fechaIngreso=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path='.$ruta.';";
								document.cookie = "horaReserva=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path='.$ruta.';";

								</script>

								<div class="alert alert-success">La reserva se ha realizado exitosamente</div>
								<a href="'.$ruta.'">
								<button type="button" class="btn btn-dark btn-lg w-100">Cerrar</button>
								</a>';
								

							}
							?>
					
						<?php endif?>

					</div>



					<!--TABLA DE RESERVAS DE UN USUARIO -->
										
					<div class="col-6 d-none d-lg-block"></div>

					<div class="col-12 mt-3">
						
						<table class="table table-striped">
					    <thead style="background-color: #d7957c">
					      <tr>
					      	<th>#</th>
							<th>Codigo</th>
							<th>Tipo Servicio</th>
					        <th>Servicio</th>
					        <th>Fecha de cita</th>
					        <th>Hora</th>
					      </tr>
					    </thead>
					    <tbody>
							<?php 
					
							if(!$reservas){

								echo ' <tr><td colspan="5">No tiene reservas realizadas</td></tr>';
								
								//return;
							}
								foreach ($reservas as $key => $value){

									$servicio = ControladorServicios::ctrMostrarServicio($value["id_servicio"]);

									$categoria = ControladorCategorias::ctrMostrarCategoria($servicio["tipo_s"]);


									echo '<tr>

										<td>'.($key+1).'</td>
										<td>'.$value["codigo_r"].'</td>
										<td class="text-uppercase">'.$categoria["tipo"].'</td>
										<td class="text-uppercase">'.$servicio["nombre_servicio"].'</td>
										<td>'.$value["fecha_ingreso"].'</td>
										<td>'.$value["hora_cita"].'</td>
										
									
									</tr>';

								}   						

							?>
					
					    </tbody>
					  </table>


					</div>

				</div>
			
			</div>

		</div>

	</div>

</div>


