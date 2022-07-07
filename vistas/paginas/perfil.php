<?php

if(isset($_SESSION["validarSesion"])){

    if($_SESSION["validarSesion"] == "ok"){

        include "modulos/banner-interior.php";
        include "modulos/info-perfil.php";
        include "modulos/servicios.php";
        include "modulos/recorrido-galeria.php";
        include "modulos/equipo.php";
        echo '<div class="mb-5"></div>';

    }
}else{

    echo '<script> window.location="'.$ruta.'"</script>';
}

