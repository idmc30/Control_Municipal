<html>
    <head>
        <meta charset="UTF-8">
       <?php include "dist/cabecera.php";?> 
       <link href="view/importaciones/jquery-ui.min.css" rel="stylesheet">
    </head>
    <body class="skin-blue wysihtml5-supported   fixed  pace-done">
        <header class="header">
           <?php    include "dist/logo.php";    ?>
             <nav class="navbar navbar-static-top" role="navigation">
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Navegación</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="dropdown messages-menu">
                           <ul class="dropdown-menu">                               
                                <li>                   
                                   <ul class="menu">
                                        <li></li>      
                                    </ul>
                                </li>
                                <li class="footer"><a href="#"></a></li>
                            </ul>
                        </li>
                        <li class="dropdown notifications-menu">
                            <ul class="dropdown-menu">
                                <li>
                                    <!--menu -->
                                    <ul class="menu">
                                        <li></li>
                                       
                                    </ul>
                                </li>
                                
                            </ul>
                        </li>
                      
                        <li class="dropdown tasks-menu">        
                            <ul class="dropdown-menu">      
                                <li>
                                    
                                    <ul class="menu">
                                        <li>  
                                        </li>
                                    </ul>
                                </li>
                               
                            </ul>
                        </li>
                       
                        <!--Parte para recibir el nombre del usuario-->
                      <?php include "dist/menuderecho.php";?> 
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <aside class="left-side sidebar-offcanvas">
                 <?php include "dist/menuizquierdo.php";?>  
            </aside>
            <aside class="right-side">
                <section class="content-header">
                    <h1>
                        Municipalidad Provincial de Ferreñafe
                        <small>Estructura</small>
                    </h1>
                </section>
            </br>
                 <a class="btn btn-app" id="lunidad" name="lunidad" title="Visualizar Estructura Actual"><i class="glyphicon glyphicon-align-justify"></i> Unidades</a>
                 <a class="btn btn-app" id="gestionar" name="gestionar" onload="pgestionar()"><i class="glyphicon glyphicon-align-left"></i>Gestionar</a>  
                <!--en esta parte listo div--> 
                  

                 <div id="lestructura" name="lestructura" ></div>
            </aside>
        </div>
         <div class="modal fade" id="modalperiodo" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="false">&times;</button>
                        <h4 class="modal-title"><i class="fa  fa-calendar-o"></i> Periodo</h4>
                    </div>
                    <form action="view/estructura.php" method="post">
                        <div class="modal-body">
                                
                                <div class="form-group">
                                    <label>Documento de Aprobación:</label>
                                    <input type="text"  name="doc" id="doc" class="form-control" placeholder="Documento de Aprobación ..."  required/>
                                </div>
                                   <div class="form-group">
                                    <label>Fecha:</label>
                                    <input type="text"  name="fech" id="fech" class="form-control" placeholder="Fecha ..." required/>
                                </div>   
                        </div>
                        <div class="modal-footer clearfix">

                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                            <!--<input type="button" value="Enviar Datos" onclick="insertarajax()">-->
                            <button type="button"  id="btnguardar" name="btnguardar" class="btn btn-success pull-left">Guardar</button>
                        </div>
                        <input type="hidden" id="idtrabajador" name="idtrabajador">
                    </form>
                </div>
            </div>
        </div>     
           <!-- SEGUNDO MODAL PARA LA CREAR UNA NUEGA GERENCIA O ALTA GERENCIA-->
           <div class="modal fade" id="modalgerencias" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="false">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-crop"></i> Crear Alta Dirección/Gerencia</h4>
                    </div>
                    <form id="frmgerencias"action="view/estructura.php" method="post">
                        <div class="modal-body">
                                <!-- text input -->
                              <div class="form-group">
                                            <label>Nivel</label>
                                            <select class="form-control" id="nivelessuperiores" name="nivelessuperior">
                                               <option style="display:none;" value=""  selected>Seleccionar Nivel</option>
                                                <option value="1">Alta Dirección</option>
                                                <option value="2">Gerencia</option>
                                            </select>
                                        </div>
                                   <div class="form-group">
                                    <label>Nombre:</label>
                                    <input type="text"  name="nom" id="nom" class="form-control" placeholder="Nombre ..." required/>

                                </div>   
                                <div class="form-group">
                                    <label>Sigla:</label>
                                    <input type="text"  name="sigla" id="sigla" class="form-control" placeholder="Iniciales ..." required/>
                                    
                                </div>
                               <div class="form-group">
                                            <label>Descripción</label>
                                            <textarea class="form-control" id="txtareadescrip" name="txtareadescrip"rows="3" placeholder="Descripción ..."></textarea>
                                </div>
                                <input type="text" id="codgerenciasge" name="codgerenciasge">
                        </div>
                        <div class="modal-footer clearfix">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                        
                            <button type="button"  id="btnguardargerencias" name="btnguardargerencias" class="btn btn-success pull-left">Guardar</button>
                        </div>
                        <!--<input type="hidden" id="idtrabajador" name="idtrabajador">-->
                    </form>
                </div>
                </div>
           </div>

            <div class="modal fade" id="modalrestoniveles" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="false">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-crop"></i> Crear Unidades/Areas Funcionales/Divisiones</h4>
                    </div>
                    <form id="frmgerencias"action="view/estructura.php" method="post">
                        <div class="modal-body">
                                <!-- text input -->
                              <div class="form-group">
                                            <label>Nivel</label>
                                            <select class="form-control" id="nivelesinferiores" name="nivelesinferiores">
                                               <option style="display:none;" value=""  selected>Seleccionar Nivel</option>
                                                <option value="3">Unidades</option>
                                                <option value="4">Area Funcional</option>
                                                <option value="5">Divisiones</option>
                                            </select>
                                        </div>
                                   <div class="form-group">
                                    <label>Nombre:</label>
                                    <input type="text"  name="nominferior" id="nominferior" class="form-control" placeholder="Nombre ..." required/>

                                </div>   
                                <div class="form-group">
                                    <label>Sigla:</label>
                                    <input type="text"  name="siglainferior" id="siglainferior" class="form-control" placeholder="Iniciales ..." required/>
                                    
                                </div>
                               <div class="form-group">
                                            <label>Descripción</label>
                                            <textarea class="form-control" id="txtareadescripinferior" name="txtareadescripinferior" rows="3" placeholder="Descripción ..."></textarea>
                                </div>
                                <input type="hidden" id="codigopadreinferior" name="codigopadreinferior">
                                <input type="text" id="codgerenciasrn" name="codgerenciasrn">
                        </div>
                        <div class="modal-footer clearfix">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                        
                            <button type="button"  onclick="guardarOtrosNiveles()" id="btnguardaotrosniveles" name="btnguardaotrosniveles" class="btn btn-success pull-left">Guardar</button>
                        </div>
                        <!--<input type="hidden" id="idtrabajador" name="idtrabajador">-->
                    </form>
                </div>
                </div>
           </div>
   


    <div class="modal fade" id="modaln3" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="false">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-crop"></i> Areas Funcionales/Divisiones</h4>
                    </div>
                    <form id="frmgerencias"action="view/estructura.php" method="post">
                        <div class="modal-body">
                                <!-- text input -->
                              <div class="form-group">
                                            <label>Nivel</label>
                                            <select class="form-control" id="nivelesn3" name="nivelesn3">
                                                <option style="display:none;" value=""  selected>Seleccionar Nivel</option>
                                                <option value="4">Area Funcional</option>
                                                <option value="5">Divisiones</option>
                                            </select>
                                        </div>
                                   <div class="form-group">
                                    <label>Nombre:</label>
                                    <input type="text"  id="txtnomntres"  name="txtnomntres" class="form-control" placeholder="Nombre ..." required/>

                                </div>   
                                <div class="form-group">
                                    <label>Sigla:</label>
                                    <input type="text"   id="txtsiglantres" name="txtsiglantres"  class="form-control" placeholder="Iniciales ..." required/>
                                    
                                </div>
                               <div class="form-group">
                                            <label>Descripción</label>
                                            <textarea class="form-control" id="txtareades" name="txtareades" rows="3" placeholder="Descripción ..."></textarea>
                                </div>
                                <input type="hidden" id="codigopadrentres" name="codigopadrentres">
                                <input type="text" id="codgerenciasntres" name="codgerenciasntres">
                        </div>
                        <div class="modal-footer clearfix">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                        
                            <button type="button"  onclick="guardarnivelesecundarios()" id="btnguarn3" name="btnguarn3" class="btn btn-success pull-left">Guardar</button>
                        </div>
                        <!--<input type="hidden" id="idtrabajador" name="idtrabajador">-->
                    </form>
                </div>
                </div>
    </div>
    


     <div class="modal fade" id="modaln5" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="false">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-crop"></i> Areas Funcionales</h4>
                    </div>
                    <form id="frmgerencias"action="view/estructura.php" method="post">
                        <div class="modal-body">
                                <!-- text input -->
                              <div class="form-group">
                                            <label>Nivel</label>
                                            <select class="form-control" id="nivelesn4" name="nivelesn4">
                                                <option style="display:none;" value=""  selected>Seleccionar Nivel</option>
                                                <option value="4">Area Funcional</option>
                                            </select>
                                        </div>
                                   <div class="form-group">
                                    <label>Nombre:</label>
                                    <input type="text"  id="txtnomn4" name="txtnomn4"  class="form-control" placeholder="Nombre ..." required/>

                                </div>   
                                <div class="form-group">
                                    <label>Sigla:</label>
                                    <input type="text"  name="txtsiglan4" id="txtsiglan4" class="form-control" placeholder="Iniciales ..." required/>
                                    
                                </div>
                               <div class="form-group">
                                            <label>Descripción</label>
                                            <textarea class="form-control" id="txtareadesn4" name="txtareadesn4" rows="3" placeholder="Descripción ..."></textarea>
                                </div>
                                <input type="hidden" id="codigopadren4" name="codigopadren4">
                        </div>
                        <div class="modal-footer clearfix">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                        
                            <button type="button"  onclick="guardarncuatro()" id="btnguarn4" name="btnguarn4" class="btn btn-success pull-left">Guardar</button>
                        </div>
                        <!--<input type="hidden" id="idtrabajador" name="idtrabajador">-->
                    </form>
                </div>
                </div>
    </div>
    
    
     <?php include "dist/footer.php";?> 
     <script src="view/jquery/estructuramunicipal.js" type="text/javascript"></script>
     <script src="view/importaciones/jquery-ui.min.js"></script>
     

    <!--<script src="view/importaciones/jquery.js"></script> -->
    </body>
</html>




