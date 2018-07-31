<style type="text/css">
  
.navbar-dark .navbar-collapse .navbar-sidenav {

    background: #103A71!important;

  }


  .navbar-dark .navbar-collapse .navbar-sidenav > .nav-item .sidenav-second-level > li > a{

        background: #103A71!important;

  }

</style>


<ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
  <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
    <a class="nav-link" href="index.php">
      <i class="fa fa-fw fa-dashboard"></i>
      <span class="nav-link-text" style="color: black;">Dashboard</span>
    </a>
  </li>

  <!-- <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
    <a class="nav-link" href="charts.html">
      <i class="fa fa-fw fa-area-chart"></i>
      <span class="nav-link-text">Charts</span>
    </a>
  </li>
  <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
    <a class="nav-link" href="tables.html">
      <i class="fa fa-fw fa-table"></i>
      <span class="nav-link-text">Tables</span>
    </a>
  </li> -->

  <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Maestros">
    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#optMaestros" data-parent="#exampleAccordion">
      <i class="fa fa-fw fa-child"></i>
      <span class="nav-link-text" style="color: black;">Maestros</span>
    </a>
    <ul class="sidenav-second-level collapse" id="optMaestros">
      <li>
        <a href="registrarMaestro" style="color: black;">Registrar maestro</a>
      </li>
      <li>
        <a href="consultarMaestro" style="color: black;">Consultar maestro</a>
      </li>
      <li>
        <a href="agregarPuntos" style="color: black;">Agregar puntos</a>
      </li>
      <li>
        <a href="reporteMaestros" style="color: black;">Reporte de maestros</a>
      </li>
    </ul>
  </li>

  <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Ferreterias">
    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#optFerreterias" data-parent="#exampleAccordion">
      <i class="fa fa-fw fa-building"></i>
      <span class="nav-link-text" style="color: black;">Ferreterias</span>
    </a>
    <ul class="sidenav-second-level collapse" id="optFerreterias">
      <li>
        <a href="registrarFerreteria" style="color: black;">Registrar ferreteria</a>
      </li>
      <li>
        <a href="reporteFerreterias" style="color: black;">Reporte ferreterias</a>
      </li>
    </ul>
  </li>

  <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Control">
    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#optControl" data-parent="#exampleAccordion">
      <i class="fa fa-fw fa-wrench"></i>
      <span class="nav-link-text" style="color: black;">Control</span>
    </a>
    <ul class="sidenav-second-level collapse" id="optControl">
      <li>
        <a href="crearUsuario" style="color: black;">Crear usuario</a>
      </li>
      <li>
        <a href="reporteUsuarios" style="color: black;">Reporte de usuarios</a>
      </li>
      <li>
        <a href="validarPuntos" style="color: black;">Validar puntos</a>
      </li>
    </ul>
  </li>

  <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Reportes">
    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#optReportes" data-parent="#exampleAccordion">
      <i class="fa fa-fw fa-file-text"></i>
      <span class="nav-link-text" style="color: black;">Reportes</span>
    </a>
    <ul class="sidenav-second-level collapse" id="optReportes">
      <li>
        <a href="reporteHistorial" style="color: black;">Historial de puntos</a>
      </li>
      <li>
        <a href="#" style="color: black;">Reporte2</a>
      </li>
      <li>
        <a href="#" style="color: black;">Reporte3</a>
      </li>
    </ul>
  </li>

  <!-- <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
      <i class="fa fa-fw fa-sitemap"></i>
      <span class="nav-link-text">Menu Levels</span>
    </a>
    <ul class="sidenav-second-level collapse" id="collapseMulti">
      <li>
        <a href="#">Second Level Item</a>
      </li>
      <li>
        <a href="#">Second Level Item</a>
      </li>
      <li>
        <a href="#">Second Level Item</a>
      </li>
      <li>
        <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti2">Third Level</a>
        <ul class="sidenav-third-level collapse" id="collapseMulti2">
          <li>
            <a href="#">Third Level Item</a>
          </li>
          <li>
            <a href="#">Third Level Item</a>
          </li>
          <li>
            <a href="#">Third Level Item</a>
          </li>
        </ul>
      </li>
    </ul>
  </li> 

  <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
    <a class="nav-link" href="#">
      <i class="fa fa-fw fa-link"></i>
      <span class="nav-link-text">Link</span>
    </a>
  </li>-->
</ul>