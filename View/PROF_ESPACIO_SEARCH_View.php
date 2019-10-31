<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 * Fecha: 31/01/2019
	 */

	/**
	 * Vista de la función SEARCH de la entidad
	 */
	class PROF_ESPACIO_SEARCH
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
				<h2><?php echo $strings['SEARCH']; ?></h2>
			</div>

			<form name="Form" action="../Controller/PROF_ESPACIO_Controller.php" method="post">
				<ul class="form-style">
					<li>
						<label><?php echo $strings['DNI']; ?></label>
						<input type="text" pattern="[0-9A-NO-Za-no-z]{1,9}" class="campo-largo" id="dni" name="dni" placeholder="<?php echo $strings['DNI']; ?>">						
					</li>
					<li>
						<label><?php echo $strings['Code']; ?></label>
						<input type="text" pattern="[A-Za-z0-9_-]{1,10}" class="campo-largo" id="CODEspacio" name="CODEspacio" placeholder="<?php echo $strings['CODEspacio']; ?>">
					</li>
					<li>
						<input type="submit" class="campo-largo" name="action" value="SEARCH">
					</li>
				</ul>
			</form>


			<a href="../Controller/PROF_ESPACIO_Controller.php" class="return"><?php echo $strings['Back']; ?></a>		
<?php
			// Añadimos la vista Footer
			include '../View/Footer.php';
		}
	}
?>