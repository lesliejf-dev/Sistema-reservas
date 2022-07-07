<body class="hold-transition login-page" style="background-color:#fedcd3">

  <div class="login-box bg-light">

    <div class="login-logo">

      <a href="<?php echo $ruta?>" class="font-weight-bold">INFINITE</a>
    
    </div>
    <!-- /.login-logo -->

    <div class="card">

      <div class="card-body login-card-body">

        <p class="login-box-msg">Iniciar Sesión</p>

        <form method="post">

          <div class="input-group mb-3">

            <input type="text" class="form-control" placeholder="Usuario" name="ingresoUsuario">

            <div class="input-group-append">

              <div class="input-group-text">

                <span class="fas fa-envelope"></span>

              </div>

            </div>

          </div>

          <div class="input-group mb-3">

            <input type="password" class="form-control" placeholder="Password" name="ingresoPassword">

            <div class="input-group-append">

              <div class="input-group-text">

                <span class="fas fa-lock"></span>

              </div>

            </div>

          </div>        

          <button type="submit" class="btn text-white btn-block btn-flat" style="background-color:#d7957c">Ingresar</button> 

          <?php

          $ingreso = new ControladorAdministradores();
          $ingreso -> ctrIngresoAdministradores(); 


          ?>   
   
        </form>

      </div>
      <!-- /.login-card-body -->
    </div>

  </div>
  <!-- /.login-box -->

</body>