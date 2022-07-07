/* LIMPIAR DATOS DE FORMULARIO DE REGISTRO */
$('.modal.formulario').on('hidden.bs.modal', function(){

    $(this).find('form')[0].reset();

})

/* RETIRAR ALERTA DEL INPUT EMAIL */
$('input[name="registroEmail"]').change(function(){

    $(".alert").remove();
})

/* VALIDAR QUE EMAIL NO SE REPITa */
$('input[name="registroEmail"]').change(function(){

    var email = $(this).val();

    var datos = new FormData();
    datos.append("validarEmail", email);

    $.ajax({
        
        url:urlPrincipal+"ajax/usuarios.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success:function (respuesta) {

            if(respuesta){

                var modo = respuesta["modo"];

                if(modo == "directo"){
                    modo = "esta pagina";
                }

                $("input[name='registroEmail']").val("");

                $("input[name='registroEmail']").after(`

				<div class="alert alert-warning">
					<strong>ERROR:</strong>
					El correo electrónico ya existe en la base de datos, fue registrado a través de `+modo+`, por favor ingrese otro diferente
				</div>

				`);

                return;

            }
            
        }
    })
})
