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
	class USUARIOS_DELETE
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

		<form name="Form" action="../Controller/USUARIOS_Controller.php" method="post" onsubmit="enableAll(this)">
			<ul class="form-style">
				<li>
					<label><?php echo $strings['AccountData']; ?></label>
					<input type="text" readonly class="campo-dividido" id="login" name="login" placeholder="<?php echo $strings['Login']; ?>" value="<?php echo $this->tupla['login']; ?>" required>
					<input type="password" readonly class="campo-dividido" id="password" name="password" placeholder="<?php echo $strings['Password']; ?>" value="<?php echo $this->tupla['password']; ?>" required>
				</li>
				<li>
					<label><?php echo $strings['FullName']; ?></label>
					<input type="text" readonly class="campo-dividido" id="nombre" name="nombre" placeholder="<?php echo $strings['Name']; ?>" value="<?php echo $this->tupla['nombre']; ?>" required>
					<input type="text" readonly class="campo-dividido" id="apellidos" name="apellidos" placeholder="<?php echo $strings['Surname']; ?>" value="<?php echo $this->tupla['apellidos']; ?>" required>
				</li>
				<li>
					<label><?php echo $strings['Email']; ?></label>
					<input type="email" readonly class="campo-largo" id="email" name="email" placeholder="<?php echo $strings['Email']; ?>"  value="<?php echo $this->tupla['email']; ?>" required>
				</li>
				<li>
					<label><?php echo $strings['Birth']; ?></label>
					<input type="date" readonly class="campo-largo" name="fechanac" id="fechanac" max="2018-12-31" placeholder="<?php echo $strings['Birth']; ?>" value="<?php echo $this->tupla['FechaNacimiento']; ?>" required>
				</li>
				<li>
					<label ><?php echo $strings['Picture']; ?></label>
					
						<label class="file-upload readonly" id="fileuploader" for="fotopersonal"><a class="photo" href="../Files/<?php echo $this->tupla['fotopersonal']; ?>"><?php echo ($this->tupla['fotopersonal'] == '' ? $strings['UploadFile'] : $this->tupla['fotopersonal']); ?></a></label>
						<input disabled type="file" class="campo-largo" accept="image/*" name="fotopersonal" id="fotopersonal" required>
				</li>
				<li>
					<label><?php echo $strings['PersonalData']; ?></label>
					<input type="tel" readonly class="campo-dividido" id="dni" name="dni" placeholder="<?php echo $strings['DNI']; ?>" value='<?php echo $this->tupla['DNI']; ?>' required>
					<input type="tel" readonly class="campo-dividido" id="telefono" name="telefono" placeholder="<?php echo $strings['Phone']; ?>" value='<?php echo $this->tupla['telefono']; ?>' required>
				</li>
				<li>
					<label><?php echo $strings['Genre']; ?></label>
					<select disabled class="campo-dividido" id="sexo" name="sexo" value='<?php echo $this->tupla['sexo']; ?>' required>
						<option value="hombre" <?php if($this->tupla['sexo'] == "hombre") { echo "selected"; } ?>><?php echo $strings['Male']; ?></option>
						<option value="mujer"  <?php if($this->tupla['sexo'] == "mujer") { echo "selected"; } ?>><?php echo $strings['Female']; ?></option>
					</select>

					<input type="submit" class="campo-dividido" name="action" value="DELETE">
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

	