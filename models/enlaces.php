<?php 

class Paginas{

	public function enlacesPaginasModel($enlaces){

	#Aqui recibo el action y redirecciono a la pagina

		if($enlaces == "registrarMaestro" || $enlaces == "consultarMaestro" ||

			$enlaces == "agregarPuntos" || $enlaces == "reporteMaestros"){

			#Redirecciones para modulo maestros

			$module =  "views/modules/maestro/".$enlaces.".php";

		}else if ($enlaces == "registrarFerreteria" || $enlaces == "reporteFerreterias"){

			#Redirecciones para modulo ferreterias

			$module =  "views/modules/ferreteria/".$enlaces.".php";

		}else if ($enlaces == "crearUsuario" || $enlaces == "validarPuntos" || $enlaces == "reporteUsuarios"){

			#Redirecciones para modulo control

			$module =  "views/modules/control/".$enlaces.".php";

		}else if ($enlaces == "reporteHistorial"){

			#redireccion para modulo de reportes

			$module =  "views/modules/reporte/".$enlaces.".php";

		}else if($enlaces == "salir"){

			#redirecciones para utilitarios

			$module =  "views/modules/".$enlaces.".php";

		}else if($enlaces == "inicio"){

			#redireccion al login

			$module =  "views/modules/dashboard.php";//"index.php";

		}else{
			#redireccion por defecto
			
			$module =  "views/modules/dashboard.php";
		}

		return $module;
	}
	
}

 ?>