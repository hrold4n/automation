<?php
	
	require_once 'clases/Conexion.php';
	require_once 'clases/Ingresar.php';
	require_once 'clases/Limpiar.php';

	$conectar_bd = Conexion::instanciaDeBaseDeDatos();
	
	$sanitizar = new Limpiar();

	$sanitizar->limpiarDato($usuario = $_POST["usuario"]);
	$sanitizar->limpiarDato($clave = $_POST["clave"]);

	$ingreso = new Ingresar();

	$ingreso->validarUsuario($usuario, $clave);

?>