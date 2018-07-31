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
			$stmt = Conexion::conectar()->prepare("SELECT 1 FROM users WHERE dni = :numdoc AND idprofile = 4");
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
}