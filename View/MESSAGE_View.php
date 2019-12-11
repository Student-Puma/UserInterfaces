<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 * Fecha: 31/01/2019
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
?>
				<span class="msg"><?php echo $strings[$this->datos]; ?></span>
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

			<a href="<?php echo $this->volver; ?>" class="return"><?php echo $strings['Back']; ?></a>
<?php
			// Añadimos la vista Footer
			include '../View/Footer.php';
		} //
	} // fin de clase
?>