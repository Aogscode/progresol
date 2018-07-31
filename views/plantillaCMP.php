<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Club Maestros Progresol</title>

    <!-- Bootstrap Core CSS -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="views/css/estilo.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="../img/casita.png" />

    <!-- MetisMenu CSS cambio de ubicacion-->
    <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS cambio de ubicacion-->
    <link href="views/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav id="nav-principal" class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <img src="views/img/logo-CMP.png" alt="Club maestros progresol" class="img-responsive" id="img-logo">
                <!-- <a class="navbar-brand" href="index.html">Club Maestros Progresol</a> -->
            </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown-PROFILE -->
                <li class="dropdown">
                    <a id="nombre" class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="editar_perfil.html"><i class="fa fa-user fa-fw"></i> Editar Perfil</a>
            </li>
                        <li><a href="../controlador/salir.php"><i class="fa fa-sign-out fa-fw"></i> Salir</a>
            </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
            </ul>
            <!-- /.navbar-top-links -->
            <div id="nav-menu" class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            
            <!-- /.navbar-static-side -->
        </nav>
        
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Inicio</h1>
                    </div>
                    <!-- /.col-lg-12 -->  
                </div>
                <div class="row">
                <div id="panelFerreterias" class="col-lg-4 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-barcode fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div id="empresasregistradas" class="huge">0</div>
                                    <div>Total Ferreterias</div>
                                </div>
                            </div>
                        </div>
                        <a href="reporte_progresoles.html">
                            <div class="panel-footer">
                                <span class="pull-left">Ver detalle</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                
                <div id="panelPuntos" class="col-lg-4 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-bar-chart-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div id="puntosentregados" class="huge">0</div>
                                    <div>Puntos Entregados</div>
                                </div>
                            </div>
                        </div>
                        <a href="reporte_puntos.html">
                            <div class="panel-footer">
                                <span class="pull-left">Ver detalle</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div id="panelMaestros" class="col-lg-4 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div id="maestrosempadronados" class="huge">0</div>
                                    <div>Maestros Empadronados</div>
                                </div>
                            </div>
                        </div>
                        <a href="reporte_maestros.html">
                            <div class="panel-footer">
                                <span class="pull-left">Ver detalle</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
                <!-- /.row INICIO -->
                
                <!-- /.row CIERRE -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    
    <!-- jQuery -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="views/js/sb-admin-2.js"></script>
    <script src="views/js/menus.js"></script>

</body>

</html>
