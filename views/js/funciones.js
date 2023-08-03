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
				alert('devolvio datos');
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
	CONSULTAR MAESTRO POR DNI 
=============================================*/
//Hago la consulta por el numero de DNI
$("#consulta-maestro").submit(function(event){
	event.preventDefault();
	
	var dni = $("#ConsultaDni").val().trim();
	var datos = new FormData();
	alert('dentro del metodo: ' + dni);
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
				alert('devolvio datos: '+ respuesta);
				//$("#ptosId").val(respuesta.codMaestro);
				//$("#cNombres").val('willito');
			}
			else{
				alert('Error');
				var msg = '<div class="alert alert-warning" role="alert">Usuario No se encuentra registrado</div>';
				$('#buscar-rspta').html(msg);	

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
	CARGAR COMBOBOX DE DEPARTAMENTOS
=============================================*/
$('document').ready(cargaDepartamentos());
function cargaDepartamentos(){
	var datos = new FormData();
	datos.append("lista","departamentos");

	$.ajax({
		url:"views/modules/ajax.php",
		method:"POST",
		data: datos,
		cache:false,
		contentType: false,
		processData: false,
		success: function(respuesta){
			$("#departamentos").html(respuesta);
		},
		error: function(){
			alert("error en el servidor");
		}
	});
};


/*=============================================
	CARGAR COMBOBOX DE ZONAS
=============================================*/
//$("#ptosZona").click(cargaZona());
$('document').ready(cargaZona());

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
			$("#ptosZona").html(respuesta);
		},
		error: function(){
			alert("error en el servidor");
		}
	});
};

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
};

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
};

/***********************************************************************************/
//----------------------------FUNCIONES DE REPORTES---------------------------------
/***********************************************************************************/

/*=============================================
	REPORTE DE VALIDACION DE PUNTOS
=============================================*/
$("#btn_validaPuntos").on("click", function(event){

    document.getElementById("contenedor_table_valida").style.display="block";
    var desde   = $("#validaDesde").val().trim();
    var hasta   = $("#validaHasta").val().trim();
    var zona    = $("#ptosZona").val().trim();
    var estado  = $("#maestroEstado").val().trim();

    //alert("desde: "+desde+" hasta: "+hasta+" zona: "+zona+" estado: "+estado);
   
    if (desde > hasta) {
        alert("rango de fechas incorrecto, por favor verifique");
    }else{
    	$('#validador_puntos').DataTable().destroy();
    	fetch_valida("v",desde, hasta, zona, estado);
        //alert("Debe ingresar ambas fechas");
    }

});

function fetch_valida(flag, start_date='', end_date='', selected_zone='',selected_state=''){
    var dataTable = $('#validador_puntos').DataTable({
        
        "processing" : true,
        dom: 'lBfrtip',
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5'
                ],
        "language": {
                "lengthMenu": 	"Mostrar _MENU_ registros por pagina",
                "zeroRecords": 	"Ningun valor encontrado",
                "info":  		"Mostrando _START_ de _END_ de _TOTAL_ entradas",
                "infoEmpty": 	"No se encontraron registros",
                "search": 		"Buscar:",
                "infoFiltered": "(filtrado de _MAX_ registros totales)",
                "processing": 	"Procesando...",
                "paginate": {
                				"first": "Primero",
                				"last": "Ultimo",
                				"next": "Siguiente",
                				"previous": "Anterior",
                }
            },

         // "ajax":"views/modules/buscador_puntos.php",
        //"ajax":"views/modules/buscador_puntos.php?from=2018-10-01&to=2018-10-31&zone=0&state=1",
        "ajax":"views/modules/buscador.php?flag="+flag+"&from="+start_date+"&to="+end_date+"&zone="+selected_zone+"&state="+selected_state,
        "autoWidth": false
    });
};

