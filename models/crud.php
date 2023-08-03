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

	#LLENAR COMBO DE DEPARTAMENTOS
	#-------------------------------------
	public function llenarDepartamentosModel(){
		try{
			$stmt = Conexion::conectar()->prepare("SELECT iddept, name FROM department"); //("SELECT idzone, zone FROM zones");
			$stmt->execute();
			return $stmt->fetchAll();

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

	#CONSULTAR MAESTRO Y TRAER SUS DATOS
	#-------------------------------------
	public function consultarMaestroModel($dniModel){
		try{
			$stmt = Conexion::conectar()->prepare("SELECT id, dni, name, lastname1, lastname2
													FROM users where u.dni = :dni");
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

	#REGISTRAR USUARIO
	#-------------------------------------
	public function registrarUsuarioModel($userM,$dniM,$nombreM,$apepatM,
										$apematM,$telfM,$emailM, $permisoM){
		$companyM = null;

		if ($permisoM == 1) {
			$companyM = "UNACEM";
		} else {
			$companyM = "Promotick / Lucky";
		}
		
		//echo $userM." - ".$permisoM." - ".$companyM." - ".$dni;
		
		try{
			//Solo hago el llamado al procedimiento que contiene la logica
			$stmt = Conexion::conectar()->prepare("CALL sp_users(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

			$stmt->bindValue(1, $userM);	//id_user
			$stmt->bindValue(2, NULL);	//id update
			$stmt->bindValue(3, $permisoM);	//perfil usuario
			$stmt->bindValue(4, $nombreM);	//nombres
			$stmt->bindValue(5, $apepatM);	//apepat
			$stmt->bindValue(6, $apematM);	//apemat
			$stmt->bindValue(7, $companyM);	//company
			$stmt->bindValue(8, "--");	//direccion
			$stmt->bindValue(9, $telfM);	//celular
			$stmt->bindValue(10, $emailM);	//correo
			$stmt->bindValue(11, '1501');	//distrito
			$stmt->bindValue(12, null);	//zona
			$stmt->bindValue(13, $dniM);	//dni
			$stmt->bindValue(14, '0');	//ruc
			$stmt->bindValue(15, $dniM);	//clave
			$stmt->bindValue(16, null);	//lucky
			$stmt->bindValue(17, '0');	//idpromotick
			$stmt->bindValue(18, '1');	//estado
			$stmt->bindValue(19, 'CREATE');	//tarea: CREATE o UPDATE

			$stmt->execute();

			$datos = $stmt->fetch(PDO::FETCH_ASSOC);

			return $datos;

			$stmt = null;
		}catch(Exception $e){
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

	#CONTAR MAESTROS DASHBOARD
	#-------------------------------------
	public function contarMaestrosModel($idprofile, $lucky){
		$query = null;
		if ($idprofile == '1' || $idprofile == '2') {
			$query = "SELECT count(*) maestros FROM users where idprofile = 4";
		}elseif ($idprofile == '3') {
			$query = "SELECT count(*) maestros FROM users where idlucky = '".$lucky."' and idprofile = 4";
		}
		try{
			$stmt = Conexion::conectar()->prepare($query);
			$stmt->execute();

			return $stmt->fetch();

			$stmt = null;

		}catch(PDOException $error){
			echo 'error: '.$error->getMessage();
		}
	}

	#CONTAR FERRETERIAS DASHBOARD
	#-------------------------------------
	public function contarFerreteriasModel(){
		try{
			$stmt = Conexion::conectar()->prepare("SELECT count(*) ferreterias FROM users where idprofile = 3");
			$stmt->execute();

			return $stmt->fetch();

			$stmt = null;

		}catch(PDOException $error){
			echo 'error: '.$error->getMessage();
		}
	}

	#CONSOLIDADO DE PUNTOS DASHBOARD
	#-------------------------------------
	public function contarPuntosModel($idprofile, $lucky){
		$query = null;
		if ($idprofile == '1' || $idprofile == '2') {
			$query = "SELECT sum(points) puntos FROM points WHERE idstate = 1";
		}elseif ($idprofile == '3') {
			$query = "SELECT sum(p.points) puntos FROM points p
						INNER JOIN users u ON u.id = p.users 
						WHERE p.idstate = 1 AND u.idlucky = '".$lucky."'";
		}
		try{
			$stmt = Conexion::conectar()->prepare($query);
			$stmt->execute();

			return $stmt->fetch();

			$stmt = null;

		}catch(PDOException $error){
			echo 'error: '.$error->getMessage();
		}
	}

	#GRAFICO ULTIMOS 3 MESES DASHBOARD
	#-------------------------------------
	public function graficoresumenModel(){
		$query = "SELECT MONTH(register), DATE_FORMAT(register,'%b') meses, count(*) maestros,
					(select sum(p.points) from points p
						where p.idstate = 1 and month(p.register) = month(u.register)) puntos,
					(select count(*) from points p
						where p.idstate = 1 and month(p.register) = month(u.register)) Tx    
					FROM users u
					WHERE u.register BETWEEN DATE_SUB(NOW(), INTERVAL 2 MONTH) AND NOW() 
					AND u.idprofile = 4
					AND YEAR(u.register) = YEAR(curdate())
					GROUP BY 1 ORDER BY 1 ASC";
		try{
			$stmt = Conexion::conectar()->prepare($query);
			$stmt->execute();

			return $stmt->fetchAll();

			$stmt = null;

		}catch(PDOException $error){
			echo 'error: '.$error->getMessage();
		}
	}

	#GRAFICO PARTICIPACION POR ZONA
	#-------------------------------------
	public function participacionZonasModel(){
		$query = "SELECT zone zonas, count(*) participacion FROM users 
					INNER JOIN zones using (idzone)
					WHERE idprofile = 3
					GROUP BY 1";
		try{
			$stmt = Conexion::conectar()->prepare($query);
			$stmt->execute();

			return $stmt->fetchAll();

			$stmt = null;

		}catch(PDOException $error){
			echo 'error: '.$error->getMessage();
		}
	}

	#TABLA FERRETERIA X MES Y ZONA DASHBOARD
	#-----------------------------------------
	public function ferreteriaXzonaModel(){
		$query = "SELECT x.mes,
					(select count(*) from users a where DATE_FORMAT(a.register, '%b') = x.mes and idzone = 1 and idprofile = 3) sur,
					(select count(*) from users a where DATE_FORMAT(a.register, '%b') = x.mes and idzone = 2 and idprofile = 3) norte,
					(select count(*) from users a where DATE_FORMAT(a.register, '%b') = x.mes and idzone = 3 and idprofile = 3) este,
					(select count(*) from users a where DATE_FORMAT(a.register, '%b') = x.mes and idzone = 4 and idprofile = 3) surchico
					from
					(SELECT DATE_FORMAT(register,'%b') mes
					from users
					where register BETWEEN DATE_SUB(NOW(), INTERVAL 2 MONTH) AND NOW() 
					and idprofile = 3 group by 1) x";
		try{
			$stmt = Conexion::conectar()->prepare($query);
			$stmt->execute();

			return $stmt->fetchAll();

			$stmt = null;

		}catch(PDOException $error){
			echo 'error: '.$error->getMessage();
		}
	}

	#CONSULTA REPORTE DE HISTORIAL DE PUNTOS
	#----------------------------------------
	public function puntosHistorialModel($desdeM, $hastaM, $zonaM, $estadoM){
		// Query si la zona y el estado esta definido como TODOS

		$desdeM = date('Y-m-d', strtotime($desdeM));
		$hastaM = date('Y-m-d', strtotime($hastaM));

		$query = "SELECT 
					DATE_FORMAT(p.register, '%d/%m/%Y') fecha,
					DATE_FORMAT(p.register, '%H:%I:%S' ) hora,
					u.idlucky lucky,
					u.company ferreteria,
					(select dni from users where id = p.client) dni,
					(select concat(name,' ',lastname1,' ',lastname2) nombre from users where id = p.client) nombre,
					p.points puntos,
					pr.name producto,
					l.name distrito,
					z.zone zona,
					case when p.idstate = 1 then 'Aprobado' when p.idstate = 0 then 'Desaprobado' else 'Pend. aprobacion' end as estado
					FROM points p
					inner join users u on p.users = u.id
					inner join zones z on u.idzone = z.idzone
					inner join products pr on p.idproduct = pr.idproduct
					inner join location l on u.idloc = l.idloc
					where DATE(p.register) BETWEEN '".$desdeM."' AND '".$hastaM."'";

		// Agrego la zona si esta especificada
		if ($zonaM <> 0) {
			$query .= " and u.idzone = ".$zonaM;
		}

		// Agrego el estado si esta especificado
		if ($estadoM <> 3) {
			$query .= " and p.idstate = ".$estadoM;
		}

			$query .= " order by p.register";

		try{
			$stmt = Conexion::conectar()->prepare($query);
			$stmt->execute();

			return $stmt;//->fetchAll();

			$stmt = null;

		}catch(PDOException $error){
			echo 'error: '.$error->getMessage();
		}
	}

	#CONSULTA REPORTE DE MAESTROS
	#----------------------------------------
	public function reporteMaestrosModel($perfilM, $luckyM, $desdeM, $hastaM, $zonaM, $estadoM){

		$query = "SELECT u.idlucky lucky, u.company ferreteria, u.name nombres, CONCAT(u.lastname1,' ',u.lastname2) apellidos, u.dni dni, 
						 u.phone telefono, l.name distrito, z.zone zona, DATE_FORMAT(u.register, '%d/%m/%Y') fecha,
        				 DATE_FORMAT(u.register, '%H:%I:%S' ) hora,
        				 case when u.idstate = 1 then 'Activo' else 'Baja' end as estado
				  FROM users u
				  INNER JOIN zones z ON u.idzone = z.idzone
				  INNER JOIN location l ON u.idloc = l.idloc
				  WHERE idprofile = 4";

		// Agrego la zona si esta especificada
		if ($zonaM <> 0) {
			$query .= " and u.idzone = ".$zonaM;
		}

		// Agrego el estado si esta especificado
		if ($estadoM <> 3) {
			$query .= " and u.idstate = ".$estadoM;
		}

		//Si tiene rango de fechas lo agrego al query
		if($desdeM != null && $hastaM !=null){
			$query .= " and DATE(u.register) BETWEEN '".$desdeM."' AND '".$hastaM."'";
		}

		//Si es ferretero solo saco sus maestros
		if ($perfilM == '3' ) {
			$query .= " and u.idlucky = '".$luckyM."'";
		}

		try{
			$stmt = Conexion::conectar()->prepare($query);
			$stmt->execute();

			return $stmt;//->fetchAll();

			$stmt = null;

		}catch(PDOException $error){
			echo 'error: '.$error->getMessage();
		}
	}

	#CONSULTA REPORTE DE FERRETERIAS
	#----------------------------------------
	public function reporteFerreteriasModel($desdeM, $hastaM, $zonaM, $estadoM){

		$query = "SELECT u.idlucky lucky, u.company ferreteria, u.address direccion, u.phone telefono, 
						l.name distrito, z.zone zona, u.dni usuario, DATE_FORMAT(u.register, '%d/%m/%Y') fecha,
        				DATE_FORMAT(u.register, '%H:%I:%S' ) hora,
				        case when u.idstate = 1 then 'Activo' else 'Baja' end AS estado
					FROM users u
					INNER JOIN zones z ON u.idzone = z.idzone
					INNER JOIN location l ON u.idloc = l.idloc
					WHERE idprofile = 3";

		// Agrego la zona si esta especificada
		if ($zonaM <> 0) {
			$query .= " and u.idzone = ".$zonaM;
		}

		// Agrego el estado si esta especificado
		if ($estadoM <> 3) {
			$query .= " and u.idstate = ".$estadoM;
		}

		//Si tiene rango de fechas lo agrego al query
		if($desdeM != null && $hastaM !=null){
			$query .= " and DATE(u.register) BETWEEN '".$desdeM."' AND '".$hastaM."'";
		}

		try{
			$stmt = Conexion::conectar()->prepare($query);
			$stmt->execute();

			return $stmt;//->fetchAll();

			$stmt = null;

		}catch(PDOException $error){
			echo 'error: '.$error->getMessage();
		}
	}

	#CONSULTA VALIDADOR DE PUNTOS
	#----------------------------------------
	public function reporteValidaModel($desdeM, $hastaM, $zonaM, $estadoM){

		$query = "SELECT 
					p.idpoint id,
					DATE_FORMAT(p.register, '%d/%m/%Y') fecha,
					DATE_FORMAT(p.register, '%H:%I:%S' ) hora,
					u.idlucky lucky,
					u.company ferreteria,
					(SELECT dni FROM users WHERE id = p.client) dni,
					(SELECT concat(name,' ',lastname1,' ',lastname2) nombre FROM users WHERE id = p.client) nombre,
					p.points puntos,
					pr.name producto,
					l.name distrito,
					z.zone zona,
					CASE WHEN p.idstate = 0 THEN 'desaprobado' WHEN p.idstate = 2 THEN 'Pendiente' END AS estado
					FROM points p
					INNER JOIN users u ON p.users = u.id
					INNER JOIN zones z ON u.idzone = z.idzone
					INNER JOIN products pr ON p.idproduct = pr.idproduct
					INNER JOIN location l ON u.idloc = l.idloc
					WHERE DATE(p.register) BETWEEN '".$desdeM."' AND '".$hastaM."' 
					AND p.idstate = ".$estadoM;

		// Agrego la zona si esta especificada
		if ($zonaM <> 0) {
			$query .= " and u.idzone = ".$zonaM;
		}

		// Agrego el estado si esta especificado
		if ($estadoM <> 3) {
			$query .= " and p.idstate = ".$estadoM;
		}

		try{
			$stmt = Conexion::conectar()->prepare($query);
			$stmt->execute();

			return $stmt;//->fetchAll();

			$stmt = null;

		}catch(PDOException $error){
			echo 'error: '.$error->getMessage();
		}
	}

	#QUERY PARA VALIDACION DE PUNTOS
	#----------------------------------------
	public function validaPuntosModel($idM, $estadoM, $userM){
		
		try{
			$stmt = Conexion::conectar()->prepare("CALL sp_validated_point(?,?,?)");
			$stmt->bindValue(1, $idM);		//Id punto
			$stmt->bindValue(2, $estadoM);	//Estado a cambiar
			$stmt->bindValue(3, $userM);	//Usuario

			$stmt->execute();

			$datos = $stmt->fetch(PDO::FETCH_ASSOC);

			return $datos;

			$stmt = null; 

		}catch(PDOException $error){
			echo 'error: '.$error->getMessage();
		}
	}
}