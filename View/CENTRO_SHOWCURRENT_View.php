<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 * Fecha: 31/01/2019
	 */

	/**
	 * Vista de la función SHOWCURRENT de la entidad
	 */
	class CENTRO_SHOWCURRENT
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
		function render()
		{
			// Añadimos la vista Header
			include '../View/Header.php';
?>
		<div class="centrado">
			<h2 class="trad_SHOWCURRENT"></h2>
		</div>

		<form name="Form" action="../Controller/CENTRO_Controller.php" method="post">
			<ul class="form-style">
				<li>
					<label class="trad_Codes"></label>
					<input type="text" readonly class="campo-dividido" id="CODCentro" name="CODCentro" value='<?php echo $this->tupla['CODCENTRO']; ?>'>
					<a class="weak" href="../Functions/ShowWeak.php?entity=EDIFICIO&key=<?php echo $this->tupla['CODEDIFICIO']; ?>">
						<input type="text" readonly class="campo-dividido" id="CODEdificio" name="CODEdificio" value='<?php echo $this->tupla['CODEDIFICIO']; ?>'>
					</a>
				</li>
				<li>
					<label class="trad_Name"></label>
					<input type="text" readonly class="campo-largo" id="nombre" name="nombre"  value='<?php echo $this->tupla['NOMBRECENTRO']; ?>'>
				</li>
				<li>
				<label class="trad_Address"></label>
					<input type="text" readonly class="campo-largo" id="direccion" name="direccion"  value='<?php echo $this->tupla['DIRECCIONCENTRO']; ?>'>
				</li>
				<li>
					<label class="trad_Responsable"></span></label>
					<input type="text" readonly class="campo-largo" id="responsable" name="responsable"  value='<?php echo $this->tupla['RESPONSABLECENTRO']; ?>'>
				</li>
			</ul>
		</form>


		<a href="../Controller/CENTRO_Controller.php" class="return trad_Back"></a>
<?php
		// Añadimos la vista Footer
		include '../View/Footer.php';
	}
}
?>