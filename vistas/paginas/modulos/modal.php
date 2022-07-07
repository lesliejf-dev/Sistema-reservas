

<!--=====================================
VENTANA MODAL INGRESO
======================================-->

<div class="modal formulario" id="modalIngreso">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header bg-dark text-white">
        <h4 class="modal-title">Ingresar</h4>
        <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body">


      	<!--=====================================
		INGRESO DIRECTO
		======================================-->

		<hr class="mt-0">

		<form method="post">

			<div class="input-group mb-3">

			    <div class="input-group-prepend">

			      <span class="input-group-text">
			      	
			      	<i class="far fa-envelope"></i>

			      </span>

			    </div>

			    <input type="email" class="form-control" placeholder="Email" name="ingresoEmail" required>

		  	</div>

		  	<div class="input-group mb-3">

			    <div class="input-group-prepend">

			      <span class="input-group-text">
			      	
					<i class="fas fa-unlock-alt"></i>

			      </span>

			    </div>

			    <input type="password" class="form-control" placeholder="Contraseña" name="ingresoClave" required>

		  	</div>

			<div class="text-center pb-3">

				<a href="#modalRecuperarClave" data-toggle="modal" data-dismiss="modal" style="color:#d7957c">
					¿Olvidaste tu contraseña?
				</a>

			</div>
			

			<input type="submit" class="btn btn-dark btn-block" value="Ingresar">

			<?php

				$ingresoUsuario = new ControladorUsuarios();
				$ingresoUsuario -> ctrIngresoUsuario();

			?>

		</form>

      </div>


      <div class="modal-footer">
        
		¿No tienes una cuenta? | 

		<strong>

			<a href="#modalRegistro" data-toggle="modal" data-dismiss="modal" style="color:#d7957c">
				Registrarse
			</a>

		</strong>

      </div>

    </div>

  </div>

</div>

<!--=====================================
VENTANA MODAL REGISTRO
======================================-->

<div class="modal formulario" id="modalRegistro">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header bg-dark text-white">
        <h4 class="modal-title">Registarse</h4>
        <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body">


      	<!--=====================================
		REGISTRO DIRECTO
		======================================-->

		<hr class="mt-0">

		<form method="post">

			<div class="input-group mb-3">

			    <div class="input-group-prepend">

			      <span class="input-group-text">
			      	
			      	<i class="far fa-user"></i>

			      </span>

			    </div>

			    <input type="text" class="form-control" placeholder="Nombre" name="registroNombre" required>

		  	</div>


			<div class="input-group mb-3">

			    <div class="input-group-prepend">

			      <span class="input-group-text">
			      	
			      	<i class="far fa-envelope"></i>

			      </span>

			    </div>

			    <input type="email" class="form-control" placeholder="Email" name="registroEmail" required>

		  	</div>

		  	<div class="input-group mb-3">

			    <div class="input-group-prepend">

			      <span class="input-group-text">
			      	
					<i class="fas fa-unlock-alt"></i>

			      </span>

			    </div>

			    <input type="password" class="form-control" placeholder="Contraseña" name="registroClave" required>

		  	</div>

			<input type="submit" class="btn btn-dark btn-block" value="Registrarse">

			<?php

			$registroUsuario = new ControladorUsuarios();
			$registroUsuario -> ctrRegistroUsuario();

			?>

		</form>

      </div>


      <div class="modal-footer">
        
		¿Ya tienes una cuenta registrada? | 

		<strong>

			<a href="#modalIngreso" data-toggle="modal" data-dismiss="modal" style="color:#d7957c">
				Ingresar
			</a>

		</strong>

      </div>

    </div>

  </div>

</div>

<!--VENTANA PARA RECUPERAR CLAVE -->
<div class="modal formulario" id="modalRecuperarClave">

	<div class="modal-dialog">

		<div class="modal-content">

			<div class="modal-header bg-dark text-white">
				
				<h4 class="modal-title">Recuperar contraseña</h4>

				<button type="button" class="close text-white" data-dismiss="modal">&times;</button>

			</div>
			<div class="modal-body">
				<form method="post">

					<p class="text-muted">Ingresa tu correo electrónico y te enviaremos un enlace para que recuperes el acceso a tu cuenta.</p>

					<div class="input-group mb-3">

						<div class="input-group-prepend">

							<span class="input-group-text">
								<i class="far fa-envelope"></i>
							</span>

						</div>
						<div>
							<input type="email" class="form-control" placeholder="Email" name="emailRecuperarClave" required>
						</div>

						<input type="submit" class="btn btn-dark btn-block" value="Enviar">

						<?php
							$recuperarClave = new ControladorUsuarios();
							$recuperarClave -> ctrRecuperarClave();
						?>

					</div>

				</form>

			</div>

		</div>

	</div>

</div>
