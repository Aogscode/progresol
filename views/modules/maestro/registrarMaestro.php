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
    <li class="breadcrumb-item active">Registrar Maestro</li>
  </ol>
  <!-- Breadcrumbs-->

  <!-- FORMULARIO 1 - CONSULTA DE DNI -->
  <div class="row">
    <div class="col-lg-12">
      <h1>Registrar maestro</h1>
    </div>
  </div>

  <div class="row">
    <div class="col-md-9">
      <form id="buscar-maestro" method="post">
        <div class="form-group input-group">
          <input type="text" id="dni" name="dni" class="form-control" placeholder="Documento de Identidad (DNI) " required>
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

  <!-- FORMULARIO 2 - CAPTURA DE DATOS PARA REGISTRO-->
  <div class="row">
    <div class="col-md-9">
      <form id="registro-maestro" method="post" onsubmit="return validar() ">
        <div class="form-group">
          <label for="dniRegistro">Documento de Identidad (DNI)</label>
          <input type="text" id="dniRegistro" name="dniRegistro" class="form-control" disabled>
        </div>

        <div class="form-group">
          <label for="nombreMaestro">Nombres</label>
          <input type="text" placeholder="Introduzca sus Nombres" id="nombreMaestro" name="nombreMaestro" class="form-control" required>
        </div>

        <div class="form-group">
          <label for="apepatMaestro">Apellido Paterno</label>
          <input type="text" placeholder="Introduzca su Apellido paterno" id="apepatMaestro" name="apepatMaestro" class="form-control" required>
        </div>

        <div class="form-group">
          <label for="apematMaestro">Apellido Materno</label>
          <input type="text" placeholder="Introduzca su Apellido Materno" id="apematMaestro" name="apematMaestro" class="form-control" required>
        </div>

        <div class="form-group">
          <label for="dirMaestro">Direccion</label>
          <input type="text" placeholder="Introduzca su Dirección" id="dirMaestro" name="dirMaestro" class="form-control" required>
        </div>

        <div class="form-group" required>
          <label for="departamentos">Departamento</label>
          <select id="departamentos" class="form-control">
            <option>Seleccionar...</option>
          </select>
        </div>

        <div class="form-group" >
          <label for="provincia">Provincia</label>
          <select id="provincia" class="form-control">
            <option>Seleccionar...</option>
          </select>
        </div>

        <div class="form-group" >
          <label for="distrito">Distrito</label>
          <select id="distrito" class="form-control">
            <option>Seleccionar...</option>
          </select>
        </div>

        <div class="form-group">
          <label for="telfMaestro">Telefono de contacto</label>
          <input type="text" placeholder="Introduzca su Télefono"  id="telfMaestro" name="telfMaestro" class="form-control" required >
        </div>

        <div class="form-group">
          <label for="emailMaestro">Email</label>
          <input type="email" placeholder="Introduzca su Email" id="emailMaestro" name="emailMaestro" class="form-control" required>
        </div>
        
        <div class="form-group">
          <button type="submit" name="btnRegistrarMaestro" id="btnRegistrarMaestro" class="btn btn-primary btn-lg btn-block">Registrar maestro</button>
        </div>

      </form>
    </div>
  </div>
  <!-- FORMULARIO 2 - CAPTURA DE DATOS PARA REGISTRO-->

</div>