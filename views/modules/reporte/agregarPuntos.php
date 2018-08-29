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
    <li class="breadcrumb-item active">Agregar puntos</li>
  </ol>
  <!-- Breadcrumbs-->

  <!-- FORMULARIO 1 - CONSULTA DE DNI -->
  <div class="row">
    <div class="col-lg-12">
      <h1>Agregar puntos</h1>
    </div>
  </div>

  <div class="row">
    <div class="col-md-9">
      <form id="buscar-puntos" method="post">
        <div class="form-group input-group">
          <input type="text" id="buscaDni" name="buscaDni" class="form-control" placeholder="Documento de Identidad (DNI)">
          <span class="input-group-btn">
          <button id="btnConsultarDni" class="btn btn-default" type="submit">
            <i class="fa fa-search"></i> 
          </button>
        </div>
      </form>
      <div id="buscar-rspta"></div>
    </div>
  </div>
  <!-- FORMULARIO 1 - CONSULTA DE DNI -->

  <!-- FORMULARIO 2 - CAPTURA DE DATOS PARA REGISTRO DE PUNTOS-->
  <div class="row">
    <div class="col-md-9">
      <form id="registrar-puntos" method="post">

        <input type="text" id="ptosId" name="ptosId" class="form-control" disabled hidden>

        <div class="form-group">
          <label for="ptosDni">Doc. identidad</label>
          <input type="text" id="ptosDni" name="ptosDni" class="form-control" disabled>
        </div>

        <div class="form-group">
          <label for="ptosNombres">Nombres</label>
          <input type="text" id="ptosNombres" name="ptosNombres" class="form-control" disabled>
        </div>

        <div class="form-group">
          <label for="ptosApellidos">Apellidos</label>
          <input type="text" id="ptosApellidos" name="ptosApellidos" class="form-control" disabled>
        </div>

        <div class="form-group col-md-3">
          <label for="ptosValidos"><b>Puntos validos</b></label>
          <input type="text" id="ptosValidos" name="ptosValidos" class="form-control" disabled>
        </div>

        <div class="form-group col-md-3">
          <label for="ptosPendientes"><b>Puntos por aprobar</b></label>
          <input type="text" id="ptosPendientes" name="ptosPendientes" class="form-control" disabled>
        </div>
        
        <div class="row">
          <div class="col-lg-12">
          <h3>Registro de compra</h3>
        </div>
        </div>
        
        <div class="form-group">
          <label for="productos">Producto</label>
          <select id="productos" class="form-control">
            <option>Seleccionar...</option>
          </select>
        </div>

        <div class="form-group">
          <label for="cantidad">Cantidad</label>
        </div>

        <div class="form-group input-group col-md-3">
          <span class = "input-group-btn">
            <button class="btnAdd btn btn-default" type="button">-</button>
          </span>
          <input type="text" id="unidproduct" name="unidproduct" class="form-control" value="0">
          <span class = "input-group-btn">
            <button class="btnAdd btn btn-default" type="button">+</button>
          </span>
        </div>

        <div class="form-group">
          <button type="submit" id="btnRegistrarPuntos" class="btn btn-primary btn-lg btn-block">Registrar puntos</button>
        </div>

      </form>
    </div>
  </div>
  <!-- FORMULARIO 2 - CAPTURA DE DATOS PARA REGISTRO DE PUNTOS-->

</div>