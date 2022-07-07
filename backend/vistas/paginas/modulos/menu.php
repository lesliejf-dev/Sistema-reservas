<aside class="main-sidebar sidebar-dark-primary elevation-4">

  <!--=====================================
  LOGO
  ======================================-->
  <a href="inicio" class="brand-link">
  
    <img src="vistas/img/plantilla/icon.png" class="brand-image img-circle elevation-3" style="opacity: .8">

    <span class="brand-text font-weight-light">INFINITE</span>

  </a>

  <!--=====================================
  MENÚ
  ======================================-->

  <div class="sidebar">

    <nav class="mt-2">
      
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <!-- botón Ver sitio -->

        <li class="nav-item">
          
          <a href="<?php echo $ruta; ?>" class="nav-link active" style="background-color:#d7957c" target="_blank">
            
            <i class="nav-icon fas fa-globe"></i>
            
            <p>Ver sitio</p>

          </a>

        </li>

     

        <!-- Botón página inicio -->

        <li class="nav-item">

          <a href="inicio" class="nav-link">

            <i class="nav-icon fas fa-home"></i>

            <p>Inicio</p>

          </a>

        </li>

        <!-- Botón página administradores -->

       <?php if ($admin["perfil"] == "Administrador"): ?>
          
          <li class="nav-item">

            <a href="administradores" class="nav-link">

              <i class="nav-icon fas fa-users-cog"></i>

              <p>Administradores</p>

            </a>

          </li>

        <?php endif ?>


        <!-- Botón página servicios -->

        <li class="nav-item">

          <a href="servicios" class="nav-link">

            <!--<i class="nav-icon fas fa-bed"></i>-->
            <i class="nav-icon fas fa-scissors"></i>
            
            
            <p>Servicios</p>

          </a>

        </li>

        <!-- Botón página reservas -->

       

        <li class="nav-item">

          <a href="reservas" class="nav-link">

            <i class="nav-icon far fa-calendar-alt"></i>

            <p>Reservas</p>

          </a>

        </li>


        <!-- Botón página usuarios -->      

         <li class="nav-item">
          
          <a href="usuarios" class="nav-link">
            
            <i class="nav-icon fas fa-users"></i>
            
            <p> Usuarios</p>

          </a>

        </li>

      </ul>

    </nav>
  
  </div>

</aside>