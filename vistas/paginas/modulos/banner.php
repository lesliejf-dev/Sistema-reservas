<?php 
$banner = ControladorBanner::ctrMostrarBanner();

?>
<!--BANNER-->

<div class="banner container-fluid p-0">
	
	<div class="jd-slider fade-slider">
		
		<div class="slide-inner">
			
			<ul class="slide-area">
                <?php foreach ($banner as $key => $value): ?>
				
				 <li>					
                    <img src="<?php echo $servidor.$value["img"]; ?>" width="100%">
                </li>

                <?php endforeach ?>

			</ul>

		</div>

	 	<div class="controller d-none">
		 	
			<a class="auto" href="#">

                <i class="fas fa-play fa-xs"></i>
                <i class="fas fa-pause fa-xs"></i>

            </a>

            <div class="indicate-area"></div>

	 	</div>

	 	<div class="verMas text-center bg-white rounded-circle d-none d-lg-block" vinculo="#servicios">
    
    		<i class="fas fa-chevron-down"></i>	

    	</div>

	</div>
	

</div>

<div class="container-fluid bg-white">
	<section class="container bg-white">
		<h1 class="pt-4 text-center">MÁXIMA PROFESIONALIDAD</h1>
		<p class="row p-4 text-center"> Somos un centro de belleza especializado para cuidar y asesorar en todos los aspectos relacionados con la belleza. Estamos comprometidos a aconsejarte y ayudarte para que te sientas mejor que nunca, cuidando al detalle el grado de satisfacción de todos nuestros clientes.
		</p>
	</section>
</div>

