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
				
				var msg = '<div class="alert alert-success" role="alert">Maestro YA se encuentra registrado</div>';
				$('#buscar-rspta').html(msg);
			}
			else{
				var msg = '<div class="alert alert-warning" role="alert">Maestro No se encuentra registrado</div>';
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
				$("#ptosId").val(respuesta.codMaestro);
				$("#ptosDni").val(respuesta.dni);
				$("#ptosNombres").val(respuesta.nombres);
				$("#ptosApellidos").val(respuesta.apepat+" "+respuesta.apemat);
				$("#ptosValidos").val(respuesta.ptosVal);
				$("#ptosPendientes").val(respuesta.ptosPend);
				cargaProductos();
			}else{
				var msg = '<div class="alert alert-warning" role="alert">Maestro No se encuentra registrado</div>';
				$('#buscar-rspta').html(msg);	

			}
		},
		error: function(){
			alert("error en el servidor");
		}
	});
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
