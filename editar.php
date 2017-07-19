<?php 

	require_once 'clases/Sesion.php';

	$sesion = new Sesion();

	$sesion->validarSesion($_SESSION["id_usuario"], $_SESSION["nombre_usuario"]);

	require_once 'clases/Conexion.php';
	require_once 'clases/Usuario.php';

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
	    <link type="text/css" rel="stylesheet" href="estilos/editar.css" />

	    <!-- enlace al archivo jquery.min.js (Librería de jQuery) -->
 		<script type="text/javascript" src="librerias/jquery/jquery-3.2.0.min.js"></script>
	    <!-- jQuery DataTable (CSS)-->
 		<link rel="stylesheet" type="text/css" href="librerias/DataTables-1.10.15/media/css/jquery.dataTables.css" />
 		<!-- jQuery DataTable (JS)-->
 		<script type="text/javascript" charset="utf8" src="librerias/DataTables-1.10.15/media/js/jquery.dataTables.js"></script>
 		
	    <script>

	    	$(document).ready(function(){

    			$('#table_id').DataTable();

			});

	    </script>

	    <style>

	    	.acciones{ /*centra el header Acciones*/
	    		text-align: center;
	    	}

	    	.editar{
	    		text-align: center;
	    	}

	    	.eliminar{
	    		text-align: center;
	    	}

	    	.lapiz{
	    		text-align: center;
	    	}

	    	.img_lapiz{
	    		width: 23px;
	    		height: 23px;
	    	}

	    	.cruz{
	    		text-align: center;
	    	}

	    	.img_cruz{
	    		width: 18px;
	    		height: 18px;
	    		margin-top: 4px;
	    	}

	    	.ojo{
	    		text-align: center;
	    	}

	    	.img_ojo{
	    		width: 23px;
	    		height: 23px;
	    	}

	    	#id_usuario{
	    		text-align: right;
	    	}

	    	#cerrar_editar{
	    		color: #FFFFFF;
	    		background-color: #FE9A2E;
	    	}

	    	#cerrar_visualizar{
	    		color: #FFFFFF;
	    		background-color: #FE9A2E;
	    	}

	    	#cancelar_eliminar{
	    		color: #FFFFFF;
	    		background-color: #FE9A2E;	
	    	}

	    </style>

  		<title>Consultar Usuarios</title>
 
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
		          <li><a href="agregar.php">Agregar Usuario</a></li>
		          <!--<li><a href="editar.php">Consultar Usuarios</a></li>-->
		        </ul>
		      </li>
		    </ul>

	    	<!--<p id="usuario_logueado" class="navbar-text"><?php echo "Usuario: " . $_SESSION["nombre_usuario"]; ?></p>-->

			<ul class="nav navbar-nav navbar-right">
	    		<li><a id="salir" href="salir.php" data-toggle="tooltip" data-placement="bottom" title="Cerrar Sesión"><span class="glyphicon glyphicon-log-in"></span> Salir</a></li>
	    	</ul>

	    	<ul class="nav navbar-nav navbar-right">
	    		<li><a id="usuario_logueado" href="#" data-toggle="tooltip" data-placement="bottom" title="Usuario Administrador"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION["nombre_usuario"]; ?></a></li>
	    	</ul>

		</div>

	</nav> 

	<div class="container">

		<h4>Consultar Usuarios</h4>
		
		<div class="table-responsive">          
  			
  			<table id="table_id" class="table">
            
            <thead> 
                <tr>
                    <th>Id</th>
                    <th>Apellido</th>
                    <th>Nombre</th>	
                    <th>Usuario</th>
                    <th>Correo</th>
                    <th>Tipo de Usuario</th>
                    <th class="ver"></th>
                    <th class="editar"></th>
                    <th class="eliminar"></th>
                </tr>
            </thead>
            <tbody>

	  			<?php

	  				$conexion_bd = Conexion::instanciaDeBaseDeDatos();

	  				$usuario = new Usuario();
	  				$usuario->listarUsuarios();

	    		?>

	    	</tbody>
	    	</table>		
  		</div>	 
	</div>

	<footer class="footer">

        <p class="text-muted">Esta aplicación es de uso interno y fue desarrollada para ser soporte de la capacitación "Pruebas Automatizadas".<b> - CDA Informática: 1986 - 2017. Todos los derechos reservados. -</b></p>

    </footer>

    <!-- ARCHIVOS NECESARIOS PARA BOOTSTRAP -->
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