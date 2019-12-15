<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 * Fecha: 15/12/2019
	 */

	/**
	 * Vista de la función ADD de la entidad
	 */
	class PROF_ESPACIO_ADD
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
				<h2 class="trad_ADD"></h2>
			</div>

			<form name="Form" action="../Controller/PROF_ESPACIO_Controller.php" method="post">
				<ul class="form-style">
					<li>
						<label><span class="trad_DNI"></span> <span class="requerido">*</span></label>
						<input type="text" pattern="[0-9]{8}[A-NO-Za-no-z]" class="campo-largo" id="dni" name="dni" required>						
					</li>
					<li>
						<label><span class="trad_Code"></span> <span class="requerido">*</span></label>
						<input type="text" pattern="[0-9A-Za-z-]{1,10}" class="campo-largo" id="CODEspacio" name="CODEspacio" required>
					</li>
					<li>
						<input type="submit" class="campo-largo" name="action" value="ADD">
					</li>
				</ul>
			</form>


			<a href="../Controller/PROF_ESPACIO_Controller.php" class="return trad_Back"></a>		
<?php
			// Añadimos la vista Footer
			include '../View/Footer.php';
		}
	}
?>

