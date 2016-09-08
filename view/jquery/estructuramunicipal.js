// $('#modalmedida').modal('hide'); -> codigo para cerrar los modal
var pgestionar = function(){
    var gestionar = {
      type: 'POST',
      url:'index.php?page=estructura&accion=gestionar',
      dataType: 'html',
      success: function(response){
        $("#lestructura").html(response);
      }
    };
    $.ajax(gestionar);
   
  };

function  guardarOtrosNiveles(){
       var nivel=$("#nivelesinferiores").val();
       var  nombre=$("#nominferior").val();  
       var  iniciales=$("#siglainferior").val();
       var  idpadre=$("#codigopadreinferior").val();
       var descripcion=$("#txtareadescripinferior").val();
       var codigogerencia=$("#codgerenciasrn").val();
        $.post("index.php?page=estructura&accion=insertarPadre",{
        idpadre: idpadre,
        nom: nombre,
        sigla: iniciales,
        descrip: descripcion,
        niveles:nivel,
        codgerencia:codigogerencia
  
        },function (data){
          pgestionar();
          toastr.info(data);
              
       });
   limpiarprincipal();
   
   $('#modalrestoniveles').modal('hide');

 }

function guardarnivelesecundarios(){
  var nivel=$("#nivelesn3").val();
  var nombre=$("#txtnomntres").val();
  var iniciales=$("#txtsiglantres").val();
  var descripcion=$("#txtareades").val();
  var codpadre=$("#codigopadrentres").val();
  var codigogerencia=$("#codgerenciasntres").val();
  $.post("index.php?page=estructura&accion=insertarPadre",{
       idpadre: codpadre,
        nom: nombre,
        sigla: iniciales,
        descrip: descripcion,
        niveles:nivel,
        codgerencia:codigogerencia
        },function (data){
          pgestionar();
          toastr.info(data);
              
       });
limpiarprincipal();
} 



  function guardarncuatro(){
      var nivel=$("#nivelesn4").val();
      var nombre=$("#txtnomn4").val();
      var siglas=$("#txtsiglan4").val();
      var descrip=$("#txtareadesn4").val();
      var codigopncuatro=$("#codigopadren4").val();
    $.post("index.php?page=estructura&accion=insertarPadre",{
        idpadre: codigopncuatro,
        nom: nombre,
        sigla: siglas,
        descrip: descrip,
        niveles:nivel
  
        },function (data){
           pgestionar();
            toastr.info(data);
              
       });
    
     limpiarprincipal();
    }

function eliminarNivel(id){    
             $.post("index.php?page=estructura&accion=eliminar",{id:id},function (datosObtenidos){
                  pgestionar();
                     if (!datosObtenidos) {
                       toastr.info("Se eliminó Correctamente");
                     }else{ 
                         toastr.info(datosObtenidos);
                     }                          
                });
         
       
}


$("#btnguardargerencias").click(function(){
       var nivel=$("#nivelessuperiores").val();
       var  nombre=$("#nom").val();  
       var  iniciales=$("#sigla").val();
       var descripcion=$("#txtareadescrip").val();
       var codigogerencia=$("#codgerenciasge").val();
    $.post("index.php?page=estructura&accion=insertarGerencias",
      {nom:nombre,
       sigla:iniciales,
       descrip:descripcion,
       niveles:nivel,
       codigogere:codigogerencia
     },
       function (data){
            toastr.info(data);
       });
     pgestionar();
     limpiarprincipal();
    $('#modalgerencias').modal('hide');
}); 





 function  actualizarNivel(id){
    
  $("#btnguardargerencias").text("Actualizar");
  $("#btnguarn3").text("Actualizar");
      $.post("index.php?page=estructura&accion=listarget",{id:id},function (response){
                     var nivel=response.nivel;
                  //   alert(nivel);
                     if (nivel>3 && nivel<=5) {
                          $('#nivelesn3').val(response.nivel);  
                          $('#nivelesn3').attr('disabled','disabled');
                          $('#txtnomntres').val(response.nombre); 
                          $('#txtsiglantres').val(response.sigla);  
                          $('#txtareades').val(response.descrip); 
                          $('#codgerenciasntres').val(id);  
                          $('#modaln3').modal('show');                            
                     }else if(nivel==3){
                          $('#nivelesinferiores').val(response.nivel);  
                          $('#nivelesinferiores').attr('disabled','disabled');
                          $('#nominferior').val(response.nombre);  
                          $('#siglainferior').val(response.sigla);  
                          $('#txtareadescripinferior').val(response.descrip);  
                          $('#codgerenciasrn').val(id);  
                          $('#modalrestoniveles').modal('show');  
                     }else{
                       $('#nivelessuperiores').val(response.nivel);
                       $('#nivelessuperiores').attr('disabled','disabled');
                       $('#nom').val(response.nombre);
                       $('#sigla').val(response.sigla);
                       $('#txtareadescrip').val(response.descrip);
                       $('#codgerenciasge').val(id); 
                       $('#modalgerencias').modal('show');  
                     }
              });


 }



$("#gestionar").click(function(){
  //queda pendiente lo de los estados de los botones
        pgestionar();
        //estadoBotones();   
       

}); 


 $(function() {
        toastr.options.closeButton = true;
    });



function limpiarprincipal(){
       $("#nivelessuperiores").val("");
       $("#nivelessuperiores").val("Seleccionar");
       $("#nom").val(""); 
       $("#sigla").val("");
       $("#txtareadescrip").val("");
       $("#nomunidad").val("");
       $("#siglaunidad").val("");
       $("#descripunidad").val("");

       $("#nivelesinferiores").val("");
       $("#nominferior").val("");
       $("#siglainferior").val("");
       $("#txtareadescripinferior").val("");

       $("#txtnomntres").val("");
       $("#nivelesn3").val("");
       $("#txtsiglantres").val("");
       $("#txtareades").val("");

       $("#nivelesn4").val("");
       $("#txtnomn4").val("");
       $("#txtsiglan4").val("");
       $("#txtareadesn4").val("");

       $("#codgerenciasge").val("");
       
}

//en esta parte se hiso para activar los value
function activar(){
   $('#nivelesn3').attr('disabled',false);
   $('#nivelesinferiores').attr('disabled',false);
   $('#nivelessuperiores').attr('disabled',false);
 }
 
function agregar(id){
   alert(id);
  
   $("#codigopadreinferior").val(id);
   $("#codigopadrentres").val(id);
  
   
   $("#codigopadren4").val(id);
   //$("#codgerenciasrn").val(id);
   //$("#codgerenciasge").val("b");
   //$("#codgerenciasntres").val(id);
   
//codgerenciasntres
}

function prueba(){
activar();
 limpiarprincipal();
  
}



