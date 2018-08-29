<?php

if (!$_SESSION["validar"]) { ?>

    <script>window.location = "login.php";</script>
<?php     
    exit();

}elseif ($_SESSION["perfil"] <> 1) {  ?>

    <script>window.location = "index.php";</script>
<?php 
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
      <form id="busca-usuario" method="post">
        <div class="form-group input-group">
          <input type="text" id="dniUser" name="dniUser" class="form-control" placeholder="Documento de Identidad (DNI)" required>
          <span class="input-group-btn">
          <button id="consulta-dni" class="btn btn-default" type="submit">
            <i class="fa fa-search"></i> 
          </button>
        </div>
      </form>
      <div id="user-rspta"></div>
    </div>
  </div>
  <!-- FORMULARIO 1 - CONSULTA DE DNI -->

  <!-- FORMULARIO 2 - CAPTURA DE DATOS PARA REGISTRO-->
  <div class="row">
    <div class="col-md-9">
      <form id="registra-usuario" method="post" onsubmit="return validar2() ">
        <div class="form-group">
          <label for="registrodni">Documento de Identidad (DNI)</label>
          <input type="text" id="dniUsuario" name="dniUsuario" class="form-control" disabled>
        </div>

        <div class="form-group">
          <label for="registrodni">Nombres</label>
          <input type="text" id="nombreUsuario" name="nombreMaestro" class="form-control" required>
        </div>

        <div class="form-group">
          <label for="registrodni">Apellido Paterno</label>
          <input type="text" id="apepatUsuario" name="apepatMaestro" class="form-control" required>
        </div>

        <div class="form-group">
          <label for="registrodni">Apellido Materno</label>
          <input type="text" id="apematUsuario" name="apematMaestro" class="form-control" required>
        </div>

        <div class="form-group">
          <label for="registrodni">Telefono de contacto</label>
          <input type="text" id="telfUsuario" name="telfMaestro" class="form-control" required>
        </div>

        <div class="form-group">
          <label for="registrodni">Email</label>
          <input type="text" id="emailUsuario" name="emailMaestro" class="form-control" required>
        </div>

        <div class="form-group">
          <label for="permisoUsuario">Permiso de usuario</label>
          <select class="form-control" id="permisoUsuario">
            <option value="1">Supervisor UNACEM</option>
            <option value="2">Asesor Promotick / Lucky</option>
          </select>
        </div>
        <!--
        <div class="form-group">
          <label for="usuarioPassword">Contraseña</label>
          <input type="password" id="usuarioPassword" name="usuarioPassword" class="form-control" required>
        </div>

        <div class="form-group">
          <label for="usuarioPassword2">Repetir Contraseña</label>
          <input type="password" id="usuarioPassword2" name="usuarioPassword2" class="form-control" required>
        </div>-->
        
        <div class="form-group">
          <button type="submit" id="btnRegistrarUsuario" class="btn btn-primary btn-lg btn-block">Registrar usuario</button>
        </div>

      </form>
    </div>
  </div>
  <!-- FORMULARIO 2 - CAPTURA DE DATOS PARA REGISTRO-->

</div>