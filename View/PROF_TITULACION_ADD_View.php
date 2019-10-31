<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 * Fecha: 11/01/2019
	 */

	/**
	 * Vista de la función ADD de la entidad
	 */
	class PROF_TITULACION_ADD
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

			<form name="Form" action="../Controller/PROF_TITULACION_Controller.php" method="post">
				<ul class="form-style">
					<li>
						<label><?php echo $strings['DNI']; ?> <span class="requerido">*</span></label>
						<input type="text" pattern="[0-9]{8}[A-NO-Za-no-z]" class="campo-largo" id="dni" name="dni" placeholder="<?php echo $strings['DNI']; ?>" required>						
					</li>
					<li>
						<label><?php echo $strings['Code']; ?> <span class="requerido">*</span></label>
						<input type="text" pattern="[A-Za-z0-9][A-Za-z0-9_-]{0,9}" class="campo-largo" id="CODTitulacion" name="CODTitulacion" placeholder="<?php echo $strings['CODTitulacion']; ?>" required>
					</li>
					<li>
						<label><?php echo $strings['Year']; ?> <span class="requerido">*</span></label>
						<input type="text" pattern="20[0-2][0-9]-20[0-2][0-9]" value="2019-2020" class="campo-largo" id="anho" name="anho" placeholder="<?php echo $strings['Year']; ?>" required>
					</li>
					<li>
						<input type="submit" class="campo-largo" name="action" value="ADD">
					</li>
				</ul>
			</form>


			<a href="../Controller/PROF_TITULACION_Controller.php" class="return"><?php echo $strings['Back']; ?></a>		
<?php
			// Añadimos la vista Footer
			include '../View/Footer.php';
		}
	}
?>