<?php include './server/autorizacion.php'; ?>
﻿<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>EcoRecipes Backend</title>
    <script src="js/jquery.js"></script>
  	<script src="js/backend.js"></script>
  	<script src="js/jquery-ui.min.js"></script>
  	<script src="js/grid.locale-es.js"></script>
  	<script src="js/jquery.jqGrid.min.js"></script>
    <script type="text/javascript" src="dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="js/backendservice.js"></script>
	<!-- BOOTSTRAP STYLES-->
    <link href="css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
        <link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
    <link href="css/backend.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.structure.css">
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.theme.css">
    <link href="css/ui.jqgrid.css" rel="stylesheet" />
    <link href="css/ui.jqgrid-bootstrap.css" rel="stylesheet" />
    <link href="css/ui.jqgrid-bootstrap-ui.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>

    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand">EcoRecipes Admin</a>
            </div>
            <div id="cabeceraLogout" style="color: white; padding: 15px 50px 5px 50px; float: right; font-size: 16px;"> <a id="logoutBT" class="logout btn square-btn-adjust">Logout</a> </div>
          </nav>
           <!-- /. NAV TOP  -->
          <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				              <li class="text-center">
                        <img src="img/find_user.png" class="user-image img-responsive"/>
					            </li>
                      <li>
                        <a class="menu-lateral" id="clientesBT" ><i class="fa fa-users fa-3x"></i> Clientes</a>
                      </li>
                      <li>
                        <a class="menu-lateral" id="categoriasBT" ><i class="fa fa-list fa-3x"></i> Categorias</a>
                      </li>
                      <li>
                        <a class="menu-lateral" id="articulosBT" ><i class="fa fa-book fa-3x"></i> Articulos</a>
                      </li>
						          <li>
                        <a class="menu-lateral" id="pedidosBT" ><i class="fa fa-shopping-cart fa-3x"></i> Pedidos</a>
                      </li>
                </ul>


            </div>
          </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Panel de Administración EcoRecipes</h2>
                        <h5 id="fraseSesion"> </h5>
                    </div>
                </div>

                 <!-- /. ROW  -->
                  <hr />
                  <div id="capaGridCategorias">
                      <h1 id="hCat">Categorias</h1>
                  	<table id="jqGridCategorias"></table> 
                  	<div id="paginadorCategorias"></div>
                   <p> <a  id="a1Cat" class="btn btn-success">Insertar fila</a> 
                    <a  id="a2Cat" class="btn btn-danger">Borrar fila</a> 
                    <a  id="a3Cat" class="btn btn-success">Modificar fila</a> </p>
                  </div>
                
                   <div id="capaGridArticulos">
                       <h1 id="hArt">Artículos</h1>
                    <table id="jqGridArticulos"></table> 
                    <div id="paginadorArticulos"></div>
                     <p> <a  id="a1Art" class="btn btn-success">Insertar fila</a> 
                    <a  id="a2Art" class="btn btn-danger">Borrar fila</a> 
                    <a  id="a3Art" class="btn btn-success">Modificar fila</a> </p>
       
                  </div>
                   <div id="capaGridPedidos">
                       <h1 id="hPed">Pedidos</h1>
                    <table id="jqGridPedidos"></table> 
                    <div id="paginadorPedidos"></div>
                  <table id="jqGridPedidos_d"></table>
                       <div id="paginadorPedidos_d"></div>
                  </div>
                
                   <div id="capaGridClientes">
                       <h1 id="hCli">Clientes</h1>
                    <table id="jqGridClientes"></table> 
                    <div id="paginadorClientes"></div>
                
                  </div>
    </div>


    <!-- modales -->

    <div id="modalCategoriaI" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title" id="tituloModalCategoriaI">Insertar categoría</h4>
            </div>
            <div class="modal-body">
              <p>Nombre de la categoría: <input type="text" class="form-control" id="nombreCategoriaTFI" required/></p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Atras</button>
              <button type="button" class="btn btn-success" id="insertarCategoriaBT">Enviar</button>
            </div>
          </div>

        </div>
      </div>

