<?php

if(isset($_GET["not"])){

  $respuesta = ControladorInicio::ctrActualizarNotificaciones("reservas", 0);
  
}

?>

 <div class="content-wrapper" style="min-height: 717px; background-color:#ece7e1">

  <section class="content-header">

    <div class="container-fluid">

      <div class="row mb-2">

        <div class="col-sm-6">

          <h1>Reservas</h1>

        </div>

        <div class="col-sm-6">

          <ol class="breadcrumb float-sm-right">

            <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
            <li class="breadcrumb-item active">Reservas</li>

          </ol>

        </div>

      </div>

    </div><!-- /.container-fluid -->

  </section>


  <!-- Main content -->
  <section class="content">

    <div class="container-fluid">

      <div class="row">

        <div class="col-12">

          <!-- Default box -->
          <div class="card card-secondary card-outline">

            <div class="card-body">

              <table class="table table-bordered table-striped dt-responsive tablaReservas" width="100%">
                
               <thead>

                <tr>

                  <th style="width:10px">#</th> 
                  <th>Código</th>
                  <th>Descripción</th>
                  <th>Usuario</th>
                  <th>Pago</th> 
                  <th>Ingreso</th> 
                  <th>Salida</th>
                  <th>Hora</th>           
                  <th style="width:100px">Acciones</th>          

                </tr>   

              </thead>

              <tbody>
              
            
              </tbody>


              </table>
              
            </div>
            <!-- /.card-body -->

          </div>
          <!-- /.card -->

        </div>

      </div>

    </div>

  </section>
  <!-- /.content -->

</div>

<!--=====================================
Modal Editar Reserva
======================================-->

<div class="modal" id="editarReserva">

  <div class="modal-dialog modal-lg">

    <div class="modal-content">

     <!-- Modal Header -->
      <div class="modal-header text-white "  style="background-color:#d7957c">
        <h4 class="modal-title">Editar Reserva: <span class="small"></span></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

       <!-- Modal body -->
      <div class="modal-body">

        <h6 class="lead pt-4 pb-2">Puede modificar la fecha de acuerdo a los días disponibles:</h6>

        <div class="container mb-3">

          <div class="row py-2" style="background:#d7957c">

             <div class="col-6 col-md-3 input-group pr-1">
            
              <input type="text" class="form-control datepicker entrada" autocomplete="off" placeholder="Entrada" value=""  required>

              <div class="input-group-append">
                
                <span class="input-group-text"><i class="far fa-calendar-alt small text-gray-dark"></i></span>
              
              </div>

            </div>

            <div class="col-6 col-md-3 input-group pl-1">
            
              <!--<input type="text" class="form-control datepicker hora" value="">-->
              <select class="form-control datepicker hora" autocomplete="off"  required>
										<option value="" >Hora</option>
										<option>10:00</option>
										<option>11:00</option>
										<option>12:00</option>
										<option>13:00</option>
										<option>14:00</option>
										<option>16:00</option>
										<option>17:00</option>
										<option>18:00</option>
										<option>19:00</option>
										<option>20:00</option>
									</select>

              <div class="input-group-append">
                
                <span class="input-group-text"><i class="far fa-calendar-alt small text-gray-dark"></i></span>
              
              </div>

            </div>

            <div class="col-12 col-md-6 mt-2 mt-lg-0 input-group">
                            
              <button class="btn btn-block btn-md text-white verDisponibilidad" idServicio style="background:black">Ver disponibilidad</button>

            </div>

          </div>

        </div>

        <div class="bg-white p-4 calendarioReservas">

          <div class="infoDisponibilidad">
            <h1 class="pb-5 float-left infoDisponibilidad">¡Está disponible!</h1>
          </div>

          <div class="float-right pb-3">
              
            <ul style="list-style:none">
              <li>
                <i class="fas fa-square-full" style="color:#847059"></i> No disponible
              </li>

              <li>
                <i class="fas fa-square-full" style="color:#eee"></i> Disponible
              </li>

              <li>
                <i class="fas fa-square-full" style="color:#FFCC29"></i> Tu reserva
              </li>
            </ul>

          </div>

        </div>

        <div class="clearfix"></div>

        <div class="agregarCalendario p-3"></div>

      </div>

       <!-- Modal footer -->
      <div class="modal-footer d-flex justify-content-between">

        <div>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        </div>

        <div>
          <button type="button" class="btn btn-primary guardarNuevaReserva" fechaIngreso hora idReserva>Guardar</button>
        </div>

      </div>

    </div>

  </div>

</div>