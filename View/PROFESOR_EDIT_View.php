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
	class PROFESOR_EDIT
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

		<form name="Form" action="../Controller/PROFESOR_Controller.php" method="post" onsubmit="submitProfesor(this);">
			<ul class="form-style">
				
				<li>
					<label><span class="trad_FullName"></span> <span class="requerido">*</span></label>
					<input type="text" pattern="[A-Za-z][A-Za-z -]{2,14}" class="campo-dividido" id="nombre" name="nombre" value="<?php echo $this->tupla['NOMBREPROFESOR']; ?>" required>
					<input type="text" pattern="[A-Za-z][A-Za-z -]{2,29}" class="campo-dividido" id="apellidos" name="apellidos" value="<?php echo $this->tupla['APELLIDOSPROFESOR']; ?>" required>
				</li>
				<li>
				<label><span class="trad_Area"></span> <span class="requerido">*</span></label>
					<input type="text" pattern="[A-Za-z][A-Za-z -]{2,59}" class="campo-largo" id="area" name="area" value="<?php echo $this->tupla['AREAPROFESOR']; ?>" required>
				</li>
				<li>
				<label><span class="trad_Department"></span> <span class="requerido">*</span></label>
					<input type="text" pattern="[A-Za-z][A-Za-z -]{2,59}" class="campo-largo" id="departamento" name="departamento" value="<?php echo $this->tupla['DEPARTAMENTOPROFESOR']; ?>" required>
				</li>
				<li>
					<label><span class="trad_DNI"></span> <span class="requerido">*</span></label>
					<input type="text" readonly class="campo-dividido" id="dni" name="dni" value="<?php echo $this->tupla['DNI']; ?>" required>

					<input type="submit" class="campo-dividido" name="action" value="EDIT">
				</li>
			</ul>
		</form>


		<a href="../Controller/PROFESOR_Controller.php" class="return trad_Back"></a>
<?php
		// Añadimos la vista Footer
		include '../View/Footer.php';
	}
}
?>