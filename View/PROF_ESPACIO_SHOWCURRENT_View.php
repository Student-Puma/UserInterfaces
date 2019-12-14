<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 * Fecha: 31/01/2019
	 */

	/**
	 * Vista de la función SHOWCURRENT de la entidad
	 */
	class PROF_ESPACIO_SHOWCURRENT
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
			// Añadimos la vista Header
			include '../View/Header.php';
?>
			<div class="centrado">
				<h2 class="trad_SHOWCURRENT"></h2>
			</div>

			<form name="Form" action="../Controller/PROF_ESPACIO_Controller.php" method="post">
				<ul class="form-style">
					<li>
						<label><?php echo $strings['DNI']; ?></label>
						<a class="weak" href="../Functions/ShowWeak.php?entity=PROFESOR&key=<?php echo $this->tupla['DNI']; ?>">
							<input type="text" readonly pattern="[0-9]{8}[A-NO-Za-no-z]" class="campo-largo" id="dni" name="dni" placeholder="<?php echo $strings['DNI']; ?>" value="<?php echo $this->tupla['DNI']; ?>">						
						</a>
					</li>
					<li>
						<label><?php echo $strings['Code']; ?></label>
						<a class="weak" href="../Functions/ShowWeak.php?entity=ESPACIO&key=<?php echo $this->tupla['CODESPACIO']; ?>">
							<input type="text" readonly pattern="[A-Za-z0-9][A-Za-z0-9_-]{0,9}" class="campo-largo" id="CODEspacio" name="CODEspacio" placeholder="<?php echo $strings['CODEspacio']; ?>" value="<?php echo $this->tupla['CODESPACIO']; ?>">
						</a>
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