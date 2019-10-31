<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 * Fecha: 11/01/2019
	 */

	/**
	 * Vista de la función DELETE de la entidad
	 * 
	 * @var tupla Datos de la entidad
	 */
	class CENTRO_DELETE
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
			<h2><?php echo $strings['DELETE']; ?></h2>
		</div>

		<form name="Form" action="../Controller/CENTRO_Controller.php" method="post">
			<ul class="form-style">
				<li>
					<label><?php echo $strings['Codes']; ?></span></label>
					<input type="text" readonly pattern="[A-Za-z0-9][A-Za-z0-9_-]{0,9}" class="campo-dividido" id="CODCentro" name="CODCentro" placeholder="<?php echo $strings['CODCentro']; ?>" value='<?php echo $this->tupla['CODCENTRO']; ?>'>
					<input type="text" readonly pattern="[A-Za-z0-9][A-Za-z0-9_-]{0,9}" class="campo-dividido" id="CODEdificio" name="CODEdificio" placeholder="<?php echo $strings['CODEdificio']; ?>" value='<?php echo $this->tupla['CODEDIFICIO']; ?>'>
				</li>
				<li>
					<label><?php echo $strings['Name']; ?></span></label>
					<input type="text" readonly pattern="[A-Za-z][A-Za-z0-9 -]{1,49}" class="campo-largo" id="nombre" name="nombre" placeholder="<?php echo $strings['Name']; ?>" value='<?php echo $this->tupla['NOMBRECENTRO']; ?>'>
				</li>
				<li>
				<label><?php echo $strings['Address']; ?></span></label>
					<input type="text" readonly pattern="[A-Za-z][A-Za-z0-9 ,.ºª\\-]{2,149}" class="campo-largo" id="direccion" name="direccion" placeholder="<?php echo $strings['Address']; ?>" value='<?php echo $this->tupla['DIRECCIONCENTRO']; ?>'>
				</li>
				<li>
					<label><?php echo $strings['Responsable']; ?></span></label>
					<input type="text" readonly pattern="[A-Za-z][A-Za-z -]{2,59}" class="campo-largo" id="responsable" name="responsable" placeholder="<?php echo $strings['Responsable']; ?>" value='<?php echo $this->tupla['RESPONSABLECENTRO']; ?>'>
				</li>
				<li>
					<input type="submit" class="campo-largo" name="action" value="DELETE">
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