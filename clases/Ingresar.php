<?php
	
	session_start();

	error_reporting(0);

	require_once 'clases/Conexion.php';

	class Ingresar 

	// clase usada para validar el ingreso al sistema

	{

		private $usuario = "";
		private $clave = "";
		private $objeto_mysqli = "";
		private $registro = "";

		public function Ingresar(){

			$this->objeto_mysqli = Conexion::instanciaDeBaseDeDatos();
			
		}

		public function validarUsuario($usuario, $clave){

			$this->usuario = $usuario;
			$this->clave = $clave;

			$this->objeto_mysqli->pasarConsulta("SELECT id_usuario, usuario, clave FROM administradores WHERE usuario = '$this->usuario' AND clave = '$this->clave' LIMIT 1;");
			/*$this->objeto_mysqli->pasarConsulta("SELECT u.user_id, u.username, u.password, t.usertype FROM users AS u INNER JOIN usertypes AS t ON u.usertype_id = t.usertype_id WHERE u.username = '$this->usuario' AND u.password = '$this->clave' LIMIT 1
			");*/

			$this->objeto_mysqli->ejecutarConsulta();

			$this->registro = $this->objeto_mysqli->obtenerDato();

			if(!isset($this->usuario) || !isset($this->clave)){

				die("<p style='color: red; font-family: verdana, arial; font-size: 16px'>Usuario y/o Clave no declarados.</p>");			
			}

			if(empty($this->usuario) || empty($this->clave)){ // Si el campo Usuario y/o Clave están vacíos...

				die("<p style='color: red; font-family: verdana, arial; font-size: 16px'>Usuario y Clave son requeridos.</p>");

			}

			if($this->usuario == $this->registro["usuario"] && $this->clave == $this->registro["clave"]){ // Si el Usuario y Clave coinciden...

				echo "<p style='color: green; font-family: verdana, arial; font-size: 16px'>Usuario válido.</p>"; // este mensaje es solo con el fin de verificar que el usuario sea válido, luego se deberá comentar.

				$_SESSION["id_usuario"] = $this->registro["id_usuario"];
				$_SESSION["nombre_usuario"] = $this->registro["usuario"];
				#$_SESSION["tipo_usuario"] = $this->registro["tipo_usuario"];

				header('Location: menu.php');

			}

			else{ // Si el Usuario y/o la Clave no coinciden...

				session_unset(); // primero se vacía la variable de sesión
				session_destroy();	// y luego se elimina la misma

				die("<p style='color: red; font-family: verdana, arial; font-size: 16px'>Usuario y/o Clave inválidos.</p>");


			}

			$this->objeto_mysqli->cerrarConexion();

		}

	}
	
	/* prueba el ingreso al sistema */
	//$conectarBD = Conexion::instanciaDeBaseDeDatos();
	//$ingresar = new Ingresar();
	//$ingresar->validarUsuario("hroldan", "123456");
	
?>