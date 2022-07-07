/*=============================================
FECHAS RESERVA
=============================================*/
$('.datepicker.entrada').datepicker({
	startDate: '0d',
	format: 'yyyy-mm-dd',
	todayHighlight:true
});

$('.datepicker.entrada').change(function(){

	var fechaEntrada = $(this).val();

	$('.datepicker.salida').datepicker({
		startDate: fechaEntrada,
		datesDisabled: fechaEntrada,
		format: 'yyyy-mm-dd'
	});

})

/* ===SELECTS ANIDADOS=== */
$(".selectTipoServicio").change(function(){

  var ruta = $(this).val();

  if(ruta != ""){

    $(".selectServicio").html("");

  }else{

    $(".selectServicio").html('<option>Servicios</option>')
  }

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

      $("input[name='ruta']").val(respuesta[0]["ruta"]);

      for(var i = 0; i < respuesta.length; i++ ){

        $(".selectServicio").append('<option value="'+respuesta[i]["id_s"]+'">'+respuesta[i]["nombre_servicio"]+'</option>')
      }

    }
  })

})


/*=============================================
CALENDARIO
=============================================*/
if($(".infoReservas").html() != undefined){

  var idServicio = $(".infoReservas").attr("idServicio");
  var fechaIngreso = $(".infoReservas").attr("fechaIngreso");
  var fechaSalida = $(".infoReservas").attr("fechaSalida");
  var horaReserva = $(".infoReservas").attr("horaReserva");

  var totalEventos = [];
  var opcion1 = [];
  var validarDisponibilidad = false;


  var datos = new FormData();
  datos.append("idServicio", idServicio);

  $.ajax({

    url:urlPrincipal+"ajax/reservas.ajax.php",
    method:"POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success:function(respuesta){

      //mostrar disponibilidad en el calendario
      if(respuesta.length == 0){
      
        $('#calendar').fullCalendar({
          header: {
              left: 'prev',
              center: 'title',
              right: 'next'
          },
          events: [
            {
              start: fechaIngreso,
              end: fechaSalida,
              rendering: 'background',
              color: '#FFCC29'
            }     
          ]

        }); //fin de Calendar
        
        colDerReservas();

      }else{

        for(var i = 0; i < respuesta.length; i++){

          //VALIDAR cruce de fechas y hora, opcion1
          if(fechaIngreso == respuesta[i]["fecha_ingreso"] && horaReserva == respuesta[i]["hora_cita"]){

            opcion1[i] = false;

          }else{

            opcion1[i] = true;

          }

          //console.log("opcion1[i]", opcion1[i]);

          //Validar Disponibilidad
          if(opcion1[i] == false){

            validarDisponibilidad = false;

          }else{
            validarDisponibilidad = true;

          }
          
          //console.log("validarDisponibilidad", validarDisponibilidad);

          if(!validarDisponibilidad){

            totalEventos.push(
              {
                "start": respuesta[i]["fecha_ingreso"],
                "end": respuesta[i]["fecha_salida"],
                "rendering": 'background',
                "color": '#FF0000'
              })

              $(".infoDisponibilidad").html('<h5 class="pb-5 float-left">Lo sentimos, no hay disponibilidad en ese horario<br><br><strong>Por favor, vuelve a intentarlo</strong></h5>');



              break;

          }else{

            totalEventos.push(
 
              {
                "start": respuesta[i]["fecha_ingreso"],
                "end": respuesta[i]["fecha_salida"],
                "rendering": 'background',
                "color": '#FF0000'
              }
            )
            $(".infoDisponibilidad").html('<h1 class="pb-5 float-left">¡Está Disponible!</h1>');
            colDerReservas();

          }
          
        } //fin del for

        if(validarDisponibilidad){
          totalEventos.push(
            {
              "start": fechaIngreso,
              "end": fechaSalida,
              "rendering": 'background',
              "color": '#FFCC29'
            }
          )
        }

          $('#calendar').fullCalendar({
            header: {
                left: 'prev',
                center: 'title',
                right: 'next'
            },
            events: totalEventos

          }); //fin de Calendar

      }//fin del else

    } //fin respuesta
  })
  //fin ajax


} //fin infoReservas

/* ===CODIGO ALEATORIO=== */
var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";

function codigoAleatorio(chars, length){

  codigo = "";

  for(var i = 0; i < length; i++){

    rand = Math.floor(Math.random()*chars.length);
    codigo += chars.substr(rand, 1);

  }
  return codigo;

}

/* ===FUNCION COL DERECHA RESERVAS=== */
function colDerReservas(){

  $(".colDerReservas").show();

  var codigoReserva = codigoAleatorio(chars, 9);
  
  var datos = new FormData();
  datos.append("codigoReserva", codigoReserva);

  $.ajax({

    url:urlPrincipal+"ajax/reservas.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success:function(respuesta){
      
      if(!respuesta){

        $(".codigoReserva").html(codigoReserva);
        //confirmar aun o borrar
        $(".hacerReserva").attr("codigoReserva", codigoReserva);

      }else{

        $(".codigoReserva").html(codigoReserva+codigoAleatorio(chars, 3));
        //confirmar aun o borrar
        $(".hacerReserva").attr("codigoReserva", codigoReserva+codigoAleatorio(chars, 3));
      }

    }

  })
} //fin function colDerReservas


/* ===FUNCION PARA GENERAR COOKIES */
function crearCookie(nombre, valor, diasExpedicion){

  var hoy = new Date();

  hoy.setTime(hoy.getTime() + (diasExpedicion * 24 * 60 * 60 *1000));

  var fechaExpedicion = "expires=" + hoy.toUTCString();

  document.cookie = nombre + "=" + valor + "; " + fechaExpedicion;


}


/* ===CAPTURAR DATOS RESERVA=== */
$(".hacerReserva").click(function(){

  var idServicio = $(this).attr("idServicio");
  //console.log("idServicio", idServicio);
  var infoServicio = $(this).attr("infoServicio");
  
  var pagoReserva = $(this).attr("pagoReserva");
  
  var codigoReserva = $(this).attr("codigoReserva");
  
  var fechaIngreso = $(this).attr("fechaIngreso");
  
  var horaReserva = $(this).attr("horaReserva");
  

  crearCookie("idServicio", idServicio, 1);
  crearCookie("infoServicio", infoServicio, 1);
  crearCookie("pagoReserva", pagoReserva, 1);
  crearCookie("codigoReserva", codigoReserva, 1);
  crearCookie("fechaIngreso", fechaIngreso, 1);
  crearCookie("horaReserva", horaReserva, 1);

})