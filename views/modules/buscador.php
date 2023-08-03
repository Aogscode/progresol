<?php 
require_once "../../controllers/controller.php";
require_once "../../models/crud.php";

class Buscador{
	public function reporteMaestrosAjax($desdeA, $hastaA, $zonaA, $estadoA){

		$jsondata = array();

		$controller = new MvcController();
		$respuesta = $controller->reporteMaestrosController($desdeA, $hastaA, $zonaA, $estadoA);
		//$respuesta = MvcController::reporteMaestrosController($desdeA, $hastaA, $zonaA, $estadoA);

	}

	public function reporteFerreteriasAjax($desdeA, $hastaA, $zonaA, $estadoA){

		$jsondata = array();

		$controller = new MvcController();
		$respuesta = $controller->reporteFerreteriasController($desdeA, $hastaA, $zonaA, $estadoA);
		//$respuesta = MvcController::reporteFerreteriasController($desdeA, $hastaA, $zonaA, $estadoA);

	}

	public function reporteValidaAjax($desdeA, $hastaA, $zonaA, $estadoA){

		$jsondata = array();

		$respuesta = MvcController::reporteValidaController($desdeA, $hastaA, $zonaA, $estadoA);

	}

	public function validarPunto($id, $estado){

		$jsondata = array();

		$respuesta = MvcController::validarPuntoController($id, $estado);

		if ($respuesta["success"] == 1) {
			//asigno valor a exito que sera consultada en el retorno del ajax
			$jsondata["exito"] = true;
			
		}else{
			$jsondata["exito"] = false;
		}

	}
}

// Flag para reporte de maestros
if($_GET["flag"] =="m"){

	$desde = $_GET["from"];
	$hasta = $_GET["to"];
	$zona = $_GET["zone"];
	$estado = $_GET["state"];
	
	$a = new Buscador();
	$a -> reporteMaestrosAjax($desde, $hasta, $zona, $estado);
}

//Flag para reporte de ferreterias
if($_GET["flag"] =="f"){

	$desde = $_GET["from"];
	$hasta = $_GET["to"];
	$zona = $_GET["zone"];
	$estado = $_GET["state"];
	
	$a = new Buscador();
	$a -> reporteFerreteriasAjax($desde, $hasta, $zona, $estado);
}

//Flag para reporte de puntos
if($_GET["flag"] =="p"){

	$desde = $_GET["from"];
	$hasta = $_GET["to"];
	$zona = $_GET["zone"];
	$estado = $_GET["state"];
	
	$a = new Buscador();
	$a -> reporteValidaAjax($desde, $hasta, $zona, $estado);
}

//Flag para reporte de validacion
if($_GET["flag"] =="v"){

	$desde = $_GET["from"];
	$hasta = $_GET["to"];
	$zona = $_GET["zone"];
	$estado = $_GET["state"];
	
	$a = new Buscador();
	$a -> reporteValidaAjax($desde, $hasta, $zona, $estado);
}

if(isset($_POST["id"])){

	$id = $_POST["id"];
	$estado = $_POST["estado"];
	
	$a = new Buscador();
	$a -> validarPunto($id, $estado);
}




	


 ?>