<?php 
class MvcController{
	#LLAMADA A LA PLANTILLA
	#-------------------------------------

	public function pagina(){	
		
		include "views/template.php";
	
	}

	#ENLACES
	#-------------------------------------

	public function enlacesPaginasController(){

		if(isset( $_GET['action'])){
			$enlaces = $_GET['action'];
		}else{
			$enlaces = "index";
		}

		$respuesta = Paginas::enlacesPaginasModel($enlaces);

		include $respuesta;
	}

	#INGRESO AL SISTEMA
	#-------------------------------------
	public function validarIngresoController($user, $pass){
		$userController = $user;
		$passController = $pass;

		$respuesta = Datos::validarIngresoModel($userController);

		if($respuesta["success"] > 0){
			if ($respuesta["password"] == $passController) {
				
				#Creo variables de sesion
				session_start();

				#Creo variables de sesion
				$_SESSION["validar"] = true;
				$_SESSION["usuario"] = $respuesta["name"]." ".$respuesta["lastname"];
				$_SESSION["empresa"] = $respuesta["company"];
				$_SESSION["lucky"] = $respuesta["idlucky"];
				$_SESSION["id"] = $respuesta["id"];
				$_SESSION["perfil"] = $respuesta["profile"];

				# login exitoso
				return 1; 
				//header("location:inicio");
			}
			else{
				# contraseña incorrecta
				return "Usuario y/o contraseña incorrectos.";
			}
		}else if($respuesta["success"] == 0){
			# usuario no existe
			return "Usuario no se encuentra registrado";
		}else{
			#error de conexion
			return "Error de conexión";
		}

	}

	#CONSULTAR CODIGO LUCKY 
	#-------------------------------------
	public function consultarLuckyController($codLucky){
		$codLuckyController = $codLucky;

		$respuesta = Datos::consultarLuckyModel($codLuckyController);

		if ($respuesta["1"] == 1) {
			return 1;
		} else {
			return 0;
		}
		
	}

	#CONSULTAR DNI DE MAESTRO 
	#-------------------------------------
	public function consultarDniController($dni){
		$dniController = $dni;

		$respuesta = Datos::consultarDniModel($dniController);

		if ($respuesta["1"] == 1) {
			return 1;
		} else {
			return 0;
		}
		
	}

	#LLENAR COMBO DE ZONAS 
	#-------------------------------------
	public function llenarZonasController(){
		$respuesta = Datos::llenarZonasModel();
		
		$retorno = '';
		foreach ($respuesta as $row) {
			$retorno.="<option value='".$row['idzone']."'>".$row['zone']."</option>";
		}

		return $retorno;
	}

	#LLENAR COMBO DE PRODUCTOS
	#-------------------------------------
	public function llenarProductosController(){

		$respuesta = Datos::llenarProductosModel();
		
		$retorno = '';
		foreach ($respuesta as $row) {
			$retorno.="<option value='".$row['idproduct']."'>".$row['name']."</option>";
		}

		return $retorno;
	}

	#BUSCAR MAESTRO Y TRAER SUS DATOS 
	#-------------------------------------
	public function buscarMaestroController($dni){
		$dniController = $dni;

		$respuesta = Datos::buscarMaestroModel($dniController);

		return $respuesta;
	}

	#REGISTRAR MAESTRO
	#-------------------------------------
	public function registrarMaestroController($dniC, $nombreC, $apepatC, $apematC, $direcC, $telfC, $emailC){

		//ejecuto un session_start para poder acceder a las variables de sesion
		session_start();
		$userC 		= $_SESSION["id"];
		$companyC 	= $_SESSION["empresa"];
		$luckyC 	= $_SESSION["lucky"];

		$respuesta = Datos::registrarMaestroModel($userC, $companyC, $luckyC, $dniC, 
							$nombreC, $apepatC, $apematC, $direcC, $telfC, $emailC);

		return $respuesta;
	}

	#REGISTRAR USUARIO
	#-------------------------------------
	public function registrarUsuarioController($dniUsuario,$nombreUsuario,$apepatUsuario,
												$apematUsuario,$telfUsuario,$emailUsuario, $permisoUsuario){
		session_start();
		$userC 		= $_SESSION["id"];

		$respuesta = Datos::registrarUsuarioModel($userC,$dniUsuario,$nombreUsuario,$apepatUsuario,
												$apematUsuario,$telfUsuario,$emailUsuario, $permisoUsuario);

		return $respuesta;

	}

	#AGREGAR PUNTOS MAESTRO
	#-------------------------------------
	public function agregarPuntosController($idMaestroC, $cantidadC, $idprodC){

		session_start();
		$userC 	= $_SESSION["id"];
		$task	= "INSERT";

		$respuesta = Datos::agregarPuntosModel($idMaestroC, $userC, $cantidadC, $idprodC, $task);
		//return $userC." ".$task;
		return $respuesta;
	}
}
 ?>