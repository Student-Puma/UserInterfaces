<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 * Fecha: 15/12/2019
	 */

	/**
	 * Vista de la función EDIT de la entidad
	 * 
	 * @var tupla Datos de la entidad
	 */
	class EDIFICIO_EDIT
	{
		/**
		 * Constructor de la clase
		 */
		function __construct($tupla)
		{	
			$this->tupla = $tupla;
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
			<h2 class="trad_EDIT"></h2>
		</div>

		<form name="Form" action="../Controller/EDIFICIO_Controller.php" method="post" onsubmit="submitEdificio(this);">
			<ul class="form-style">
				
				<li>
					<label><span class="trad_Name"> <span class="requerido">*</span></label>
					<input type="text" pattern="[A-Za-zÁÉÍÓÚáéíóúïüÏÜ ]{3,50}" class="campo-largo" id="nombre" name="nombre" value='<?php echo $this->tupla['NOMBREEDIFICIO']; ?>' required>
				</li>
				<li>
				<label><span class="trad_Address"></span> <span class="requerido">*</span></label>
					<input type="text" pattern="[A-Za-z][A-Za-z0-9 ,.ºª\\-]{2,149}" class="campo-largo" id="direccion" name="direccion" value='<?php echo $this->tupla['DIRECCIONEDIFICIO']; ?>' required>
				</li>
				<li>
				<label><span class="trad_Campus"></span> <span class="requerido">*</span></label>
					<input type="text" pattern="[A-Za-z0-9][A-Za-z0-9 ,.ºª\\-]{0,9}" class="campo-largo" id="campus" name="campus" value='<?php echo $this->tupla['CAMPUSEDIFICIO']; ?>' required>
				</li>
				<li>
					<label><span class="trad_Code"></span> <span class="requerido">*</span></label>
					<input type="text" readonly class="campo-dividido" id="CODEdificio" name="CODEdificio" value='<?php echo $this->tupla['CODEDIFICIO']; ?>' required>

					<input type="submit" class="campo-dividido" name="action" value="EDIT">
				</li>
			</ul>
		</form>


		<a href="../Controller/EDIFICIO_Controller.php" class="return trad_Back"></a>
<?php
		// Añadimos la vista Footer
		include '../View/Footer.php';
	}
}
?>