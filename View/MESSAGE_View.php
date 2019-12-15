<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 * Fecha: 15/12/2019
	 */

	/**
	 * Vista de mensajes
	 * 
	 * @param string Índice del texto a mostrar
	 * @param volver Localización de retorno
	 */
	class MESSAGE{
		// Variables de la clase
		private $datos; 
		private $volver;

		/**
		 * Constructor de la clase
		 */
		function __construct($datos, $volver){
			$this->datos = $datos;
			$this->volver = $volver;	
			$this->render();
		}

		/**
		 * Renderizado de la vista
		 */
		function render()
		{
			// Añadimos la vista Header
			include '../View/Header.php';
?>
			<div class="centrado">
<?php
			if(is_string($this->datos))
			{
				$msg = "Error";
				switch($this->datos)
				{
					case "Error de gestor de base de datos": $msg = "Error-SGDB"; break;
					case "Inserción fallida: el elemento ya existe": $msg = "Insercion-fallida"; break;
					case "Inserción realizada con éxito": $msg = "Insercion-realizada"; break;
					case "Borrado realizado con éxito": $msg = "Borrado-realizado"; break;
					case "Actualización realizada con éxito": $msg = "Actualizacion-realizada"; break;
					case "El login no existe": $msg = "Error-Login"; break;
					case "La password para este usuario no es correcta": $msg = "Error-Password"; break;
					case "El usuario ya existe": $msg = "Error-User"; break;
					case "Error en la inserción": $msg = "Error-Insert"; break;
					default: $msg = "Error";
				}
?>
				<span class="msg trad_<?php echo $msg; ?>"></span>
<?php
			}
			else
			{
?>
				<table>
					<thead>
						<tr>
							<th>Código</th>
							<th>Atributo</th>
							<th>Error</th>
						</tr>
					</thead>
					<tbody>
<?php
				foreach($this->datos as $errores)
				{
?>
						<tr>
							<td><?php echo($errores['codigo']); ?></td>
							<td><?php echo($errores['atributo']); ?></td>
							<td><?php echo($errores['incidencia']); ?></td>
						</tr>
<?php
				}
?>
					</tbody>
				</table>
<?php
			}
?>
			</div>

			<a href="<?php echo $this->volver; ?>" class="return trad_Back"></a>
<?php
			// Añadimos la vista Footer
			include '../View/Footer.php';
		} //
	} // fin de clase
?>