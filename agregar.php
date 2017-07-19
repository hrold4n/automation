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
	    <link type="text/css" rel="stylesheet" href="estilos/agregar.css" />

	    <style type="text/css">
	    	
	    #volver{
	    	color: #FFFFFF;
	    	background-color: #FE9A2E;	
	    }

	    </style>

  		<title>Agregar Usuario</title>
 
	</head>

<body>

	<nav class="navbar navbar-inverse">
		
		<div class="container-fluid">
	    
	    <div class="navbar-header">
		    <a id="inicio" class="navbar-brand" href="menu.php" data-toggle="tooltip" data-placement="bottom" title="Volver al Inicio"><span class="glyphicon glyphicon-home"></span></a>
        </div>	

	    <ul class="nav navbar-nav">
	      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Adm. de Usuarios<span class="caret"></span></a>
	        <ul class="dropdown-menu">
	          <!--<li><a href="#">Agregar Usuario</a></li>-->
	          <li><a href="editar.php">Consultar Usuarios</a></li>
	        </ul>
	      </li>
	    </ul>

	    <!--<p id="usuario_logueado" class="navbar-text"><?php echo "Usuario: " . $_SESSION["nombre_usuario"]; ?></p>-->

	    <ul class="nav navbar-nav navbar-right">
	    	<li><a id="salir" href="salir.php" data-toggle="tooltip" data-placement="bottom" title="Cerrar Sesión""><span class="glyphicon glyphicon-log-in"></span> Salir</a></li>
	    </ul>

	    <ul class="nav navbar-nav navbar-right">
	    	<li><a id="usuario_logueado" href="#" data-toggle="tooltip" data-placement="bottom" title="Usuario Administrador"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION["nombre_usuario"]; ?></a></li>
	    </ul>

	  </div>

	</nav>

	<div class="container">

		<h4>Agregar Usuario</h4>

		<form class="form-horizontal" method="post" action="agregar_usuario.php">
			
			<div class="form-group">
	    		<label class="col-sm-2 control-label">Apellido:</label><label class="asterisco"> *</label>
		    	<div class="col-sm-5">
		      		<input id="apellido" name="apellido" class="form-control" type="text" value="" placeholder="Ingrese Apellido" data-toggle="tooltip" data-placement="bottom" title="Apellido" autofocus required>
		    	</div>
	  		</div>

			<div class="form-group">
	    		<label class="col-sm-2 control-label">Nombre:</label><label class="asterisco"> *</label>
		    	<div class="col-sm-5">
		      		<input id="nombre" name="nombre" class="form-control" type="text" value="" placeholder="Ingrese Nombre" data-toggle="tooltip" data-placement="bottom" title="Nombre" required>
		    	</div>
	  		</div>

	  		<div class="form-group">
	    		<label class="col-sm-2 control-label">Correo Electrónico:</label><label class="asterisco"> *</label>
		    	<div class="col-sm-5">
		      		<input id="correo" name="correo" class="form-control" type="text" value="" placeholder="Ingrese Correo Electrónico" data-toggle="tooltip" data-placement="bottom" title="Correo" required>
		    	</div>
	  		</div>

			<div class="form-group">
	    		<label class="col-sm-2 control-label">Usuario:</label><label class="asterisco"> *</label>
		    	<div class="col-sm-5">
		      		<input id="usuario" name="usuario" class="form-control" type="text" value="" placeholder="Ingrese Usuario" data-toggle="tooltip" data-placement="bottom" title="Usuario" required>
		    	</div>
	  		</div>

	  		<div class="form-group">
	    		<label class="col-sm-2 control-label">Clave:</label><label class="asterisco"> *</label>
		    	<div class="col-sm-5">
		      		<input id="clave" name="clave" class="form-control" type="password" value="" placeholder="Ingrese Clave" data-toggle="tooltip" data-placement="bottom" title="Clave" required><span id="span_clave"></span>
		    	</div>
	  		</div>

	  		<div class="form-group">
	    		<label class="col-sm-2 control-label">Repetir Clave:</label><label class="asterisco"> *</label>
		    	<div class="col-sm-5">
		      		<input id="reclave" name="reclave" class="form-control" type="password" value="" placeholder="Reingrese Clave" data-toggle="tooltip" data-placement="bottom" title="Repetir Clave" required>
		    	</div>
	  		</div>

	  		<div class="form-group">
	    		<label class="col-sm-2 control-label">Tipo de Usuario:</label><label class="asterisco"> *</label>
		    	<div class="col-sm-5">
		    	<select id="tipousuario" name="tipousuario" class="form-control" data-toggle="tooltip" data-placement="bottom" title="Tipo de Usuario">
            		<option value="Seleccione...">Seleccione...</option>
            		<option value="1">Nivel 1</option>
            		<option value="2">Nivel 2</option>
          		</select>
	  			</div>
	  		</div>

	  		<div class="form-group">
	    		<label class="col-sm-2 control-label">Sistema:</label><label class="asterisco"> *</label>
		    	<div class="col-sm-5">
		    	<select id="sistema" name="sistema" class="form-control" data-toggle="tooltip" data-placement="bottom" title="Sistema">
            		<option value="Seleccione...">Seleccione...</option>
            		<option value="1">Sistema 1</option>
            		<option value="2">Sistema 2</option>
            		<option value="3">Sistema 3</option>
          		</select>
	  			</div>
	  		</div>

	  		<div class="form-group">
	  			<div class="col-sm-offset-2 col-sm-10">
	  				<button id="agregar" type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Agregar el registro">Agregar</button>
        			<a href="menu.php"><button id="volver" type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="bottom" title="Volver al menú principal">Volver</button></a>
      			</div>
      		</div>

		</form>
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