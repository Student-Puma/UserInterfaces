<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 * Fecha: 31/01/2019
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
			// Añadimos el idioma
			include_once '../Locale/Strings_'.$_SESSION['idioma'].'.php';
			// Añadimos la vista Header
			include '../View/Header.php';
?>
		<div class="centrado">
			<h2><?php echo $strings['SEARCH']; ?></h2>
		</div>

		<form name="Form" action="../Controller/ESPACIO_Controller.php" method="post">
			<ul class="form-style">
				<li>
					<label><?php echo $strings['Type']; ?></label>
					<select class="campo-largo" id="tipo" name="tipo">
						<option selected value=""><?php echo $strings['OptionNone']; ?></option>
						<option value="DESPACHO"><?php echo $strings['DESPACHO']; ?></option>
						<option value="LABORATORIO"><?php echo $strings['LABORATORIO']; ?></option>
						<option value="PAS"><?php echo $strings['PAS']; ?></option>
					</select>
				</li>
				<li>
					<label><?php echo $strings['Details']; ?></label>
					<input type="text" pattern="[0-9]{1,4}" class="campo-dividido" id="superficie" name="superficie" placeholder="<?php echo $strings['Surface']; ?>">
					<input type="text" pattern="[0-9]{1,8}" class="campo-dividido" id="numinventario" name="numinventario" placeholder="<?php echo $strings['NumInvent']; ?>">
				</li>
				<li>
					<label><?php echo $strings['Codes']; ?></label>
					<input type="text" pattern="[A-Za-z0-9_-]{1,10}" class="campo-dividido" id="CODEdificio" name="CODEdificio" placeholder="<?php echo $strings['CODEdificio']; ?>">
					<input type="text" pattern="[A-Za-z0-9_-]{1,10}" class="campo-dividido" id="CODCentro" name="CODCentro" placeholder="<?php echo $strings['CODCentro']; ?>">
				</li>
				<li>
					<input type="text" pattern="[A-Za-z0-9_-]{1,10}" class="campo-dividido" id="CODEspacio" name="CODEspacio" placeholder="<?php echo $strings['CODEspacio']; ?>">

					<input type="submit" class="campo-dividido" name="action" value="SEARCH">
				</li>
			</ul>
		</form>


		<a href="../Controller/ESPACIO_Controller.php" class="return"><?php echo $strings['Back']; ?></a>
<?php
		// Añadimos la vista Footer
		include '../View/Footer.php';
	}
}
?>