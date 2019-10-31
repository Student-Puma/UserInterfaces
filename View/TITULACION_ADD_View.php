<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 * Fecha: 31/01/2019
	 */

	/**
	 * Vista de la función ADD de la entidad
	 */
	class TITULACION_ADD
	{
		/**
		 * Constructor de la clase
		 */
		function __construct()
		{	
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
			<h2><?php echo $strings['ADD']; ?></h2>
		</div>

		<form name="Form" action="../Controller/TITULACION_Controller.php" method="post">
			<ul class="form-style">
				<li>
					<label><?php echo $strings['Codes']; ?> <span class="requerido">*</span></label>
					<input type="text" pattern="[A-Za-z0-9][A-Za-z0-9_-]{0,9}" class="campo-dividido" id="CODTitulacion" name="CODTitulacion" placeholder="<?php echo $strings['CODTitulacion']; ?>" required>
					<input type="text" pattern="[A-Za-z0-9][A-Za-z0-9_-]{0,9}" class="campo-dividido" id="CODCentro" name="CODCentro" placeholder="<?php echo $strings['CODCentro']; ?>" required>
				</li>
				<li>
					<label><?php echo $strings['Name']; ?> <span class="requerido">*</span></label>
					<input type="text" pattern="[A-Za-z][A-Za-z -]{1,49}" class="campo-largo" id="nombre" name="nombre" placeholder="<?php echo $strings['Name']; ?>" required>
				</li>
				<li>
					<label><?php echo $strings['Responsable']; ?> <span class="requerido">*</span></label>
					<input type="text" pattern="[A-Za-z][A-Za-z -]{2,59}" class="campo-largo" id="responsable" name="responsable" placeholder="<?php echo $strings['Responsable']; ?>" required>
				</li>
				<li>
					<input type="submit" class="campo-largo" name="action" value="ADD">
				</li>
			</ul>
		</form>


		<a href="../Controller/TITULACION_Controller.php" class="return"><?php echo $strings['Back']; ?></a>
<?php
		// Añadimos la vista Footer
		include '../View/Footer.php';
	}
}
?>