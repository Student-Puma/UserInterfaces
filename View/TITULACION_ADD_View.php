<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 * Fecha: 15/12/2019
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
			// Añadimos la vista Header
			include '../View/Header.php';
?>
		<div class="centrado">
			<h2 class="trad_ADD"></h2>
		</div>

		<form name="Form" action="../Controller/TITULACION_Controller.php" method="post" onsubmit="submitTitulacion(this);">
			<ul class="form-style">
				<li>
					<label><span class="trad_Codes"></span> <span class="requerido">*</span></label>
					<input type="text" pattern="[0-9A-Za-z]{1,10}" class="campo-dividido" id="CODTitulacion" name="CODTitulacion" placeholder="COD" required>
					<input type="text" pattern="[0-9A-Za-z-]{1,10}" class="campo-dividido" id="CODCentro" name="CODCentro" placeholder="CENTRO" required>
				</li>
				<li>
					<label><span class="trad_Name"></span> <span class="requerido">*</span></label>
					<input type="text" pattern="[A-Za-zÁÉÍÓÚáéíóúïüÏÜ ]{3,50}" class="campo-largo" id="nombre" name="nombre" required>
				</li>
				<li>
					<label><span class="trad_Responsable"></span> <span class="requerido">*</span></label>
					<input type="text" pattern="[A-Za-z][A-Za-z -]{2,59}" class="campo-largo" id="responsable" name="responsable" required>
				</li>
				<li>
					<input type="submit" class="campo-largo" name="action" value="ADD">
				</li>
			</ul>
		</form>


		<a href="../Controller/TITULACION_Controller.php" class="return trad_Back"></a>
<?php
		// Añadimos la vista Footer
		include '../View/Footer.php';
	}
}
?>