<?php 

require_once "../../controllers/controller.php";
require_once "../../models/crud.php";

class Ajax{
	//Variables para ingreso al sistema
	public $usuario;
	public $clave;

	public function validarIngresoAjax(){
		
		$user = $this->usuario;
		$pass = $this->clave;
		
		$controller = new MvcController();
		$respuesta = $controller->validarIngresoController($user, $pass);
		//$respuesta = MvcController::validarIngresoController($user, $pass);

		echo $respuesta;
	}

	public function consultarLuckyAjax($codLucky){
		$lucky = $codLucky;

		$respuesta = MvcController::consultarLuckyController($lucky);

		echo $respuesta;
	}

	public function consultarDniAjax($numdoc){

		$docide = $numdoc;
		$controller = new MvcController();
		$respuesta = $controller->consultarDniController($docide);
		//$respuesta = MvcController::consultarDniController($docide);

		echo $respuesta;
	}

	public function llenarDepartamentosAjax(){
		
		$controller = new MvcController();
		$respuesta = $controller->llenarDepartamentosController();

		echo $respuesta;
	}


	public function llenarZonasAjax(){
		
		$controller = new MvcController();
		$respuesta = $controller->llenarZonasController();

		echo $respuesta;
	}

	public function llenarProductosAjax(){

		$controller = new MvcController();
		$respuesta = $controller->llenarProductosController();

		echo $respuesta;
	}

	public function buscarMaestroAjax($numdoc){

		$jsondata = array();

		$docide = $numdoc;

		$controller = new MvcController();
		$respuesta = $controller->buscarMaestroController($docide);

		if ($respuesta["id"]>0) {
			$jsondata["correcto"] = true;
			$jsondata["codMaestro"] = $respuesta["id"];
			$jsondata["dni"] = $respuesta["dni"];
			$jsondata["nombres"] = $respuesta["name"];
			$jsondata["apepat"] = $respuesta["lastname1"];
			$jsondata["apemat"] = $respuesta["lastname2"];
			$jsondata["ptosVal"] = "0";
			$jsondata["ptosPend"] = "0";

		}else{
			$jsondata["correcto"] = false;
		}

		header('Content-type: application/json; charset=utf-8');
  		echo json_encode($jsondata, JSON_FORCE_OBJECT);
		//echo $respuesta["name"];
	}

	public function consultarMaestroAjax($numdoc){

		$jsondata = array();

		$docide = $numdoc;

		$controller = new MvcController();
		$respuesta = $controller->consultarMaestroController($docide);

		if ($respuesta["id"]>0) {
			$jsondata["correcto"] = true;
			$jsondata["codMaestro"] = '4';//$respuesta["id"];
			$jsondata["dni"] = $respuesta["dni"];
			$jsondata["nombre"] = $respuesta["name"];
			$jsondata["apepat"] = $respuesta["lastname1"];
			$jsondata["apemat"] = $respuesta["lastname2"];
			$jsondata["PtosVal"] = '0';//$respuesta["ptos"];
			$jsondata["PtosTotal"] = '0';//$respuesta["ptos"];

		}else{
			$jsondata["correcto"] = false;
		}

		header('Content-type: application/json; charset=utf-8');
  		echo json_encode($jsondata, JSON_FORCE_OBJECT);
		//echo $respuesta["name"];
	}

	public function registrarMaestroAjax($dni, $nombre, $apepat, $apemat, $direc, $telf, $email){
		//Declaro array para JSON
		$jsondata = array();

		$controller = new MvcController();
		$respuesta = $controller->registrarMaestroController($dni, $nombre, $apepat, $apemat, $direc, $telf, $email);

		if ($respuesta["success"] == 1) {
			//asigno valor a exito que sera consultada en el retorno del ajax
			$jsondata["exito"] = true;
			
		}else{
			$jsondata["exito"] = false;
			$jsondata["msg"] = $respuesta["message"];
		}

		//Asgino formato JSON para devolver el array y que pueda ser leido por el ajax
		header('Content-type: application/json; charset=utf-8');
  		echo json_encode($jsondata, JSON_FORCE_OBJECT);
	}

