﻿<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <?php include 'autorizacion.php'; ?>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>EcoRecipes Backend</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="css/backend.css" rel="stylesheet" />
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
                <a class="navbar-brand" href="administrator.html">EcoRecipes Admin</a>
            </div>
            <div style="color: white; padding: 15px 50px 5px 50px; float: right; font-size: 16px;"> Last access : 30 May 2014 &nbsp; <a href="#" class="logout btn square-btn-adjust">Logout</a> </div>
          </nav>
           <!-- /. NAV TOP  -->
          <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				              <li class="text-center">
                        <img src="img/find_user.png" class="user-image img-responsive"/>
					            </li>
                      <li>
                        <a class="menu-lateral" onclick="mostrarClientes()" href="#"><i class="fa fa-users fa-3x"></i> Clientes</a>
                      </li>
                      <li>
                        <a class="menu-lateral" onclick="mostrarCategorias()" href="#"><i class="fa fa-list fa-3x"></i> Categorias</a>
                      </li>
                      <li>
                        <a class="menu-lateral" onclick="mostrarArticulos()" href="#"><i class="fa fa-book fa-3x"></i> Articulos</a>
                      </li>
						          <li>
                        <a class="menu-lateral" onclick="mostrarPedidos()" href="#"><i class="fa fa-shopping-cart fa-3x"></i> Pedidos</a>
                      </li>
                </ul>

            </div>
          </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Pantalla del Admin</h2>
                        <h5>Welcome Puto Pro, Love to see you back. </h5>
                    </div>
                </div>
                 <!-- /. ROW  -->
                  <hr />
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="js/jquery.js"></script>
    <script src="js/jquery-1.10.2.js"></script>

    <!-- AÑADIR JAVASCRIPT



    -->


      <!-- BOOTSTRAP SCRIPTS -->
    <script src="js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="js/morris/raphael-2.1.0.min.js"></script>
     <script src="js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="js/custom.js"></script>


</body>
</html>
