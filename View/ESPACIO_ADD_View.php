<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 * Fecha: 31/01/2019
	 */

	/**
	 * Vista de la función ADD de la entidad
	 */
	class ESPACIO_ADD
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

		<form name="Form" action="../Controller/ESPACIO_Controller.php" method="post" onsubmit="submitEspacio(this);">
			<ul class="form-style">
				<li>
					<label><?php echo $strings['Type']; ?> <span class="requerido">*</span></label>
					<select class="campo-largo" id="tipo" name="tipo" required>
						<option value="DESPACHO" selected><?php echo $strings['DESPACHO']; ?></option>
						<option value="LABORATORIO"><?php echo $strings['LABORATORIO']; ?></option>
						<option value="PAS"><?php echo $strings['PAS']; ?></option>
					</select>
				</li>
				<li>
					<label><?php echo $strings['Details']; ?> <span class="requerido">*</span></label>
					<input type="text" pattern="[0-9]{1,4}" class="campo-dividido" id="superficie" name="superficie" placeholder="<?php echo $strings['Surface']; ?>" required>
					<input type="text" pattern="[0-9]{1,8}" class="campo-dividido" id="numinventario" name="numinventario" placeholder="<?php echo $strings['NumInvent']; ?>" required>
				</li>
				<li>
					<label><span class="trad_Codes"> <span class="requerido">*</span></label>
					<input type="text" pattern="[A-Za-z0-9][A-Za-z0-9_-]{0,9}" class="campo-dividido" id="CODEdificio" name="CODEdificio" placeholder="<?php echo $strings['CODEdificio']; ?>" required>
					<input type="text" pattern="[A-Za-z0-9][A-Za-z0-9_-]{0,9}" class="campo-dividido" id="CODCentro" name="CODCentro" placeholder="<?php echo $strings['CODCentro']; ?>" required>
				</li>
				<li>
					<input type="text" pattern="[A-Za-z0-9][A-Za-z0-9_-]{0,9}" class="campo-dividido" id="CODEspacio" name="CODEspacio" placeholder="<?php echo $strings['CODEspacio']; ?>" required>

					<input type="submit" class="campo-dividido" name="action" value="ADD">
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