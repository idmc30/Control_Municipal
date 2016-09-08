var estado;
$(document).on('click','.activartuno', function () {
   var chekcheked = $(this).is(':checked');
   var idpoi = $(this).data('idplan');
   var tiempo="et1";
 
          if (chekcheked) {
             estado=1;
             actualizarestado(idpoi,tiempo,estado);

          }else{
            estado=0;
            actualizarestado(idpoi,tiempo,estado);
          }
   })

$(document).on('click','.activartdos', function () {
   var chekcheked = $(this).is(':checked');
   var idpoi = $(this).data('idplan');
   var tiempo="et2";
          if (chekcheked) {
             estado=1;
             actualizarestado(idpoi,tiempo,estado);
          }else{
             estado=0;
             actualizarestado(idpoi,tiempo,estado);
          }
   })




$(document).on('click','.activarttres', function () {
   var chekcheked = $(this).is(':checked');
   var idpoi = $(this).data('idplan');
   var tiempo="et3";
          if (chekcheked) {
             estado=1;
              actualizarestado(idpoi,tiempo,estado);
          }else{
             estado=0;
             actualizarestado(idpoi,tiempo,estado);
              
          }
   })


$(document).on('click','.activartcuatro', function () {
   var chekcheked = $(this).is(':checked');
   var idpoi = $(this).data('idplan');
   var tiempo="et3";
          if (chekcheked) {
             estado=1;
             actualizarestado(idpoi,tiempo,estado);

          }else{
            estado=0;
            actualizarestado(idpoi,tiempo,estado);

          }
   })


var actualizarestado= function(idplan,tiempo,estado){
      var Uniadespoe = {
      type: 'POST',
      url:'index.php?page=poi&accion=updatePoixTrimestre',
      data: {
        'plan': idplan,
        'tiempo': tiempo,
        'estado': estado
      },
      dataType: 'json',
      success: function(response){
         //toastr.info("Se Habilitó Trimestre");
         //console(response);
      }
    };
    $.ajax(Uniadespoe);
     
  };

