<?php 

require_once "../../controllers/controller.php";
require_once "../../models/crud.php";

class AjaxZonas{
	public function llenarZonasAjax(){

		$respuesta = MvcController::llenarZonasController();

		return $respuesta;
	}
}

$a = new AjaxZonas();
$a->llenarZonasAjax();

$jsondata = array();
$options='';

foreach ($a as $row => $item){
	$options.="<option value='$item->idzone'>$item->zone</option>";
}

/*
foreach($a->llenarZonasAjax() as $row){
	$options.="<option value='".$row->idzone."'>".$row->zone."</option>";
}*/

$jsondata["correcto"] = true;
$jsondata["datos"] = $options;

header('Content-type: application/json; charset=utf-8');
echo json_encode($jsondata, JSON_FORCE_OBJECT);

