 function tiempo(){

              $.datepicker.setDefaults($.datepicker.regional["es"]);
              $("#fech").datepicker({
              firstDay: 1
              });


          function insertar(){
              var docaprobacion=$("#doc").val();
              var fechadocumento=$("#fech").val();            
           $.post("index.php?page=estructura&accion=insertar",{documento:docaprobacion,fecha:fechadocumento},function (datosObtenidos){
                         toastr.info(datosObtenidos);
                });
           pgestionar();
           estadoBotones();
  }

  
            }




            
$("#gestionar").click(function(){
  //queda pendiente lo de los estados de los botones
        pgestionar();
        estadoBotones();   
       

}); 

 

 var estadoBotones = function(){
    var consultar = {
      type: 'POST',
      url:'index.php?page=estructura&accion=contarEstadosBotones',
      dataType: 'html',
      success: function(response){
         if (response=="no hay datos") {
         }else if (response=="hay datos") {   
                  
         };

      }
    };
    $.ajax(consultar);
       
  };


  /*$("#lunidad").click(function(){
       $.post("index.php?page=estructura&accion=listabuttonTabla",function (data){
             if (data=="estoy listando") {
                 list();
             }else{
              listdos();
            }
       });
}); */
