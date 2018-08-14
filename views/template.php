<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="views/img/company-logo_.png" type="image/jpg" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Club de Maestros Progresol</title>
  <!-- Bootstrap core CSS-->
  <link href="views/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="views/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="views/css/sb-admin.css" rel="stylesheet">
  <link href="views/css/styles.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- BARRA DE NAVEGACION SUPERIOR-->

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.php">
      <img src="views/img/company-logo_.png" alt="Club maestros progresol" class="img-responsive" id="img-logo">
    </a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <!-- MENU LATERAL IZQUIERDO-->

      <?php
include "modules/navigation.php";
?>

      <!-- FIN MENU LATERAL INZQUIERDO-->

      <!-- FLECHA IZQUIERDA PARA OCULTAR MENU-->

      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>

      <!-- FIN FLECHA IZQUIERDA PARA OCULTAR MENU-->

      <!-- BARRA SUPERIOR BUSQUEDA, MENSAJES Y LOGOUT-->

      <?php
include "modules/topbar.php";
?>

      <!-- FIN BARRA SUPERIOR BUSQUEDA, MENSAJES Y LOGOUT-->
    </div>
  </nav>

  <!-- FIN BARRA DE NAVEGACION SUPERIOR-->

  <!-- CUERPO DE LA WEB-->

  <div class="content-wrapper">

    <!-- CONTENEDOR PRINCIPAL-->

    <?php
$mvc = new MvcController();
$mvc->enlacesPaginasController();
?>

    <!-- FIN CONTENEDOR PRINCIPAL-->

    <!-- PIE DE PAGINA -->

    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Digital Trading Peru 2018</small>
        </div>
      </div>
    </footer>

    <!-- FIN DE PIE DE PAGINA-->


    <!-- BOTON SCROLL QUE LLEVA AL TOP-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="views/vendor/jquery/jquery.min.js"></script>
    <script src="views/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="views/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="views/js/sb-admin.min.js"></script>
    <!-- sentencias AJAX-->
    <script src="views/js/funciones.js"></script>
    <script src="views/js/validar.js"></script>
    <script src="views/js/jquery-3.3.1.min.js"></script>

  </div>

  <!-- FIN CUERPO DE LA WEB-->
</body>
</html>