//Funcion que valida
function valida_punto(id, estado){
	var datos = new FormData();
	datos.append("id",id);
	datos.append("estado",estado);

	$.ajax({
		url:"views/modules/buscador.php",
		method:"POST",
		data: datos,
		cache:false,
		contentType: false,
		processData: false,
		success: function(respuesta){
			if (estado = 0) {
				$('a[data-id='+id+'a]').css('display','none');
			}else{
				$('a[data-id='+id+'r]').css('display','none');
			}
			//$('a[data-id='+id+']').css('display','none')
		},
		error: function(){
			alert("error en el servidor");
		}
	});
}

// Aprobacion o rechazo de puntos
$('#validador_puntos').on( "click" , '.botonvalidar', function(){

	var validar = $(this).data('validar');
	var id = $(this).data('id');

	if(validar){
		var text = 'confirmar';
	}else{
		var text = 'cancelar';
	}		

	//event.preventDefault();

	if (confirm("¿Esta seguro de " + text + " los puntos con ID : "+id+"?") == true){
		//alert("Punto confirmado");
		valida_punto(id, validar);
	}else{
		return false;
	}
				
});

/*=============================================
	REPORTE DE UNIVERSO DE MAESTROS
=============================================*/
$("#btn_reporteMaestros").on("click", function(event){

    document.getElementById("contenedor_table_maestros").style.display="block";
    var desde   = $("#maestroDesde").val().trim();
    var hasta   = $("#maestroHasta").val().trim();
    var zona    = $("#ptosZona").val().trim();
    var estado  = $("#maestroEstado").val().trim();

    //alert("desde: "+desde+" hasta: "+hasta+" zona: "+zona+" estado: "+estado);
   
    if (desde > hasta) {
        alert("rango de fechas incorrecto, por favor verifique");
    }else{
    	$('#reporte_maestros').DataTable().destroy();
    	fetch_maestros("m",desde, hasta, zona, estado);
        //alert("Debe ingresar ambas fechas");
    }

});

function fetch_maestros(flag, start_date='', end_date='', selected_zone='',selected_state=''){
    var dataTable = $('#reporte_maestros').DataTable({
        
        "processing" : true,
        dom: 'lBfrtip',
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5'
                ],
        "language": {
                "lengthMenu": 	"Mostrar _MENU_ registros por pagina",
                "zeroRecords": 	"Ningun valor encontrado",
                "info":  		"Mostrando _START_ de _END_ de _TOTAL_ entradas",
                "infoEmpty": 	"No se encontraron registros",
                "search": 		"Buscar:",
                "infoFiltered": "(filtrado de _MAX_ registros totales)",
                "processing": 	"Procesando...",
                "paginate": {
                				"first": "Primero",
                				"last": "Ultimo",
                				"next": "Siguiente",
                				"previous": "Anterior",
                }
            },

         // "ajax":"views/modules/buscador_puntos.php",
        //"ajax":"views/modules/buscador_puntos.php?from=2018-10-01&to=2018-10-31&zone=0&state=1",
        "ajax":"views/modules/buscador.php?flag="+flag+"&from="+start_date+"&to="+end_date+"&zone="+selected_zone+"&state="+selected_state,
        "autoWidth": false
    });
};

/*=============================================
	REPORTE DE FERRETERIAS DEL PROGRAMA
=============================================*/
$("#btn_reporteFerr").on("click", function(event){

    document.getElementById("contenedor_table_ferr").style.display="block";
    var desde   = $("#ferrDesde").val().trim();
    var hasta   = $("#ferrHasta").val().trim();
    var zona    = $("#ptosZona").val().trim();
    var estado  = $("#ferrEstado").val().trim();

    //alert("desde: "+desde+" hasta: "+hasta+" zona: "+zona+" estado: "+estado);
   
    if (desde > hasta) {
        alert("rango de fechas incorrecto, por favor verifique");
    }else{
    	$('#reporte_Ferreteria').DataTable().destroy();
    	fetch_ferreterias("f",desde, hasta, zona, estado);
        //alert("Debe ingresar ambas fechas");
    }


});

