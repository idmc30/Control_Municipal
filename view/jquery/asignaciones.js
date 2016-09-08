  var getxdni = function(dni){

    var options = {
      type: 'POST',
      url:'index.php?page=asignaciones&accion=ajaxGetAsignacionxDni',
      data: {
        'dni': dni,
      },
      dataType: 'json',
      success: function(response){
        console.log(response);

        $('#nomservidor').val(response.capturado);
        $('#idservidor').val(response.idservidor);
        
      }
    };
    $.ajax(options);

  };



  $('#servidor').on('keyup', function(e){
    e.preventDefault();
    var dni = $('#servidor').val();
    var tamaño = $('#servidor').val().length;
    if (tamaño == 8) {
    getxdni(dni);
    };
  });


 $("#mostrarasignaciones").css("display", "none");

  $("select[name=idestructura]").change(function(){
                 var id=$('select[name=idestructura]').val();
                  $( "#servidor" ).prop( "disabled", false );                

                  if (id) {
                  	$("#mostrarasignaciones").css("display", "block"); 
                    
                      listarAsignaciones(id);
                      listardelCombo(id);
                  };

        });


$("#btnGuardarAsig").click(function(){
       var id=$('select[name=idestructura]').val();
       alert(id);
     nuevasAsignaciones();
     limpiar();
     listardelCombo(id);
}); 


   function eliminarAsignacion(id){
    var idestructurav=$('select[name=idestructura]').val();
           eliminarA(id);
           listardelCombo(idestructurav);


   }

   function eliminarA(cod){
    var idestructurav=$('select[name=idestructura]').val();
     $.post("index.php?page=asignaciones&accion=eliminarAsignacion",{id:cod},function (response){
                    toastr.info(response);  
                    listardelCombo(idestructurav);

                   });
    }



    function listardelCombo(id){
          $.post("index.php?page=asignaciones&accion=listarcargos",{id:id},function (response){
                     $("#lasignaciones").html(response);

                   });

    }


    function listarAsignaciones(id){
      $.post("index.php?page=asignaciones&accion=listarcargosValue",{id:id},function (response){
                     $("#cargosvalue").html(response);   
        });


    }


   function actualizarAsignacion(id){
    $.post("index.php?page=asignaciones&accion=ajaxGetAsignacionxCodigo",{idasig:id},function (response){
                $("#idcargo").val(response.idcargo);
                $("#servidor").val(response.dni);
                $("#nomservidor").val(response.nombres+","+response.appaterno+" "+response.apmaterno);
                $("#idservidor").val(response.idservidor);  
                $("#clasificacion").val(response.clasifiacion);
                $("#situacion").val(response.situacion);  
               // $("#situacion").val(response.situacion);
                $("#txtobservacion").val(response.observacion); 
                $("#idasignacion").val("hola");
                $( "#servidor" ).prop( "disabled", true );                
                $('#modalasignacion').modal('show'); 
                   });
  }






   var nuevasAsignaciones = function(){
      var id=$('select[name=idestructura]').val();//ESTA ES PARA RECARGAR EL DIV

     var idcargo=$('select[name=idcargo]').val();
     var idservidor=$('#idservidor').val();
     var idclasificacion=$('select[name=clasificacion]').val(); 
     var situacion=$('select[name=situacion]').val(); 
     var observacion=$('#txtobservacion').val(); 
     var idasignacion=$('#idasignacion').val();
    var guardar = {
      type: 'POST',
      url:'index.php?page=asignaciones&accion=guardarAsignaciones',
      data: {
         'idestruc': idcargo,
         'idperso': idservidor,
         'idclasifi': idclasificacion,
         'situa': situacion, 
         'observ': observacion,
         'idasig': idasignacion
      },
      dataType: 'html',
      success: function(response){
          toastr.info(response);
            
          listardelCombo(id);
      }
    };
    $.ajax(guardar);
$('#modalasignacion').modal('hide');
  };


 function limpiar() {
                $("#idestructurar").val("");
                $("#servidor").val("");
                $("#nomservidor").val("");
                $("#clasificacion").val("");
                $("#fuerza").val("");
                $("#txtobservacion").val("");  
                $("#idservidor").val("");
                $("#situacion").val("");
                $("#idasignacion").val("");                       
            }

  
$("#btnasignacion").click(function(){
     limpiar();
}); 


$("#idestructura").val(""); 




  var listarunidad = function(id){

    var listar = {
      type: 'POST',
      url:'index.php?page=asignaciones&accion=listarcargos',
      data: {
        'id': id,
      },
      dataType: 'json',
      success: function(response){
        //console.log(response);
        $("#lasignaciones").html(response);
        
      }
    };
    $.ajax(listar);

  };


   $(function() {
        toastr.options.closeButton = true;
    });