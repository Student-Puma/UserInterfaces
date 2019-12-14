<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 * Fecha: 31/01/2019
	 */

	/**
	 * Vista de la función SHOWCURRENT de la entidad
	 */
	class PROF_TITULACION_SHOWCURRENT
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

			<form name="Form" action="../Controller/PROF_TITULACION_Controller.php" method="post">
				<ul class="form-style">
					<li>
						<label><?php echo $strings['DNI']; ?></label>
						<a class="weak" href="../Functions/ShowWeak.php?entity=PROFESOR&key=<?php echo $this->tupla['DNI']; ?>">
							<input type="text" readonly class="campo-largo" id="dni" name="dni" placeholder="<?php echo $strings['DNI']; ?>" value="<?php echo $this->tupla['DNI']; ?>">
						</a>
					</li>
					<li>
						<label class="trad_Code"></label>
						<a class="weak" href="../Functions/ShowWeak.php?entity=TITULACION&key=<?php echo $this->tupla['CODTITULACION']; ?>">
							<input type="text" readonly class="campo-largo" id="CODTitulacion" name="CODTitulacion" placeholder="<?php echo $strings['CODTitulacion']; ?>" value="<?php echo $this->tupla['CODTITULACION']; ?>">
						</a>
					</li>
					<li>
						<label><?php echo $strings['Year']; ?></label>
						<input type="text" readonly value="<?php echo $this->tupla['ANHOACADEMICO']; ?>" class="campo-largo" id="anho" name="anho" placeholder="<?php echo $strings['Year']; ?>">
					</li>
				</ul>
			</form>


			<a href="../Controller/PROF_TITULACION_Controller.php" class="return trad_Back"></a>		
<?php
			// Añadimos la vista Footer
			include '../View/Footer.php';
		}
	}
?>