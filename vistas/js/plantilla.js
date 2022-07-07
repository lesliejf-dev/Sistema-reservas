var urlPrincipal = $("#urlPrincipal").val();
var urlServidor = $("#urlServidor").val();

//limpieza de formulario
$(".contactenos form input, .contactenos form textarea").val("");


/*=============================================
ANIMACIONES CON EL SCROLL
=============================================*/

$(window).scroll(function(){

	var posY = window.pageYOffset;

	if(window.matchMedia("(min-width:769px)").matches){
	
		if(posY > 50){

			$(".formReservas").slideUp("fast");
			$(".mostrarBloqueReservas").attr("modo", "arriba");
			$(".flechaReserva").removeClass("fa-caret-up");
			$(".flechaReserva").addClass("fa-caret-down");

		}else{

			$(".formReservas").slideDown("fast");
			$(".mostrarBloqueReservas").attr("modo", "abajo");
			$(".flechaReserva").removeClass("fa-caret-down");
			$(".flechaReserva").addClass("fa-caret-up");

		}

	}

	posicionBloqueReservas();

})

/*=============================================
BOTÓN RESERVA
=============================================*/

$(".mostrarBloqueReservas").click(function(){

	$(".formReservas").slideToggle("fast");

	$(".menu").slideUp('fast');

	if($(".mostrarBloqueReservas").attr("modo") == "abajo"){

		$(".mostrarBloqueReservas").attr("modo", "arriba");

		$(".flechaReserva").removeClass("fa-caret-up");

		$(".flechaReserva").addClass("fa-caret-down");

	}else{

		$(".mostrarBloqueReservas").attr("modo", "abajo");

		$(".flechaReserva").removeClass("fa-caret-down");

		$(".flechaReserva").addClass("fa-caret-up");

	}

	posicionBloqueReservas();
})

/*=============================================
SCROLL UP
=============================================*/

$.scrollUp({
	scrollText:"",
	scrollSpeed: 2000,
	easingType: "easeOutQuint"
})

/*=============================================
SLIDE BANNER
=============================================*/

$('.fade-slider').jdSlider({

    isSliding: false,
    isAuto: true,
    isLoop: true,
    isDrag: false,
    interval: 7000,
    isCursor: false,
    speed: 3000

})

$(".verMas").click(function(){

	var vinculo = $(this).attr("vinculo");

	$("html, body").animate({

		scrollTop: $(vinculo).offset().top - 60

	}, 1000, "easeInOutBack")

})

$(".banner .fade-slider").css({"margin-top":$("header").height()})



/*=============================================
RECORRIDO POR GALERIA
=============================================*/

 $('.slideGaleria').jdSlider();

 /*=============================================
EQUIPO
=============================================*/

$(".equipo .carta div").hide();

if(window.matchMedia("(max-width:768px)").matches){

	$(".equipo .verCarta").click(function(){	

		$(".equipo .bloqueEquipo").slideToggle("fast")

		$(".equipo .carta div").slideToggle("fast");	

		$(".equipo .carta div").css({"background":"rgba(0,0,0,0.7)"})

		$(".contactenos").css({"margin-top":"0px"})
	})

	$(".equipo .volverCarta").click(function(){	

		$(".equipo .bloqueEquipo").slideToggle("fast")

		$(".equipo .carta div").slideToggle("fast");	

		$(".contactenos").css({"margin-top":"-80px"})
	})

}else{

	$(".equipo .verCarta").click(function(){		

		$(".equipo .carta div").slideToggle("fast")

		$(".equipo .carta div").css({"background":"rgba(0,0,0,0.7)"})

	})

}




/*=============================================
POSICION BLOQUE RESERVAS
=============================================*/

function posicionBloqueReservas(){

	if(window.matchMedia("(min-width:769px)").matches){

		if($(".mostrarBloqueReservas").attr("modo") == "abajo"){

			$(".colDerServicios").css({"margin-top":"100px"})
			$(".colDerReservas").css({"margin-top":"100px"})
			$(".colDerPerfil").css({"margin-top":"100px"})

		}

		if($(".mostrarBloqueReservas").attr("modo") == "arriba"){

			$(".colDerServicios").css({"margin-top":"20px"})
			$(".colDerReservas").css({"margin-top":"20px"})
			$(".colDerPerfil").css({"margin-top":"20px"})

		}

	}else{

		$(".colDerServicios").css({"margin-top":"20px"})
		$(".colDerReservas").css({"margin-top":"20px"})
		$(".colDerPerfil").css({"margin-top":"20px"})

	}

}

posicionBloqueReservas();

if(window.matchMedia("(max-width:768px)").matches){

	$(".infoServicio .colIzqServicios").css({"margin-top":$("header").height()})
	$(".infoReservas .colIzqReservas").css({"margin-top":$("header").height()})
	$(".infoPerfil .colIzqPerfil").css({"margin-top":($("header").height()+100)+"px"})

}