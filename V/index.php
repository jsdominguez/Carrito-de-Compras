<?php
  include("../M/conec.php");
  //instanciamos la clase
  $conexion = new conexion();
  //definimos si hay una cookie que establece el codigo de cada cliente
  if( !isset( $_COOKIE['usuario']) )
  {
	  //si no hay creamos esa cookie con un valor unico para cada cliente
    setcookie("usuario",uniqid());
  }
?>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>| Sistema Registro | </title>

        <?php
		//LLAMAMOS A TODOS LOS ESTILOS
        include("componentes/estilos.php");
        ?>

    </head>
    <body class="nav-md">  <!-- LLAMAMOS A LA FUNCION VIEWDATA PARA QUE NOS CARGUE DATOS EN LA TABLA -->
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col" id="menu">  <!-- LA COLUMNA DE OPCIONES TENDRA SOLO 3 COLUMNAS EN BOOTSTRAP -->
                    <div class="left_col scroll-view">
                        <div class="navbar nav_title">
                            <a href="compra.php"><center><img src="img/logo3.gif" style="margin-top:-10px" height="60px" width="320px"></center></a>
                        </div>
                        <div class="clearfix"></div>
                        <div class="profile">
                            <div class="profile_pic">
                                <img src="img/nurse2.png" width="50px" height="50px" id="compra">
                            </div>
                            <div class="profile_info">
                                <div id="venida">Bienvenido</div>
                            </div>
                        </div>
                        <br />

                        <!-- MENU -->
                        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                            <div class="menu_section"> <!-- MENU DE CATEGORIAS Y SUBCATEGORIAS -->
                                <div id='titulo_categoria'>Lista de Categorias</div>
                                <hr>
                                <div id="categoria"><!-- CAJA CONTENEDORA DONDE ESTARAN LAS CATEGORIAS Y SUBCATEGORIAS-->
                                    <ul class="nav side-menu">
                                        <?php
                                        $conexion->categorias();
                                        ?>
                                    </ul>
                                </div>
                            </div>  <!-- CIERRE DEL MENU DE CATEGORIAS Y SUBCATEGORIAS -->

                            <div class="menu_section">
                                <h3>Reportes</h3>
                                <ul class="nav side-menu">
                                    <li><a><i class="fa fa-windows"></i> Farmacia <span class="fa fa-chevron-down"></span></a>    <!-- CREAMOS UNA OPCION QUE TENDRA SUB -OPCIONES-->
                                        <ul class="nav child_menu" style="display: none">
                                            <li><a href="page_404.html">404 Error</a></li>                                <!--SUB-OPCIONES -->
                                            <li><a href="page_500.html">500 Error</a></li>                                <!--SUB-OPCIONES -->
                                        </ul>
                                    </li>
                                </ul>
                            </div> <!--CERRAMOS LA SECCCION -->


                            <div class="menu_section">
                                <h3>Gestion de Pedido</h3>
                                <ul class="nav side-menu">
                                    <li><a><i class="fa fa-windows"></i> Lista de pedido <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" style="display: none">
                                            <li><a href="page_404.html">404 Error</a></li>                                     <!--SUB-OPCIONES -->
                                            <li><a href="page_500.html">500 Error</a></li>                                     <!--SUB-OPCIONES -->
                                        </ul>
                                    </li>
                                </ul>
                            </div>  <!-- CERRANDO LA SECCION -->

                        </div><!--- FIN DEL DE MENU -->
                    </div>
                </div>

                <!-- BARRA DE MENU SUPERIOR  -->
                <div class="top_nav">

                    <div class="nav_menu">
                        <nav class="" role="navigation">
                            <div class="nav toggle">
                                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                            </div>

                            <nav class="col-md-12">
                                <ul id="opcion">
                                    <li class="item1">Nuestra Insitucion </li>
                                    <li class="item1">Especialidades</li>
                                    <li class="item1">Staff Medico</li>
                                    <li class="item1">Noticias y Eventos</li>
                                    <li class="item1">Contacto</li>
                                    <a href="index3c5d.html"><li class="item1">Tiendas</li></a>
									<img src="img/carrito.png" width="45px" height="45px" id="carrito">
									<span class="label label-default" id='cantcompras'>Total Compras <span id='cantidad'></span></span>
									
                                </ul>
                            </nav>

                        </nav>
                    </div>
                </div>

                <!--CONTENIDO CUERPO -->
				<div id="vercompras">
				</div>
                <div class="right_col" role="main">
                    <div class="row" style="position:absolute">
                        <div id="contener"> <!-- AQUI SE CARGARAN TODOS LOS DATOS CUANDO LA PAGINA INICIA -->
                            <div class="container-fluid">
                                <div id="contenido">
                                    <div class="row"> <!-- PUBLICIDAD -->
                                    <h1>AQUI VA PUBLICIDAD</h1>
                                    </div>
                                </div>
                                <div id="contenidosub">
                                    <div class="row"> <!-- LOS PRODUCTOS-->
                                        <div id='datosub' >

                                        </div>
                                        </div>
                                </div>
                            </div>
                        </div>
						                    <div id="pie">
                        <center>Powered by |
                            <span class="lead"> <i class="fa fa-paw"></i>Punkesito</span>
                        </center>
                    </div>
                    </div>
                </div>
            </div>
        </div>
		<?php 
		include("componentes/modal-pago.php");
		?>
    <!-- LLAMAMOS A TODOS LOS SCRIPT  -->
    <?php
    include("componentes/animaciones.php");
    ?>
</body>
</html>
