<?php
	
	require_once 'clases/Conexion.php';
	require_once 'clases/Usuario.php';
	require_once 'clases/Limpiar.php';

	date_default_timezone_set("America/Argentina/Buenos_Aires");

	$fecha = date('Y/m/d');
	$hora = date('H:i:s');

	$conexion_bd = Conexion::instanciaDeBaseDeDatos();

	$sanitizar = new Limpiar();

	$sanitizar->limpiarDato($id_usuario_ = $_POST["id_usuario"]);
	$sanitizar->limpiarDato($apellido_ = $_POST["apellido"]);
	$sanitizar->limpiarDato($nombre_ = $_POST["nombre"]);
	$sanitizar->limpiarDato($usuario_ = $_POST["usuario"]);
	$sanitizar->limpiarDato($correo_ = $_POST["correo"]);
	$sanitizar->limpiarDato($tipousuario_ = $_POST["tipousuario"]);
	
	$usuario = new Usuario();

	$usuario->actualizarUsuario($id_usuario_, $apellido_, $nombre_, $usuario_, $correo_, $tipousuario_);

	// creación del archivo log de edición
	$archivo = fopen('C:\resultados\backoffice\logs\log_modificaciones.txt', 'a');

	// este archivo es solo para las modificaciones
	fwrite($archivo, $apellido_ . ', ' . $nombre_ . ', ' . $correo_ . ', ' . $usuario_ . ', ' . $tipousuario_ . ', ' . $fecha . ', ' . $hora . PHP_EOL);

	fclose($archivo);

	// excepción 
	try{
    	
    	$archivo = fopen('C:\resultados\backoffice\logs\log_modificaciones.txt', 'a');
    
	    if(!$archivo){ //si el archivo no se puede abrir, sea por el motivo que sea
	    	
	    	throw new Exception('Error el intentar abrir el archivo.');

	    }

	}
	
	catch (Exception $e){

    	die($e->getMessage());

	}

	header('Location: editar.php');

?>