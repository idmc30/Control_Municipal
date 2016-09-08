
             
   
           var x;
               x=$(document);  
               x.ready(mostrar);

 function mostrar() {
                $.post("index.php?page=personal&accion=listar", function(datoObtenido) {
                    $("#tabla").html(datoObtenido);
                    
                });
            }


  
         function validar(mensaje, idcampo) {
                var exp_reg = /^[a-z\u00C0-\u00ff]+$/i; // expresión regular para letras(máy o minus), acentuadas o no,
                if (exp_reg.test(mensaje) == true) {
                } else {
                    alert("No ingresar numeros: ");
                    $("#" + idcampo).val("");
                }
            }



                 function validarLetras(e) { // 1
						                 
						    tecla = (document.all) ? e.keyCode : e.which; 
						    // alert(tecla);  me envia  el numero de letra que ingreso por teclado
						    if (tecla==8) return true; // backspace
								if (tecla==32) return true; // espacio
								if (e.ctrlKey && tecla==86) { return true;} //Ctrl v
								if (e.ctrlKey && tecla==67) { return true;} //Ctrl c
								if (e.ctrlKey && tecla==88) { return true;} //Ctrl x
								if (tecla==192) { return true;} // aqui agrego la letra para que se ingresado por vista
								patron = /[a-zA-Z]/; //patron
								te = String.fromCharCode(tecla); 
								return patron.test(te); // prueba de patron
							}	


				function validarNumeros(e) { // 1
                tecla = (document.all) ? e.keyCode : e.which; // 2
                if (tecla == 8)
                    return true; // backspace
                if (tecla == 109)
                    return true; // menos
                if (tecla == 110)
                    return true; // punto
                if (tecla == 189)
                    return true; // guion
                if (e.ctrlKey && tecla == 86) {
                    return true
                }
                ; //Ctrl v
                if (e.ctrlKey && tecla == 67) {
                    return true
                }
                ; //Ctrl c
                if (e.ctrlKey && tecla == 88) {
                    return true
                }
                ; //Ctrl x
                if (tecla >= 96 && tecla <= 105) {
                    return true;
                } //numpad

                patron = /[0-9]/; // patron

                te = String.fromCharCode(tecla);
                return patron.test(te); // prueba
            }