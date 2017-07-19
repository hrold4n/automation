<?php 

	require_once 'clases/Sesion.php';

	$sesion = new Sesion();

	$sesion->validarSesion($_SESSION["id_usuario"], $_SESSION["nombre_usuario"]);

?>

<!DOCTYPE html>
<html lang="en">
	<head>

	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">

	    <!-- enlace al archivo de estilo bootstrap.min.css (Bootstrap Core de CSS) -->
		<link type="text/css" rel="stylesheet" href="librerias/bootstrap-3.3.7-dist/css/bootstrap.min.css" />
		<link type="text/css" rel="stylesheet" href="librerias/bootstrap-3.3.7-dist/css/bootstrap.css" />
	    <link type="text/css" rel="stylesheet" href="estilos/menu.css" />

  		<title>Inicio</title>
	
	</head>

<body>

	<nav class="navbar navbar-inverse">
		
		<div class="container-fluid">
	    
	    <!--<div class="navbar-header">
	    	<a id="titulo" class="navbar-brand" href="menu.php" title="Inicio">BackOffice</a>
	    </div>-->
	    
	    <div class="navbar-header">
		    <a id="inicio" class="navbar-brand" href="#" data-toggle="tooltip" data-placement="bottom" title="Inicio"><span class="glyphicon glyphicon-home"></span></a>
        </div>

	    <ul class="nav navbar-nav">
	    	<li class="dropdown"><a id="menu_desplegable" class="dropdown-toggle" data-toggle="dropdown" href="#">Adm. de Usuarios<span class="caret"></span></a>
		      	<ul class="dropdown-menu">
		        	<li><a id="agregar" href="agregar.php">Agregar Usuario</a></li>
		        	<li><a id="consultar" href="editar.php">Consultar Usuarios</a></li>
		        </ul>
	    	</li>
	    </ul>

	    <!--<p id="usuario_logueado" class="navbar-text"><?php //echo "Usuario: " . $_SESSION["nombre_usuario"]; ?></p>-->
	   
	    <ul class="nav navbar-nav navbar-right">
	    	<li><a id="salir" href="salir.php" data-toggle="tooltip" data-placement="bottom" title="Cerrar Sesión"><span class="glyphicon glyphicon-log-in"></span> Salir</a></li>
	    </ul>

	    <ul class="nav navbar-nav navbar-right">
	    	<li><a id="usuario_logueado" href="#" data-toggle="tooltip" data-placement="bottom" title="Usuario Administrador"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION["nombre_usuario"]; ?></a></li>
	    </ul>

	  </div>

	</nav>

	<div class="container">
  		
  		<h3>Sistema BackOffice para la Administración de Permisos de Usuario</h3>
		
  		<blockquote>

    		<p><mark>BackOffice</mark> es una aplicación sencilla cuyo único fin es el de administrar los permisos de los usuarios para los diferentes sistemas utilizados internamente en CDA.</p> 

    		<p class="text-left">Anteriormente, y antes del desarrollo de esta aplicación, eran los usuarios mismos los que debían registrarse a los diferentes aplicativos para comezar a hacer uso de los mismos. Por default obtenían permisos limitados y dependiendo de la necesidad de uso de las funcionalidades solicitaban permisos más elevados a un usuario Administrador. 
    		Con <mark>BackOffice</mark> se busca tener centralizada la tarea de asignación de permisos, siendo un único Usuario -Administrador- el que los administre a demanda.</p>

    		<p class="text-left">Desde la aplicación se podrán llevar a cabo tareas como: 
    		
    		<ul>	
	    		<li>Alta de Usuarios</li> 
	    		<li>Consulta de Usuarios</li>
	    		<li>Asignación de Permisos</li>
	    		<li>Edición de Datos</li> 
	    		<li>Eliminación de Usuarios</li>
	    		<li>Alta de Sistemas</li> 
	    		<li>Asignación de Sistemas a Usuarios</li>
	    	</ul>

    	</blockquote>

	</div>

	<footer class="footer">

    	<p class="text-muted">Esta aplicación es de uso interno y fue desarrollada para ser soporte de la capacitación "Pruebas Automatizadas".<b> - CDA Informática: 1986 - 2017. Todos los derechos reservados. -</b></p>

    </footer>

	    <!-- ARCHIVOS NECESARIOS PARA BOOTSTRAP -->
		<!-- enlace al archivo jquery.min.js (Librería de jQuery) -->
		<script type="text/javascript" src="librerias/jquery/jquery-3.2.0.min.js"></script>
		<!-- enlace al archivo boostrap.min.js (Bootstrap Core de JS) -->
		<script type="text/javascript" src="librerias/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

		<script>

			$(document).ready(function(){

				$("#inicio").tooltip();
    			$("#salir").tooltip();
    			$("#usuario_logueado").tooltip();

			});

		</script>

</body>

</html>