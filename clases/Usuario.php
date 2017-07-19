<?php
	
	//error_reporting(0);
		
	require_once 'clases/Conexion.php';

	class Usuario

	{

		private $usuario_id = "";
		private $apellido = "";
		private $nombre = "";
		private $correo = "";
		private $usuario = "";
		private $clave = "";
		private $id_permiso ="";
		private $clave_hasheada = ""; 
		private $objeto_mysqli = "";
		private $registro = "";
	
		public function Usuario(){

			$this->objeto_mysqli = Conexion::instanciaDeBaseDeDatos();

		}

		public function agregarUsuario($apellido, $nombre, $correo, $usuario, $clave, $id_permiso){
			
			$this->apellido = $apellido;
			$this->nombre = $nombre;
			$this->correo = $correo;
			$this->usuario = $usuario;
			$this->clave = $clave;
			$this->id_permiso = $id_permiso;
			$this->clave_hasheada = password_hash($this->clave, PASSWORD_BCRYPT); // Codifica la contraseña
			
			if(empty($this->apellido) || empty($this->nombre) || empty($this->correo) || empty($this->usuario) || empty($this->clave) || empty($this->id_permiso)){

				die("<p style='color: red; font-family: verdana, arial; font-size: 16px'>Apellido, Nombre, Correo, Usuario, Clave y Tipo de Usuario son campos requeridos.</p>"); 
					
			}

			if($this->id_permiso === "Seleccione..."){

				die("<p style='color: red; font-family: verdana, arial; font-size: 16px'>No se seleccionó un Tipo de Usuario.</p>");

			}

			/*if($this->id_sistema === "Seleccione..."){

				die("<p style='color: red; font-family: verdana, arial; font-size: 16px'>Debe seleccionar un Sistema.</p>");

			}*/

			$this->objeto_mysqli->pasarConsulta("INSERT INTO usuarios(apellido, nombre, correo, usuario, clave, id_permiso) VALUES('$this->apellido', '$this->nombre', '$this->correo', '$this->usuario', '$this->clave_hasheada', '$this->id_permiso');");

			$this->objeto_mysqli->ejecutarConsulta();

			$this->objeto_mysqli->cerrarConexion();

		}

		function actualizarUsuario($id_usuario, $apellido, $nombre, $usuario, $correo, $id_permiso){

			$this->id_usuario = $id_usuario;
			$this->usuario = $usuario;
			$this->apellido = $apellido;
			$this->nombre = $nombre;
			//$this->clave = $clave;
			//$this->clave_hasheada = password_hash($this->clave, PASSWORD_BCRYPT);
			$this->correo = $correo;
			$this->id_permiso = $id_permiso;
			
			$this->objeto_mysqli->pasarConsulta("
				UPDATE usuarios 
				SET apellido = '$this->apellido', nombre = '$this->nombre', usuario = '$this->usuario', correo = '$this->correo', id_permiso = '$this->id_permiso' 
				WHERE id_usuario = '$this->id_usuario';");

			if(empty($this->usuario) || empty($this->apellido) || empty($this->nombre) || empty($this->correo) || empty($this->id_permiso)){

				die("<p style='color: red; font-family: verdana, arial; font-size: 16px'>Usuario, Apellido, Nombre, Correo, y Tipo de Usuario son campos requeridos.</p>"); 
					
			}

			if($this->id_permiso === "Seleccione..."){

				die("<p style='color: red; font-family: verdana, arial; font-size: 16px'>No se seleccionó un Tipo de Usuario.</p>");

			}

			$this->objeto_mysqli->ejecutarConsulta();

			$this->objeto_mysqli->cerrarConexion();

		}

		function eliminarUsuario($id_usuario){

			$this->id_usuario = $id_usuario;

			$this->objeto_mysqli->pasarConsulta("DELETE FROM usuarios WHERE id_usuario = '$this->id_usuario';");

			$this->objeto_mysqli->ejecutarConsulta();

			$this->objeto_mysqli->cerrarConexion();
			
		}

		public function listarUsuarios(){

			$this->objeto_mysqli->pasarConsulta
				("
				SELECT u.id_usuario, u.apellido, u.nombre, u.usuario, u.correo, p.descripcion
				FROM usuarios AS u
				INNER JOIN permisos as p
				ON u.id_permiso = p.id_permiso;
				");

			$this->objeto_mysqli->ejecutarConsulta();

				while($this->registro = $this->objeto_mysqli->obtenerDato()){

					echo '<tr>';
			     		echo '<td id="id_usuario">' . $this->registro["id_usuario"] . '</td>';
						echo '<td>' . $this->registro["apellido"] . '</td>';
						echo '<td>' . $this->registro["nombre"] . '</td>';
						echo '<td>' . $this->registro["usuario"] . '</td>';
						echo '<td>' . $this->registro["correo"] . '</td>';
						echo '<td>' . $this->registro["descripcion"] . '</td>';
						
						//Trigger the modal clicking the image
			    		echo '<div class="btn-group" role="group">';
			    		echo '<td class="lapiz"><a href="#editar' . $this->registro["id_usuario"] . '" data-toggle="modal"><span class="glyphicon glyphicon-edit" title="Editar"></span></a></td>';
			    		echo '<td class="ojo"><a href="#ver' . $this->registro["id_usuario"] . '" data-toggle="modal"><span class="glyphicon glyphicon-eye-open" title="Ver"></span></a></td>';
		                echo '<td class="cruz"><a href="#eliminar' . $this->registro["id_usuario"] . '" data-toggle="modal"><span class="glyphicon glyphicon-trash" title="Eliminar"></span></a></td>';
		                echo '</div>';
			     	echo '</tr>';

					//Modal Edición
				  	echo '<div id="editar' . $this->registro["id_usuario"] . '" class="modal fade" id="editar" role="dialog">';

				  		echo '<div class="modal-dialog">';

				  			echo '<div class="modal-content">';

				  				echo '<div class="modal-header">';

		          					echo '<button type="button" class="close" data-dismiss="modal" title="Cerrar">&times;</button>';

		          					echo '<h4 class="modal-title">Actualización de Datos</h4>';

		        				echo '</div>'; // cierro div class "modal-header"

		        				echo '<div class="modal-body">';
		        					
		        					echo '<form method="post" action="editar_usuario.php">';

			        					echo '<div class="input-group" class="col-sm-offset-10">';
	      									echo '<span class="input-group-addon">Id. Usuario</span>';
	      									echo '<input id="id_usuario" type="text" class="form-control" name="" value="' . $this->registro["id_usuario"] . '" disabled="true">';
	    								echo '</div>';

	    								echo '<div class="input-group" class="col-sm-offset-10">';
	      									echo '<input id="id_usuario" type="hidden" class="form-control" name="id_usuario" value="' . $this->registro["id_usuario"] . '">'; // campo oculto usado solo para enviar el id_usuario
	    								echo '</div>';

	    								echo '<br />';

			          					echo '<div class="input-group">';
	      									echo '<span class="input-group-addon">Usuario</span>';
	      									echo '<input id="usuario" type="text" class="form-control" name="usuario" Usuario" value="' . $this->registro["usuario"] . '">';
	    								echo '</div>';

	    								echo '<br />';

	    								echo '<div class="input-group">';
	      									echo '<span class="input-group-addon">Tipo</span>';
	      									echo '<input id="tipo" type="text" class="form-control" name="" value="' . $this->registro["descripcion"] . '" " disabled="true">';
	    								echo '</div>';

	    								echo '<br />';

			          					echo '<div class="input-group">';
	      									echo '<span class="input-group-addon">Apellido</span>';
	      									echo '<input id="apellido" type="text" class="form-control" name="apellido" placeholder="Ingrese Apellido" value="' . $this->registro["apellido"] . '">';
	    								echo '</div>';

	    								echo '<br />';

			          					echo '<div class="input-group">';
	      									echo '<span class="input-group-addon">Nombre</span>';
	      									echo '<input id="nombre" type="text" class="form-control" name="nombre" placeholder="Ingrese Nombre" value="' . $this->registro["nombre"] . '">';
	    								echo '</div>';

	    								echo '<br />';

	    								echo '<div class="input-group">';
		      								echo '<span class="input-group-addon">Tipo</span>';
	      									echo '<select class="form-control" id="seleccione_tipo" name="tipousuario">';
		        								echo '<option>Seleccione...</option>';
		        								echo '<option value="1">Nivel 1</option>';
		        								echo '<option value="2">Nivel 2</option>';
	      									echo '</select>';
	      								echo '</div>';

	      								echo '<br />';

			          					echo '<div class="input-group">';
	      									echo '<span class="input-group-addon">Correo</span>';
	      									echo '<input id="correo" type="text" class="form-control" name="correo" placeholder="Ingrese Correo Electrónico" value="' . $this->registro["correo"] . '">';
	    								echo '</div>';
										
	    								echo '<br />';

			        				echo '</div>'; // cierro div class "modal-body"

			        				echo '<div class="modal-footer">';

			        					echo '<button type="submit" class="btn btn-primary" title="Guardar Cambios">Guardar Cambios</button>';
			        					echo '<button type="button" id="cerrar_editar" class="btn btn-secondary" title="Cerrar" data-dismiss="modal">Cancelar</button>';

		        					echo '</form>';	

		        				echo '</div>'; // cierro div class "modal-footer"

				  			echo '</div>'; // cierro div class "model-content"

				  		echo '</div>'; // cierro div class "modal-dialog"

				  	echo '</div>'; // cierro div class "modal-dade"

				  	//Modal Visualización
				  	echo '<div id="ver' . $this->registro["id_usuario"] . '" class="modal fade" id="ver" role="dialog">';

				  		echo '<div class="modal-dialog">';

				  			echo '<div class="modal-content">';

				  				echo '<div class="modal-header">';

		          					echo '<button type="button" class="close" data-dismiss="modal" title="Cerrar">&times;</button>';

		          					echo '<h4 class="modal-title">Información Detallada</h4>';

		        				echo '</div>'; // cierro div class "modal-header"

		        				echo '<div class="modal-body">';
		        					
		        					echo '<div class="input-group">';
      									echo '<label>Id Usuario: ' . $this->registro["id_usuario"] . '</label>';
    								echo '</div>';

    								echo '<div class="input-group">';
      									echo '<label>Usuario: ' . $this->registro["usuario"] . '</label>';
    								echo '</div>';

    								echo '<div class="input-group">';
      									echo '<label>Apellido: ' . $this->registro["apellido"] . '</label>';
    								echo '</div>';

    								echo '<div class="input-group">';
      									echo '<label>Nombre: ' . $this->registro["nombre"] . '</label>';
    								echo '</div>';

    								echo '<div class="input-group">';
      									echo '<label>Tipo: ' . $this->registro["descripcion"] . '</label>';
    								echo '</div>';

    								echo '<div class="input-group">';
      									echo '<label>Correo: ' . $this->registro["correo"] . '</label>';
    								echo '</div>';

		        				echo '</div>'; // cierro div class "modal-body"

		        				echo '<div class="modal-footer">';
		        					
		        					echo '<button type="button" id="cerrar_visualizar" class="btn btn-secondary" title="Cerrar" data-dismiss="modal">Cerrar</button>';
		        
		        				echo '</div>'; // cierro div class "modal-footer"

				  			echo '</div>'; // cierro div class "model-content"

				  		echo '</div>'; // cierro div class "modal-dialog"

				  	echo '</div>'; // cierro div class "modal-dade"

				  	//Modal Eliminación
				  	echo '<div id="eliminar' . $this->registro["id_usuario"] . '" class="modal fade" id="eliminar" role="dialog">';

				  		echo '<div class="modal-dialog">';

				  			echo '<div class="modal-content">';

				  				echo '<div class="modal-header">';

		          					echo '<button type="button" class="close" data-dismiss="modal" title="Cerrar">&times;</button>';

		          					echo '<h4 class="modal-title">Atención!!!</h4>';

		        				echo '</div>'; // cierro div class "modal-header"

		        					echo '<div class="alert alert-danger">';
      									echo '<strong>¿Está seguro que desea eliminar el registro "' . $this->registro["nombre"] . ' ' . $this->registro["apellido"] . '"?</strong>';
    								echo '</div>';
		        				
		        				echo '<div class="modal-body">';

		        				echo '<form method="post" action="eliminar_usuario.php">';

			        				echo '<div class="input-group" class="col-sm-offset-10">';
	      									echo '<input id="id_usuario" type="hidden" class="form-control" name="id_usuario" value="' . $this->registro["id_usuario"] . '">'; // campo oculto usado solo para enviar el id_usuario
	    								echo '</div>';

			        				echo '<div class="modal-footer">';
			        				
			        					echo '<button type="button" id="cancelar_eliminar" class="btn btn-secondary" title="Cancelar" data-dismiss="modal">Cancelar</button>';
			        					echo '<button type="submit" class="btn btn-primary" title="Aceptar">Aceptar</button>';
		        					
		        				echo '</form>';	

		        				echo '</div>'; // cierro div class "modal-footer"

		        				echo '</div>'; // cierro div class "modal-body"

		        				echo '</div>'; // cierro div class "modal-footer"

				  			echo '</div>'; // cierro div class "model-content"

				  		echo '</div>'; // cierro div class "modal-dialog"

				  	echo '</div>'; // cierro div class "modal-dade"

				}

		    $this->objeto_mysqli->cerrarConexion();

		}

		public function verificarUsuarioExiste($usuario){ // método que verifica si el usuario ya existe

			$this->usuario = $usuario; // mfox

			$this->objeto_mysqli->pasarConsulta("SELECT usuario FROM usuarios WHERE usuario = '$this->usuario';");

			$this->objeto_mysqli->ejecutarConsulta();

			$this->registro = $this->objeto_mysqli->obtenerNumeroFilas();

			if($this->registro >= 1){

				die("<p style='color: red; font-family: verdana, arial; font-size: 16px'>El Usuario ingresado ya existe. Por favor, elija otro y vuelva a intentarlo.</p>");
					
			}

			/*else{

				echo "Usuario Disponible"; 

			}*/

		}
			
	}

	/* prueba el alta, baja, modificación de usuario */
	//$conectar_bd = Conexion::instanciaDeBaseDeDatos();
	//$usuario = new Usuario();
	//$usuario->listarUsuarios();
	//$usuario->agregarUsuario("r", "r", "r", 'r', 'r', "1");
	//$usuario->actualizarUsuario("215", "He", "Man", "heman", "heman@porelpoderdegrayskull.com", "1");
	//$usuario->eliminarUsuario("146");
	//$usuario->verificarUsuarioExiste("jmas");

?>