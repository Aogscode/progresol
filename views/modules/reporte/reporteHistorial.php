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
    <li class="breadcrumb-item active">Reporte de puntos</li>
  </ol>
  <!-- Breadcrumbs-->

  <!-- FORMULARIO 1 - PARAMETROS DE REPORTE -->
  <div class="row">
    <div class="col-lg-12">
      <h1>Reporte de puntos</h1>
    </div>
  </div>

  <div class="row">
    <div class="col-md-9">
      <form id="buscar-puntos" method="post">
        <div class="form-group">
          <label for="ptosDni">Desde</label>
          <input type="text" id="ptosDni" name="ptosDni" class="form-control">
        </div>
        <div class="form-group">
          <label for="ptosDni">Hasta</label>
          <input type="text" id="ptosDni" name="ptosDni" class="form-control">
        </div>
        <div class="form-group">
          <label for="ptosDni">Ferreteria</label>
          <input type="text" id="ptosDni" name="ptosDni" class="form-control">
        </div>

        <div class="col-md-3">
	      <div class="form-group">
	        <button type="submit" name="btnRegistrarMaestro" id="btnRegistrarMaestro" class="btn btn-primary btn-lg btn-block">Buscar</button>
	      </div>
	    </div>
      </form>

    </div>

    
  </div>
  <!-- FORMULARIO 1 - PARAMETROS DE REPORTE -->

  <!-- FORMULARIO 2 - CAPTURA DE DATOS PARA REGISTRO-->
  <div class="card mb-3">
    <div class="card-header">
      <i class="fa fa-table"></i> Tabla de puntos
    </div>
    <!-- Cuerpo de la tabla -->
    <div class="card-body">
	  <div class="table-responsive">
	  	<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
	  	  <thead>
	  	  	<tr>
	  	  	  <th>Fecha</th>
              <th>Hora</th>
              <th>DNI</th>
              <th>Maestro</th>
              <th>Puntos</th>
			  <th>Producto</th>
              <th>Ferreteria</th>
              <th>Lucky</th>
              <th>Zona</th>
              <th>Estado</th>
	  	  	</tr>
	  	  </thead>

	  	  <tfoot>
	  	  	<tr>
	  	  	  <th>Fecha</th>
              <th>Hora</th>
              <th>DNI</th>
              <th>Maestro</th>
              <th>Puntos</th>
			  <th>Producto</th>
              <th>Ferreteria</th>
              <th>Lucky</th>
              <th>Zona</th>
              <th>Estado</th>
            </tr>
	  	  </tfoot>
	  	</table>
	  </div>
   	</div>
  </div>
  <!-- FORMULARIO 2 - CAPTURA DE DATOS PARA REGISTRO-->

</div>
