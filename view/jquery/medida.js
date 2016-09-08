
 $("#btnasignacion").click(function(){
         limpiar();
    
   });


function listar(){ 
   $.post("index.php?page=medida&accion=listarTabla",
    function (data){
            $( "#ltabla").html(data);
       });
}



   function eliminar(id){
   $.post("index.php?page=medida&accion=eliminar",
           {'id': id
          },
          function (data){
            toastr.info(data);
       }); 
       listar() 
   }


  $("#btnguardarmedida").click(function(){
       var  denominacion=$("#denominacion").val();  
       var  simbolo=$("#simbolo").val();
       var codmedida=$("#idmedida").val();
    $.post("index.php?page=medida&accion=insertar",
           {deno:denominacion,
            simb:simbolo,
            cod:codmedida
          },
          function (data){
            toastr.info(data);
       });

    limpiar();
    listar();
   $('#modalmedida').modal('hide');
   });

function actualizar(id){
        $.post("index.php?page=medida&accion=obtener",{id:id}, function (response){              
                $('#denominacion').val(response.deno);
                $('#simbolo').val(response.simb);
                $("#btnguardarmedida").attr("value", "Actualizar"); 
                $('#idmedida').val(id);   
                $('#modalmedida').modal('show') ; 
                });
   limpiar();
}



function  limpiar(){
    $("#denominacion").val("");
    $("#simbolo").val("");
      $("#idmedida").val("");

}

