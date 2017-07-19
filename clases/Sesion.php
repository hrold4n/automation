<?php
	
	session_start();
	
	class Sesion{

		private $id_usuario = "";
		private $nombre_usuario = "";
		
		public function validarSesion($id_usuario, $nombre_usuario){

			$this->id_usuario = $id_usuario;
			$this->nombre_usuario = $nombre_usuario;
			
			if($this->id_usuario === null || $this->nombre_usuario === null){
			
				die(header('Location: ingresar.php'));
			
			}	
			
		}
	
	}

?>