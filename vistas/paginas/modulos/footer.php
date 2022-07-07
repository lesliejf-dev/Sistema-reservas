<!--=====================================
CONTÁCTENOS
======================================-->

<div class="contactenos container-fluid bg-white py-4" id="contactenos">
	
	<div class="container text-center">
		
		<h1 class="py-sm-4">CONTACTO</h1>

		<form method="post">

			<div class="input-group input-group-lg">
				
				<input type="text" class="form-control mb-3 mr-2 form-control-lg" placeholder="Nombre" name="nombreContactenos" required>

				<input type="text" class="form-control mb-3 ml-2 form-control-lg" placeholder="Apellido" name="apellidoContactenos" required>

			</div>

			<div class="input-group input-group-lg">
				
				<input type="text" class="form-control mb-3 mr-2 form-control-lg" placeholder="Móvil" name="movilContactenos" required>

				<input type="text" class="form-control mb-3 ml-2 form-control-lg" placeholder="Correo Electrónico" name="emailContactenos" required>

			</div>

			<textarea class="form-control" rows="6" placeholder="Escribe aquí tu mensaje" name="mensajeContactenos" required></textarea>

			<button type="submit" class="btn btn-dark my-4 btn-lg py-3 text-uppercase w-50">Enviar</button>

			<?php

			$contactenos = new ControladorUsuarios();
			$contactenos -> ctrFormularioContactenos();

			?>

		</form>

	</div>

</div> <!-- /fin de Contactenos --> 



<!-- INFORMACION FOOTER --> 

<div class="container-fluid p-0" style="background-color:black">

<div class="container " style="background-color:black">

	<div class="row">

		<div class="col-md-3 text-white">
			<div class="align-self-stretch box p-4 py-md-5 text-center">
				<i class="fas fa-clock lead text-white float-left mx-3"></i>
				<h3 class="mb-4 text-left">Horario</h3>
				<p>Abrimos los siete dias de la semana de 10h00 - 20h00</p>
			</div>
		</div>
		
		<div class="col-md-3 text-white">
			<div class="align-self-stretch box p-4 py-md-5 text-center">
				<i class="fas fa-map lead text-white float-left mx-3"></i>
				<h3 class="mb-4 text-left">Direccion</h3>
				<p>Valencia, España</p>
			</div>
		</div>

		<div class="col-md-3 text-white">
			<div class="align-self-stretch box p-4 py-md-5 text-center">
				<i class="fas fa-phone lead text-white float-left mx-3"></i>
				<h3 class="mb-4 text-left">Teléfono</h3>
				<p>+34 665 555 555</p>
			</div>
		</div>

		
		<div class="col-md-3 text-white">
			<div class="align-self-stretch box p-4 py-md-5 text-center">
				<i class="fas fa-paper-plane lead text-white float-left mx-3"></i>			
				<h3 class="mb-4 text-left">Email</h3>
				<p>infinite_cb@gmail.com</p>
			</div>
		</div>


	</div>
</div>
</div>



<!--=====================================
FOOTER
======================================-->

<footer class="container-fluid p-0">

	<div class="grid-container">
			
		<div class="grid-item d-none d-lg-block pt-2" style="background-color:black"></div>

		<div class="grid-item d-none d-lg-block pt-2" style="background-color:black">
			
			<p>Copyright © 2022 Infinite. Todos los derechos reservados.</p>

		</div>

		<div class="grid-item pt-2" style="background-color:black"></div>

	</div>

	

</footer>



<!--=====================================
REDES SOCIALES MÓVIL
======================================-->

<ul class="redesMovil p-2 nav nav-justified">

	<li class="nav-item">
		<p class="text-light">Copyright © 2022 Infinite. Todos los derechos reservados.</p>
	</li>	

</ul>	


