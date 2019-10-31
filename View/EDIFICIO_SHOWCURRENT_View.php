<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 * Fecha: 11/01/2019
	 */

	/**
	 * Vista de la función SHOWCURRENT de la entidad
	 */
	class EDIFICIO_SHOWCURRENT
	{
		/**
		 * Constructor de la clase
		 */
		function __construct($tupla){	
			$this->tupla = $tupla;
			$this->render();
		}

		/**
		 * Renderiza la vista
		 */
		function render(){
			// Añadimos el idioma
			include_once '../Locale/Strings_'.$_SESSION['idioma'].'.php';
			// Añadimos la vista Header
			include '../View/Header.php';
?>
		<div class="centrado">
			<h2><?php echo $strings['SHOWCURRENT']; ?></h2>
		</div>

		<form name="Form" action="../Controller/EDIFICIO_Controller.php" method="post">
			<ul class="form-style">
				<li>
					<label><?php echo $strings['Code']; ?></label>
					<input type="text" readonly pattern="[A-Za-z0-9][A-Za-z0-9_-]{0,9}" class="campo-largo" id="CODEdificio" name="CODEdificio" placeholder="<?php echo $strings['CODEdificio']; ?>" value='<?php echo $this->tupla['CODEDIFICIO']; ?>' required>
				</li>
				<li>
					<label><?php echo $strings['Name']; ?></label>
					<input type="text" readonly pattern="[A-Za-z][A-Za-z0-9 -]{1,49}" class="campo-largo" id="nombre" name="nombre" placeholder="<?php echo $strings['Name']; ?>" value='<?php echo $this->tupla['NOMBREEDIFICIO']; ?>' required>
				</li>
				<li>
				<label><?php echo $strings['Address']; ?></label>
					<input type="text" readonly pattern="[A-Za-z][A-Za-z0-9 ,.ºª\\-]{2,149}" class="campo-largo" id="direccion" name="direccion" placeholder="<?php echo $strings['Address']; ?>" value='<?php echo $this->tupla['DIRECCIONEDIFICIO']; ?>' required>
				</li>
				<li>
				<label><?php echo $strings['Campus']; ?></label>
					<input type="text" readonly pattern="[A-Za-z0-9][A-Za-z0-9 ,.ºª\\-]{0,9}" class="campo-largo" id="campus" name="campus" placeholder="<?php echo $strings['Campus']; ?>" value='<?php echo $this->tupla['CAMPUSEDIFICIO']; ?>' required>
				</li>
			</ul>
		</form>


		<a href="../Controller/EDIFICIO_Controller.php" class="return"><?php echo $strings['Back']; ?></a>
<?php
		// Añadimos la vista Footer
		include '../View/Footer.php';
	}
}
?>