<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 * Fecha: 15/12/2019
	 */

	/**
	 * Vista de la función SEARCH de la entidad
	 */
	class ESPACIO_SEARCH
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

		<form name="Form" action="../Controller/ESPACIO_Controller.php" method="post">
			<ul class="form-style">
				<li>
					<label class="trad_Type"></label>
					<select class="campo-largo" id="tipo" name="tipo">
						<option selected value="" class="trad_OptionNone"></option>
						<option value="DESPACHO" class="trad_DESPACHO"></option>
						<option value="LABORATORIO" class="trad_LABORATORIO"></option>
						<option value="PAS" class="trad_PAS"></option>
					</select>
				</li>
				<li>
					<label class="trad_Details"></label>
					<input type="text" pattern="[0-9]{1,4}" class="campo-dividido" id="superficie" name="superficie" placeholder="m²">
					<input type="text" pattern="[0-9]{1,8}" class="campo-dividido" id="numinventario" name="numinventario" placeholder="Nº">
				</li>
				<li>
					<label class="trad_Codes"></label>
					<input type="text" pattern="[0-9A-Za-z-]{0,10}" class="campo-dividido" id="CODEdificio" name="CODEdificio" placeholder="EDIFICIO">
					<input type="text" pattern="[0-9A-Za-z-]{0,10}" class="campo-dividido" id="CODCentro" name="CODCentro" placeholder="CENTRO">
				</li>
				<li>
					<input type="text" pattern="[0-9A-Za-z-]{0,10}" class="campo-dividido" id="CODEspacio" name="CODEspacio" placeholder="COD">

					<input type="submit" class="campo-dividido" name="action" value="SEARCH">
				</li>
			</ul>
		</form>


		<a href="../Controller/ESPACIO_Controller.php" class="return trad_Back"></a>
<?php
		// Añadimos la vista Footer
		include '../View/Footer.php';
	}
}
?>