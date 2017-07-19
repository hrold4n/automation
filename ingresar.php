<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="UTF-8">	
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- enlace al archivo de estilo bootstrap.min.css (Bootstrap Core de CSS) -->
		<link type="text/css" rel="stylesheet" href="librerias/bootstrap-3.3.7-dist/css/bootstrap.min.css" />
		<!-- enlace al archivo de estilo ingresar.css -->
		<link type="text/css" rel="stylesheet" href="estilos/ingresar.css" />

		<title>Ingresar</title>

	</head>

<body>

	<div class="container">

		<form class="form-signin" method="post" action="validar_ingreso.php">

			<img src="imagenes/cda_logo.png" class="img-thumbnail" alt="Logo de CDA." width="100px" height="50px" />

	    	<h2 class="form-signin-heading">Ingresar<small> | </small><small id="backoffice"> Automatización</small></h2>
	        
	        <label for="inputUsuario" class="sr-only">Usuario</label>
	        <input type="text" id="usuario" name="usuario" class="form-control" placeholder="Usuario" autocomplete="off" autofocus title="Ingresar Usuario" required />
	        <label for="inputClave" class="sr-only">Password</label>
	        <input type="password" id="clave" name="clave" class="form-control" placeholder="Clave" autocomplete="off" title="Ingresar Clave" required />
	        
	        <button type="submit" id="ingresar" class="btn btn-lg btn-primary btn-block" title="Ingresar al sistema">Ingresar</button>
	      
	    </form>

	</div> <!-- /container -->

	<footer class="footer">

        <p class="text-muted">Esta aplicación es de uso interno y fue desarrollada para ser soporte de la capacitación "Pruebas Automatizadas".<b> - CDA Informática: 1986 - 2017. Todos los derechos reservados. -</b></p>

    </footer>

		<!-- ARCHIVOS NECESARIOS PARA BOOTSTRAP -->
		<!-- enlace al archivo jquery.min.js (Librería de jQuery) -->
		<script type="text/javascript" src="librerias/jquery/jquery-3.2.0.min.js"></script>
		<!-- enlace al archivo boostrap.min.js (Bootstrap Core de JS) -->
		<script type="text/javascript" src="librerias/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script> 
	
</body>

</html>