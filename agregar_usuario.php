<?php
	
	require_once 'clases/Conexion.php';
	require_once 'clases/Usuario.php';
	require_once 'clases/Limpiar.php';

	date_default_timezone_set("America/Argentina/Buenos_Aires");

	$fecha = date('Y/m/d');
	$fecha_log = date('Ymd'); // fecha sin formato usada al crear el directorio de logs
	$hora = date('H:i:s');

	$conexion_bd = Conexion::instanciaDeBaseDeDatos();

	$sanitizar = new Limpiar();

	$sanitizar->limpiarDato($apellido_ = $_POST["apellido"]);
	$sanitizar->limpiarDato($nombre_ = $_POST["nombre"]);
	$sanitizar->limpiarDato($correo_ = $_POST["correo"]);
	$sanitizar->limpiarDato($usuario_ = $_POST["usuario"]);
	$sanitizar->limpiarDato($clave_ = $_POST["clave"]);
	$sanitizar->limpiarDato($reclave_ = $_POST["reclave"]);
	$sanitizar->limpiarDato($tipousuario_ = $_POST["tipousuario"]);
	//var_dump($sistema = $_POST["sistema"]);

	$usuario = new Usuario();
	
	$usuario->verificarUsuarioExiste($usuario_);

	if($clave_ !== $reclave_){

		die("<p style='color: red; font-family: verdana, arial; font-size: 16px'>Las claves ingresadas no coinciden. Por favor, verifique este dato y vuelva a intentarlo.</p>");

	}

	
	$usuario->agregarUsuario($apellido_, $nombre_, $correo_, $usuario_, $clave_, $tipousuario_);

	// creación del archivo log alta
	$archivo = fopen('C:\resultados\backoffice\logs\log_altas.txt', 'a');

	//fwrite($archivo, "Apellido | Nombre | Correo | Usuario | Tipo de Usuario | Fecha | Hora" . PHP_EOL); // No tiene sentido usar encabezados para los campos

	// este archivo es solo para las altas
	fwrite($archivo, $apellido_ . ', ' . $nombre_ . ', ' . $correo_ . ', ' . $usuario_ . ', ' . $tipousuario_ . ', ' . $fecha . ', ' . $hora . PHP_EOL);

	fclose($archivo);

	// excepción 
	try{
    	
    	$archivo = fopen('C:\resultados\backoffice\logs\log_altas.txt', 'a');
    
	    if(!$archivo){ //si el archivo no se puede abrir, sea por el motivo que sea
	    	
	    	throw new Exception('Error el intentar abrir el archivo.');

	    }

	}
	
	catch (Exception $e){

    	die($e->getMessage());

	}

	header('Location: agregar.php');	

?>