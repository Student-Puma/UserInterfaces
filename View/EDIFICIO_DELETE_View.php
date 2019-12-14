<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 * Fecha: 31/01/2019
	 */

	/**
	 * Vista de la función DELETE de la entidad
	 * 
	 * @var tupla Datos de la entidad
	 */
	class EDIFICIO_DELETE
	{
		/**
		 * Constructor de la clase
		 */
		function __construct($tupla)
		{	
			$this->tupla = $tupla;
			$this->render();
		}
		
		/**
		 * Renderiza la vista
		 */
		function render()
		{
			// Añadimos la vista Header
			include '../View/Header.php';
?>
		<div class="centrado">
			<h2 class="trad_DELETE"></h2>
		</div>

		<form name="Form" action="../Controller/EDIFICIO_Controller.php" method="post">
			<ul class="form-style">
				
				<li>
					<label class="trad_Name"></label>
					<input type="text" readonly pattern="[A-Za-z][A-Za-z -]{1,49}" class="campo-largo" id="nombre" name="nombre" placeholder="<?php echo $strings['Name']; ?>" value='<?php echo $this->tupla['NOMBREEDIFICIO']; ?>' required>
				</li>
				<li>
				<label><?php echo $strings['Address']; ?></label>
					<input type="text" readonly pattern="[A-Za-z][A-Za-z0-9 ,.ºª\\-]{2,149}" class="campo-largo" id="direccion" name="direccion" placeholder="<?php echo $strings['Address']; ?>" value='<?php echo $this->tupla['DIRECCIONEDIFICIO']; ?>' required>
				</li>
				<li>
				<label><?php echo $strings['Campus']; ?></label>
					<input type="text" readonly pattern="[A-Za-z0-9][A-Za-z0-9 ,.ºª\\-]{0,9}" class="campo-largo" id="campus" name="campus" placeholder="<?php echo $strings['Campus']; ?>" value='<?php echo $this->tupla['CAMPUSEDIFICIO']; ?>' required>
				</li>
				<li>
					<label><?php echo $strings['Code']; ?></label>
					<input type="text" readonly pattern="[A-Za-z0-9][A-Za-z0-9_-]{0,9}" class="campo-dividido" id="CODEdificio" name="CODEdificio" placeholder="<?php echo $strings['CODEdificio']; ?>" value='<?php echo $this->tupla['CODEDIFICIO']; ?>' required>

					<input type="submit" readonly class="campo-dividido" name="action" value="DELETE">
				</li>
			</ul>
		</form>


		<a href="../Controller/EDIFICIO_Controller.php" class="return trad_Back"></a>
<?php
		// Añadimos la vista Footer
		include '../View/Footer.php';
	}
}
?>