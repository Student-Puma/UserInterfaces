<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 * Fecha: 15/12/2019
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
			// Añadimos la vista Header
			include '../View/Header.php';
?>
			<div class="centrado">
				<h2 class="trad_SEARCH"></h2>
			</div>

			<form name="Form" action="../Controller/PROF_ESPACIO_Controller.php" method="post">
				<ul class="form-style">
					<li>
						<label class="trad_DNI"></label>
						<input type="text" pattern="[0-9A-NO-Za-no-z]{1,9}" class="campo-largo" id="dni" name="dni">						
					</li>
					<li>
						<label class="trad_Code"></label>
						<input type="text" pattern="[0-9A-Za-z-]{0,10}" class="campo-largo" id="CODEspacio" name="CODEspacio">
					</li>
					<li>
						<input type="submit" class="campo-largo" name="action" value="SEARCH">
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