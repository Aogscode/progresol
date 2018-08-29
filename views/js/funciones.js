/***********************************************************************************/
//--------------------------FUNCIONES DE MAESTROS------------------------------------
/***********************************************************************************/
/*=============================================
CONSULTAR SI EXISTE EL MAESTRO POR DNI
=============================================*/

//Oculto el formulario de registro 
$("#registro-maestro").hide();

//Hago la consulta por el numero de DNI
$("#buscar-maestro").submit(function(event){
	event.preventDefault();
	//vuelvo a ocultar por precaucion
	$("#registro-maestro").hide();

	var dni = $("#dni").val().trim();
	var datos = new FormData();
	datos.append("dni",dni);
	//Hago llamada al ajax
	$.ajax({
		url:"views/modules/ajax.php",
		method:"POST",
		data: datos,
		cache:false,
		contentType: false,
		processData: false,
		success: function(respuesta){

			if(respuesta == 1){
				
				var msg = '<div class="alert alert-success" role="alert">Usuario YA se encuentra registrado</div>';
				$('#buscar-rspta').html(msg);
			}
			else{
				var msg = '<div class="alert alert-warning" role="alert">Usuario No se encuentra registrado</div>';
				$('#buscar-rspta').html(msg);	

				//Muestro formulario de registro
				$("#registro-maestro").show();
				//Copio valor de dni de busqueda
				$("#dniRegistro").val($("#dni").val());
			}
		},
		error: function(){
			alert("error en el servidor");
		}
	});
});

/*=============================================
CONSULTAR SI EXISTE USUARIO POR DNI
=============================================*/

//Oculto el formulario de registro 
$("#registra-usuario").hide();

//Hago la consulta por el numero de DNI
$("#busca-usuario").submit(function(event){
	event.preventDefault();
	//vuelvo a ocultar por precaucion
	$("#registra-usuario").hide();

	var dni = $("#dniUser").val().trim();
	var datos = new FormData();
	datos.append("dni",dni);
	//Hago llamada al ajax
	$.ajax({
		url:"views/modules/ajax.php",
		method:"POST",
		data: datos,
		cache:false,
		contentType: false,
		processData: false,
		success: function(respuesta){

			if(respuesta == 1){
				
				var msg = '<div class="alert alert-success" role="alert">Usuario YA se encuentra registrado</div>';
				$('#user-rspta').html(msg);
			}
			else{
				var msg = '<div class="alert alert-warning" role="alert">Usuario No se encuentra registrado</div>';
				$('#user-rspta').html(msg);	

				//Muestro formulario de registro
				$("#registra-usuario").show();
				//Copio valor de dni de busqueda
				$("#dniUsuario").val(dni);
			}
		},
		error: function(){
			alert("error en el servidor");
		}
	});
});

/*=============================================
BUSCAR MAESTRO POR DNI PARA AGREGAR PUNTOS
=============================================*/

$("#buscar-puntos").submit(function(event){

	event.preventDefault();


	var dni = $("#buscaDni").val().trim();
	var datos = new FormData();
	datos.append("buscaDni",dni);
	//Hago llamada al ajax
	$.ajax({
		url:"views/modules/ajax.php",
		method:"POST",
		data: datos,
		cache:false,
		contentType: false,
		processData: false,
		success: function(respuesta){
			if(respuesta.correcto){
				$('#ptos-rspta').empty();
				$("#ptosId").val(respuesta.codMaestro);
				$("#ptosDni").val(respuesta.dni);
				$("#ptosNombres").val(respuesta.nombres);
				$("#ptosApellidos").val(respuesta.apepat+" "+respuesta.apemat);
				$("#ptosValidos").val(respuesta.ptosVal);
				$("#ptosPendientes").val(respuesta.ptosPend);
				cargaProductos();
			}else{
				var msg = '<div class="alert alert-warning" role="alert">Maestro No se encuentra registrado</div>';
				$('#ptos-rspta').html(msg);	

			}
		},
		error: function(){
			alert("error en el servidor");
		}
	});
});

