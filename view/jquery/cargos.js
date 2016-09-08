

$(document).ready(function(){


asignarInput();
    $("#mostrarcargos").css("display", "none");
    $("#idestructura").val( "Seleccionar ...");



    }); 

function actualizarCargo(id){
   $.post("index.php?page=cargos&accion=obtenerCargos",{id:id},function (response){
                   $('#nomuorganica').val(response.nombre);  
                   $('#cod').val(response.codigo);    
                   $('#titulo').val(response.titulo);  
                   $('#txtareadescrip').val(response.descrip); 
                   $('#iddeCargo').val(response.identificador); 
                   $('#btnguardarcargos').text("Actualizar"); 
                   $('#modalcargo').modal('show') ;
              });
}


 function eliminarCargo(id){
    var codigo=$('select[name=idestructura]').val();
     $.post("index.php?page=cargos&accion=eliminar",{id:id},function (response){
                     //$("#lrespuesta").html(response); 
                     // $("#mostrarcargos").css("display", "block");  
                     //alert(response);
                     toastr.info(response);
                     //alert(codigo);
                     listarCargosxArea(codigo);
          });

}

$("select[name=idestructura]").change(function(){
            var id=$('select[name=idestructura]').val();
              if (id) {
                       $("#mostrarcargos").css("display", "block");
                       listarCargosxArea(id);
                     };
          });


  function asignarInput(){

                $("#ncargo").click(function(){
              var id=$('select[name=idestructura]').val();
                $.post("index.php?page=estructura&accion=listarget",{id:id},function (response){
                   $('#nomuorganica').val(response.nombre);
                    $('#btnguardarcargos').text("Guardar");                   
               });
   });

  }

$("#btnguardarcargos").click(function(){
              var id=$('select[name=idestructura]').val();
              var iddeCargo=$("#iddeCargo").val();
              var codigo=$("#cod").val();
              var titulo=$("#titulo").val();
              var descripcion=$("#txtareadescrip").val();
               $.post("index.php?page=cargos&accion=guardar",{id:id,cod:codigo,
                   titul:titulo,descrip:descripcion,idcargo:iddeCargo},function (response){
                   toastr.info(response);
                   listarCargosxArea(id);                
        });
     
        limpiar();      
   });


  
 
  function listarCargosxArea(id){
       $.post("index.php?page=cargos&accion=listabuttonTabla",{id:id},function (response){
                     $("#lrespuesta").html(response); 
                     // $("#mostrarcargos").css("display", "block");  
          });
     }

function limpiar() {
                $("#cod").val("");
                $("#titulo").val("");
                $("#txtareadescrip").val("");      
            }


$(function() {
        toastr.options.closeButton = true;
    });



