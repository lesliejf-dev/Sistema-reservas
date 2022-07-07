<?php
$notificaciones = ControladorInicio::ctrMostrarNotificaciones();

$totalNotificaciones = 0;
$totalReservas = 0;

foreach ($notificaciones as $key => $value) {

   $totalNotificaciones += $value["cantidad"];

    if($value["tipo"] == "reservas"){
      
      $totalReservas = $value["cantidad"];

    }
}
?>

<nav class="main-header navbar navbar-expand navbar-white navbar-light border-bottom">

  <!--=====================================
  Botón que colapsa el menú lateral
  ======================================--> 

  <ul class="navbar-nav">

    <li class="nav-item">
      
      <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
    
    </li>

    <li class="nav-item d-none d-sm-inline-block">

      <a class="nav-link">Hola <?php echo $admin["nombre"]; ?></a>

    </li>

  </ul>

  <!--=====================================
  Notificaciones
  ======================================--> 

  <ul class="navbar-nav ml-auto">

    <li class="nav-item dropdown">

      <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">

        <i class="far fa-bell"></i>

        <span class="badge badge-danger navbar-badge"><?php if($totalNotificaciones !=0){echo $totalNotificaciones;} ?></span>

      </a>

      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        
        <span class="dropdown-item dropdown-header"><?php echo $totalNotificaciones; ?> Notificaciones</span>

        <div class="dropdown-divider"></div>

        <a href="index.php?pagina=reservas&not=0" class="dropdown-item">

          <i class="far fa-calendar-alt mr-2 float-right"></i>

          <span class="badge text-white " style="background-color:#d7957c"><?php echo $totalReservas; ?> Reservas nuevas</span>

        </a>

      </div>

    </li>

    <!--=====================================
    Botón salir del sistema
    ======================================--> 

    <li class="nav-item">

      <a class="nav-link" href="salir">

        <i class="fas fa-sign-out-alt"></i>

      </a>   

    </li>

  </ul>

</nav>