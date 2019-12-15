<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 * Fecha: 15/12/2019
	 */

	/**
	 * Vista de la función DELETE de la entidad
	 * 
	 * @var tupla Datos de la entidad
	 */
	class PROFESOR_DELETE
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
			<h2 class="trad_DELETE"></h2>
		</div>

		<form name="Form" action="../Controller/PROFESOR_Controller.php" method="post">
			<ul class="form-style">
				
				<li>
					<label class="trad_FullName"></label>
					<input type="text" readonly class="campo-dividido" id="nombre" name="nombre" value="<?php echo $this->tupla['NOMBREPROFESOR']; ?>">
					<input type="text" readonly class="campo-dividido" id="apellidos" name="apellidos" value="<?php echo $this->tupla['APELLIDOSPROFESOR']; ?>">
				</li>
				<li>
				<label class="trad_Area"></label>
					<input type="text" readonly class="campo-largo" id="area" name="area" value="<?php echo $this->tupla['AREAPROFESOR']; ?>">
				</li>
				<li>
				<label class="trad_Department"></label>
					<input type="text" readonly class="campo-largo" id="departamento" name="departamento"  value="<?php echo $this->tupla['DEPARTAMENTOPROFESOR']; ?>">
				</li>
				<li>
					<label class="trad_DNI"></label>
					<input type="text" readonly class="campo-dividido" id="dni" name="dni" value="<?php echo $this->tupla['DNI']; ?>">

					<input type="submit" class="campo-dividido" name="action" value="DELETE">
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