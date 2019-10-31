<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 * Fecha: 31/01/2019
	 */

	/**
	 * Vista de la función EDIT de la entidad
	 * 
	 * @var tupla Datos de la entidad
	 */
	class CENTRO_EDIT
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
			// Añadimos el idioma
			include_once '../Locale/Strings_'.$_SESSION['idioma'].'.php';
			// Añadimos la vista Header
			include '../View/Header.php';
?>
		<div class="centrado">
			<h2><?php echo $strings['EDIT']; ?></h2>
		</div>

		<form name="Form" action="../Controller/CENTRO_Controller.php" method="post">
			<ul class="form-style">
				<li>
					<label><?php echo $strings['Codes']; ?> <span class="requerido">*</span></label>
					<input type="text" readonly pattern="[A-Za-z0-9][A-Za-z0-9_-]{0,9}" class="campo-dividido" id="CODCentro" name="CODCentro" placeholder="<?php echo $strings['CODCentro']; ?>" value='<?php echo $this->tupla['CODCENTRO']; ?>' required>
					<input type="text" pattern="[A-Za-z0-9][A-Za-z0-9_-]{0,9}" class="campo-dividido" id="CODEdificio" name="CODEdificio" placeholder="<?php echo $strings['CODEdificio']; ?>" value='<?php echo $this->tupla['CODEDIFICIO']; ?>' required>
				</li>
				<li>
					<label><?php echo $strings['Name']; ?> <span class="requerido">*</span></label>
					<input type="text" pattern="[A-Za-z][A-Za-z -]{1,49}" class="campo-largo" id="nombre" name="nombre" placeholder="<?php echo $strings['Name']; ?>" value='<?php echo $this->tupla['NOMBRECENTRO']; ?>' required>
				</li>
				<li>
				<label><?php echo $strings['Address']; ?> <span class="requerido">*</span></label>
					<input type="text" pattern="[A-Za-z][A-Za-z0-9 ,.ºª\\-]{2,149}" class="campo-largo" id="direccion" name="direccion" placeholder="<?php echo $strings['Address']; ?>" value='<?php echo $this->tupla['DIRECCIONCENTRO']; ?>' required>
				</li>
				<li>
					<label><?php echo $strings['Responsable']; ?> <span class="requerido">*</span></label>
					<input type="text" pattern="[A-Za-z][A-Za-z -]{2,59}" class="campo-largo" id="responsable" name="responsable" placeholder="<?php echo $strings['Responsable']; ?>" value='<?php echo $this->tupla['RESPONSABLECENTRO']; ?>' required>
				</li>
				<li>
					<input type="submit" class="campo-largo" name="action" value="EDIT">
				</li>
			</ul>
		</form>


		<a href="../Controller/CENTRO_Controller.php" class="return"><?php echo $strings['Back']; ?></a>
<?php
		// Añadimos la vista Footer
		include '../View/Footer.php';
	}
}
?>