	public function registrarUsuarioAjax($dniUsuario,$nombreUsuario,$apepatUsuario, $apematUsuario,$telfUsuario,$emailUsuario, $permisoUsuario){
		//Declaro array para JSON
		$jsondata = array();

		$respuesta = MvcController::registrarUsuarioController($dniUsuario,$nombreUsuario,$apepatUsuario,
																	$apematUsuario,$telfUsuario,$emailUsuario, $permisoUsuario);
		//echo $respuesta;
		
		if ($respuesta["success"] == 1) {
			//asigno valor a exito que sera consultada en el retorno del ajax
			$jsondata["exito"] = true;
			
		}else{
			$jsondata["exito"] = false;
			$jsondata["msg"] = $respuesta["message"];
		}

		//Asgino formato JSON para devolver el array y que pueda ser leido por el ajax
		header('Content-type: application/json; charset=utf-8');
  		echo json_encode($jsondata, JSON_FORCE_OBJECT);
	}

	public function agregarPuntosAjax($idMaestro, $cantidad, $idprod){

		$jsondata = array();

		$controller = new MvcController();
		$respuesta = $controller->agregarPuntosController($idMaestro, $cantidad, $idprod);

		//echo $respuesta;
		if ($respuesta["success"] == 1) {
			//asigno valor a exito que sera consultada en el retorno del ajax
			$jsondata["exito"] = true;
			
		}else{
			$jsondata["exito"] = false;
			$jsondata["msg"] = "error al conectar";
		}

		header('Content-type: application/json; charset=utf-8');
  		echo json_encode($jsondata, JSON_FORCE_OBJECT);
	}

	public function puntosHistorialAjax($desdeA, $hastaA, $zonaA, $estadoA){

		$jsondata = array();

		$respuesta = MvcController::puntosHistorialController($desdeA, $hastaA, $zonaA, $estadoA);

		/*if (strlen($respuesta)>1) {
			$jsondata["datos"] = $respuesta;
		}else{
			$jsondata["exito"] = "<tr><td colspan = '11' align='center'>No se encontraron resultados...</td></tr>";
		}

		header('Content-type: application/json; charset=utf-8');
  		echo json_encode($jsondata, JSON_FORCE_OBJECT);*/

	}
}

/* ---------------------------
VALIDA EL INGRESO AL SISTEMA
------------------------------*/
if (isset($_POST["validarUsuario"]) && isset($_POST["validarClave"])) {
	$a = new Ajax();
	$a -> usuario = $_POST["validarUsuario"];
	$a -> clave = $_POST["validarClave"];
	$a -> validarIngresoAjax();
}

/* -------------------------------
CONSULTA SI EXISTE LA FERRETERIA
----------------------------------*/
/*if (isset($_POST["codLucky"])){
	$codLucky = $_POST["codLucky"];
	$a = new Ajax();
	$a -> consultarLuckyAjax($codLucky);
}*/

/* ---------------------------------------
LLENADO DE COMBOBOX DEPARTAMENTOS
------------------------------------------*/
if (isset($_POST["lista"]) && $_POST["lista"] == "departamentos"){
	$a = new Ajax();
	$a -> llenarDepartamentosAjax();
}

/* ---------------------------------------
LLENADO DE COMBOBOX ZONA
------------------------------------------*/
if (isset($_POST["lista"]) && $_POST["lista"] == "zonas"){
	$a = new Ajax();
	$a -> llenarZonasAjax();
}

/* ---------------------------------------
LLENADO DE COMBOBOX PRODUCTOS
------------------------------------------*/
if (isset($_POST["lista"]) && $_POST["lista"] == "productos"){
	$a = new Ajax();
	$a -> llenarProductosAjax();
}

/* ---------------------------------------
CONSULTA SI EXISTE EL MAESTRO EN LA BBDD
------------------------------------------*/
if (isset($_POST["dni"])){
	$dni = $_POST["dni"];
	$a = new Ajax();
	$a -> consultarDniAjax($dni);
}

/* ---------------------------------------
BUSCA EL MAESTRO Y TRAE SUS DATOS
------------------------------------------*/
if (isset($_POST["buscaDni"])){
	$dni = $_POST["buscaDni"];
	$a = new Ajax();
	$a -> buscarMaestroAjax($dni);
}

/* ---------------------------------------
CONSULTAR MAESTRO Y TRAE SUS DATOS
------------------------------------------*/
if (isset($_POST["ConsultaDni"])){
	$dni = $_POST["ConsultaDni"];
	$a = new Ajax();
	$a -> consultarMaestroAjax($dni);
}

/* ---------------------------------------
		REGISTRAR MAESTRO DE OBRA
------------------------------------------*/
if(isset($_POST["dniMaestro"]) && isset($_POST["telfMaestro"])){
	//$registro = array(
		$dniMaestro 	= $_POST["dniMaestro"];
		$nombreMaestro 	= $_POST["nombreMaestro"];
		$apepatMaestro 	= $_POST["apepatMaestro"];
		$apematMaestro 	= $_POST["apematMaestro"];
		$dirMaestro 	= $_POST["dirMaestro"];
		$telfMaestro 	= $_POST["telfMaestro"];
		$emailMaestro 	= $_POST["emailMaestro"];
		
	$a = new Ajax();
	$a -> registrarMaestroAjax($dniMaestro,$nombreMaestro,$apepatMaestro,
								$apematMaestro,$dirMaestro,$telfMaestro,$emailMaestro);
}

