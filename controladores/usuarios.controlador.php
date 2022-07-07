<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class ControladorUsuarios{

    /*REGISTRO USUARIO */
    public function ctrRegistroUsuario(){

        if(isset($_POST["registroNombre"])){

            if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["registroNombre"]) && preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["registroEmail"]) &&
            preg_match('/^[a-zA-Z0-9]+$/', $_POST["registroClave"])
            ){
        
                $encriptarClave = crypt($_POST["registroClave"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                $encriptarEmail = md5($_POST["registroEmail"]);

                $tabla = "usuarios";

                $datos = array("nombre" => $_POST["registroNombre"],
                                "clave" => $encriptarClave,
                                "email" => $_POST["registroEmail"],
                                "foto" => "",
                                "modo" => "directo",
                                "verificacion" => 0,
                                "email_encriptado" => $encriptarEmail);

                $respuesta = ModeloUsuarios::mdlRegistroUsuario($tabla, $datos);

                if($respuesta == "ok"){

                    /*VERIFICAR EMAIL phpmailer */
                    date_default_timezone_set("Europe/Madrid");

                    $ruta = ControladorRuta::ctrRuta();

                    $mail = new PHPMailer;

                    $mail->CharSet = 'UTF-8';

                    $mail->isMail();

                    $mail->setFrom('lesliejf100@gmail.com', 'Infinite centro de belleza');

                    $mail->addReplyTo('lesliejf100@gmail.com', 'Infinite centro de belleza');

                    $mail->Subject = "Por favor verifique su correo electrónico";

                    $mail->addAddress($_POST["registroEmail"]);

                    $mail->msgHTML('<div style="width:100%; background:#eee; position:relative; font-family:sans-serif; padding-bottom:40px">
                            <div style="position:relative; margin:auto; width:600px; 
                            background:white; padding:20px">
                            
                            <center>
                    
                                <h1 style="padding:20px; width:15%">INFINITE</h1>
                    
                                <h3 style="font-weight:100; color:#999">VERIFIQUE SU DIRECCIÓN DE CORREO ELECTRÓNICO</h3>
                    
                                <hr style="border:1px solid #ccc; width:80%">
                    
                                <h4 style="font-weight:100; color:#999; padding:0 20px">Para usar su cuenta en Infinite, debe confirmar su dirección de correo electrónico</h4>
                    
                                <a href="'.$ruta.$encriptarEmail.'" target="_blank" style="text-decoration:none">
                                    
                                    <div style="line-height:60px; background: #d7957c; width:60%; color:white">Verifique su dirección de correo electrónico</div>
                    
                                </a>
                    
                                <br>
                    
                                <hr style="border:1px solid #ccc; width:80%">
                    
                                <h5 style="font-weight:100; color:#999">Si no se ha inscrito con en esta cuenta, puede ignorar este correo electrónico y la cuenta será eliminada.</h5>
                    
                    
                            </center>
                    
                    
                            </div>
                
                        </div>');

                    $envio = $mail->Send();

                    if(!$envio){

                        echo'<script>

                                swal({
                                        type:"error",
                                        title: "¡ERROR!",
                                        text: "¡Ha ocurrido un problema enviando verificación de correo electrónico a '.$_POST["registroEmail"].$mail->ErrorInfo.', por favor inténtelo de nuevo",
                                        showConfirmButton: true,
                                        confirmButtonText: "Cerrar"
                                    
                                }).then(function(result){

                                        if(result.value){   
                                            history.back();
                                        } 
                                });

                            </script>';

                    }else{

                        echo'<script>

                                swal({
                                        type:"success",
                                        title: "¡SU CUENTA HA SIDO CREADA EXITOSAMENTE!",
                                        text: "Por favor revise la bandeja de entrada o la carpeta de SPAM de su correo electrónico para verificar la cuenta",
                                        showConfirmButton: true,
                                        confirmButtonText: "Cerrar"
                                    
                                }).then(function(result){

                                        if(result.value){   
                                            history.back();
                                        } 
                                });

                            </script>';

                    }
            }
        }else{

            echo'<script>

					swal({
							type:"error",
						  	title: "¡CORREGIR!",
						  	text: "¡No se permiten caracteres especiales!",
						  	showConfirmButton: true,
							confirmButtonText: "Cerrar"
						  
					}).then(function(result){

							if(result.value){   
							    history.back();
							  } 
					});

				</script>';

        }
    }
    }
    /* MOSTRAR USUARIO */
    static public function ctrMostrarUsuario($item, $valor){

        $tabla = "usuarios";

        $respuesta = ModeloUsuarios::mdlMostrarUsuario($tabla, $item, $valor);

        return $respuesta;

    }

    /* ACTUALIZAR USUARIO A VERIFICADO */
    static public function ctrActualizarUsuario($id, $item, $valor){

        $tabla = "usuarios";

        $respuesta = ModeloUsuarios::mdlActualizarUsuario($tabla, $id, $item, $valor);

        return $respuesta;

    }

    /* INGRESO DE USUARIO */
    public function ctrIngresoUsuario(){

        if(isset($_POST["ingresoEmail"])){

            if(preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["ingresoEmail"]) &&
            preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingresoClave"])){

                $encriptarClave = crypt($_POST["ingresoClave"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                $tabla = "usuarios";
                $item = "email";
                $valor = $_POST["ingresoEmail"];

                $respuesta = ModeloUsuarios::mdlMostrarUsuario($tabla, $item, $valor);

                if($respuesta["email"] == $_POST["ingresoEmail"] && $respuesta["clave"] == $encriptarClave){

                    if($respuesta["verificacion"] == 0){

                        echo'<script>

								swal({
										type:"error",
									  	title: "¡ERROR!",
									  	text: "El correo electrónico aún no ha sido verificado, por favor revise la bandeja de entrada o la carpeta de SPAM de su correo electrónico para verificar la cuenta",
									  	showConfirmButton: true,
										confirmButtonText: "Cerrar"
									  
								}).then(function(result){

										if(result.value){   
										    history.back();
										  } 
								});

							</script>';

							return;

                    }else{

                        //variables de sesion
                        $_SESSION["validarSesion"] = "ok";
                        $_SESSION["id"] = $respuesta["id_u"];
                        $_SESSION["nombre"] = $respuesta["nombre"];
                        $_SESSION["foto"] = $respuesta["foto"];
                        $_SESSION["email"] = $respuesta["email"];
                        $_SESSION["modo"] = $respuesta["modo"];

                        $ruta = ControladorRuta::ctrRuta();

                        echo '<script>

                            window.location = "'.$ruta.'perfil";
                        
                        </script>';

                    }


                }else{

                    echo'<script>

					swal({
							type:"error",
						  	title: "¡ERROR!",
						  	text: "¡El email o contraseña no coinciden!",
						  	showConfirmButton: true,
							confirmButtonText: "Cerrar"
						  
					}).then(function(result){

							if(result.value){   
							    history.back();
							  } 
					});

				</script>';

                }

            }else{

                echo'<script>

					swal({
							type:"error",
						  	title: "¡CORREGIR!",
						  	text: "¡No se permiten caracteres especiales!",
						  	showConfirmButton: true,
							confirmButtonText: "Cerrar"
						  
					}).then(function(result){

							if(result.value){   
							    history.back();
							  } 
					});

				</script>';
            }

        }
    }

    /* CAMBIAR FOTO PERfIL */
    public function ctrCambiarFotoPerfil(){

        if(isset($_POST["idUsuarioFoto"])){

            $ruta = $_POST["fotoActual"];

            if(isset($_FILES["cambiarImagen"]["tmp_name"]) && !empty($_FILES["cambiarImagen"]["tmp_name"])){

                list($ancho, $alto) = getimagesize($_FILES["cambiarImagen"]["tmp_name"]);

                $nuevoAncho = 500;
                $nuevoAlto = 500;

                /*CREACION DE DIRECTORIO DND SE GUARDA LA FOTO */
                $directorio = "backend/vistas/img/usuarios/".$_POST["idUsuarioFoto"];

                //pregunto si existe otra img en la bbdd
                if(!empty($_POST["fotoActual"])){

                    unlink($_POST["fotoActual"]);

                }else{

                    if(!file_exists($directorio)){

                        mkdir($directorio, 0755);
                    }
                }

                // Depende del tipo de imagn jpg o png 
                if($_FILES["cambiarImagen"]["type"] == "image/jpeg"){

                    $aleatorio = mt_rand(100,999);

                    $ruta = $directorio."/".$aleatorio.".jpg";

                    $origen = imagecreatefromjpeg($_FILES["cambiarImagen"]["tmp_name"]);

                    $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                    imagejpeg($destino, $ruta);
                }

                else if($_FILES["cambiarImagen"]["type"] == "image/png"){

                    $aleatorio = mt_rand(100,999);

                    $ruta = $directorio."/".$aleatorio.".png";

                    $origen = imagecreatefrompng($_FILES["cambiarImagen"]["tmp_name"]);

                    $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                    imagealphablending($destino, FALSE);

                    imagesavealpha($destino, TRUE);

                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                    imagepng($destino, $ruta);

                }else{

                    echo'<script>

						swal({
								type:"error",
							  	title: "¡CORREGIR!",
							  	text: "¡No se permiten formatos diferentes a JPG y/o PNG!",
							  	showConfirmButton: true,
								confirmButtonText: "Cerrar"
							  
						}).then(function(result){

								if(result.value){   
								    history.back();
								  } 
						});

					</script>';

                }

                //substraigo los 8 primero caracteres de la ruta para que no se guarde la palabra backend/
                $ruta = substr($ruta, 8);

            }

            $tabla = "usuarios";
            $id = $_POST["idUsuarioFoto"];
            $item = "foto";
            $valor = $ruta;

            $actualizarFotoPerfil = ModeloUsuarios::mdlActualizarUsuario($tabla, $id, $item, $valor);

            if($actualizarFotoPerfil == "ok"){

                echo'<script>

					swal({
							type:"success",
						  	title: "¡CORRECTO!",
						  	text: "Su foto de perfil se ha actualizado correctamente",
						  	showConfirmButton: true,
							confirmButtonText: "Cerrar"
						  
					}).then(function(result){

							if(result.value){   
							    history.back();
							  } 
					});

				    </script>';

            }
        }
    }
    /* CAMBIAR CLAVE */
    public function ctrCambiarClave(){

        if(isset($_POST["editarClave"])){

            if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarClave"])){

                $encriptar = crypt($_POST["editarClave"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                $tabla = "usuarios";
                $id = $_POST["idUsuarioClave"];
                $item = "clave";
                $valor = $encriptar;

                $actualizarClave = ModeloUsuarios::mdlActualizarUsuario($tabla, $id, $item, $valor);

                if($actualizarClave == "ok"){

                    echo '<script>

                        swal({
                            type:"success",
                            title: "¡CORRECTO!",
                            text: "Su clave ha sido actualizada",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        
                        }).then(function(result){

                                if(result.value){   
                                    history.back();
                                } 
                        });

                    </script>';

                }

            }else{

                echo'<script>

                        swal({
                            type:"error",
                            title: "¡CORREGIR!",
                            text: "No se permiten caracteres especiales",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        
                        }).then(function(result){

                                if(result.value){   
                                    history.back();
                                } 
                        });

                    </script>';

            }
        }
    }

     //RECUPERAR CLAVE
    public function ctrRecuperarClave(){

        if(isset($_POST["emailRecuperarClave"])){

            if(preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["emailRecuperarClave"])){

                //Clave aleatoria
                function generarClave($longitud){

                    $clave = "";
                    $patron = "1234567890abcdefghijklmnopqrstuvwxyz";

                    $max = strlen($patron)-1;
                    for($i = 0; $i < $longitud; $i++){

                        $clave .= $patron{mt_rand(0,$max)};
                    }

                    return $clave;

                }

                $nuevaClave = generarClave(11);
                $encriptar = crypt($nuevaClave, '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                $tabla = "usuarios";
                $item = "email";
                $valor = $_POST["emailRecuperarClave"];

                $traerUsuario = ModeloUsuarios::mdlMostrarUsuario($tabla, $item, $valor);
                //comprobar que si existe ese email en la bbdd
                if($traerUsuario){

                    $id = $traerUsuario["id_u"];
                    $item = "clave";
                    $valor = $encriptar;

                    $actualizarClave = ModeloUsuarios::mdlActualizarUsuario($tabla, $id, $item, $valor);

                    if($actualizarClave == "ok"){

                            /*VERIFICAR clave phpmailer */
                            date_default_timezone_set("Europe/Madrid");
        
                            $ruta = ControladorRuta::ctrRuta();
        
                            $mail = new PHPMailer;
        
                            $mail->CharSet = 'UTF-8';
        
                            $mail->isMail();
        
                            $mail->setFrom('lesliejf100@gmail.com', 'Infinite centro de belleza');
        
                            $mail->addReplyTo('lesliejf100@gmail.com', 'Infinite centro de belleza');
        
                            $mail->Subject = "NUEVA CONTRASEÑA";
        
                            $mail->addAddress($_POST["emailRecuperarClave"]);
        
                            $mail->msgHTML('<div style="width:100%; background:#eee; position:relative; font-family:sans-serif; padding-bottom:40px">
                            <div style="position:relative; margin:auto; width:600px; 
                            background:white; padding:20px">
                            
                            <center>
                    
                                <h1 style="padding:20px; width:15%">INFINITE</h1>
                    
                                <h3 style="font-weight:100; color:#999">SOLICITUD DE NUEVA CONTRASEÑA</h3>
                    
                                <hr style="border:1px solid #ccc; width:80%">
                    
                                <h4 style="font-weight:100; color:#999; padding:0 20px"><strong>Su nueva contraseña es: </strong>'.$nuevaClave.'</h4>
                    
                                <a href="'.$ruta.'" target="_blank" style="text-decoration:none">
                                    
                                    <div style="line-height:60px; background: #d7957c; width:60%; color:white">Ingrese nuevamente a Infinite</div>
                    
                                </a>
                    
                                <br>
                    
                                <hr style="border:1px solid #ccc; width:80%">
                    
                                <h5 style="font-weight:100; color:#999">Si no se ha inscrito con en esta cuenta, puede ignorar este correo electrónico y la cuenta será eliminada.</h5>
                    
                    
                            </center>
                    
                            </div>
                    
                        </div>');
        
                            $envio = $mail->Send();
        
                            if(!$envio){
        
                                echo'<script>
        
                                        swal({
                                                type:"error",
                                                title: "¡ERROR!",
                                                text: "¡Ha ocurrido un problema enviando verificación de correo electrónico a '.$_POST["emailRecuperarClave"].$mail->ErrorInfo.', por favor inténtelo de nuevo",
                                                showConfirmButton: true,
                                                confirmButtonText: "Cerrar"
                                            
                                        }).then(function(result){
        
                                                if(result.value){   
                                                    history.back();
                                                } 
                                        });
        
                                    </script>';
        
                            }else{
        
                                echo'<script>
        
                                        swal({
                                                type:"success",
                                                title: "¡SU SOLICITUD HA SIDO RECIBIDA!",
                                                text: "Por favor revise la bandeja de entrada o la carpeta de SPAM de su correo electrónico para cambiar su contraseña",
                                                showConfirmButton: true,
                                                confirmButtonText: "Cerrar"
                                            
                                        }).then(function(result){
        
                                                if(result.value){   
                                                    history.back();
                                                } 
                                        });
        
                                    </script>';
        
                            }

                    }

                }else{

                    echo'<script>

                        swal({
                            type:"error",
                            title: "¡ERROR!",
                            text: "No existe ese correo electrónico",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        
                        }).then(function(result){

                                if(result.value){   
                                    history.back();
                                } 
                        });

                    </script>';

                }


            }else{
                echo'<script>

                        swal({
                            type:"error",
                            title: "¡CORREGIR!",
                            text: "No se permiten caracteres especiales",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        
                        }).then(function(result){

                                if(result.value){   
                                    history.back();
                                } 
                        });

                    </script>';
                
            }
        }
    }

    /*FORMULARIO DE CONTACTO   */
    public function ctrFormularioContactenos(){

        if(isset($_POST["mensajeContactenos"])){

            if( preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombreContactenos"]) &&
				preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["apellidoContactenos"]) &&
				preg_match('/^[0-9- ]+$/', $_POST["movilContactenos"]) &&
			    preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["emailContactenos"]) &&
			   preg_match('/^[?\\¿\\!\\¡\\:\\,\\.\\a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["mensajeContactenos"])
			 ){

				/*=============================================
				VERIFICACIÓN CORREO ELECTRÓNICO
				=============================================*/

				date_default_timezone_set("Europe/Madrid");

				$ruta = ControladorRuta::ctrRuta();

				$mail = new PHPMailer;

				$mail->CharSet = 'UTF-8';

				$mail->isMail();

				$mail->setFrom('lesliejf100@gmail.com', 'Infinite centro de belleza');

				$mail->addReplyTo('lesliejf100@gmail.com', 'Infinite centro de belleza');

				$mail->Subject = "Por favor verifique su dirección de correo electrónico";

				$mail->addAddress("lesliejf100@gmail.com");

				$mail->msgHTML('<div style="width:100%; background:#eee; position:relative; font-family:sans-serif; padding-bottom:40px">

                    <div style="position:relative; margin:auto; width:600px; background:white; padding-bottom:20px">
            
                        <center>
                            
                            <h1 style="padding:20px; width:15%">INFINITE</h1>
            
                            <h3 style="font-weight:100; color:#999;">HA RECIBIDO UNA CONSULTA</h3>
            
                            <hr style="width:80%; border:1px solid #ccc">
            
                            <h4 style="font-weight:100; color:#999; padding:0px 20px; text-transform:uppercase">'.$_POST["nombreContactenos"].' '.$_POST["apellidoContactenos"].'</h4>
                            <h4 style="font-weight:100; color:#999; padding:0px 20px;">Móvil: '.$_POST["movilContactenos"].'</h4>
                            <h4 style="font-weight:100; color:#999; padding:0px 20px;">Email: '.$_POST["emailContactenos"].'</h4>
                            <h4 style="font-weight:100; color:#999; padding:0px 20px">'.$_POST["mensajeContactenos"].'</h4>
            
                            <hr style="width:80%; border:1px solid #ccc">
            
                        </center>
            
                    </div>
                    
                </div>
				');

                $envio = $mail->Send();

				if(!$envio){

					echo'<script>

						swal({
								type:"error",
							  	title: "¡ERROR!",
							  	text: "Ha ocurrido un problema enviando el mensaje, vuelva a intentarlo",
							  	showConfirmButton: true,
								confirmButtonText: "Cerrar"
							  
						}).then(function(result){

								if(result.value){   
								    history.back();
								  } 
						});

					</script>';

				}else{


					echo'<script>

							swal({
								 	type: "success",
							  		title: "¡OK!",
							  		text: "¡Su mensaje ha sido enviado, muy pronto le responderemos!",					 
									showConfirmButton: true,
									confirmButtonText: "Cerrar"
								
								}).then(function(result){

									if(result.value){
										history.back();
									}
							});

					</script>';

				}	

            }else{

                echo '<script>

					swal({
					 		type:"error",
							title: "¡ERROR!",
						  	text: "Problemas al enviar el mensaje, no debe contener caracteres especiales",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"
						
						}).then(function(result){

							if(result.value){
								history.back();
							}
					});

				</script>';
            }
        }
    }

}