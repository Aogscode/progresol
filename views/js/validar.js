/* Js para validar los registros de ingresos de datros de parte del cliente*/

function validar() {
	
	var nombre = document.querySelector("#nombreMaestro").value;
	
	var apellidoP = document.querySelector("#apepatMaestro").value;
	
	var apellidoM = document.querySelector("#apematMaestro").value;
	
	var direccion = document.querySelector("#dirMaestro").value;
	
	var telefono = document.querySelector("#telfMaestro").value;

	var email = document.querySelector("#emailMaestro").value;

	var btn = document.querySelector("#btnRegistrarMaestro").value;


			/*funcion para desabilitar el boton al momento de enviar la informacion*/

		
			/*fin del boton*/


				/*validacion para campos en blancos*/

		if( nombre == null || nombre.length == 0 || /^\s+$/.test(nombre) ) {

				alert("No se pueden dejar espacios en blancos");

  				return false;

				}


		/*validacion para nombres*/

		if (nombre !="") {

			var caracteres = nombre.length;
			var expresion  = /^[a-zA-Z]+$/;

			if (caracteres < 3 || caracteres > 15) {

		alert("su nombre debe tener minimo 3 letras y maximo 15");
					return false;
			}

			if (!expresion.test(nombre)) {

				alert("Introduzca solo letras en su Nombre");

					return false;
			}
		}

	/* fin validacion nombre*/



		/*validacion para apellido paterno*/

		if( apellidoP == null || apellidoP.length == 0 || /^\s+$/.test(apellidoP) ) {

				alert("No se pueden dejar espacios en blancos");

  				return false;

				}

		if (apellidoP !="") {

			var caracteres = apellidoP.length;
			var expresion  = /^[a-zA-Z +\s]*$/;

			if (caracteres < 3 || caracteres > 15) {

		alert("su apellido debe tener minimo 3 letras y maximo 15");
					return false;
			}

			if (!expresion.test(apellidoP)) {

				alert("Introduzca solo letras en su apellido");

					return false;
			}

		}
	/* fin validacion apellido paterno*/
    

    	/*validacion para apellido materno*/


		if( apellidoM == null || apellidoM.length == 0 || /^\s+$/.test(apellidoM) ) {

				alert("No se pueden dejar espacios en blancos");

  				return false;

				}


    	if (apellidoM !="") {

			var caracteres = apellidoM.length;
			var expresion  = /^[a-zA-Z +\s]*$/;

			if (caracteres < 3 || caracteres > 15) {

		alert("su apellido debe tener minimo 3 letras y maximo 15");
					return false;
			}

			if (!expresion.test(apellidoM)) {

				alert("Introduzca solo letras en su apellido");

					return false;
			}

		}
	/* fin validacion apellido materno*/

	/*validacion para la direccion*/

	if( direccion == null || direccion.length == 0 || /^\s+$/.test(direccion) ) {

				alert("No se pueden dejar espacios en blancos");

  				return false;

				}

		if (direccion !="") {

			var caracteres = direccion.length;

			if (caracteres > 30) {

		alert("Su Direccion debe tener maximo 30 caracteres");

					return false;
			}

		}

		/* fin validacion direccion*/

		/*validacion para el email*/

			if (email !="") {

			var caracteres = email.length;

			if (caracteres > 30) {

		alert("su correo debe tener maximo 30 caracteres");
					return false;
			}

		}

		if (email !="") {

			var expresion  = /\w+@+\w+\.+[a-z]/;

			if (!expresion.test(email)) {

		alert("Escriba correctamente su correo");

					return false;
			}

		}

		/* fin validacion email*/


		/*validacion para el telefono*/

		if( telefono == null || telefono.length == 0 || /^\s+$/.test(telefono) ) {

				alert("No se pueden dejar espacios en blancos");

  				return false;

				}


		if (telefono !="") {

			var caracteres = telefono.length;

			if (caracteres > 9 ) {

		alert("su Télefono debe tener 9 digitos");

					return false;
			}

		}	

		if (telefono !="") {

			var caracteres = telefono.length;

			if (caracteres < 9 ) {

		alert("su Télefono debe tener 9 digitos");

					return false;
			}

		}	


			if (isNaN(telefono)) {

				alert("El telefono ingresado no es un número");

					return false;
			}
/* fin validacion telefono*/
		
 return true;

}


		/*validaciones para los campos de registro de usuarios*/



	function validar2 () {

		var dni = document.querySelector("#dniMaestro").value;
		var nombreM = document.querySelector("#nombreMaestro").value;
		var apepaM = document.querySelector("#apepatMaestro").value;
		var apemaM = document.querySelector("#apematMaestro").value;
		var telefonoM = document.querySelector("#telfMaestro").value;
		var emailM = document.querySelector("#emailMaestro").value;
		var passM = document.querySelector("#usuarioPassword").value;
		var passM2 = document.querySelector("#usuarioPassword2").value;

    			/* validacion para las contraseñas sean iguales*/
    			if( passM == null || passM.length == 0 || /^\s+$/.test(passM) ) {

				alert("No se pueden dejar espacios en blancos");

  				return false;

				}

    			if(passM == passM2){
    			
    				return true;
    			}
    			else
    			{

    				alert("Las contraseñas no coinciden");

    				return false;
    			}
		/*validacion para el dni*/

		if( dni == null || dni.length == 0 || /^\s+$/.test(dni) ) {

				alert("No se pueden dejar espacios en blancos");

  				return false;

				}

				if (dni !="") {

			var caracteres = dni.length;

			if (caracteres > 8) {

		alert("su DNI debe tener 8 digitos");

					return false;
			}

		}	

				if (dni !="") {

			var caracteres = dni.length;

			if (caracteres < 8) {

		alert("su DNI debe tener 8 digitos");

					return false;
			}

		}	

			if (isNaN(dni)) {

				alert("El DNI ingresado no es un número");

					return false;
			}

			/*fin de la validacion del dni*/



				/*validacion para nombres*/


		if( nombreM == null || nombreM.length == 0 || /^\s+$/.test(nombreM) ) {

				alert("No se pueden dejar espacios en blancos");

  				return false;

				}

		if (nombreM !="") {

			var caracteres = nombreM.length;
			var expresion  = /^[a-zA-Z +\s]*$/;

			if (caracteres < 3 || caracteres > 15) {

		alert("su nombre debe tener minimo 3 letras y maximo 15");
					return false;
			}

			if (!expresion.test(nombreM)) {

				alert("Introduzca solo letras en su Nombre");

					return false;
			}

		}

				/* fin validacion nombre*/

		/*validacion para apellido paterno*/

		if( apepaM == null || apepaM.length == 0 || /^\s+$/.test(apepaM) ) {

				alert("No se pueden dejar espacios en blancos");

  				return false;

				}

		if (apepaM !="") {

			var caracteres = apepaM.length;
			var expresion  = /^[a-zA-Z +\s]*$/;

			if (caracteres < 3 || caracteres > 15) {

		alert("su apellido debe tener minimo 3 letras y maximo 15");
					return false;
			}

			if (!expresion.test(apepaM)) {

				alert("Introduzca solo letras en su apellido");

					return false;
			}

		}
			/* fin validacion apellido paterno*/

			/*validacion para apellido materno*/

			if( apemaM == null || apemaM.length == 0 || /^\s+$/.test(apemaM) ) {

				alert("No se pueden dejar espacios en blancos");

  				return false;

				}

    	if (apemaM !="") {

			var caracteres = apemaM.length;
			var expresion  = /^[a-zA-Z +\s]*$/;

			if (caracteres < 3 || caracteres > 15) {

		alert("su apellido debe tener minimo 3 letras y maximo 15");
					return false;
			}

			if (!expresion.test(apemaM)) {

				alert("Introduzca solo letras en su apellido");

					return false;
			}

		}
		/* fin validacion apellido materno*/

			/*validacion para el telefono*/

			if( telefonoM == null || telefonoM.length == 0 || /^\s+$/.test(telefonoM) ) {

				alert("No se pueden dejar espacios en blancos");

  				return false;

				}


				if (telefonoM !="") {

			var caracteres = telefonoM.length;

			if (caracteres > 9) {

		alert("su Télefono debe tener 9 digitos");

					return false;
			}

		}	

				if (telefonoM !="") {

			var caracteres = telefonoM.length;

			if (caracteres < 9) {

		alert("su Télefono debe tener 9 digitos");

					return false;
			}

		}

			if (isNaN(telefonoM)) {

				alert("El telefono ingresado no es un número");

					return false;
			}

		/* fin validacion telefono*/

		/*validacion para el email*/ 

		if( emailM == null || emailM.length == 0 || /^\s+$/.test(emailM) ) {

				alert("No se pueden dejar espacios en blancos");

  				return false;

				}


			if (emailM !="") {

			var caracteres = emailM.length;

			if (caracteres > 30) {

		alert("su correo debe tener maximo 30 caracteres");
					return false;
			}

		}

		if (emailM !="") {

			var expresion  = /\w+@+\w+\.+[a-z]/;

			if (!expresion.test(emailM)) {

		alert("Escriba correctamente su correo");

					return false;
			}

		}

		/* fin validacion email*/


		/*validacion para la contraseña*/ 

		if( passM == null || passM.length == 0 || /^\s+$/.test(passM) ) {

				alert("No se pueden dejar espacios en blancos");

  				return false;

				}

				
			if (passM !="") {

			var caracteres = passM.length;

			if (caracteres > 10) {

		alert("su contraseña debe tener maximo 10 caracteres");
					return false;
			}
		}


			if ( !passM == passM2 ) {


				alert("su contraseña no coinciden");

					return false;

			}

		/* fin validacion contraseña*/

		return true;

	}



	/*validaciones para los campos de registro de ferreterias*/


	function validar3() {

		var codigoP = document.querySelector("#codPromotickFerreteria").value;
		var rsocial = document.querySelector("#rsocialFerreteria").value;
		var rucF = document.querySelector("#rucFerreteria").value;
		var direccionF = document.querySelector("#dirFerreteria").value;
		var dniF = document.querySelector("#dniFerreteria").value;
		var usuarioF = document.querySelector("#usuFerreteria").value;
		var apePF = document.querySelector("#apepatFerreteria").value;
		var apeMF = document.querySelector("#apematFerreteria").value;
		var telefonoF = document.querySelector("#telfFerreteria").value;

			/*validacion para el codigo de promotick*/ 

			if( codigoP == null || codigoP.length == 0 || /^\s+$/.test(codigoP) ) {

				alert("No se pueden dejar espacios en blancos");

  				return false;

				}


		if (codigoP !="") {

			var caracteres = codigoP.length;

			if (caracteres > 10) {

		alert("El codigo debe tener 10 caracteres minimo");

					return false;
			}
		}

			/* fin validacion de codigo promotick*/

			/*validacion para la razon social*/

			if( rsocial == null || rsocial.length == 0 || /^\s+$/.test(rsocial) ) {

				alert("No se pueden dejar espacios en blancos");

  				return false;

				}

				if (rsocial !="") {

			var caracteres = rsocial.length;
			var expresion  = /^[a-zA-Z +\s]*$/;

			if (caracteres < 3 || caracteres > 15) {

		alert("La razon social debe tener minimo 3 letras y maximo 15");
					return false;
			}
		}

			/* fin validacion de razon social*/


			/*validacion para la direccion*/

			if( direccionF == null || direccionF.length == 0 || /^\s+$/.test(direccionF) ) {

				alert("No se pueden dejar espacios en blancos");

  				return false;

				}


		if (direccionF !="") {

			var caracteres = direccionF.length;

			if (caracteres > 30) {

		alert("Su Direccion debe tener maximo 30 caracteres");

					return false;
			}

		}

		/* fin validacion direccion*/


		/*validacion para el dni*/

		if( dniF == null || dniF.length == 0 || /^\s+$/.test(dniF) ) {

				alert("No se pueden dejar espacios en blancos");

  				return false;

				}

				if (dniF !="") {

			var caracteres = dniF.length;

			if (caracteres > 9) {

		alert("su DNI debe tener 9 digitos");

					return false;
			}

		}	

				if (dniF !="") {

			var caracteres = dniF.length;

			if (caracteres < 9) {

		alert("su DNI debe tener 9 digitos");

					return false;
			}

		}

			if (isNaN(dniF)) {

				alert("El DNI ingresado no es un número");

					return false;
			}

			/*fin de la validacion del dni*/


			/*validacion para nombres*/

			if( usuarioF == null || usuarioF.length == 0 || /^\s+$/.test(usuarioF) ) {

				alert("No se pueden dejar espacios en blancos");

  				return false;

				}

		if (usuarioF !="") {

			var caracteres = usuarioF.length;
			var expresion  = /^[a-zA-Z +\s]*$/;

			if (caracteres < 3 || caracteres > 15) {

		alert("su nombre debe tener minimo 3 letras y maximo 15");
					return false;
			}

			if (!expresion.test(usuarioF)) {

				alert("Introduzca solo letras en su Nombre");

					return false;
			}

		}

	/* fin validacion nombre*/


			/*validacion para apellido paterno*/

			if( apePF == null || apePF.length == 0 || /^\s+$/.test(apePF) ) {

				alert("No se pueden dejar espacios en blancos");

  				return false;

				}

		if (apePF !="") {

			var caracteres = apePF.length;
			var expresion  = /^[a-zA-Z +\s]*$/;

			if (caracteres < 3 || caracteres > 15) {

		alert("su apellido debe tener minimo 3 letras y maximo 15");
					return false;
			}

			if (!expresion.test(apePF)) {

				alert("Introduzca solo letras en su apellido");

					return false;
			}

		}
			/* fin validacion apellido paterno*/



			/*validacion para apellido materno*/

			if( apeMF == null || apeMF.length == 0 || /^\s+$/.test(apeMF) ) {

				alert("No se pueden dejar espacios en blancos");

  				return false;

				}

    	if (apeMF !="") {

			var caracteres = apeMF.length;
			var expresion  = /^[a-zA-Z +\s]*$/;

			if (caracteres < 3 || caracteres > 15) {

		alert("su apellido debe tener minimo 3 letras y maximo 50");
					return false;
			}

			if (!expresion.test(apeMF)) {

				alert("Introduzca solo letras en su apellido");

					return false;
			}

		}
		/* fin validacion apellido materno*/


		/*validacion para el telefono*/

		if( telefonoF == null || telefonoF.length == 0 || /^\s+$/.test(telefonoF) ) {

				alert("No se pueden dejar espacios en blancos");

  				return false;

				}


				if (telefonoF !="") {

			var caracteres = telefonoF.length;

			if (caracteres > 9) {

		alert("su Télefono debe tener 9 digitos");

					return false;
			}

		}	


				if (telefonoF !="") {

			var caracteres = telefonoF.length;

			if (caracteres < 9) {

		alert("su Télefono debe tener 9 digitos");

					return false;
			}

		}

			if (isNaN(telefonoF)) {

				alert("El telefono ingresado no es un número");

					return false;
			}

		/* fin validacion telefono*/



 return true;

	}	

