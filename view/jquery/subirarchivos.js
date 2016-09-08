function subirarchivos(){
            var iddetalledemeta=$("#iddetmeta").val();
           /*$.post("index.php?page=mievaluacion&accion=_insertarSustentacion",
           { documento:docaprobacion,
             fecha:fechadocumento},function (datosObtenidos){
                         toastr.info(datosObtenidos);
                });*/
alert(iddetalledemeta);

}



 $(document).on('click','#btnguardarfile', function () {
         var formdata=new FormData($("#frmsustentoxmetas")[0]);
         var meta=$("#iddetmeta").val();
          var subir = {
      type: 'POST',
      url:'index.php?page=mievaluacions&accion=insertarSustentacion',
      data: {
         'subirarchivo': formdata,
         'iddetallemeta': meta
      },
      contentType: false,
      processData:false,
      success: function(response){
          toastr.info(response);
      }
    };
    $.ajax(subir);
         
   })




 $(function() {
        toastr.options.closeButton = true;
    });