/*=============================================
			REGISTRAR MAESTRO 
=============================================*/
$("#registro-maestro").submit(function(event){

	event.preventDefault();

	//Obtengo variables del formulario
	var dni = $("#dniRegistro").val().trim();
	var nombre = $("#nombreMaestro").val().trim();
	var apepat = $("#apepatMaestro").val().trim();
	var apemat = $("#apematMaestro").val().trim();
	var direccion = $("#dirMaestro").val().trim();
	var telefono = $("#telfMaestro").val().trim();
	var email = $("#emailMaestro").val().trim();
	
	//Creo variable para cargar datos recibidos
	var datos = new FormData();
	
	//Agrego datos a la variable creada
	datos.append("dniMaestro",dni);
	datos.append("nombreMaestro",nombre);
	datos.append("apepatMaestro",apepat);
	datos.append("apematMaestro",apemat);
	datos.append("dirMaestro",direccion);
	datos.append("telfMaestro", telefono);
	datos.append("emailMaestro",email);

	//llamada de ajax
	$.ajax({
		url:"views/modules/ajax.php",
		method:"POST",
		data: datos,
		cache:false,
		contentType: false,
		processData: false,
		success:function(respuesta){
			if (respuesta.exito) {
				//Oculto le formulario de registro
				$("#registro-maestro").hide();

				//Creo mensaje de exito
				var msg = '<div class="alert alert-success" role="alert">Registro exitoso: '+dni+' '+
							nombre+' '+apepat+'</div>';
				//Muestro mensaje de exito
				$('#buscar-rspta').html(msg);

				//limpio datos de formularios
				$("#registro-maestro")[0].reset();
				$("#buscar-maestro")[0].reset();
			}else{
				var msg = '<div class="alert alert-danger" role="alert">Error: '+respuesta.msg+'</div>';
				$('#buscar-rspta').html(msg);
			}
		},
		error:function(){
			var msg = '<div class="alert alert-danger" role="alert">Se produjo un error</div>';
			$('#buscar-rspta').html(msg);
		}
	});
});

/*=============================================
			REGISTRAR USUARIOS 
=============================================*/
$("#registra-usuario").submit(function(event){

	event.preventDefault();

	//Obtengo variables del formulario
	var dni = $("#dniUsuario").val().trim();
	var nombre = $("#nombreUsuario").val().trim();
	var apepat = $("#apepatUsuario").val().trim();
	var apemat = $("#apematUsuario").val().trim();
	var telefono = $("#telfUsuario").val().trim();
	var email = $("#emailUsuario").val().trim();
	var perfil = $("#permisoUsuario").val().trim();
	
	//Creo variable para cargar datos recibidos
	var datos = new FormData();
	
	//Agrego datos a la variable creada
	datos.append("dniUsuario",dni);
	datos.append("nombreUsuario",nombre);
	datos.append("apepatUsuario",apepat);
	datos.append("apematUsuario",apemat);
	datos.append("telfUsuario", telefono);
	datos.append("emailUsuario",email);
	datos.append("permisoUsuario",perfil);

	//llamada de ajax
	$.ajax({
		url:"views/modules/ajax.php",
		method:"POST",
		data: datos,
		cache:false,
		contentType: false,
		processData: false,
		success:function(respuesta){

			if (respuesta.exito) {

				//Oculto le formulario de registro
				$("#registra-usuario").hide();

				//Creo mensaje de exito
				var msg = '<div class="alert alert-success" role="alert">Registro exitoso: '+dni+' '+
							nombre+' '+apepat+'</div>';
				//Muestro mensaje de exito
				$('#user-rspta').html(msg);

				//limpio datos de formularios
				$("#registra-usuario")[0].reset();
				$("#busca-usuario")[0].reset();
			}else{
				var msg = '<div class="alert alert-danger" role="alert">Error: '+respuesta.msg+'</div>';
				$('#user-rspta').html(msg);
			}
		},
		error:function(){
			var msg = '<div class="alert alert-danger" role="alert">Se produjo un error</div>';
			$('#user-rspta').html(msg);
		}
	});
});


