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
			// Añadimos el idioma
			include_once '../Locale/Strings_'.$_SESSION['idioma'].'.php';
			// Añadimos la vista Header
			include '../View/Header.php';
?>
		<div class="centrado">
			<h2><?php echo $strings['SEARCH']; ?></h2>
		</div>

		<form name="Form" action="../Controller/CENTRO_Controller.php" method="post">
			<ul class="form-style">
				<li>
					<label><?php echo $strings['Codes']; ?></label>
					<input type="text" pattern="[A-Za-z0-9_-]{1,10}" class="campo-dividido" id="CODCentro" name="CODCentro" placeholder="<?php echo $strings['CODCentro']; ?>">
					<input type="text" pattern="[A-Za-z0-9_-]{1,10}" class="campo-dividido" id="CODEdificio" name="CODEdificio" placeholder="<?php echo $strings['CODEdificio']; ?>">
				</li>
				<li>
					<label><?php echo $strings['Name']; ?></label>
					<input type="text" pattern="[A-Za-z -]{1,50}" class="campo-largo" id="nombre" name="nombre" placeholder="<?php echo $strings['Name']; ?>">
				</li>
				<li>
				<label><?php echo $strings['Address']; ?></label>
					<input type="text" pattern="[A-Za-z0-9 ,.ºª\\-]{1,150}" class="campo-largo" id="direccion" name="direccion" placeholder="<?php echo $strings['Address']; ?>">
				</li>
				<li>
					<label><?php echo $strings['Responsable']; ?></label>
					<input type="text" pattern="[A-Za-z -]{1,60}" class="campo-largo" id="responsable" name="responsable" placeholder="<?php echo $strings['Responsable']; ?>">
				</li>
				<li>
					<input type="submit" class="campo-largo" name="action" value="SEARCH">
				</li>
			</ul>
		</form>


		<a href="../Controller/CENTRO_Controller.php" class="return"><?php echo $strings['Back']; ?></a>
<?php
		// Añadimos la vista Footer
		include '../View/Footer.php';
	}
}
?>