<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 * Fecha: 11/01/2019
	 */

	/**
	 * Vista de la función SHOWCURRENT de la entidad
	 */
	class PROFESOR_SHOWCURRENT
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

		<form name="Form" action="../Controller/PROFESOR_Controller.php" method="post">
			<ul class="form-style">
				
				<li>
					<label><?php echo $strings['FullName']; ?></label>
					<input type="text" readonly pattern="[A-Za-z][A-Za-z0-9 -]{2,14}" class="campo-dividido" id="nombre" name="nombre" placeholder="<?php echo $strings['Name']; ?>" value="<?php echo $this->tupla['NOMBREPROFESOR']; ?>">
					<input type="text" readonly pattern="[A-Za-z][A-Za-z0-9 -]{2,14}" class="campo-dividido" id="apellidos" name="apellidos" placeholder="<?php echo $strings['Surname']; ?>" value="<?php echo $this->tupla['APELLIDOSPROFESOR']; ?>">
				</li>
				<li>
				<label><?php echo $strings['Area']; ?></label>
					<input type="text" readonly pattern="[A-Za-z][A-Za-z0-9 -]{2,59}" class="campo-largo" id="area" name="area" placeholder="<?php echo $strings['Area']; ?>" value="<?php echo $this->tupla['AREAPROFESOR']; ?>">
				</li>
				<li>
				<label><?php echo $strings['Department']; ?></label>
					<input type="text" readonly pattern="[A-Za-z][A-Za-z0-9 -]{2,59}" class="campo-largo" id="departamento" name="departamento" placeholder="<?php echo $strings['Department']; ?>" value="<?php echo $this->tupla['DEPARTAMENTOPROFESOR']; ?>">
				</li>
				<li>
					<label><?php echo $strings['DNI']; ?></label>
					<input type="text" readonly pattern="[0-9]{8}[A-NO-Za-no-z]" class="campo-largo" id="dni" name="dni" placeholder="<?php echo $strings['DNI']; ?>" value="<?php echo $this->tupla['DNI']; ?>">
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