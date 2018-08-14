<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Ingresar Club de Maestros</title>
  <!-- Bootstrap core CSS-->
  <link href="views/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="views/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="views/css/sb-admin.css" rel="stylesheet">
  <!-- Estilos personalizados -->
  <link href="views/css/styles.css" rel="stylesheet">
  <link rel="shortcut icon" href="views/img/company-logo_.png" type="image/jpg" />
</head>

<body class="bg-dark">
  <div class="container">
    <!-- DIV DE FORMULARIO DE INGRESO-->
    <div  id="principal" class="card card-login mx-auto mt-5">
      <div class="card-header" >Ingreso al sistema</div>
      <div class="card-body">
        <form id="login" method = "post">
          <div class="form-group">
            <label for="userLogin">Usuario</label>
            <input class="form-control" id="userLogin" name = "userLogin" type="text" aria-describedby="user" placeholder="Ingrese DNI">
          </div>
          <div class="form-group">
            <label for="passLogin">Contraseña</label>
            <input class="form-control" id="passLogin" name = "passLogin" type="password" placeholder="Contraseña">
          </div>
          <div class="form-group">
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox"> Recordar contraseña</label>
            </div>
          </div>
          <input type="submit" value="Ingresar" class="btn btn-primary btn-block">
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="register.html">Registrese</a>
          <a class="d-block small" href="forgot-password.html">¿ Olvido su contraseña?</a>
        </div>
        <div id="rspta"></div>
      </div>
    </div>
    <!-- DIV DE FORMULARIO DE INGRESO-->
    <div id="loginMessage"></div>
  </div>
  <!-- Bootstrap core JavaScript-->
   <!--<script src="views/vendor/jquery/jquery.min.js"></script>-->

  <script src="views/js/jquery-3.0.0.min.js"></script>
  <script src="views/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="views/vendor/jquery-easing/jquery.easing.min.js"></script>
  <!-- Validacion de ingreso al sistema -->
  <script src="views/js/validarIngreso.js"></script>
</body>

</html>
