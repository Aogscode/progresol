$("#btn_buscaPtos").on("click", function(event){


        document.getElementById("contenedor_table").style.display="block";
        var desde   = $("#ptosDesde").val().trim();
        var hasta   = $("#ptosHasta").val().trim();
        var zona    = $("#ptosZona").val().trim();
        var estado  = $("#ptosEstado").val().trim();

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
            "language": {
                    "lengthMenu": "Mostrar _MENU_ registros por pagina",
                    "zeroRecords": "Ningun valor encontrado",
                    "info": "Mostrando pagina _PAGE_ de _PAGES_",
                    "infoEmpty": "No se encontraron registros",
                    "search": "Buscar:",
                    "infoFiltered": "(filtrado de _MAX_ registros totales)",
                    "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior",
                    "processing": "Procesando"
                    }
                }, 

             // "ajax":"views/modules/buscador_puntos.php",
            //"ajax":"views/modules/buscador_puntos.php?search=yes&from=2018-07-07&to=2018-09-09&zone=0&state=1",
            "ajax":"views/modules/buscador_puntos.php?search="+is_date_search+"&from="+start_date+"&to="+end_date+"&zone="+selected_zone+"&state="+selected_state,
            "autoWidth": false
        });
    };

$(document).ready(function() {

    //fetch_data('no');
    /*
    $("#btn_buscaPtos").on("click", function(event){


        document.getElementById("contenedor_table").style.display="block";
        var desde   = $("#ptosDesde").val().trim();
        var hasta   = $("#ptosHasta").val().trim();
        var zona    = $("#ptosZona").val().trim();
        var estado  = $("#ptosEstado").val().trim();

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
            "language": {
                    "lengthMenu": "Mostrar _MENU_ registros por pagina",
                    "zeroRecords": "Ningun valor encontrado",
                    "info": "Mostrando pagina _PAGE_ de _PAGES_",
                    "infoEmpty": "No se encontraron registros",
                    "search": "Buscar:",
                    "infoFiltered": "(filtrado de _MAX_ registros totales)",
                    "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior",
                    "processing": "Procesando"
                    }
                }, 

             // "ajax":"views/modules/buscador_puntos.php",
            //"ajax":"views/modules/buscador_puntos.php?search=yes&from=2018-07-07&to=2018-09-09&zone=0&state=1",
            "ajax":"views/modules/buscador_puntos.php?search="+is_date_search+"&from="+start_date+"&to="+end_date+"&zone="+selected_zone+"&state="+selected_state,
            "autoWidth": false
        });
    };*/

}); 

    /*$('#historial_puntos').DataTable({
        
        "processing" : true,
        dom: 'lBfrtip',
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5'
                    //'pdfHtml5'
                ],
        "language": {
                "lengthMenu": "Mostrar _MENU_ registros por pagina",
                "zeroRecords": "Ningun valor encontrado",
                "info": "Mostrando pagina _PAGE_ de _PAGES_",
                "infoEmpty": "No se encontraron registros",
                "search": "Buscar:",
                "infoFiltered": "(filtrado de _MAX_ registros totales)",
                "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior",
                "processing": "Procesando"
                }
            },
            //"ajax":"views/modules/buscador_puntos.php",
            "ajax":"views/modules/buscador_puntos.php?search=yes&from=2018-07-07&to=2018-09-09&zone=0&state=1",
        "autoWidth": false
    });*/

  
    /*$('#historial_puntos').DataTable({
        "processing" : true,
        "serverSide" : true,*/
        /*"responsive": true,
        "language": {
                "lengthMenu": "Mostrar _MENU_ registros por pagina",
                "zeroRecords": "Ningun valor encontrado",
                "info": "Mostrando pagina _PAGE_ de _PAGES_",
                "infoEmpty": "No se encontraron registros",
                "search": "Buscar:",
                "infoFiltered": "(filtrado de _MAX_ registros totales)",
                "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior",
                "processing": "Procesando"
                }
            },*/
       /* "ajax":"views/modules/buscador_puntos.php",
        "columns": [
                    { "data": "fecha" },
                    { "data": "hora" },
                    { "data": "lucky" },
                    { "data": "ferreteria" },
                    { "data": "dni" },
                    { "data": "nombre" },
                    { "data": "puntos" },
                    { "data": "producto" },
                    { "data": "distrito" },
                    { "data": "zona" },
                    { "data": "estado" }
                ]
    });*/
   /* 
    $("#btn_buscaPtos").on("click", function(event){
        var desde   = $("#ptosDesde").val().trim();
        var hasta   = $("#ptosHasta").val().trim();
        var zona    = $("#ptosZona").val().trim();
        var estado  = $("#ptosEstado").val().trim();

        if (desde !='' && hasta!='') {
            $('#historial_puntos').DataTable().destroy();
            fetch_data('yes',desde, hasta, zona, estado);

            //alert(desde+" "+hasta+" "+zona+" "+estado);
        }else{
            alert("Debe ingresar ambas fechas");
        }
        alert("desde: "+desde+" hasta: "+hasta+" zona: "+zona+" estado: "+estado);
    });
*/
    // DataTable function
    /*function fetch_data(is_date_search, start_date, end_date, selected_zone,selected_state){
        var dataTable = $("#historial_puntos").DataTable({
            "processing" : true,
            "serverSide" : true,*/
            /*"language": {
                "lengthMenu": "Mostrar _MENU_ registros por pagina",
                "zeroRecords": "Ningun valor encontrado",
                "info": "Mostrando pagina _PAGE_ de _PAGES_",
                "infoEmpty": "No se encontraron registros",
                "search": "Buscar:",
                "infoFiltered": "(filtrado de _MAX_ registros totales)",
                "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior",
                "processing": "Procesando"
                }
            },
            "ajax":"views/modules/buscador_puntos.php"
                //"type":"POST"
                /*"data":function(d){
                    d.is_date_search = is_date_search; 
                    d.start_date = start_date;
                    d.end_date = end_date;
                    d.selected_zone = selected_zone;
                    d.selected_state = selected_state;*/
               // }
            /*"columns": [
                    { "data": "fecha" },
                    { "data": "hora" },
                    { "data": "lucky" },
                    { "data": "ferreteria" },
                    { "data": "dni" },
                    { "data": "nombre" },
                    { "data": "puntos" },
                    { "data": "producto" },
                    { "data": "distrito" },
                    { "data": "zona" },
                    { "data": "estado" }
                ]
        });
    }*/
//});