/*=============================================
			REGISTRAR PUNTOS 
=============================================*/
$("#registrar-puntos").submit(function(event){
	
	event.preventDefault();
	
	//Obtengo variables del formulario
	var maestro = $("#ptosDni").val().trim();
	var idMaestro = $("#ptosId").val().trim();
	var cantidad = $("#unidproduct").val().trim();
	var idprod = $("#productos").val().trim();

	//Creo variable para cargar datos recibidos
	var datos = new FormData();

	//Agrego datos a la variable creada
	datos.append("idMaestro",idMaestro);
	datos.append("cantidad",cantidad);
	datos.append("idprod",idprod);

	//Pregunta para confirmar la transaccion en caso de error
	if (confirm("¿Esta seguro de agregar los "+ cantidad + " productos?")) {
		//llamada de ajax
		$.ajax({
			url:"views/modules/ajax.php",
			method:"POST",
			data: datos,
			cache:false,
			contentType: false,
			processData: false,
			success:function(respuesta){
				if (respuesta.exito) {

					$("#buscar-puntos")[0].reset();
					$("#registrar-puntos")[0].reset();

					//Creo mensaje de exito
					var msg = '<div class="alert alert-success" role="alert">Registro exitoso: '+ maestro +' - '+
							  cantidad+' unid.</div>';
					//Muestro mensaje de exito
					$('#ptos-rspta').html(msg);

				}else{
					//Creo mensaje de error
					var msg = '<div class="alert alert-danger" role="alert">Se produjo un error</div>';
					//Muestro mensaje de error
					$('#ptos-rspta').html(msg);
				}
			},
			error:function(){
				alert('Error en el servidor');
				//Creo mensaje de error
				var msg = '<div class="alert alert-success" role="alert">Se produjo un error</div>';
				//Muestro mensaje de error
				$('#ptos-rspta').html(msg);
			}
		});
	}else{
		return false;
	}
	
});

/***********************************************************************************/
//--------------------------FUNCIONES DE FERRETERIAS---------------------------------
/***********************************************************************************/
/*=============================================
CONSULTAR SI EXISTE EL CODIGO LUCKY
=============================================*/

//Oculto el formulario de registro a menos que no existe la ferreteria
$("#registro-ferreteria").hide();

//Hago la consulta por el codigo lucky
$("#consultar-ferreteria").submit(function(event){
	event.preventDefault();

	//vuelvo a ocultar por precaucion
	$("#registro-ferreteria").hide();

	//capturo los datos del formulario
	var codLucky = $("#codLucky").val().trim();

	//adjunto datos para enviar
	var datos = new FormData();
	datos.append("codLucky",codLucky);

	//conectar a la BBDD con ajax
	$.ajax({
		url:"views/modules/ajax.php",
		method:"POST",
		data: datos,
		cache:false,
		contentType: false,
		processData: false,
		success:function(respuesta){

			if(respuesta == 1){
			
				var msg = '<div class="alert alert-success" role="alert">Ferreteria YA se encuentra registrada</div>';
				$('#consulta-rspta').html(msg);
			}
			else{
				var msg = '<div class="alert alert-warning" role="alert">Ferreteria No se encuentra registrada</div>';
				$('#consulta-rspta').html(msg);	

				//Muestro formulario de registro
				$("#registro-ferreteria").show();
				//Copio valor de codigo Lucky
				$("#codLuckyFerreteria").val($("#codLucky").val());
				cargaZona();
			}
		},
		error: function(){
			alert("error en el servidor");
		}
	});

});

/*=============================================
	CARGAR COMBOBOX DE ZONAS
=============================================*/
function cargaZona(){

	var datos = new FormData();
	datos.append("lista","zonas");

	$.ajax({
		url:"views/modules/ajax.php",
		method:"POST",
		data: datos,
		cache:false,
		contentType: false,
		processData: false,
		success: function(respuesta){
			$("#zonaFerreteria").html(respuesta);
		},
		error: function(){
			alert("error en el servidor");
		}
	});
}

/*=============================================
	CARGAR COMBOBOX DE PRODUCTOS
=============================================*/
function cargaProductos(){

	var datos = new FormData();
	datos.append("lista","productos");

	$.ajax({
		url:"views/modules/ajax.php",
		method:"POST",
		data: datos,
		cache:false,
		contentType: false,
		processData: false,
		success: function(respuesta){
			$("#productos").html(respuesta);
		},
		error: function(){
			alert("error en el servidor");
		}
	});
}

/*=============================================
	FUNCIONES QUE SUMA Y RESTA UNIDADES
=============================================*/
$(".btnAdd").click(addUnidades);

function addUnidades(){
	var $boton = $(this);
	var inival = $("#unidproduct").val();

	if ($boton.text()=="+") {
		var newval = parseFloat(inival)+1;
	}else if($boton.text()=="-"){
		if (inival>=1) {
			var newval = parseFloat(inival)-1;
		}else{
			var newval = 0;
		}
	}

	$("#unidproduct").val(newval);
}
