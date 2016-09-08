
    $( "#fechinciotrimestre" ).datepicker({
          inline: true
        });  
    $(function() {
            $( "#fechinciotrimestre" ).datepicker();
            
     });


    $( "#fechafinaltrimestre" ).datepicker({
          inline: true
        });  
    $(function() {
            $( "#fechafinaltrimestre" ).datepicker();
         
     });
   
    $(function(){
           limpiar();

    });



$(document).ready(function(){
  listartrimestres();
});

 $(function() {
        toastr.options.closeButton = true;
    });
 
    
$(document).on('click','#btnguardartiempo', function () {        
        var finicio=$("#fechinciotrimestre").val();
        var ffinal=$("#fechafinaltrimestre").val();
        alert(finicio +" - "+ffinal)
         if (finicio>ffinal) {
           toastr.info("La fecha final es menos a la fecha de inicio");

         }else{
             guardarTiempo();

         }

   })

    
$(document).on('click','#btnasignacion', function () {        

       limpiar();
       $('#btnguardartiempo').text('Guardar');  

   })




/*$(function($){
    $.datepicker.regional['es'] = {
        closeText: 'Cerrar',
        prevText: '<Ant',
        nextText: 'Sig>',
        currentText: 'Hoy',
        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
        dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
        weekHeader: 'Sm',
        dateFormat: 'dd/mm/yy',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''
    };
    $.datepicker.setDefaults($.datepicker.regional['es']);
})*/



  function eliminarTiempo(id){
   $.post("index.php?page=trimestres&accion=eliminarTrimestre",
           {'codtiempo': id
          },
          function (data){
            toastr.info("Se elimó correctamente");
       }); 
       listartrimestres() ;
   }

 function actualizarTiempo(id){

        $.post("index.php?page=trimestres&accion=getTrimestre",
           {
            'codtiempo': id,
            },
          function (response){
             $('#idtrimestres').val(response.descripcion);  
             $('#fechinciotrimestre').val(response.fechinicio);  
             $('#fechafinaltrimestre').val(response.fechafinal);  
             $('#txtcodtimpo').val(response.idtiempo);
             $('#btnguardartiempo').text('Actualizar');  
             $('#modaltrimestre').modal('show');  
             
       }); 
      
   }






var guardarTiempo = function(){
    var nomtrimestre=$('select[name=idtrimestres]').val();
    var fechinicio=$("#fechinciotrimestre").val();
    var fechfinal=$("#fechafinaltrimestre").val();
    var txtcod=$("#txtcodtimpo").val();
    var options = {
      type: 'POST',
      url:'index.php?page=trimestres&accion=insertarTrimestre',
      data: {
        'trimestre': nomtrimestre,
        'finicio': fechinicio,
        'ffinal': fechfinal,
        'codigo':txtcod

      },
      dataType: 'html',
      success: function(response){
            toastr.info("Se registro con exito");
        //$('#unidadespoi').html(response);
        limpiar();
        listartrimestres();
      }
    };
    $.ajax(options);
  $('#modaltrimestre').modal('hide');
  };

  function eliminarTiempo(id){
   $.post("index.php?page=trimestres&accion=eliminarTrimestre",
           {'codtiempo': id
          },
          function (data){
            listartrimestres() ;
            toastr.info("Se elimó correctamente");

       }); 
       
   }

  function listartrimestres(){
     $.post("index.php?page=trimestres&accion=listarTiempo",
      function (response){
                 $('#tablatiempo').html(response);                
        });
  }


         


function limpiar(){
  $("#fechinciotrimestre").val("");
  $("#fechafinaltrimestre").val("");
  $("#idtrimestres").val("");
  $("#txtcodtimpo").val("");
  
}
