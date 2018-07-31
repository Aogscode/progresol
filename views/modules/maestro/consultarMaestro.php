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
      <form action="">

        <div class="form-inline">
          <div class="form-row">
            <div class="col-xs-9">
              <label for="dni">DNI maestro</label>
            </div>
            <div class="col">
              <input type="text" id="dni" name="dni" class="form-control" autofocus required>
            </div>
            <div class="col">
              <button id="consulta-dni" type="submit" class="btn btn-info">Buscar</button>
            </div>  
          </div>  
        </div>

        <!-- Espacio para respuesta de consulta DNI -->
        <div class="form-group">
          <label for="inputNombres">Nombres</label>
          <input type="text" class="form-control" id="inputNombres" name="inputNombres" disabled>
        </div>

        <div class="form-group">
          <label for="inputApellidos">Apellidos</label>
          <input type="text" class="form-control" id="inputApellidos" name="inputApellidos" disabled>
        </div>
        
        <div class="form-row">
          <div class="form-group col-xs-4">
            <label for="inputCity">Puntos Validos</label>
            <input type="text" class="form-control" id="inputCity" disabled>
          </div>  
          <div class="form-group col-xs-4">
            <label for="inputPtos">Puntos Total</label>
            <input type="text" class="form-control" id="inputPtos" disabled>
          </div>         
        </div>

      </form>
    </div>
  </div>

  <!-- FORMULARIO 1 - CONSULTA DE DNI -->

</div>