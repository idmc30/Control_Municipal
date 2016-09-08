     var autocom = function(response) {
      var availableTags = response;
     $( "#tags" ).autocomplete({
      source: availableTags,
      focus: function(event, ui) {
          // prevent autocomplete from updating the textbox
          event.preventDefault();
          // manually update the textbox
          $(this).val(ui.item.label);
        },
        select: function(event, ui) {
          // prevent autocomplete from updating the textbox
          event.preventDefault();
          // manually update the textbox and hidden field
          $(this).val(ui.item.label);
          $("#idusuario").val(ui.item.value);
        }
    });
  }

   function enviarid(){
       var id=$("#idusuario").val();
       //alert(id);
       $.post("index.php?page=usuariospersonal&accion=tablaMenu",{id:id},function (response){
                     $("#respuestademenu").html(response); 
                    
          });  

   }

        function listarMenu(){
               $.post("index.php?page=usuariospersonal&accion=tablaMenu",function (response){
                     $("#respuestademenu").html(response); 
                    
          });  

        }
 function eliminarUsuarios(id){
        $.post("index.php?page=usuariospersonal&accion=eliminarUsu",{id:id},function (response){
                     //$("#lperfilusuario").html(response); 
                    // var respuesta=confirm("¿Esta de acuerdo con las condiciones?")

                       toastr.info("Se limino correctamente");
                        location.reload();
                  
          });  
    
 }
 


$(function() {
        toastr.options.closeButton = true;
    });






function actualizarUsuarios(id){
   listarperfilUsuario();    
                $.post("index.php?page=usuariospersonal&accion=getUsuario",{id:id}, function (response){ 
                $('#usu').val(response.usuario);
                $('#clave').val(response.clave);
                $('#idperfil').val(response.idperfil);
                $('#servidor').val(response.dni);
                $('#idservidor').val(response.idservidor);
                $('#nomservidor').val(response.nombre+", "+response.appaterno+" "+response.apmaterno)  
                $('#codusuario').val(response.idusuario);
                $( "#servidor" ).prop( "disabled", true );  
                var estadoU=response.estado;
                if(estadoU=="A"){
                	// alert("asdsa");
                  //$('#chkestadou').prop("checked", true);
                  $('#chkestadou').prop("checked",true );
                }else{
                  
                }                
                $('#modalusuarios').modal('show')  
                });
}
function listarperfilUsuario(){
       $.post("index.php?page=usuariospersonal&accion=listarPefil",function (response){
                     $("#lperfilusuario").html(response); 
          });
     }



  $("#btnusuariosn").click(function(){
      listarperfilUsuario();
      limpiarUsuario();
      $( "#servidor" ).prop( "disabled", false );
   });   


  

$(document).on('keyup', '#tags',function () {
  //alert('hola');
  getUsuarioAutocomplete()

});
var getUsuarioAutocomplete = function(){
    var usu=$("#tags").val();
    //alert(txtlike);
    //alert(txtlike);
    var options = {
      type: 'POST',
      url:'index.php?page=usuariospersonal&accion=getUtocomplete',
      data: {
        'usu': usu,
      },
      dataType: 'json',
      success: function(response){
       console.log(response);
          autocom(response);
       
        
      }
    };
    $.ajax(options);

  };



function  limpiarUsuario(){
    $("#usu").val("");
    $("#clave").val("");
    $("#idperfil").val("");
    $("#servidor").val("");
    $("#nomservidor").val("");
    $("#idservidor").val("");
    $("#idservidor").val("");
    $("#codusuario").val("");
    
}

$(document).on('click','#mostrar', function () {
  var idu = $('#idusuario').val();
  alert(idu);
} )



$(document).on('click','.agregarmenu', function () {
   var agregar = $(this).is(':checked');
   var idmenu = $(this).data('idmenu');
   var codusuario = $('#idusuario').val();
  if (agregar) {
     var accion = "agregar";  

   }else{
       var accion = "eliminar";  

   }
   var _options = {
      type: 'POST',
      url:'index.php?page=usuariospersonal&accion=ajaxmanejomenu',
      data: {
        'codusuario': codusuario,
        'idmenu': idmenu,
        'accion': accion
      },
      dataType: 'json',
      success: function(response){
      }
    };
    $.ajax(_options);
  
});

