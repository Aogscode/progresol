<?php
if (!$_SESSION["validar"]) {

    header("location:ingresar");

    exit();

}
?>

<div class="container-fluid">
  <!-- Breadcrumb -->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="index.php">
        <?php
        echo $_SESSION["usuario"];
        ?>
      </a>
    </li>
    <li class="breadcrumb-item active">Dashboard</li>
  </ol>

<!-- Icon Cards-->
      <div class="row">  
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-user-circle"></i>
              </div>
              <div class="mr-5">
                <?php
                $maestros = new MvcController();
                $maestros->contarMaestrosController($_SESSION["perfil"], $_SESSION["lucky"]);
                ?> Maestros registrados!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">Ver reporte</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>

         <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-building"></i>
              </div>
              <div class="mr-5">
              <?php
                $ferr = new MvcController();
                $ferr->contarFerreteriasController();
                ?>
               Ferreterias registradas!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">Ver reporte</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div> 


        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-hashtag"></i>
              </div>
              <div class="mr-5"><?php
                $ferr = new MvcController();
                $ferr->contarPuntosController($_SESSION["perfil"], $_SESSION["lucky"]);
                ?> Puntos aprobados!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">Ver reporte</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-support"></i>
              </div>
              <div class="mr-5">13 Usuarios del sistema!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
      </div>
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-bar-chart"></i> Resumen ultimos 3 meses</div>
        <div class="card-body">
          <div id="chart_div" class="chart"></div>
        </div>
        <!-- <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> -->
      </div>

      <div class="row">
        <div class="col-lg-6">
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-table"></i> Ferreterias del programa</div>
            <div class="card-body">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Mes</th>
                    <th>LS</th>
                    <th>LN</th>
                    <th>LE</th>
                    <th>SC</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $table = new MvcController();
                    $table->ferreteriaXzonaController();
                   ?>
                </tbody>
              </table>
                  <!-- <div id="line_top_x" style="width: 100%; height: 100;"></div> -->
 
            </div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-pie-chart"></i> Participacion por zona</div>
            <div class="card-body">
              <div id="piechart" style="width: 100%; height: 100;"></div>
            </div>
          </div>
        </div>
      </div>
</div>

<style type="text/css">
  .chart {
  width: 100%; 
  min-height: 450px;
  }
  .row {
    margin:0 !important;
}
</style>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
      
      /************Grafico de barras************/
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Meses', 'Maestros', 'Puntos', 'Tx'],
          <?php 
            $resumen = new MvcController();
            $resumen->graficoresumenController();
           ?> 
          /*['Ago', 1000, 400, 200],
          ['Jul', 1170, 460, 250],
          ['Jun', 660, 1120, 300],
          ['May', 1030, 540, 350]*/
        ]);

        var options = {
          chart: {
            title: 'Rendimiento del programa',
            subtitle: 'Maestros, Puntos, y Transacciones: May-Ago',
          },
          bars: 'vertical',
          vAxis: {format: 'decimal'},
          height: 400,
          colors: ['#1b9e77', '#d95f02', '#7570b3']
        };

        var chart = new google.charts.Bar(document.getElementById('chart_div'));

        chart.draw(data, google.charts.Bar.convertOptions(options));

        $(window).resize(function(){
          drawChart();
        });
      }

      /************Grafico de Pie************/

      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(pieChart);

      function pieChart() {

        var data = google.visualization.arrayToDataTable([
          ['zonas', 'Participacion'],
          <?php 
            $piechart = new MvcController();
            $piechart->participacionZonasController();
           ?>
          /*
          ['Norte',     5],
          ['Sur',      2],
          ['Este',  2],
          ['Sur chico', 2]*/
        ]);

        var options = {
          title: '% Participacion'
        };

        var pie = new google.visualization.PieChart(document.getElementById('piechart'));

        pie.draw(data, options);

        $(window).resize(function(){
          pieChart();
        });
      }
    </script>