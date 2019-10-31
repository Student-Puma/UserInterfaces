<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 * Fecha: 31/01/2019
	 */

	/**
	 * Vista de la función SHOWCURRENT de la entidad
	 * 
	 * @var tupla Datos de la entidad
	 */
	class TITULACION_SHOWCURRENT
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
			// Añadimos el idioma
			include_once '../Locale/Strings_'.$_SESSION['idioma'].'.php';
			// Añadimos la vista Header
			include '../View/Header.php';
?>
		<div class="centrado">
			<h2><?php echo $strings['SHOWCURRENT']; ?></h2>
		</div>

		<form name="Form" action="../Controller/TITULACION_Controller.php" method="post">
			<ul class="form-style">
				<li>
					<label><?php echo $strings['Codes']; ?></label>
					<input type="text" readonly pattern="[A-Za-z0-9][A-Za-z0-9_-]{0,9}" class="campo-dividido" id="CODTitulacion" name="CODTitulacion" placeholder="<?php echo $strings['CODTitulacion']; ?>" value="<?php echo $this->tupla['CODTITULACION']; ?>">
					<a class="weak" href="../Functions/ShowWeak.php?entity=CENTRO&key=<?php echo $this->tupla['CODCENTRO']; ?>">
						<input type="text" readonly pattern="[A-Za-z0-9][A-Za-z0-9_-]{0,9}" class="campo-dividido" id="CODCentro" name="CODCentro" placeholder="<?php echo $strings['CODCentro']; ?>" value="<?php echo $this->tupla['CODCENTRO']; ?>">
					</a>
				</li>
				<li>
					<label><?php echo $strings['Name']; ?></label>
					<input type="text" readonly pattern="[A-Za-z][A-Za-z -]{1,49}" class="campo-largo" id="nombre" name="nombre" placeholder="<?php echo $strings['Name']; ?>" value="<?php echo $this->tupla['NOMBRETITULACION']; ?>">
				</li>
				<li>
					<label><?php echo $strings['Responsable']; ?></label>
					<input type="text" readonly pattern="[A-Za-z][A-Za-z -]{2,59}" class="campo-largo" id="responsable" name="responsable" placeholder="<?php echo $strings['Responsable']; ?>" value="<?php echo $this->tupla['RESPONSABLETITULACION']; ?>">
				</li>
			</ul>
		</form>


		<a href="../Controller/TITULACION_Controller.php" class="return"><?php echo $strings['Back']; ?></a>
<?php
		// Añadimos la vista Footer
		include '../View/Footer.php';
	}
}
?>