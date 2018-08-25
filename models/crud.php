<?php 
require_once "conexion.php";

class Datos extends Conexion{
	#INGRESO USUARIO
	#-------------------------------------	
	public function validarIngresoModel($userModel){

		try{
			$stmt = Conexion::conectar()->prepare("CALL sp_user_login(?)");
			$stmt->bindValue(1, $userModel);
			$stmt->execute();

			$datos = $stmt->fetch(PDO::FETCH_ASSOC);

			return $datos;

			$stmt = null; 

			
		}catch(PDOException $error){
			echo 'error: '.$error->getMessage();
		}


		
	}

	#CONSULTAR FERRETERIA POR COD LUCKY
	#-------------------------------------
	public function consultarLuckyModel($codLuckyModel){
		try{
			$stmt = Conexion::conectar()->prepare("SELECT 1 FROM users WHERE idlucky = :codlucky AND idprofile = 3");
			$stmt->bindParam(":codlucky", $codLuckyModel, PDO::PARAM_STR);
			//$stmt->bindParam(":profile", 3, PDO::PARAM_INT);
			$stmt->execute();

			return $stmt->fetch();

			$stmt = null;

		}catch(PDOException $error){
			echo 'error: '.$error->getMessage();
		}
	}

	#CONSULTAR MAESTRO POR DNI
	#-------------------------------------
	public function consultarDniModel($dniModel){
		try{
			$stmt = Conexion::conectar()->prepare("SELECT 1 FROM users WHERE dni = :numdoc");
			$stmt->bindParam(":numdoc", $dniModel, PDO::PARAM_STR);
			$stmt->execute();

			return $stmt->fetch();

			$stmt = null;

		}catch(PDOException $error){
			echo 'error: '.$error->getMessage();
		}
	}

	#LLENAR COMBO DE ZONAS
	#-------------------------------------
	public function llenarZonasModel(){
		try{
			$stmt = Conexion::conectar()->prepare("SELECT idzone, zone FROM zones"); //("SELECT idzone, zone FROM zones");
			$stmt->execute();
			return $stmt->fetchAll();

			$stmt = null;

		}catch(PDOException $error){
			echo 'error: '.$error->getMessage();
		}
	}

	#LLENAR COMBO DE PRODUCTOS
	#-------------------------------------
	public function llenarProductosModel(){
		try{
			$stmt = Conexion::conectar()->prepare("SELECT idproduct, name FROM products"); //("SELECT idzone, zone FROM zones");
			$stmt->execute();
			return $stmt->fetchAll();

			$stmt = null;

		}catch(PDOException $error){
			echo 'error: '.$error->getMessage();
		}
	}
	
	#BUSCAR MAESTRO Y TRAER SUS DATOS
	#-------------------------------------
	public function buscarMaestroModel($dniModel){
		try{
			$stmt = Conexion::conectar()->prepare("SELECT id, dni, name, lastname1, lastname2 FROM users where dni = :dni");
			$stmt->bindParam(":dni", $dniModel, PDO::PARAM_STR);
			$stmt->execute();

			return $stmt->fetch();

			$stmt = null;

		}catch(PDOException $error){
			echo 'error: '.$error->getMessage();
		}
	}


	#REGISTRAR MAESTRO
	#-------------------------------------
	public function registrarMaestroModel($userM, $companyM, $luckyM, $dniM, 
							$nombreM, $apepatM, $apematM, $direcM, $telfM, $emailM){
		try {
			//Solo hago el llamado al procedimiento que contiene la logica
			$stmt = Conexion::conectar()->prepare("CALL sp_users(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

			//Enlazo las variables hay 18 '?' los cuales pertenecen a cada variable desde
			//el 1 hasta el 18 en ese mismo orden
			
			$stmt->bindValue(1, $userM);	//id_user
			$stmt->bindValue(2, NULL);	//id update
			$stmt->bindValue(3, '4');	//perfil usuario
			$stmt->bindValue(4, $nombreM);	//nombres
			$stmt->bindValue(5, $apepatM);	//apepat
			$stmt->bindValue(6, $apematM);	//apemat
			$stmt->bindValue(7, $companyM);	//company
			$stmt->bindValue(8, $direcM);	//direccion
			$stmt->bindValue(9, $telfM);	//celular
			$stmt->bindValue(10, $emailM);	//correo
			$stmt->bindValue(11, '1501');	//distrito
			$stmt->bindValue(12, '1');	//zona
			$stmt->bindValue(13, $dniM);	//dni
			$stmt->bindValue(14, '0');	//ruc
			$stmt->bindValue(15, '1234');	//clave
			$stmt->bindValue(16, $luckyM);	//lucky
			$stmt->bindValue(17, '0');	//idpromotick
			$stmt->bindValue(18, '1');	//estado
			$stmt->bindValue(19, 'CREATE');	//tarea: CREATE o UPDATE

			$stmt->execute();

			$datos = $stmt->fetch(PDO::FETCH_ASSOC);

			return $datos;

			$stmt = null; 

		} catch (Exception $e) {
			echo 'error: '.$e->getMessage();
		}
	}

	#AGREGAR PUNTOS MAESTRO
	#-------------------------------------
	public function agregarPuntosModel($idMaestroM, $userM, $cantidadM, $idprodM, $task){
		try{
			//Solo hago el llamado al procedimiento que contiene la logica
			$stmt = Conexion::conectar()->prepare("CALL sp_register_points(?,?,?,?,?,?,?)");
			
			$stmt->bindValue(1, $idMaestroM);	//maestro
			$stmt->bindValue(2, $userM);		//ferretero
			$stmt->bindValue(3, $cantidadM);	//cantidad
			$stmt->bindValue(4, $idprodM);	//producto
			$stmt->bindValue(5, $task);	//tarea INSERT o UPDATE
			$stmt->bindValue(6, '0');	//cambio de estado
			$stmt->bindValue(7, '0');	//id tx

			$stmt->execute();

			$datos = $stmt->fetch(PDO::FETCH_ASSOC);

			return $datos;

			$stmt = null; 

		}catch(Exception $e){
			echo 'error: '.$e->getMessage();
		}
	}
}