$(function() {
        toastr.options.closeButton = true;
    });

$(document).ready(function(){
  var lpoi=$("#poithis").val().split('|'); 
  var idp = lpoi[1];

  ajaxlistmetas(idp);
  estadoBotones();

});



    function estadoBotones(){
          var idgeplan = $('#poithis').val().split('|');
          var idplan = idgeplan[1];
      
       $.post("index.php?page=mipoi&accion=estadobotonesPoi",
            {
              'codplan': idplan,
            },
          function (response){

             if (response.activo==1) {
                 if (response.elaborando==0) {
                                $( "#btnmmetas" ).prop( "disabled", false );     
                                $( "#confirmarmetas" ).prop( "disabled", false);     
                                $( "#imprimirmetas" ).prop( "disabled", true );
                                //$( "#editarmetas" ).prop( "disabled", false );  
                       
                 }else if (response.elaborando==2 || response.elaborando==3) {
                                $( "#btnmmetas" ).prop( "disabled", true );     
                                $( "#confirmarmetas" ).prop( "disabled", true );     
                                $( "#imprimirmetas" ).prop( "disabled", false );
                                $( "#editarmetas" ).prop( "disabled", true );  

                }else{
                                $( "#btnmmetas" ).prop( "disabled", false );     
                                $( "#confirmarmetas" ).prop( "disabled",false);     
                                $( "#imprimirmetas" ).prop( "disabled", true );
                }

              



             }else if(response.activo==0){
                      $( "#btnmmetas" ).prop( "disabled", true );     
                      $( "#confirmarmetas" ).prop( "disabled", true );     
                      $( "#imprimirmetas" ).prop( "disabled", true );  
                      $( "#editarmetas" ).prop( "disabled", true );                
             }; 
       }); 


    }     



  function listarmetas(){
           /* var idgerencia=$("#poithis").val();              
           $.post("index.php?page=metasmipoi&accion=listarmetas",{gerencia:idgerencia},function (datosObtenidos){
                  $('#listametaspoI').html(datosObtenidos);         
                });*/
 var lpoi=$("#poithis").val().split('|'); 
  var idp = lpoi[1];
  ajaxlistmetas(idp);
           
  }
//actualiza el estado del plan en administrar poi
 function actualizaEstadoAdminPoi(){
     var idgeplan = $('#poithis').val().split('|');
     var idplan = idgeplan[1];
  
    $.post("index.php?page=metasmipoi&accion=actualizarEstadodePlan",{codplan:idplan},function (datosObtenidos){
                 toastr.info("Se ha confirmado su Plan");    
                  estadoBotones();  
                  listarmetas(); 
                });            
   
 }



//actualizo el estado mis planes
 $(document).on('click','#confirmarmetas', function () {

   bootbox.confirm("Desea Confirmar sus metas", function(result) {
 
  if (result) {
     //alert("si estoy confirmando");
    actualizaEstadoAdminPoi(); 
  };

});

      
   })


var ajaxinsertmeta = function(idplan, idobjetivo, descipmeta, medida, cant1, cant2, cant3, cant4){

  var options = {
    type: 'POST',
    url:'index.php?page=mipoi&accion=ajaxinsertmeta',
    data: {
      'idplan': idplan,
      'idobjetivo': idobjetivo,
      'descipmeta': descipmeta,        
      'medida': medida,         
      'cant1': cant1,         
      'cant2': cant2,         
      'cant3': cant3,         
      'cant4': cant4,         
    },
    dataType: 'json',
    success: function(response){

      if (response.inserted) {
  bootbox.alert("Meta Registrada");
  $('#modalpoe').hide();
  listarmetas();
  };
    }
  };
  $.ajax(options);

};
  



var ajaxlistmetas = function(idp){

  var options = {
    type: 'POST',
    url:'index.php?page=mipoi&accion=ajaxgetmetas',
    data: {
     'idp': idp

  },
   dataType: 'html',
   success: function(response){
      $('#listametaspoI').html(response);
    }
  };
  $.ajax(options);

};


$(document).on('click', '#btnguardarmeta', function(event) {
	event.preventDefault();
	/* Act on the event */
	var idgeplan = $('#poithis').val().split('|');
	var idplan = idgeplan[1];
	var idobjetivo = $('#idobjetivo').val();
	var descipmeta = $('#descipmeta').val();
	var medida = $('#medida').val();
	var cant1 = $('#cant1').val();
	var cant2 = $('#cant2').val();
	var cant3 = $('#cant3').val();
	var cant4 = $('#cant4').val();

bootbox.confirm("Desea Registrar esta meta?", function(result) {
  //Example.show("Confirm result: "+result);
  if (result) {
  	//lert(idplan+'|'+idobjetivo+'|'+descipmeta+'|'+medida+'|'+cant1+'|'+cant2+'|'+cant3+'|'+cant4);
  	ajaxinsertmeta(idplan, idobjetivo, descipmeta, medida, cant1, cant2, cant3, cant4);
  };

}); 

	
});



/*$(document).on('change', '#poithis', function() {
  var lpoi=$("#poithis").val().split('|'); 
  var idp = lpoi[1];

  ajaxlistmetas(idp);
  estadoBotones();
});*/