<div id="modalCategoriaU" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title" id="tituloModalCategoriaU">Actualizar categoría</h4>
            </div>
            <div class="modal-body">
              <p>Nombre de la categoría: <input type="text" class="form-control" id="nombreCategoriaTFU" required/></p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Atras</button>
              <button type="button" class="btn btn-success" id="actualizarCategoriaBT">Enviar</button>
            </div>
          </div>

        </div>
      </div>

<div id="modalArticuloI" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title" id="tituloModalArticuloI">Insertar artículo</h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal">
                          <fieldset>
                          <legend>Articulo</legend>
                          <div class="form-group">
                            <label class="col-md-4 control-label" for="nombreArticuoTF">Nombre</label>  
                            <div class="col-md-4">
                            <input id="nombreArticuloTFI" name="nombreArticuoTF" placeholder="Nombre del artículo" class="form-control input-md" type="text">
                              
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-md-4 control-label" for="descripcionArticuloTF">Descripción:</label>  
                            <div class="col-md-8">
                            <input id="descripcionArticuloTFI" name="descripcionArticuloTF" placeholder="Descripción del artículo." class="form-control input-md" type="text">
                              
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-md-4 control-label" for="precioArticuloTF">Precio</label>  
                            <div class="col-md-4">
                            <input id="precioArticuloTFI" name="precioArticuloTF" placeholder="Precio del artículo" class="form-control input-md" type="text">
                              
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-md-4 control-label" for="stockArticuloTF">Stock:</label>  
                            <div class="col-md-4">
                            <input id="stockArticuloTFI" name="stockArticuloTF" placeholder="Cantidad en stock del artículo" class="form-control input-md" type="text">   
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-md-4 control-label" for="imagen">Imagen:</label>
                            <div class="col-md-4">
                              <input id="imagenI" name="imagen" class="input-file" type="file">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-md-4 control-label" for="categoriaSL">Categoría:</label>
                            <div class="col-md-4">
                              <select id="categoriaSLI" name="categoriaSL" class="form-control">
                              </select>
                            </div>
                          </div>
                          </fieldset>
                          </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Atras</button>
              <button type="button" class="btn btn-success" id="insertarArticuloBT">Enviar</button>
            </div>
          </div>
        </div>
      </div>


<div id="modalArticuloU" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title" id="tituloModalArticuloU">Actualizar artículo</h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal">
                          <fieldset>
                          <legend>Articulo</legend>
                          <div class="form-group">
                            <label class="col-md-4 control-label" for="nombreArticuoTF">Nombre</label>  
                            <div class="col-md-4">
                            <input id="nombreArticuloTFU" name="nombreArticuoTF" placeholder="Nombre del artículo" class="form-control input-md" type="text">
                              
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-md-4 control-label" for="descripcionArticuloTF">Descripción:</label>  
                            <div class="col-md-8">
                            <input id="descripcionArticuloTFU" name="descripcionArticuloTF" placeholder="Descripción del artículo." class="form-control input-md" type="text">
                              
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-md-4 control-label" for="precioArticuloTF">Precio</label>  
                            <div class="col-md-4">
                            <input id="precioArticuloTFU" name="precioArticuloTF" placeholder="Precio del artículo" class="form-control input-md" type="text">
                              
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-md-4 control-label" for="stockArticuloTF">Stock:</label>  
                            <div class="col-md-4">
                            <input id="stockArticuloTFU" name="stockArticuloTF" placeholder="Cantidad en stock del artículo" class="form-control input-md" type="text">   
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-md-4 control-label" for="imagen">Imagen:</label>
                            <div class="col-md-4">
                              <input id="imagenU" name="imagen" class="input-file" type="file">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-md-4 control-label" for="categoriaSL">Categoría:</label>
                            <div class="col-md-4">
                              <select id="categoriaSLU" name="categoriaSL" class="form-control" disabled>
                              </select>
                            </div>
                          </div>
                          </fieldset>
                          </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Atras</button>
              <button type="button" class="btn btn-success" id="actualizarArticuloBT">Enviar</button>
            </div>
          </div>
        </div>
      </div>






























             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
  


      <!-- BOOTSTRAP SCRIPTS -->
    <script src="js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="js/jquery.metisMenu.js"></script>




</body>
</html>
