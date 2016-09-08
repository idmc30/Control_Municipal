$(function() {
        toastr.options.closeButton = true;
           }
 );



 $(document).on('click','#t1', function () {
     var idgeplan = $('#poithismetas').val().split('|');
     var idplan = idgeplan[1];
     var tiempo="I";
   mestasxtrimestre(idplan,tiempo);         
   })

 $(document).on('click','#t2', function () {
      var idgeplan = $('#poithismetas').val().split('|');
      var idplan = idgeplan[1];
      var tiempo="II";
      mestasxtrimestre(idplan,tiempo);              
      
   })
  $(document).on('click','#t3', function () {
       var idgeplan = $('#poithismetas').val().split('|');
       var idplan = idgeplan[1];
       var tiempo="III";
       mestasxtrimestre(idplan,tiempo);         
      
   })
   $(document).on('click','#t4', function () {
       var idgeplan = $('#poithismetas').val().split('|');
       var idplan = idgeplan[1];
       var tiempo="IV";
       mestasxtrimestre(idplan,tiempo);               
   })



function mestasxtrimestre(idplan,tiempo){
   
   $.post("index.php?page=mievaluacion&accion=metasxTrimestre",{codplan:idplan,descriptiempo:tiempo},function (datosObtenidos){
                 $("#listametasportrimestre").html(datosObtenidos);      
                });   

}
function asignarid(id) { 
  $("#iddetmeta").val(id);

};


