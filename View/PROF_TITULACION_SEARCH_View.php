<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 * Fecha: 31/01/2019
	 */

	/**
	 * Vista de la función SEARCH de la entidad
	 */
	class PROF_TITULACION_SEARCH
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
			// Añadimos la vista Header
			include '../View/Header.php';
?>
			<div class="centrado">
				<h2 class="trad_SEARCH"></h2>
			</div>

			<form name="Form" action="../Controller/PROF_TITULACION_Controller.php" method="post">
				<ul class="form-style">
					<li>
						<label><?php echo $strings['DNI']; ?></label>
						<input type="text" pattern="[0-9A-NO-Za-no-z]{0,9}" class="campo-largo" id="dni" name="dni" placeholder="<?php echo $strings['DNI']; ?>">						
					</li>
					<li>
						<label><?php echo $strings['Code']; ?></label>
						<input type="text" pattern="[A-Za-z0-9_-]{0,10}" class="campo-largo" id="CODTitulacion" name="CODTitulacion" placeholder="<?php echo $strings['CODTitulacion']; ?>">
					</li>
					<li>
						<label><?php echo $strings['Year']; ?></label>
						<input type="text" pattern="[0-9-]{0,9}" class="campo-largo" id="anho" name="anho" placeholder="<?php echo $strings['Year']; ?>">
					</li>
					<li>
						<input type="submit" class="campo-largo" name="action" value="SEARCH">
					</li>
				</ul>
			</form>


			<a href="../Controller/PROF_TITULACION_Controller.php" class="return trad_Back"></a>		
<?php
			// Añadimos la vista Footer
			include '../View/Footer.php';
		}
	}
?>