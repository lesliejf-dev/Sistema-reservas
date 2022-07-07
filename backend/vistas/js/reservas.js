/*=============================================
Tabla Reservas
=============================================*/

// $.ajax({

//     "url":"ajax/tablaReservas.ajax.php",
//     success: function(respuesta){
      
//      console.log("respuesta", respuesta);

//     }

// })

$(".tablaReservas").DataTable({
	"ajax":"ajax/tablaReservas.ajax.php",
	"deferRender": true,
	"retrieve": true,
	"processing": true,
	"language": {
  
	   "sProcessing":     "Procesando...",
	  "sLengthMenu":     "Mostrar _MENU_ registros",
	  "sZeroRecords":    "No se encontraron resultados",
	  "sEmptyTable":     "Ningún dato disponible en esta tabla",
	  "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
	  "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
	  "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
	  "sInfoPostFix":    "",
	  "sSearch":         "Buscar:",
	  "sUrl":            "",
	  "sInfoThousands":  ",",
	  "sLoadingRecords": "Cargando...",
	  "oPaginate": {
		"sFirst":    "Primero",
		"sLast":     "Último",
		"sNext":     "Siguiente",
		"sPrevious": "Anterior"
	  },
	  "oAria": {
		  "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
		  "sSortDescending": ": Activar para ordenar la columna de manera descendente"
	  }
  
	 }
  
  });
  
  /*=============================================
  FECHAS RESERVA
  =============================================*/
  
  $('.datepicker.entrada').datepicker({
	startDate: '0d',
	datesDisabled: '0d',
	format: 'yyyy-mm-dd',
	todayHighlight:true
  });
  
  
  /*=============================================
  EDITAR RESERVA
  =============================================*/
  
  $(document).on("click", ".editarReserva", function(){
  
	//estos se capturan desde tablaReservas
	  var descripcion = $(this).attr("descripcion");
	  var idServicio = $(this).attr("idServicio");
	  var fechaIngreso = $(this).attr("fechaIngreso");
	  var fechaSalida = $(this).attr("fechaSalida");
	  var hora = $(this).attr("hora");
	  var idReserva = $(this).attr("idReserva");
  
	  $(".agregarCalendario").html('<div id="calendar"></div>');
	  //$('#calendar').fullCalendar();
  
	  // Agregar descripción al título del modal  
	  $(".modal-title span").html(descripcion);
  
	   // Agregar las fechas de reserva al formulario
	  $(".datepicker.entrada").val(fechaIngreso);
	  //$(".datepicker.salida").val(fechaSalida);
	  $(".datepicker.hora").val(hora);
  
	  // Agregar id de la habitación al botón ver disponibilidad
		$(".verDisponibilidad").attr("idServicio", idServicio);
  
		//Agregar id de la reserva al botón guardar
		$(".guardarNuevaReserva").attr("idReserva", idReserva);
  
		//Traer las resertvas existentes del servicio
		var totalEventos = [];
		var datos = new FormData();
		datos.append("idServicio", idServicio);
  
		$.ajax({
  
		  url:"ajax/reservas.ajax.php",
		  method: "POST",
		  data: datos,
		  cache: false,
		  contentType: false,
		  processData: false,
		  dataType: "json",
		  success:function(respuesta){
			  
			  for(var i = 0; i < respuesta.length; i++){
  
				  if(fechaIngreso != respuesta[i]["fecha_ingreso"] && hora != respuesta[i]["hora_cita"]){
  
					  // Agregamos las fechas que ya están reservadas de ese servicio
					  totalEventos.push(
  
						  {
							"start": respuesta[i]["fecha_ingreso"],
							"end": respuesta[i]["fecha_salida"],
							"rendering": 'background',
							"color": '#847059'
						  }
  
					  )
  
				  }
  
			  }
  
			   // Agregamos las fechas de la reserva
			   totalEventos.push(
				   {
					  "start": fechaIngreso,
					  "end": fechaSalida,
					  "rendering": 'background',
					  "color": '#FFCC29'
					}
				)
		  
  
			  /*=============================================
				CALENDARIO
				=============================================*/
  
				$('#calendar').fullCalendar({
  
					defaultDate:fechaIngreso,
					header: {
					left: 'prev',
					center: 'title',
					right: 'next'
				  },
				  events:totalEventos
  
				});
  
		  }
  
	  })
  

  
  })
  
  
  /*=============================================
  VER DISPONIBILIDAD NUEVA RESERVA
  =============================================*/
  
  $(document).on("click",".verDisponibilidad", function(){
  
	  var fechaIngreso = $(".datepicker.entrada").val();
		var fechaSalida = $(".datepicker.salida").val();
		var hora = $(".datepicker.hora").val();
		var idServicio = $(this).attr("idServicio");
  
		// Reiniciar Calendario cada vez que busque disponibilidad
		$(".agregarCalendario").html('<div id="calendar"></div>');
  
		var totalEventos = [];
		var opcion1 = [];
		var opcion2 = [];
		var opcion3 = [];
		var validarDisponibilidad = false;
  
		var datos = new FormData();
		datos.append("idServicio", idServicio);
  
		$.ajax({
  
		  url:"ajax/reservas.ajax.php",
		  method: "POST",
		  data: datos,
		  cache: false,
		  contentType: false,
		  processData: false,
		  dataType: "json",
		  success:function(respuesta){
  
			  for(var i = 0; i < respuesta.length; i++){
  
				
  
				   /* VALIDAR DISPONIBILIDAD */    
  
				  if(fechaIngreso != respuesta[i]["fecha_ingreso"] || hora != respuesta[i]["hora_cita"]){
  
					validarDisponibilidad = true;
				  
				  }else{
  
					validarDisponibilidad = false;
				   
				  }
  
				  if(!validarDisponibilidad){
  
					  totalEventos.push(
						  {
							  "start": respuesta[i]["fecha_ingreso"],
							  "end": respuesta[i]["fecha_salida"],
							  "rendering": 'background',
							  "color": '#847059'
						  }
					  )
  
					  $(".infoDisponibilidad").html('<h5 class="pb-5 float-left">¡Lo sentimos, no hay disponibilidad para esa fecha!<br><br><strong>¡Vuelve a intentarlo!</strong></h5>');
  
					  $(".guardarNuevaReserva").attr("fechaIngreso", "");
					  $(".guardarNuevaReserva").attr("hora", "");
  
					  break;
  
				  }else{
  
					totalEventos.push(
					  {
						"start": respuesta[i]["fecha_ingreso"],
						"end": respuesta[i]["fecha_salida"],
						"rendering": 'background',
						"color": '#847059'
					  }
  
					)
  
					$(".infoDisponibilidad").html('<h1 class="pb-5 float-left">¡Está Disponible!</h1>');
  
				   $(".guardarNuevaReserva").attr("fechaIngreso", fechaIngreso);
					//$(".guardarNuevaReserva").attr("fechaSalida", fechaSalida);
					$(".guardarNuevaReserva").attr("hora", hora);  
  
				  }
  
  
			  }// FIN CICLO FOR
  
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
				  defaultDate:fechaIngreso,
				  header: {
					  left: 'prev',
					  center: 'title',
					  right: 'next'
				  },
				  events:totalEventos
  
			  });
  
		  }
  
	  })
  
  })
  
  /*=============================================
  Guardar nueva reserva
  =============================================*/
  
  $(document).on("click",".guardarNuevaReserva", function(){
  
	  var fechaIngreso = $(this).attr("fechaIngreso");
		var hora = $(this).attr("hora");
		var idReserva = $(this).attr("idReserva");
  
		if(fechaIngreso == "" || hora == ""){
  
		   swal({
				title: "Error al guardar",
				text: "¡No ha seleccionado fechas y horas válidas!",
				type: "error",
				confirmButtonText: "¡Cerrar!"
			  });
  
		   return;
  
		}
  
		var datos = new FormData();
	  datos.append("idReserva", idReserva);
	  datos.append("fechaIngreso", fechaIngreso);
	  datos.append("hora", hora);
  
	  $.ajax({
  
		  url:"ajax/reservas.ajax.php",
		  method: "POST",
		  data: datos,
		  cache: false,
		  contentType: false,
		  processData: false,
		  success:function(respuesta){
  
			   if(respuesta == "ok"){
				   swal({
					   type: "success",
					   title: "¡CORRECTO!",
					   text: "La reserva ha sido modificada correctamente",
					   showConfirmButton: true,
					   confirmButtonText: "Cerrar"
				   }).then(function(result){
  
					   if(result.value){
  
						   window.location = "reservas";
  
					   }
				   })
  
			   }
  
		  }
  
	  })
  
  })
  
  /*=============================================
  Eliminar reserva
  =============================================*/
  
  $(document).on("click",".eliminarReserva", function(){
  
	  var idReserva = $(this).attr("idReserva");
  
	  swal({
		  title: '¿Está seguro de cancelar esta reserva?',
		  text: "¡Si no lo está puede cancelar la acción!",
		  type: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  cancelButtonText: 'Cancelar',
		  confirmButtonText: 'Si, cancelar reserva!'
	  }).then(function(result){
  
		  if(result.value){
  
			  var datos = new FormData();
			  datos.append("idReserva", idReserva);
			  datos.append("fechaIngreso", null);
			  datos.append("fechaSalida", null);
			  datos.append("hora", null);
  
			  $.ajax({
  
				  url:"ajax/reservas.ajax.php",
				  method: "POST",
				  data: datos,
				  cache: false,
				  contentType: false,
				  processData: false,
				  success:function(respuesta){
  
					  if(respuesta == "ok"){
						  swal({
							  type: "success",
							  title: "¡CORRECTO!",
							  text: "La reserva ha sido cancelada correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
						  }).then(function(result){
  
							  if(result.value){
  
								  window.location = "reservas";
  
							  }
						  })
  
					  }
  
				  }
  
			  })	
  
		  }
  
	  })
  
  })
  
  
  