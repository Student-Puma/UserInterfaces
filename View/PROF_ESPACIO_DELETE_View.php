<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 * Fecha: 31/01/2019
	 */

	/**
	 * Vista de la función DELETE de la entidad
	 * 
	 * @var tupla Datos de la entidad
	 */
	class PROF_ESPACIO_DELETE
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

			<form name="Form" action="../Controller/PROF_ESPACIO_Controller.php" method="post">
				<ul class="form-style">
					<li>
						<label class="trad_DNI"></label>
						<a class="weak" href="../Functions/ShowWeak.php?entity=PROFESOR&key=<?php echo $this->tupla['DNI']; ?>">
							<input type="text" readonly class="campo-largo" id="dni" name="dni" value="<?php echo $this->tupla['DNI']; ?>">						
						</a>
					</li>
					<li>
						<label class="trad_Code"></label>
						<a class="weak" href="../Functions/ShowWeak.php?entity=ESPACIO&key=<?php echo $this->tupla['CODESPACIO']; ?>">
							<input type="text" readonly class="campo-largo" id="CODEspacio" name="CODEspacio" value="<?php echo $this->tupla['CODESPACIO']; ?>">
						</a>
					</li>
					<li>
						<input type="submit" class="campo-largo" name="action" value="DELETE">
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