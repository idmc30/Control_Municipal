

/*function insertarajax(){
   

              //creo variables para recibir los parametros
              var nom=$("#nom").val();
              var apepa=$("#apepa").val();
              var apema=$("#apema").val();
              var dni=$("#dni").val();
              var sexo=$("#sexo").val();
              var tfijo=$("#telef").val();
              var direccion=$("#dir").val();
              var email=$("#email").val();
              var celu=$("#celu").val();
             // var foto=$("#subirarchivo").val();
              var idper=$("#idtrabajador").val();
              var foto = document.getElementById("subirarchivo");
              var file = foto.files[0];
              var data = new FormData();
              data.append('subirarchivo',file);      
  $.post("index.php?page=personal&accion=insertar",
        { NOMBRE:nom,
          APELLIDOPA:apepa,
          APELLIDOMA:apema,
          DNI:dni,
          SEXO:sexo,
          FIJO:tfijo,
          DIRECCION:direccion,
          EMAIL:email,
          CELU:celu,
          FOTO:data,
          id:idper

                   },function(response){
                     //$("#").html(response) 
                   // toastr.info(response);
                    //location.reload();

                 } );
   limpiar();
 
  
  }*/

 

 function listarpdftrabajador(){
      
          $.post("index.php?page=personal&accion=generarpdf", function (datosObtenidos){              
                      console.log(datosObtenidos);
                     });


     }


 function eliminar(id){
                $.post("index.php?page=personal&accion=eliminar",{id:id}, function (datosObtenidos){              
                      toastr.info("Se elimno correctamente");
                       location.reload();
                     });

            }    

  function limpiar() {
                $("#nom").val("");
                $("#apepa").val("");
                $("#apema").val("");
                $("#dni").val("");
                $("#sexo").val("");
                $("#telef").val("");
                $("#dir").val("");
                $("#email").val("");
                $("#celu").val("");
                $("#subirarchivo").val("");
               $("#idtrabajador").val("");  
                                 
            }



function editar(id){
                $.post("index.php?page=personal&accion=obtener",{id:id}, function (response){              
                $('#nom').val(response.nom);
                $('#apepa').val(response.apepa);
                $('#apema').val(response.apema);
                $('#dni').val(response.dni);
                $('#sexo').val(response.sexo);
                $('#telef').val(response.telef);
                $('#dir').val(response.direc);
                $('#email').val(response.email);
                $('#celu').val(response.celu);
                $("#btnguardar").attr("value", "Actualizar"); 
                //$('#subirarchivo').val(response.apema);
                $('#idtrabajador').val(id);   
                $('#modalpersonalnuevo').modal('show')  
                });

                limpiar();
            }