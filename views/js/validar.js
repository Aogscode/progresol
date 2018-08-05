/* Js para validar los registros de ingresos de datros de parte del cliente*/

function validar() {
	
	var nombre = document.querySelector("#nombreMaestro").value;
	
	var apellidoP = document.querySelector("#apepatMaestro").value;
	
	var apellidoM = document.querySelector("#apematMaestro").value;
	
	var direccion = document.querySelector("#dirMaestro").value;
	
	var telefono = document.querySelector("#telfMaestro").value;

	var email = document.querySelector("#emailMaestro").value;



function valida(F) {
if(/^\s+|\s+$/.test(F.campo.value)) {
alert("Introduzca un cadena de texto.")
return false
} else {
alert("OK")
//cambiar la linea siguiente por return true para que ejecute la accion del formulario
return true;
}
}

	/*validacion para nombres*/

		if (nombre !="") {

			var caracteres = nombre.length;
			var expresion  = /^[a-zA-Z]\s+|\s+$/;

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

		alert("su Télefono debe tener  ok 9 digitos");

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

    			if(passM == passM2){
    			
    				return true;
    			}
    			else
    			{

    				alert("Las contraseñas no coinciden");

    				return false;
    			}
		/*validacion para el dni*/

				if (dni !="") {

			var caracteres = dni.length;

			if (caracteres > 8) {

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


		if (telefonoM !="") {

			var caracteres = telefonoM.length;

			if (caracteres > 9) {

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


		if (codigoP !="") {

			var caracteres = codigoP.length;

			if (caracteres > 10) {

		alert("El codigo debe tener 10 caracteres minimo");

					return false;
			}
		}

			/* fin validacion de codigo promotick*/

			/*validacion para la razon social*/

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

		if (direccionF !="") {

			var caracteres = direccionF.length;

			if (caracteres > 30) {

		alert("Su Direccion debe tener maximo 30 caracteres");

					return false;
			}

		}

		/* fin validacion direccion*/


		/*validacion para el dni*/

				if (dniF !="") {

			var caracteres = dniF.length;

			if (caracteres > 9) {

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


		if (telefonoF !="") {

			var caracteres = telefonoF.length;

			if (caracteres > 9) {

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

