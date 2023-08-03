<?php 
require_once "../../controllers/controller.php";
require_once "../../models/crud.php";

class Buscador{
	public function puntosHistorialAjax($desdeA, $hastaA, $zonaA, $estadoA){

		$jsondata = array();
		$controller = new MvcController();
		$respuesta = $controller->puntosHistorialController($desdeA, $hastaA, $zonaA, $estadoA);
		//$respuesta = MvcController::puntosHistorialController($desdeA, $hastaA, $zonaA, $estadoA);

	}



if(isset($_GET["search"]) =="yes"){

	$desde = $_GET["from"];
	$hasta = $_GET["to"];
	$zona = $_GET["zone"];
	$estado = $_GET["state"];

}

	$a = new Buscador();
	$a -> puntosHistorialAjax($desde, $hasta, $zona, $estado);


 ?>