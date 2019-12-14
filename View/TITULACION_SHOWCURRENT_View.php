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
			// Añadimos la vista Header
			include '../View/Header.php';
?>
		<div class="centrado">
			<h2 class="trad_SHOWCURRENT"></h2>
		</div>

		<form name="Form" action="../Controller/TITULACION_Controller.php" method="post">
			<ul class="form-style">
				<li>
					<label class="trad_Codes"></label>
					<input type="text" readonly class="campo-dividido" id="CODTitulacion" name="CODTitulacion" value="<?php echo $this->tupla['CODTITULACION']; ?>">
					<a class="weak" href="../Functions/ShowWeak.php?entity=CENTRO&key=<?php echo $this->tupla['CODCENTRO']; ?>">
						<input type="text" readonly class="campo-dividido" id="CODCentro" name="CODCentro" value="<?php echo $this->tupla['CODCENTRO']; ?>">
					</a>
				</li>
				<li>
					<label class="trad_Name"></label>
					<input type="text" readonly class="campo-largo" id="nombre" name="nombre" value="<?php echo $this->tupla['NOMBRETITULACION']; ?>">
				</li>
				<li>
					<label class="trad_Responsable"></label>
					<input type="text" readonly class="campo-largo" id="responsable" name="responsable" value="<?php echo $this->tupla['RESPONSABLETITULACION']; ?>">
				</li>
			</ul>
		</form>


		<a href="../Controller/TITULACION_Controller.php" class="return trad_Back"></a>
<?php
		// Añadimos la vista Footer
		include '../View/Footer.php';
	}
}
?>