<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 * Fecha: 31/01/2019
	 */

	/**
	 * Vista de la función EDIT de la entidad
	 * 
	 * @var tupla Datos de la entidad
	 */
	class ESPACIO_EDIT
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

		<form name="Form" action="../Controller/ESPACIO_Controller.php" method="post" onsubmit="submitEspacio(this);">
			<ul class="form-style">
				<li>
					<label><span class="trad_Type"></span> <span class="requerido">*</span></label>
					<select class="campo-largo" id="tipo" name="tipo" required>
						<option value="DESPACHO" <?php if($this->tupla['TIPO'] == "DESPACHO") { echo "selected"; } ?> class="trad_DESPACHO"></option>
						<option value="LABORATORIO" <?php if($this->tupla['TIPO'] == "LABORATORIO") { echo "selected"; } ?> class="trad_LABORATORIO"></option>
						<option value="PAS" <?php if($this->tupla['TIPO'] == "PAS") { echo "selected"; } ?> class="trad_PAS"></option>
					</select>
				</li>
				<li>
					<label><span class="trad_Details"></span> <span class="requerido">*</span></label>
					<input type="text" pattern="[0-9]{1,4}" class="campo-dividido" id="superficie" name="superficie" placeholder="m²" value="<?php echo $this->tupla['SUPERFICIEESPACIO']; ?>" required>
					<input type="text" pattern="[0-9]{1,8}" class="campo-dividido" id="numinventario" name="numinventario" placeholder="Nº" value="<?php echo $this->tupla['NUMINVENTARIOESPACIO']; ?>" required>
				</li>
				<li>
					<label class="campo-dividido"><span class="trad_Codes"> <span class="requerido">*</span></label>
					<input type="text" pattern="[A-Za-z0-9][A-Za-z0-9_-]{0,9}" class="campo-dividido" id="CODEdificio" name="CODEdificio" placeholder="EDIFICIO" value="<?php echo $this->tupla['CODEDIFICIO']; ?>" required>
					<input type="text" pattern="[A-Za-z0-9][A-Za-z0-9_-]{0,9}" class="campo-dividido" id="CODCentro" name="CODCentro" placeholder="CENTRO" value="<?php echo $this->tupla['CODCENTRO']; ?>" required>
				</li>
				<li>
					<input type="text" readonly class="campo-dividido" id="CODEspacio" name="CODEspacio" placeholder="COD" value="<?php echo $this->tupla['CODESPACIO']; ?>" required>

					<input type="submit" class="campo-dividido" name="action" value="EDIT">
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

	