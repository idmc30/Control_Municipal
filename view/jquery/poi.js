 //este es la funcion para los option
  var getUnidadesxanio = function(anio){

    var options = {
      type: 'POST',
      url:'index.php?page=poi&accion=ajaxGetUnidadesxanio',
      data: {
        'anio': anio,
      },
      dataType: 'html',
      success: function(response){
           
        $('#unidadespoi').html(response);
      }
    };
    $.ajax(options);

  };

 //----------------
var listarAdminPoi = function(){
    var Uniadespoe = {
      type: 'POST',
      url:'index.php?page=poi&accion=listarAdminPoi',
      dataType: 'html',
      success: function(response){
        $('#resultadotodospoe').html(response);
      }
    };
    $.ajax(Uniadespoe);
    //$('#resultadotodospoe').hide();
  };

//-------------
  var listarProceso = function(){

    var options = {
      type: 'POST',
      url:'index.php?page=poi&accion=ajaxProceso',
      dataType: 'html',
      success: function(response){
           
        $('#procesopoi').html(response);
      }
    };
    $.ajax(options);

  };



//------------

   
//en esta parte esta
$(document).on('click','.activarpoi', function () {
   var agregar = $(this).is(':checked');
   var idpoi = $(this).data('idpoi');
          if (agregar) {
             actualizarestadouno(idpoi);
          }else{
           actualizarestadocero(idpoi);
          }
   })
 

var actualizarestadocero= function(id){
      var Uniadespoe = {
      type: 'POST',
      url:'index.php?page=poi&accion=actualizarEstadoPlanesCero',
      data: {
        'id': id,
      },
      dataType: 'html',
      success: function(response){
        toastr.info("Se Deshabilitó POI"); 
      
      }
    };
    $.ajax(Uniadespoe);
     listarAdminPoi(); 
  };




var actualizarestadouno= function(id){
      var Uniadespoe = {
      type: 'POST',
      url:'index.php?page=poi&accion=actualizarEstadoPlanesUno',
      data: {
        'id': id,
      },
      dataType: 'html',
      success: function(response){
         toastr.info("Se Habilitó POI")
      }
    };
    $.ajax(Uniadespoe);
     listarAdminPoi();
  };
//esta funcion es para el otro select
 var getUnidadesPoixanio = function(anio){
    var Uniadespoe = {
      type: 'POST',
      url:'index.php?page=poi&accion=ajaxGetUnidadesPOI',
      data: {
        'anio': anio,
      },
      dataType: 'html',
      success: function(response){
        $('#resultadotodospoe').html(response);
      }
    };
    $.ajax(Uniadespoe);
    listarAdminPoi();
  };

 

var x;
 x=$(document);
 x.ready(inicio);

 function inicio(){
     $("#gpoi").css("display", "none"); 
     $("#listachekpoi").css("display", "none"); 
     var idpoi = $('#poi').val();
     getUnidadesxanio(idpoi);
     listarProceso();  
    $( "#procesopoi" ).prop( "disabled", true ); 
      
 }


  $("#ppoi").click(function(){
         $("#btnasignacion").css("display", "block");   
         $("#listaplann").css("display", "block"); 
         $("#gpoi").css("display", "none");
         $("#listachekpoi").css("display", "none");   
        
           listarpois();
   });

  $("#adminispoi").click(function(){
         $("#btnasignacion").css("display", "none");  
         $("#listaplann").css("display", "none");
         $("#gpoi").css("display", "block"); 
         $("#listachekpoi").css("display", "block"); 
         listarAdminPoi();
   });



    $( "#fechfinal" ).datepicker({
          inline: true
        });  
        $(function() {
            $( "#fechfinal" ).datepicker();
          });
 
      $( "#fechinicio" ).datepicker({
          inline: true
        });   
        $(function() {
            $( "#fechinicio" ).datepicker();
          });

$("#idperiodo").val( "Seleccionar ...");
//$("#poi").val( "Seleccionar ...");


/*
$("#btnguardar").click(function(){
           	 var id=$('select[name=idperiodo]').val();
              var fechainicio=$("#fechinicio").val();
              var fechafinal=$("#fechfinal").val(); 
              var documento=$("#doc").val();
               alert(id+" - "+fechainicio+" - "+fechafinal+" -  "+documento);
               $.post("index.php?page=poi&accion=listarInsertar",{id:id,finicio:fechainicio,ffinal:fechafinal,doc:documento
               },function (response){
                toastr.info("Se registro correctamente"); 
                listarpois();                
        });
               //esta funcio hace una transaccion
        prueba(id); 
   });*/
 $("#btnguardartiempo").click(function(){
         var id=$('select[name=idperiodo]').val();
              var fechainicio=$("#fechinicio").val();
              var fechafinal=$("#fechfinal").val(); 
              var documento=$("#doc").val();
               alert(id+" - "+fechainicio+" - "+fechafinal+" -  "+documento);
               $.post("index.php?page=poi&accion=listarInsertar",{id:id,finicio:fechainicio,ffinal:fechafinal,doc:documento
               },function (response){
                toastr.info("Se registro correctamente"); 
                listarpois();                
        });
               //esta funcio hace una transaccion
        prueba(id); 

 });

  function listarpois(){
     $.post("index.php?page=poi&accion=listarpoi",
      function (response){
                 $('#listaplann').html(response);                
        });
  }

/*option primero
$('#poi').on('change', function (){
  var idpoi = $('#poi').val();
  getUnidadesxanio(idpoi);
  

});*/
 //onchange----en el cambio
 $('#unidadespoi').on('change', function (){
   var valor = $('#unidadespoi').val();
   if (valor==1) {
     listarAdminPoi()
   };
   $("#procesopoi" ).prop( "disabled", false ); 
});

$('#procesopoi').on('change', function (){
   var valor = $('#procesopoi').val();
   if (valor==1) {
      alert("uno"); //aqui va la tabla
   };
   
});





 function limpiar(){
      $("#fechinicio").val("");
      $("#fechfinal").val("");
      $("#doc").val("");
      $("#idperiodo").val("");
      
 }




 $(function() {
        toastr.options.closeButton = true;
    });


