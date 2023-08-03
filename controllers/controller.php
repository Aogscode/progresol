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

		//$respuesta = Paginas::enlacesPaginasModel($enlaces);
		$paginas = new Paginas();
		$respuesta = $paginas->enlacesPaginasModel($enlaces);
		
		include $respuesta;
	}

	#INGRESO AL SISTEMA
	#-------------------------------------
	public function validarIngresoController($user, $pass){
		$userController = $user;
		$passController = $pass;
		
		$datos = new Datos();
		$respuesta = $datos->validarIngresoModel($userController);
		//$respuesta = Datos::validarIngresoModel($userController);
		
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
		$datos = new Datos();
		$respuesta = $datos->consultarDniModel($dniController);
		//$respuesta = Datos::consultarDniModel($dniController);

		if ($respuesta["1"] == 1) {
			return 1;
		} else {
			return 0;
		}
		
	}

	#LLENAR COMBO DE ZONAS 
	#-------------------------------------
	public function llenarZonasController(){
		$datos = new Datos();
		$respuesta = $datos->llenarZonasModel();
		//$respuesta = Datos::llenarZonasModel();
		
		$retorno = '<option value=0>Todas</option>';
		foreach ($respuesta as $row) {
			$retorno.="<option value='".$row['idzone']."'>".$row['zone']."</option>";
		}

		return $retorno;
	}

	#LLENAR COMBO DE ZONAS 
	#-------------------------------------
	public function llenarDepartamentosController(){
		$datos = new Datos();
		$respuesta = $datos->llenarDepartamentosModel();
		//$respuesta = Datos::llenarZonasModel();
		
		//$retorno = '<option value=0>Todas</option>';
		foreach ($respuesta as $row) {
			$retorno.="<option value='".$row['iddept']."'>".$row['name']."</option>";
		}

		return $retorno;
	}


	#LLENAR COMBO DE PRODUCTOS
	#-------------------------------------
	public function llenarProductosController(){

		$datos = new Datos();
		$respuesta = $datos->llenarProductosModel();
		//$respuesta = Datos::llenarProductosModel();
		
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

		$datos = new Datos();
		$respuesta = $datos->buscarMaestroModel($dniController);
		//$respuesta = Datos::buscarMaestroModel($dniController);

		return $respuesta;
	}

	#CONSULTAR MAESTRO Y TRAER SUS DATOS 
	#-------------------------------------
	public function consultarMaestroController($dni){
		$dniController = $dni;

		$datos = new Datos();
		$respuesta = $datos->consultarMaestroModel($dniController);
		//$respuesta = Datos::buscarMaestroModel($dniController);

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

		$datos = new Datos();
		$respuesta = $datos->registrarMaestroModel($userC, $companyC, $luckyC, $dniC, 
								$nombreC, $apepatC, $apematC, $direcC, $telfC, $emailC);
		/*$respuesta = Datos::registrarMaestroModel($userC, $companyC, $luckyC, $dniC, 
							$nombreC, $apepatC, $apematC, $direcC, $telfC, $emailC);*/

		return $respuesta;
	}

	#REGISTRAR USUARIO
	#-------------------------------------
	public function registrarUsuarioController($dniUsuario,$nombreUsuario,$apepatUsuario,
												$apematUsuario,$telfUsuario,$emailUsuario, $permisoUsuario){
		session_start();
		$userC 		= $_SESSION["id"];
        
		$datos = new Datos();
		$respuesta = $datos->registrarUsuarioModel($userC,$dniUsuario,$nombreUsuario,$apepatUsuario,
											$apematUsuario,$telfUsuario,$emailUsuario, $permisoUsuario);
		/*$respuesta = Datos::registrarUsuarioModel($userC,$dniUsuario,$nombreUsuario,$apepatUsuario,
												$apematUsuario,$telfUsuario,$emailUsuario, $permisoUsuario);*/

		return $respuesta;

	}

	#AGREGAR PUNTOS MAESTRO
	#-------------------------------------
	public function agregarPuntosController($idMaestroC, $cantidadC, $idprodC){

		session_start();
		$userC 	= $_SESSION["id"];
		$task	= "INSERT";
		
		$datos = new Datos();
		$respuesta = $datos->agregarPuntosModel($idMaestroC, $userC, $cantidadC, $idprodC, $task); // willito
		//return $userC." ".$task;
		return $respuesta;
	}

	#CONTAR MAESTROS DASHBOARD
	#-------------------------------------
	public function contarMaestrosController($idprofile, $lucky){
		$datos = new Datos();
		$respuesta = $datos->contarMaestrosModel($idprofile, $lucky);
		echo $respuesta["maestros"];
	}

	#CONTAR FERRETERIAS DASHBOARD
	#-------------------------------------
	public function contarFerreteriasController(){
		$datos = new Datos();
		$respuesta = $datos->contarFerreteriasModel();
		echo $respuesta["ferreterias"];
	}

	#CONSOLIDADO DE PUNTOS DASHBOARD
	#-------------------------------------
	public function contarPuntosController($idprofile, $lucky){
		$datos = new Datos();
		$respuesta = $datos->contarPuntosModel($idprofile, $lucky);
		echo $respuesta["puntos"];
	}

	#GRAFICO ULTIMOS 3 MESES DASHBOARD
	#-------------------------------------
	public function graficoresumenController(){
		$data = null;
		$datos = new Datos();
		$respuesta = $datos->graficoresumenModel();
		//$respuesta = Datos::graficoresumenModel();
		//return $respuesta;

		foreach ($respuesta as $row) {
        	$data.= "['".$row['meses']."', ".$row['maestros'].", ".$row['puntos'].", ".$row['Tx']."],";
        }

        echo substr($data,0,-1);
	}

	#GRAFICO PARTICIPACION POR ZONA
	#-------------------------------------
	public function participacionZonasController(){
		$data = null;
		$datos = new Datos();
		$respuesta = $datos->participacionZonasModel();
		//$respuesta = Datos::participacionZonasModel();

		foreach ($respuesta as $row) {
        	$data.= "['".$row['zonas']."', ".$row['participacion']."],";
        }

        echo substr($data,0,-1);
	}

	#TABLA FERRETERIA X MES Y ZONA DASHBOARD
	#-----------------------------------------
	public function ferreteriaXzonaController(){
		$datos = new Datos();
		$respuesta = $datos->ferreteriaXzonaModel();

		foreach ($respuesta as $row) {
        	echo "<tr><td>".$row['mes']."</td><td>".$row['sur']."</td><td>".$row['norte']."</td><td>".
        			$row['este']."</td><td>".$row['surchico']."</td></tr>";
        }
	}

	#CONSULTA REPORTE DE HISTORIAL DE PUNTOS
	#----------------------------------------
	public function puntosHistorialController($desdeC, $hastaC, $zonaC, $estadoC){
		$datos = new Datos();
		$respuesta = $datos->puntosHistorialModel($desdeC, $hastaC, $zonaC, $estadoC);
		//$respuesta = Datos::puntosHistorialModel($desdeC, $hastaC, $zonaC, $estadoC);

		/*$arreglo['data'][]= $respuesta->fetchAll();
		header('Content-type: application/json; charset=utf-8');
		echo json_encode($arreglo, JSON_FORCE_OBJECT);*/
		/*
		$total = $respuesta->rowCount();

		echo $total;*/
		/*$texto = '{';
		foreach ($respuesta as $row){
			$texto .= $row['fecha'];
			$texto .= $row['hora'];
			$texto .= $row['lucky'];
			$texto .= $row['ferreteria'];
			$texto .= $row['dni'];
			$texto .= $row['nombre'];
			$texto .= $row['puntos'];
			$texto .= $row['producto'];
			$texto .= $row['distrito'];
			$texto .= $row['zona'];
			$texto .= $row['estado'];
		}

		$texto .= '}';

		echo $texto;*/
		
		$data = array();

		foreach ($respuesta as $row){
			$sub_array = array();
			$sub_array[] = $row['fecha'];
			$sub_array[] = $row['hora'];
			$sub_array[] = $row['lucky'];
			$sub_array[] = $row['ferreteria'];
			$sub_array[] = $row['dni'];
			$sub_array[] = $row['nombre'];
			$sub_array[] = $row['puntos'];
			$sub_array[] = $row['producto'];
			$sub_array[] = $row['distrito'];
			$sub_array[] = $row['zona'];
			$sub_array[] = $row['estado'];
			$data[] = $sub_array;
		}


		$output = array(
		 "data"    => $data
		);

		//header('Content-type: application/json; charset=utf-8');
  		//echo json_encode($output, JSON_FORCE_OBJECT);
  		echo json_encode($output);
	}

	#CONSULTA REPORTE DE MAESTROS
	#----------------------------------------
	public function reporteMaestrosController($desdeC, $hastaC, $zonaC, $estadoC){

		//ejecuto un session_start para poder acceder a las variables de sesion
		session_start();
		$perfilC 	= $_SESSION["perfil"];
		$luckyC 	= $_SESSION["lucky"];

		$datos = new Datos();
		$respuesta = $datos->reporteMaestrosModel($perfilC, $luckyC, $desdeC, $hastaC, $zonaC, $estadoC);
		//$respuesta = Datos::reporteMaestrosModel($perfilC, $luckyC, $desdeC, $hastaC, $zonaC, $estadoC);

		$data = array();

		foreach ($respuesta as $row){
			$sub_array = array();
			$sub_array[] = $row['lucky'];
			$sub_array[] = $row['ferreteria'];
			$sub_array[] = $row['nombres'];
			$sub_array[] = $row['apellidos'];
			$sub_array[] = $row['dni'];
			$sub_array[] = $row['telefono'];
			$sub_array[] = $row['distrito'];
			$sub_array[] = $row['zona'];
			$sub_array[] = $row['fecha'];
			$sub_array[] = $row['hora'];
			$sub_array[] = $row['estado'];
			$data[] = $sub_array;
		}


		$output = array(
		 "data"    => $data
		);

  		echo json_encode($output);
	}

	#CONSULTA REPORTE DE FERRETERIAS
	#----------------------------------------
	public function reporteFerreteriasController($desdeC, $hastaC, $zonaC, $estadoC){

		//ejecuto un session_start para poder acceder a las variables de sesion
		$datos = new Datos();
		$respuesta = $datos->reporteFerreteriasModel($desdeC, $hastaC, $zonaC, $estadoC);
		//$respuesta = Datos::reporteFerreteriasModel($desdeC, $hastaC, $zonaC, $estadoC);

		$data = array();

		foreach ($respuesta as $row){
			$sub_array = array();
			$sub_array[] = $row['lucky'];
			$sub_array[] = $row['ferreteria'];
			$sub_array[] = $row['zona'];
			$sub_array[] = $row['distrito'];
			$sub_array[] = $row['usuario'];
			$sub_array[] = $row['estado'];
			//$sub_array[] = $row['telefono'];
			$sub_array[] = $row['fecha'];
			$sub_array[] = $row['hora'];
			$sub_array[] = $row['direccion'];
			$data[] = $sub_array;
		}


		$output = array(
		 "data"    => $data
		);

  		echo json_encode($output);
	}

	#CONSULTA DE VALIDADOR DE PUNTOS
	#----------------------------------------
	public function reporteValidaController($desdeC, $hastaC, $zonaC, $estadoC){

		//ejecuto un session_start para poder acceder a las variables de sesion
		$datos = new Datos();
		$respuesta = $datos->reporteValidaModel($desdeC, $hastaC, $zonaC, $estadoC);
		//$respuesta = Datos::reporteValidaModel($desdeC, $hastaC, $zonaC, $estadoC);

		$data = array();

		foreach ($respuesta as $row){
			$sub_array = array();
			$sub_array[] = $row['id'];
			$sub_array[] = $row['fecha'];
			$sub_array[] = $row['hora'];
			$sub_array[] = $row['lucky'];
			$sub_array[] = $row['ferreteria'];
			$sub_array[] = $row['dni'];
			$sub_array[] = $row['puntos'];
			if ($row['estado'] == 'Pendiente'){
				$sub_array[] = '<a class="botonvalidar btn btn-success btn-xs" data-id='.$row['id'].' data-validar="1"><i class="fa fa-check"></i></a> <a class="botonvalidar btn btn-danger btn-xs" data-id='.$row['id'].'  data-validar="0"><i class="fa fa-remove"></i></a>';
			}else{
				$sub_array[] = $row['estado'];
			}
			$sub_array[] = $row['nombre'];
			$sub_array[] = $row['producto'];
			$sub_array[] = $row['zona'];
			//$sub_array[] = $row['estado'];
			$data[] = $sub_array;
		}


		$output = array(
		 "data"    => $data
		);

  		echo json_encode($output);
	}

	#QUERY PARA VALIDACION DE PUNTOS
	#----------------------------------------
	public function validarPuntoController($idC, $estadoC){

		session_start();
		$userC = $_SESSION["id"];
		$datos = new Datos();
		$respuesta = $datos->validaPuntosModel($idC, $estadoC, $userC);
		//$respuesta = Datos::validaPuntosModel($idC, $estadoC, $userC);

		return $respuesta;

	}
	
}
 ?>