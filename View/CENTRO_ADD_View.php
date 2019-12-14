<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 * Fecha: 31/01/2019
	 */

	/**
	 * Vista de la función ADD de la entidad
	 */
	class CENTRO_ADD
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

		<form name="Form" action="../Controller/CENTRO_Controller.php" method="post" onsubmit="submitCentro(this);">
			<ul class="form-style">
				<li>
					<label><span class="trad_Codes"></span> <span class="requerido">*</span></label>
					<input type="text" pattern="[A-Za-z0-9][A-Za-z0-9_-]{0,9}" class="campo-dividido" id="CODCentro" name="CODCentro" placeholder="CENTRO" required>
					<input type="text" pattern="[A-Za-z0-9][A-Za-z0-9_-]{0,9}" class="campo-dividido" id="CODEdificio" name="CODEdificio" placeholder="EDIFICIO" required>
				</li>
				<li>
					<label><span class="trad_Name"></span> <span class="requerido">*</span></label>
					<input type="text" pattern="[A-Za-z][A-Za-z -]{1,49}" class="campo-largo" id="nombre" name="nombre" required>
				</li>
				<li>
				<label><span class="trad_Address"></span> <span class="requerido">*</span></label>
					<input type="text" pattern="[A-Za-z][A-Za-z0-9 ,.ºª\\-]{2,149}" class="campo-largo" id="direccion" name="direccion" required>
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

		<a href="../Controller/CENTRO_Controller.php" class="return trad_Back"></a>
<?php
		// Añadimos la vista Footer
		include '../View/Footer.php';
	}
}
?>