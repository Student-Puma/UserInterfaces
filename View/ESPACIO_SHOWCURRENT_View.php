<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 * Fecha: 15/12/2019
	 */

	/**
	 * Vista de la función SHOWCURRENT de la entidad
	 */
	class ESPACIO_SHOWCURRENT
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

		<form name="Form" action="../Controller/ESPACIO_Controller.php" method="post" onsubmit="enableAll(this);">
			<ul class="form-style">
				<li>
					<label class="trad_Type"></label>
					<select disabled class="campo-largo" id="tipo" name="tipo">
						<option value="DESPACHO" <?php if($this->tupla['TIPO'] == "DESPACHO") { echo "selected"; } ?> class="trad_DESPACHO"></option>
						<option value="LABORATORIO" <?php if($this->tupla['TIPO'] == "LABORATORIO") { echo "selected"; } ?> class="trad_LABORATORIO"></option>
						<option value="PAS" <?php if($this->tupla['TIPO'] == "PAS") { echo "selected"; } ?> class="trad_PAS"></option>
					</select>
				</li>
				<li>
					<label class="trad_Details"></label>
					<input type="text" readonly class="campo-dividido" id="superficie" name="superficie" placeholder="m²" value="<?php echo $this->tupla['SUPERFICIEESPACIO']; ?>">
					<input type="text" readonly class="campo-dividido" id="numinventario" name="numinventario" placeholder="Nº" value="<?php echo $this->tupla['NUMINVENTARIOESPACIO']; ?>">
				</li>
				<li>
					<label class="trad_Codes"></label>
					<a class="weak" href="../Functions/ShowWeak.php?entity=EDIFICIO&key=<?php echo $this->tupla['CODEDIFICIO']; ?>">
						<input type="text" readonly class="campo-dividido" id="CODEdificio" name="CODEdificio" value="<?php echo $this->tupla['CODEDIFICIO']; ?>">
					</a>
					<a class="weak" href="../Functions/ShowWeak.php?entity=CENTRO&key=<?php echo $this->tupla['CODCENTRO']; ?>">	
						<input type="text" readonly class="campo-dividido" id="CODCentro" name="CODCentro" value="<?php echo $this->tupla['CODCENTRO']; ?>">
					</a>
				</li>
				<li>
					<input type="text" readonly class="campo-largo" id="CODEspacio" name="CODEspacio" value="<?php echo $this->tupla['CODESPACIO']; ?>">
				</li>
			</ul>
		</form>


		<a href="../Controller/ESPACIO_Controller.php" class="return trad_Back"></a>
<?php
		// Añadimos la vista Footer
		include '../View/Footer.php';
	}
}
?>