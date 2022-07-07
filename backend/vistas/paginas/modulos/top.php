<?php 

/*=============================================
Total Reservas
=============================================*/

$totalReservas = ControladorReservas::ctrMostrarReservas(null, null);

/*=============================================
Total Usuarios
=============================================*/

$totalUsuarios = ControladorUsuarios::ctrMostrarUsuarios(null, null);


?>

<!--=====================================
Total Reservas
======================================-->

<div class="col-12 col-sm-6 col-lg-3">

  <div class="small-box text-white" style="background-color:#ec5329">

    <div class="inner">

      <h3><?php echo count($totalReservas); ?></h3>

      <p class="text-uppercase">Reservas</p>

    </div>

    <div class="icon">

      <i class="far fa-calendar-alt"></i>

    </div>

    <a href="reservas" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>

  </div>

</div>

<!--=====================================
Total Usuarios
======================================-->

<div class="col-12 col-sm-6 col-lg-3">

  <div class="small-box bg-dark">

    <div class="inner">

      <h3><?php echo count($totalUsuarios); ?></h3>

      <p class="text-uppercase">Usuarios</p>

    </div>

    <div class="icon">

      <i class="fas fa-users"></i>

    </div>

    <a href="usuarios" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>

  </div>

</div>