function fetch_ferreterias(flag, start_date='', end_date='', selected_zone='',selected_state=''){
    var dataTable = $('#reporte_Ferreteria').DataTable({
        
        "processing" : true,
        dom: 'lBfrtip',
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5'
                ],
        "language": {
                "lengthMenu": 	"Mostrar _MENU_ registros por pagina",
                "zeroRecords": 	"Ningun valor encontrado",
                "info":  		"Mostrando _START_ de _END_ de _TOTAL_ entradas",
                "infoEmpty": 	"No se encontraron registros",
                "search": 		"Buscar:",
                "infoFiltered": "(filtrado de _MAX_ registros totales)",
                "processing": 	"Procesando...",
                "paginate": {
                				"first": "Primero",
                				"last": "Ultimo",
                				"next": "Siguiente",
                				"previous": "Anterior",
                }
            },

         // "ajax":"views/modules/buscador_puntos.php",
        //"ajax":"views/modules/buscador_puntos.php?from=2018-10-01&to=2018-10-31&zone=0&state=1",
        //"ajax":"views/modules/buscador_maestros.php?&from="+start_date+"&to="+end_date+"&zone="+selected_zone+"&state="+selected_state,
        "ajax":"views/modules/buscador.php?flag="+flag+"&from="+start_date+"&to="+end_date+"&zone="+selected_zone+"&state="+selected_state,
        "autoWidth": false
    });
};


/*=============================================
	REPORTE DE HISTORIAL DE PUNTOS
=============================================*/

$("#btn_buscaPtos").on("click", function(event){

    document.getElementById("contenedor_table").style.display="block";
    var desde   = $("#ptosDesde").val().trim();
    var hasta   = $("#ptosHasta").val().trim();
    var zona    = $("#ptosZona").val().trim();
    var estado  = $("#ptosEstado").val().trim();

    //alert("desde: "+desde+" hasta: "+hasta+" zona: "+zona+" estado: "+estado);
    
    if (desde !='' && hasta!='') {
        $('#historial_puntos').DataTable().destroy();
        fetch_data("yes",desde, hasta, zona, estado);
    }else{
        alert("Debe ingresar ambas fechas");
    }
    //alert("desde: "+desde+" hasta: "+hasta+" zona: "+zona+" estado: "+estado);
});

function fetch_data(is_date_search, start_date='', end_date='', selected_zone='',selected_state=''){
    var dataTable = $('#historial_puntos').DataTable({
        
        "processing" : true,
        dom: 'lBfrtip',
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5'
                    //'pdfHtml5'
                ],
        /*"language": {
        		"decimal":        "",
			    "emptyTable":     "No hay datos que mostrar",
			    "info":           "Mostrando _START_ de _END_ de _TOTAL_ entradas",
			    "infoEmpty":      "Showing 0 to 0 of 0 entries",
			    "infoFiltered":   "(filtered from _MAX_ total entries)",
			    "infoPostFix":    "",
			    "thousands":      ",",
			    "lengthMenu":     "Show _MENU_ entries",
			    "loadingRecords": "Loading...",
			    "processing":     "Processing...",
			    "search":         "Search:",
			    "zeroRecords":    "No matching records found",
			    "paginate": {
			        "first":      "First",
			        "last":       "Last",
			        "next":       "Next",
			        "previous":   "Previous"
			    },
            },*/
        "language": {
                "lengthMenu": 	"Mostrar _MENU_ registros por pagina",
                "zeroRecords": 	"Ningun valor encontrado",
                "info":  		"Mostrando _START_ de _END_ de _TOTAL_ entradas",
                "infoEmpty": 	"No se encontraron registros",
                "search": 		"Buscar:",
                "infoFiltered": "(filtrado de _MAX_ registros totales)",
                "processing": 	"Procesando...",
                "paginate": {
                				"first": "Primero",
                				"last": "Ultimo",
                				"next": "Siguiente",
                				"previous": "Anterior",
                }
            },

         // "ajax":"views/modules/buscador_puntos.php",
        //"ajax":"views/modules/buscador_puntos.php?search=yes&from=2018-07-07&to=2018-09-09&zone=0&state=1",
        "ajax":"views/modules/buscador_puntos.php?search="+is_date_search+"&from="+start_date+"&to="+end_date+"&zone="+selected_zone+"&state="+selected_state,
        "autoWidth": false
    });
};