/* ---------------------------------------
		REGISTRAR NUEVO USUARIO
------------------------------------------*/
if(isset($_POST["dniUsuario"]) && isset($_POST["permisoUsuario"])){
	//$registro = array(
		$dniUsuario 	= $_POST["dniUsuario"];
		$nombreUsuario 	= $_POST["nombreUsuario"];
		$apepatUsuario 	= $_POST["apepatUsuario"];
		$apematUsuario 	= $_POST["apematUsuario"];
		$telfUsuario 	= $_POST["telfUsuario"];
		$emailUsuario 	= $_POST["emailUsuario"];
		$permisoUsuario = $_POST["permisoUsuario"];
		
	$a = new Ajax();
	$a -> registrarUsuarioAjax($dniUsuario,$nombreUsuario,$apepatUsuario,
								$apematUsuario,$telfUsuario,$emailUsuario, $permisoUsuario);
}

/* ---------------------------------------
REGISTRAR PUNTOS POR COMPRA MAESTRO
------------------------------------------*/
if(isset($_POST["idMaestro"]) && isset($_POST["idprod"])){

		$idMaestro 	= $_POST["idMaestro"];
		$cantidad 	= $_POST["cantidad"];
		$idprod 	= $_POST["idprod"];
		
	$a = new Ajax();
	$a -> agregarPuntosAjax($idMaestro,$cantidad,$idprod);

}

/* ---------------------------------------
CONSULTAR HISTORIAL DE PUNTOS - BUSQUEDA
------------------------------------------*/

if (isset($_POST["is_date_search"]) == "yes") {

	$desde = $_POST["start_date"];
	$hasta = $_POST["end_date"];
	$zona = $_POST["selected_zone"];
	$estado = $_POST["selected_state"];

	$output = '{
				  "draw": 1,
				  "recordsTotal": 57,
				  "recordsFiltered": 57,
				  "data": [
				    [
				      "Airi",
				      "Satou",
				      "Accountant",
				      "Tokyo",
				      "28th Nov 08",
				      "$162,700"
				    ],
				    [
				      "Angelica",
				      "Ramos",
				      "Chief Executive Officer (CEO)",
				      "London",
				      "9th Oct 09",
				      "$1,200,000"
				    ],
				    [
				      "Ashton",
				      "Cox",
				      "Junior Technical Author",
				      "San Francisco",
				      "12th Jan 09",
				      "$86,000"
				    ],
				    [
				      "Bradley",
				      "Greer",
				      "Software Engineer",
				      "London",
				      "13th Oct 12",
				      "$132,000"
				    ],
				    [
				      "Brenden",
				      "Wagner",
				      "Software Engineer",
				      "San Francisco",
				      "7th Jun 11",
				      "$206,850"
				    ],
				    [
				      "Brielle",
				      "Williamson",
				      "Integration Specialist",
				      "New York",
				      "2nd Dec 12",
				      "$372,000"
				    ],
				    [
				      "Bruno",
				      "Nash",
				      "Software Engineer",
				      "London",
				      "3rd May 11",
				      "$163,500"
				    ],
				    [
				      "Caesar",
				      "Vance",
				      "Pre-Sales Support",
				      "New York",
				      "12th Dec 11",
				      "$106,450"
				    ],
				    [
				      "Cara",
				      "Stevens",
				      "Sales Assistant",
				      "New York",
				      "6th Dec 11",
				      "$145,600"
				    ],
				    [
				      "Cedric",
				      "Kelly",
				      "Senior Javascript Developer",
				      "Edinburgh",
				      "29th Mar 12",
				      "$433,060"
				    ]
				  ]
				}';

	echo json_encode($output);

	/*
	$a = new Ajax();
	$a -> puntosHistorialAjax($desde, $hasta, $zona, $estado);*/
}

/*if(isset($_POST["ptosDesde"] && isset($_POST["ptosHasta"])){

	$desde = $_POST["ptosDesde"];
	$hasta = $_POST["ptosHasta"];
	//$zona = $_POST["zona"];
	$estado = $_POST["estado"];

	$a = new Ajax();
	$a -> puntosHistorialAjax($desde, $hasta, 5, $estado);
}*/

?>