<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 * Fecha: 15/12/2019
	 */

	/**
	 * Vista de la función SEARCH de la entidad
	 */
	class PROFESOR_SEARCH
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

		<form name="Form" action="../Controller/PROFESOR_Controller.php" method="post">
			<ul class="form-style">
				
				<li>
					<label class="trad_FullName"></label>
					<input type="text" pattern="[A-Za-z -]{1,15}" class="campo-dividido" id="nombre" name="nombre">
					<input type="text" pattern="[A-Za-z -]{1,30}" class="campo-dividido" id="apellidos" name="apellidos">
				</li>
				<li>
				<label class="trad_Area"></label>
					<input type="text" pattern="[A-Za-z -]{1,60}" class="campo-largo" id="area" name="area">
				</li>
				<li>
				<label class="trad_Department"></label>
					<input type="text" pattern="[A-Za-z -]{1,60}" class="campo-largo" id="departamento" name="departamento">
				</li>
				<li>
				<label class="trad_DNI"></label>
					<input type="text" pattern="[A-NO-Za-no-z0-9]+" class="campo-dividido" id="dni" name="dni">

					<input type="submit" class="campo-dividido" name="action" value="SEARCH">
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