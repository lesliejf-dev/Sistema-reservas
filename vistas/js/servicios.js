//ACTIVAR EL COLOR DEL PRIMER BOTON
var enlacesServicios = $(".cabeceraServicio ul.nav li.nav-item a");

//capturar el titulo del boton
var tituloBtn = [];

for(var i = 0; i < enlacesServicios.length; i++){

    $(enlacesServicios[i]).removeClass("active");
    $(enlacesServicios[i]).children("i").remove;
    tituloBtn[i] = $(enlacesServicios[i]).html();
} 

$(enlacesServicios[0]).addClass("active");
$(enlacesServicios[0]).html('<i class="fas fa-chevron-right"></i>'+ tituloBtn[0]);

//retirar el ultimo borde de la botonera de servicios
$(enlacesServicios[enlacesServicios.length -1]).css({"border-right":0})

//=== ENLACES SERVICIOS
$(".cabeceraServicio ul.nav li.nav-item a").click(function(e){
    
    e.preventDefault();

    var orden = $(this).attr("orden");
    var ruta = $(this).attr("ruta");

    //ciclo for para que se quite la flecha del enlace en el que ya no estamos
    for(var i = 0; i < enlacesServicios.length; i++){

        $(enlacesServicios[i]).removeClass("active");
        $(enlacesServicios[i]).children("i").remove();
        tituloBtn[i] = $(enlacesServicios[i]).html();
    } 

    $(enlacesServicios[orden]).addClass("active");
    $(enlacesServicios[orden]).html('<i class="fas fa-chevron-right"></i>'+ tituloBtn[orden]);


    //AJAX SERVICIOS
    var datos = new FormData();
    datos.append("ruta", ruta);

    $.ajax({

        url:urlPrincipal+"ajax/servicios.ajax.php",
        method:"POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success:function(respuesta){

            $(".descripcionServicio h1").html(respuesta[orden]["nombre_servicio"]+" "+respuesta[orden]["tipo"]);

            $(".d-servicio").html( respuesta[orden]["descripcion_s"]);

            $('input[name="id-servicio"]').val(respuesta[orden]["id_s"]);

        }
    })
})


