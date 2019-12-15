<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 * Fecha: 15/12/2019
	 */

	 /**
	 * Vista de la función ADD de la entidad
	 */
	class PROFESOR_ADD
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

		<form name="Form" action="../Controller/PROFESOR_Controller.php" method="post" onsubmit="submitProfesor(this);">
			<ul class="form-style">
				
				<li>
					<label><span class="trad_FullName"></span> <span class="requerido">*</span></label>
					<input type="text" pattern="[A-Za-z][A-Za-z -]{2,14}" class="campo-dividido" id="nombre" name="nombre" required>
					<input type="text" pattern="[A-Za-z][A-Za-z -]{2,14}" class="campo-dividido" id="apellidos" name="apellidos" required>
				</li>
				<li>
				<label><span class="trad_Area"></span> <span class="requerido">*</span></label>
					<input type="text" pattern="[A-Za-z][A-Za-z -]{2,59}" class="campo-largo" id="area" name="area" required>
				</li>
				<li>
				<label><span class="trad_Department"></span> <span class="requerido">*</span></label>
					<input type="text" pattern="[A-Za-z][A-Za-z -]{2,59}" class="campo-largo" id="departamento" name="departamento" required>
				</li>
				<li>
					<label><span class="trad_DNI"></span> <span class="requerido">*</span></label>
					<input type="text" pattern="[0-9]{8}[A-NO-Za-no-z]" class="campo-dividido" id="dni" name="dni" required>

					<input type="submit" class="campo-dividido" name="action" value="ADD">
				</li>
			</ul>
		</form>


		<a href="../Controller/PROFESOR_Controller.php" class="return trad_Back"></a>
<?php
		// Añadimos la vista Footer
		include '../View/Footer.php';
	}
}
?>