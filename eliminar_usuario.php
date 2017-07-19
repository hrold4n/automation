<?php
	
	require_once 'clases/Conexion.php';	
	require_once 'clases/Usuario.php';

	date_default_timezone_set("America/Argentina/Buenos_Aires");

	$fecha = date('Y/m/d');
	$hora = date('H:i:s');

	$id_usuario_ = $_POST["id_usuario"];

	$conexion_bd = Conexion::instanciaDeBaseDeDatos();

	$conexion_bd->pasarConsulta("
		SELECT u.apellido, u.nombre, u.correo, u.usuario, p.descripcion 
		FROM usuarios as u 
		INNER JOIN permisos as p
		ON u.id_permiso = p.id_permiso
		WHERE id_usuario = '$id_usuario_';
		");

	$conexion_bd->ejecutarConsulta();

	$registro = $conexion_bd->obtenerDato();

	// creación del archivo log de eliminación
	$archivo = fopen('C:\resultados\backoffice\logs\log_bajas.txt', 'a');

	//fwrite($archivo, "Apellido | Nombre | Correo | Usuario | Tipo de Usuario | Fecha | Hora" . PHP_EOL); // No tiene sentido usar encabezados para los campos

	// este archivo es solo para las bajas
	fwrite($archivo, $registro["apellido"] . ', ' . $registro["nombre"] . ', ' . $registro["correo"] . ', ' . $registro["usuario"] . ', ' . $registro["descripcion"] . ', ' . $fecha . ', ' . $hora . PHP_EOL);

	fclose($archivo);

	// excepción 
	try{
    	
    	$archivo = fopen('C:\resultados\backoffice\logs\log_bajas.txt', 'a');
    
	    if(!$archivo){ //si el archivo no se puede abrir, sea por el motivo que sea
	    	
	    	throw new Exception('Error el intentar abrir el archivo.');

	    }

	}
	
	catch (Exception $e){

    	die($e->getMessage());

	}	

	$usuario = new Usuario();

	$usuario->eliminarUsuario($id_usuario_);

	header('Location: editar.php');

?>