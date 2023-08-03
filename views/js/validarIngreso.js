/*=============================================
VALIDAR INGRESO DE USUARIO AJAX
=============================================*/

$("#login").submit(function(event){
	event.preventDefault();
	//capturo los datos del formulario
	var usuario = $("#userLogin").val();
	var clave = $("#passLogin").val();
	//adjunto datos para enviar
	var datos = new FormData();
	datos.append("validarUsuario",usuario);
	datos.append("validarClave", clave);
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
			
				var msg = '<div class="alert alert-success" role="alert">Ingreso correcto</div>';
				$('#rspta').html(msg);

				//Login exitoso, redirecciono
				setTimeout ("redireccionar()", 5);
			}
			else{
				var msg = '<div class="alert alert-danger" role="alert">'+ respuesta +'</div>';
				$('#rspta').html(msg);	
			}
			
		}

	});
	//fin de sentencia AJAX
});

function redireccionar(){
	  window.location="index.php";
	  //location.reload(true);
	}




