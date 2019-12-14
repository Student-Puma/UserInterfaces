<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 * Fecha: 31/01/2019
	 */

	/**
	 * Vista de la función EDIT de la entidad
	 * 
	 * @var tupla Datos de la entidad
	 */
	class PROF_ESPACIO_EDIT
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

			<form name="Form" action="../Controller/PROF_ESPACIO_Controller.php" method="post">
				<ul class="form-style">
					<li>
						<label><span class="trad_DNI"></span> <span class="requerido">*</span></label>
						<a class="weak" href="../Functions/ShowWeak.php?entity=PROFESOR&key=<?php echo $this->tupla['DNI']; ?>">
							<input type="text" readonly class="campo-largo" id="dni" name="dni" value="<?php echo $this->tupla['DNI']; ?>" required>						
						</a>
					</li>
					<li>
						<label><span class="trad_Code"></span> <span class="requerido">*</span></label>
						<a class="weak" href="../Functions/ShowWeak.php?entity=ESPACIO&key=<?php echo $this->tupla['CODESPACIO']; ?>">
							<input type="text" readonly class="campo-largo" id="CODEspacio" name="CODEspacio" value="<?php echo $this->tupla['CODESPACIO']; ?>" required>
						</a>
					</li>
					<li>
						<input type="submit" class="campo-largo" name="action" value="EDIT">
					</li>
				</ul>
			</form>


			<a href="../Controller/PROF_ESPACIO_Controller.php" class="return trad_Back"></a>		
<?php
			// Añadimos la vista Footer
			include '../View/Footer.php';
		}
	}
?>