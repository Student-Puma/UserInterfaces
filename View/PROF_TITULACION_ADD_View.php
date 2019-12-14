<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 * Fecha: 31/01/2019
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
			// Añadimos la vista Header
			include '../View/Header.php';
?>
			<div class="centrado">
				<h2 class="trad_ADD"></h2>
			</div>

			<form name="Form" action="../Controller/PROF_TITULACION_Controller.php" method="post">
				<ul class="form-style">
					<li>
						<label><span class="trad_DNI"></span> <span class="requerido">*</span></label>
						<input type="text" pattern="[0-9]{8}[A-NO-Za-no-z]" class="campo-largo" id="dni" name="dni" required>						
					</li>
					<li>
						<label><span class="trad_Code"></span> <span class="requerido">*</span></label>
						<input type="text" pattern="[A-Za-z0-9][A-Za-z0-9_-]{0,9}" class="campo-largo" id="CODTitulacion" name="CODTitulacion" required>
					</li>
					<li>
						<label><span class="trad_Year"></span> <span class="requerido">*</span></label>
						<input type="text" pattern="20[0-2][0-9]-20[0-2][0-9]" value="2019-2020" class="campo-largo" id="anho" name="anho" onblur="comprobarAnho(this);" required>
					</li>
					<li>
						<input type="submit" class="campo-largo" name="action" value="ADD">
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