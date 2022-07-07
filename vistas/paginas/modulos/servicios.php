<?php
$categorias = ControladorCategorias::ctrMostrarCategorias();
?>


<!--=====================================
SERVICIOS
======================================-->


<div class="servicios container-fluid bg-light" id="servicios">
	
	<div class="container">

		<h1 class="pt-4 text-center">SERVICIOS</h1>

		<div class="row p-4 text-center">

			<?php foreach ($categorias as $key => $value): ?>
				<div class="col-12 col-lg-4 pb-3 px-0 px-lg-3">

				<a href="<?php echo $ruta.$value["ruta"];  ?>">
					
					<figure class="text-center">
						
						<img src="<?php echo $servidor.$value["img"]; ?>" class="img-fluid" width="100%">		

						<h5 class="py-2 text-gray-dark border">Ver todos <i class="fas fa-chevron-right ml-2"></i></h5>
						
						<h1 class="text-white p-3 mx-auto w-50 lead" style="background:<?php echo $value["color"]; ?>"><?php echo $value["tipo"]; ?></h1>

					</figure>

				</a>

				</div>
			<?php endforeach ?>

		</div>

	</div>

</div>