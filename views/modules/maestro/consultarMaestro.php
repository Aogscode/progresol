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
    <li class="breadcrumb-item active">Consulta maestro</li>
  </ol>
  <!-- Breadcrumbs-->

  <!-- FORMULARIO 1 - CONSULTA DE DNI -->

  <div class="row">
    <div class="col-lg-12">
      <h1>Consultar maestro</h1>
    </div>
  </div>

  <div class="row">
    <div class="col-md-9">
      <form id="consulta-maestro" method="post">

        <div class="form-inline">
          <div class="form-row">
            <div class="col-xs-9">
              <label for="dni">DNI maestro</label>
            </div>
            <div class="col">
              <input type="text" id="ConsultaDni" name="ConsultaDni" class="form-control" autofocus required>
            </div>
            <div class="col">
              <button id="consulta-dni" type="submit" class="btn btn-info">Buscar</button>
            </div>  
          </div>  
        </div>
      </form>
      
        <!-- Espacio para respuesta de consulta DNI -->
        <div class="form-group">
          <label for="cNombres">Nombres</label>
          <input type="text" class="form-control" id="cNombres" name="cNombres" disabled>
        </div>

        <div class="form-group">
          <label for="cApellidos">Apellidos</label>
          <input type="text" class="form-control" id="cApellidos" name="cApellidos" disabled>
        </div>
        
        <div class="form-row">
          <div class="form-group col-xs-4">
            <label for="cPtosval">Puntos Validos</label>
            <input type="text" class="form-control" id="cPtosval" name="cPtosval" disabled>
          </div>  
          <div class="form-group col-xs-4">
            <label for="cPtostotal">Puntos Total</label>
            <input type="text" class="form-control" id="cPtostotal" name="cPtostotal" disabled>
          </div>         
        </div>

      
    </div>
  </div>

  <!-- FORMULARIO 1 - CONSULTA DE DNI -->

</div>