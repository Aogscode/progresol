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
    <li class="breadcrumb-item active">Registrar Ferreteria</li>
  </ol>
  <!-- Breadcrumbs-->

  <!-- FORMULARIO 1 - CONSULTA DE CODIGO LUCKY-->
  <div class="row">
    <div class="col-lg-12">
      <h1>Registrar Ferreteria</h1>
    </div>
  </div>

  <div class="row">
    <div class="col-md-9">
      <form id="consultar-ferreteria" method="post">
        <div class="form-group input-group">
          <input type="text" id="codLucky" name="codLucky" class="form-control" placeholder="Codigo Lucky" required>
          <span class="input-group-btn">
          <button id="btnConsultar" class="btn btn-default" type="submit">
            <i class="fa fa-search"></i> 
          </button>
        </div>
      </form>
      <div id="consulta-rspta"></div>
    </div>
  </div>
  <!-- FORMULARIO 1 - CONSULTA DE CODIGO LUCKY -->

  <!-- FORMULARIO 2 - CAPTURA DE DATOS PARA REGISTRO-->
  <div class="row">
    <div class="col-md-9">
      <form id="registro-ferreteria" action="" onsubmit="return validar3() ">
        <div class="form-group">
          <label for="codLuckyFerreteria">Codigo Lucky</label>
          <input type="text" id="codLuckyFerreteria" name="codLuckyFerreteria" class="form-control" disabled>
        </div>

        <div class="form-group">
          <label for="codPromotickFerreteria">Codigo Promotick (opcional)</label>
          <input type="text" id="codPromotickFerreteria" name="codPromotickFerreteria" class="form-control">
        </div>

        <div class="form-group">
          <label for="rsocialFerreteria">Razon social</label>
          <input type="text" id="rsocialFerreteria" name="rsocialFerreteria" class="form-control">
        </div>

        <div class="form-group">
          <label for="rucFerreteria">RUC (opcional)</label>
          <input type="text" id="rucFerreteria" name="rucFerreteria" class="form-control">
        </div>

        <div class="form-group">
          <label for="dirFerreteria">Direccion ferreteria</label>
          <input type="text" id="dirFerreteria" name="dirFerreteria" class="form-control">
        </div>

        <div class="form-group">
          <label for="departamentos">Departamento</label>
          <select id="departamentos" class="form-control">
            <option>Seleccionar...</option>
          </select>
        </div>

        <div class="form-group">
          <label for="provincia">Provincia</label>
          <select id="provincia" class="form-control">
            <option>Seleccionar...</option>
          </select>
        </div>

        <div class="form-group">
          <label for="distrito">Distrito</label>
          <select id="distrito" class="form-control">
            <option>Seleccionar...</option>
          </select>
        </div>

        <div class="form-group">
          <label for="zonaFerreteria">Zona</label>
          <select id="zonaFerreteria" class="form-control">
            <option>Seleccionar...</option>
          </select>
        </div>

        <div class="form-group">
          <label for="dniFerreteria">DNI de usuario</label>
          <input type="text" id="dniFerreteria" name="dniFerreteria" class="form-control">
        </div>

        <div class="form-group">
          <label for="usuFerreteria">Nombre de usuario</label>
          <input type="text" id="usuFerreteria" name="usuFerreteria" class="form-control">
        </div>

        <div class="form-group">
          <label for="apepatFerreteria">Apellido paterno</label>
          <input type="text" id="apepatFerreteria" name="apepatFerreteria" class="form-control">
        </div>

        <div class="form-group">
          <label for="apematFerreteria">Apellido materno</label>
          <input type="text" id="apematFerreteria" name="apematFerreteria" class="form-control">
        </div>

        <div class="form-group">
          <label for="telfFerreteria">Teléfono</label>
          <input type="text" id="telfFerreteria" name="telfFerreteria" class="form-control" required>
        </div>
        
        <div class="form-group">
          <button type="submit" id="btnRegistrarFerreteria" class="btn btn-primary btn-lg btn-block">Registrar ferreteria</button>
        </div>
        
      </form>
    </div>
  </div>
  <!-- FORMULARIO 2 - CAPTURA DE DATOS PARA REGISTRO-->
</div>