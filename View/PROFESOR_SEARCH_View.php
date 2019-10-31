<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 * Fecha: 31/01/2019
	 */

	/**
	 * Vista de la función SEARCH de la entidad
	 */
	class PROFESOR_SEARCH
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

		<form name="Form" action="../Controller/PROFESOR_Controller.php" method="post">
			<ul class="form-style">
				
				<li>
					<label><?php echo $strings['FullName']; ?></span></label>
					<input type="text" pattern="[A-Za-z -]{1,15}" class="campo-dividido" id="nombre" name="nombre" placeholder="<?php echo $strings['Name']; ?>">
					<input type="text" pattern="[A-Za-z -]{1,30}" class="campo-dividido" id="apellidos" name="apellidos" placeholder="<?php echo $strings['Surname']; ?>">
				</li>
				<li>
				<label><?php echo $strings['Area']; ?></span></label>
					<input type="text" pattern="[A-Za-z -]{1,60}" class="campo-largo" id="area" name="area" placeholder="<?php echo $strings['Area']; ?>">
				</li>
				<li>
				<label><?php echo $strings['Department']; ?></span></label>
					<input type="text" pattern="[A-Za-z -]{1,60}" class="campo-largo" id="departamento" name="departamento" placeholder="<?php echo $strings['Department']; ?>">
				</li>
				<li>
					<label><?php echo $strings['DNI']; ?></span></label>
					<input type="text" pattern="[A-NO-Za-no-z0-9]+" class="campo-dividido" id="dni" name="dni" placeholder="<?php echo $strings['DNI']; ?>">

					<input type="submit" class="campo-dividido" name="action" value="SEARCH">
				</li>
			</ul>
		</form>


		<a href="../Controller/PROFESOR_Controller.php" class="return"><?php echo $strings['Back']; ?></a>
<?php
		// Añadimos la vista Footer
		include '../View/Footer.php';
	}
}
?>