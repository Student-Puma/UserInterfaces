<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 * Fecha: 31/01/2019
	 */

	/**
	 * Vista de la función SEARCH de la entidad
	 */
	class CENTRO_SEARCH
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

		<form name="Form" action="../Controller/CENTRO_Controller.php" method="post">
			<ul class="form-style">
				<li>
					<label class="trad_Codes"></label>
					<input type="text" pattern="[A-Za-z0-9_-]{1,10}" class="campo-dividido" id="CODCentro" name="CODCentro" placeholder="CENTRO">
					<input type="text" pattern="[A-Za-z0-9_-]{1,10}" class="campo-dividido" id="CODEdificio" name="CODEdificio" placeholder="EDIFICIO">
				</li>
				<li>
					<label class="trad_Name"></label>
					<input type="text" pattern="[A-Za-z -]{1,50}" class="campo-largo" id="nombre" name="nombre">
				</li>
				<li>
				<label class="trad_Address"></label>
					<input type="text" pattern="[A-Za-z0-9 ,.ºª\\-]{1,150}" class="campo-largo" id="direccion" name="direccion">
				</li>
				<li>
					<label class="trad_Responsable"></label>
					<input type="text" pattern="[A-Za-z -]{1,60}" class="campo-largo" id="responsable" name="responsable">
				</li>
				<li>
					<input type="submit" class="campo-largo" name="action" value="SEARCH">
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