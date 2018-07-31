<ul class="navbar-nav ml-auto">

  <li class="nav-item">
    <form class="form-inline my-2 my-lg-0 mr-lg-2">
      <div class="input-group">
        <button type="button" class="btn btn-secondary">
          <?php
            echo $_SESSION["empresa"];
           ?>
        </button>
      </div>
             
    </form>
  </li>
  
  <li class="nav-item">
    <a class="nav-link" style="color: black;" href="salir">
      <i class="fa fa-fw fa-sign-out" style="color: black;"></i>Salir</a>
  </li>
</ul>

<style type="text/css">
  

.bg-dark {


    background-color: #71BD44!important;
}



</style>