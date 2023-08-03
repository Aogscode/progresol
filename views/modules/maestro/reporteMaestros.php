<?php 

  if(!$_SESSION["validar"]){

  header("location:ingresar");

  exit();

  }

 ?>

<div class="container-fluid">
  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="index.php">
        <?php 
          echo $_SESSION["usuario"];
         ?>
      </a>
    </li>
    <li class="breadcrumb-item active">Reporte de Maestros</li>
  </ol>
  <!-- Breadcrumbs-->

  <!-- FORMULARIO 1 - PARAMETROS DE REPORTE -->
  <div class="row">
    <div class="col-lg-12">
      <h1>Reporte de Maestros</h1>
    </div>
  </div>
  
  <div class="card mb-3">
    <div class="card-header">
      <i class="fa fa-table"></i> Filtros de busqueda
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-md-9">
          <form id="reporteMaestros" method="post">
            <div class="form-row">
              <div class="form-group col-md-9">
                <label><b>Fecha de registro</b></label>
              </div>
              <div class="form-group col-md-6">
                <label for="maestroDesde">Desde</label>
                <input type="date" min="2018-01-01" max=<?php echo "'".date('Y-m-d')."'"; ?> id="maestroDesde" name="maestroDesde" class="form-control">
              </div>
              <div class="form-group col-md-6">
                <label for="maestroHasta">Hasta</label>
                <input type="date" min="2018-01-01" max=<?php echo "'".date('Y-m-d')."'"; ?> id="maestroHasta" name="maestroHasta" class="form-control">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="ptosZona">Zona</label>
                <select id="ptosZona" name="ptosZona" class="form-control">
                </select>
              </div>
              <div class="form-group col-md-6">
                <label for="maestroEstado">Estado</label>
                <select id="maestroEstado" name="maestroEstado" class="form-control">
                  <option value="3">Todos</option>
                  <option value="1">Activo</option>
                  <option value="0">Baja</option>
                </select>
              </div>
            </div>

            <div class="col-md-3">
              <button type="button" name="btn_reporteMaestros"  id="btn_reporteMaestros" class="btn btn-primary btn-lg btn-block">Buscar</button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>

  
  <!-- FORMULARIO 1 - PARAMETROS DE REPORTE display responsive nowrap / table table-striped table-bordered dt-responsive nowrap-->

  <!-- FORMULARIO 2 - CAPTURA DE DATOS PARA REGISTRO-->
  <div class="row" style="display:none" id="contenedor_table_maestros">
    <div class="col-lg-12">
      <table id="reporte_maestros" class="table table-bordered display responsive nowrap" cellspacing="0" > 
       <!--<table id="historial_puntos" class="table">  -->
        <thead>
          <tr>
            <th>Lucky</th>
            <th>Ferreteria</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>DNI</th>
            <th>Telefono</th>
            <th>Distrito</th>
            <th>Zona</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Estado</th>
          </tr>
        </thead>
        <!-- <tbody> 
          <?php 
            /*if (isset($_POST["btn_buscaPtos"])) {
              $desde = '2018-08-08';//$_POST["ptosDesde"];
              $hasta = '2018-09-09';//$_POST["ptosHasta"];
              $zona = '0';//$_POST["ptosZona"];
              $estado = '3';//$_POST["ptosEstado"];

              $tablaPuntos = new MvcController();
              $tablaPuntos->puntosHistorialController($desde, $hasta, $zona, $estado);
            }*/
           ?>-->
        <!-- </tbody> -->
      </table>
    </div>
  </div>

  <!-- FORMULARIO 2 - CAPTURA DE DATOS PARA REGISTRO-->

</div>