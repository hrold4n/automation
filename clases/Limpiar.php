<?php
		
	error_reporting(0);	

	class Limpiar
	{
		
		// clase usada para limpiar todos los datos ingresados por el usuario, con el fin de prevenir ataques XSS.

		private $dato = "";

		public function limpiarDato($dato){

			$this->dato = $dato;
			$this->dato = trim($dato); // remueve los espacios de ambos lados (inicio y fin).
			$this->dato = strip_tags($dato); //  remueve las etiquetas HTML, JavaScript y PHP del dato (string). 
			$this->dato = htmlentities($dato); // convierte todos los caracteres aplicables a entidades HTML.
			return $this->dato;

		}

	}

	/* prueba la limpieza de datos ingresados por el usuario */
	// $limpiar = new Limpiar(); //
	//$dato_del_usuario = "   Este es un comentario que comienza y termina con espacios.   "; // respobde a la función trim 
	//echo $limpiar->limpiarDato($dato_del_usuario); // responde a la función trim
	//echo $limpiar->limpiarDato("<script>alert('Este es un ejemplo de un ataque XSS.');</script>"); // responde a la función strip_tags
	//echo $limpiar->limpiarDato('<input type="text" value="este es un control html." />');
	
?>