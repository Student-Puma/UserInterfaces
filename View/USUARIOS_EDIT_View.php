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
	class USUARIOS_EDIT
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

		<form name="Form" action="../Controller/USUARIOS_Controller.php" method="post">
			<ul class="form-style">
				<li>
					<label><span class="trad_AccountData"></span> <span class="requerido">*</span></label>
					<input type="text" readonly class="campo-dividido" id="login" name="login" value="<?php echo $this->tupla['login']; ?>" required>
					<input type="password" pattern=".{4,60}" class="campo-dividido" id="password" name="password" value="<?php echo $this->tupla['password']; ?>" required>
				</li>
				<li>
					<label><span class="trad_FullName"></span> <span class="requerido">*</span></label>
					<input type="text" pattern="[A-Za-zÁÉÍÓÚÏÜáéíóúïü][A-Za-z ÁÉÍÓÚÏÜáéíóúïü]{2,14}" class="campo-dividido" id="nombre" name="nombre" value="<?php echo $this->tupla['nombre']; ?>" required>
					<input type="text" pattern="[A-Za-z][A-Za-z -]{2,49}" class="campo-dividido" id="apellidos" name="apellidos" value="<?php echo $this->tupla['apellidos']; ?>" required>
				</li>
				<li>
					<label><span class="trad_Email"></span> <span class="requerido">*</span></label>
					<input type="email" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}" class="campo-largo" id="email" name="email" value="<?php echo $this->tupla['email']; ?>" required>
				</li>
				<li>
					<label><span class="trad_Birth"></span> <span class="requerido">*</span></label>
					<input type="date" class="campo-largo" name="fechanac" id="fechanac" max="2018-12-31" value="<?php echo $this->tupla['FechaNacimiento']; ?>" required>
				</li>

				<!-- TEMP FIX -->
				<input type="text" style="display:none" name="fotopersonal" id ="fotopersonal" value="<?php echo $this->tupla['fotopersonal']; ?>">
				<!--
				<li>
					<label><span class="trad_Picture"></span> <span class="requerido">*</span></label>
					<label class="file-upload" id="fileuploader" for="fotopersonal"><?php //echo ($this->tupla['fotopersonal'] == '' ? "" : $this->tupla['fotopersonal']); ?></label>
					<input type="file" class="campo-largo" accept="image/*" name="fotopersonal" id="fotopersonal" required>
				</li>
				-->

				<li>
					<label><span class="trad_PersonalData"></span> <span class="requerido">*</span></label>
					<input type="tel" pattern="[0-9]{8}[A-NO-Za-no-z]" class="campo-dividido" id="dni" name="dni" value='<?php echo $this->tupla['DNI']; ?>' required>
					<input type="tel" pattern="\+?(34)?[976][0-9]{8}" class="campo-dividido" id="telefono" name="telefono" value='<?php echo $this->tupla['telefono']; ?>' required>
				</li>
				<li>
					<label><span class="trad_Genre"></span> <span class="requerido">*</span></label>
					<select class="campo-dividido" id="sexo" name="sexo" value='<?php echo $this->tupla['sexo']; ?>' required>
						<option value="hombre" <?php if($this->tupla['sexo'] == "hombre") { echo "selected"; } ?> class="trad_Male"></option>
						<option value="mujer" <?php if($this->tupla['sexo'] == "mujer") { echo "selected"; } ?> class="trad_Female"></option>
					</select>

					<input type="submit" class="campo-dividido" name="action" value="EDIT">
				</li>
			</ul>
		</form>

		<a href="../Controller/USUARIOS_Controller.php" class="return trad_Back"></a>
<?php
		// Añadimos la vista Footer
		include '../View/Footer.php';
	}
}
?>