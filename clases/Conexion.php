<?php

	error_reporting(0);

	class Conexion
	{
 
        // clase usada para conectar la base de datos, ejecutar consultas y obtener resultados de las mismas

        private static $instancia_BD = NULL;
        
        private $servidor = "localhost";
        private $usuario = "root";
        private $clave = "";
        private $basededatos = "automation";
        private $objeto_mysqli = "";
        private $consulta = "";
        private $resultado = "";
        private $registro = "";
        
        private function Conexion(){ // método constructor que inicializa los métodos conectarBaseDeDatos y erroresDeConexion
            
            $this->conectarBaseDeDatos();
            $this->mostrarMensajesDeError();
            
        }
        
        private function __clone(){
            
        }

        public static function instanciaDeBaseDeDatos(){ // patrón singleton que garantiza que la clase solo tenga una instancia, permitiendo el acceso global hacia ella 

            if(!isset(self::$instancia_BD)){

                self::$instancia_BD = new self();

            }
            
            return self::$instancia_BD;

        }
        
		public function conectarBaseDeDatos(){ // método que conecta la base de datos
				
            $this->objeto_mysqli = new mysqli($this->servidor, $this->usuario, $this->clave, $this->basededatos);
			
            return $this->objeto_mysqli;
               
		}
        
        public function mostrarMensajesDeError(){ // método que devuelve el código y descripción del error ocurrido durante la conexión a la base de datos
            
            if($this->objeto_mysqli->connect_errno){
                
                die(nl2br("<p style='color: red; font-family: verdana, arial; font-size: 16px'>La conexión no se pudo establecer." . "\n" . "Código de Error: " .  $this->objeto_mysqli->connect_errno . "\n" . "Descripción: " . $this->objeto_mysqli->connect_error . "</p>"));
                
            }
            
            /*else{ // este mensaje es solo con el fin de probar la conexión a la base de datos, luego se deberá comentar.
                    
                echo "<p style='color: green; font-family: verdana, arial; font-size: 16px'>Conexión establecida.</p>";
                
            }*/
            
        }
        
        public function pasarConsulta($consulta){ // método que pasa la consulta SQL
            
            $this->consulta = $consulta;
            
        }
        
        public function ejecutarConsulta(){ // método que ejecuta la consulta SQL
            
            $this->resultado = $this->objeto_mysqli->query($this->consulta);
            
            return $this->resultado;
            
        }
        
        public function obtenerDato(){ // método que obtiene los datos de las tablas
                    
            $this->registro = $this->resultado->fetch_array(MYSQL_BOTH);
            
            return $this->registro;        
            
        }
        
        public function obtenerNumeroFilas(){ // método que obtiene el número de registro de las tablas
                    
            $this->registro = $this->resultado->num_rows;

            return $this->registro;
            
        }

        public function cerrarConexion(){ // método que cierra la conexión a la base de datos.
                
            $this->objeto_mysqli->close();         
            
        }
       
    }

    /* prueba la conexión a la base de datos */
    //$conectar_bd = Conexion::instanciaDeBaseDeDatos();
    //$conectar_bd->pasarConsulta("SELECT usuario FROM usuarios;");
    //$conectar_bd->ejecutarConsulta();
    //echo $conectar_bd->obtenerNumeroFilas();

?>