<div class="container-fluid">
  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="index.php">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Crear usuario de sistema</li>
  </ol>
  <!-- Breadcrumbs-->

  <!-- FORMULARIO 1 - CONSULTA DE DNI -->
  <div class="row">
    <div class="col-lg-12">
      <h1>Crear usuario de sistema</h1>
    </div>
  </div>

  <div class="row">
    <div class="col-md-9">
      <form action="">
        <div class="form-group input-group">
          <input type="text" id="dni" name="dni" class="form-control" placeholder="Documento de Identidad (DNI)" required>
          <span class="input-group-btn">
          <button id="consulta-dni" class="btn btn-default" type="button">
            <i class="fa fa-search"></i> 
          </button>
        </div>
      </form>
    </div>
  </div>
  <!-- FORMULARIO 1 - CONSULTA DE DNI -->

  <!-- FORMULARIO 2 - CAPTURA DE DATOS PARA REGISTRO-->
  <div class="row">
    <div class="col-md-9">
      <form action=""  onsubmit="return validar2() ">
        <div class="form-group">
          <label for="registrodni">Documento de Identidad (DNI)</label>
          <input type="text" id="dniMaestro" name="dniMaestro" class="form-control">
        </div>

        <div class="form-group">
          <label for="registrodni">Nombres</label>
          <input type="text" id="nombreMaestro" name="nombreMaestro" class="form-control" required>
        </div>

        <div class="form-group">
          <label for="registrodni">Apellido Paterno</label>
          <input type="text" id="apepatMaestro" name="apepatMaestro" class="form-control" required>
        </div>

        <div class="form-group">
          <label for="registrodni">Apellido Materno</label>
          <input type="text" id="apematMaestro" name="apematMaestro" class="form-control" required>
        </div>

        <div class="form-group">
          <label for="registrodni">Telefono de contacto</label>
          <input type="text" id="telfMaestro" name="telfMaestro" class="form-control" required>
        </div>

        <div class="form-group">
          <label for="registrodni">Email</label>
          <input type="text" id="emailMaestro" name="emailMaestro" class="form-control" required>
        </div>

        <div class="form-group">
          <label for="permisosUsuario">Permiso de usuario</label>
          <select class="form-control" id="permisosUsuario">
            <option>Supervisor</option>
            <option>Asesor Promotick</option>
            <option>Gestor</option>
          </select>
        </div>

        <div class="form-group">
          <label for="usuarioPassword">Contraseña</label>
          <input type="password" id="usuarioPassword" name="usuarioPassword" class="form-control" required>
        </div>

        <div class="form-group">
          <label for="usuarioPassword2">Repetir Contraseña</label>
          <input type="password" id="usuarioPassword2" name="usuarioPassword2" class="form-control" required>
        </div>
        
        <div class="form-group">
          <button type="submit" id="btnRegistrarUsuario" class="btn btn-primary btn-lg btn-block">Registrar usuario</button>
        </div>

      </form>
    </div>
  </div>
  <!-- FORMULARIO 2 - CAPTURA DE DATOS PARA REGISTRO-->

</div>