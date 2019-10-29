<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 * Fecha: 11/01/2019
	 */

	/**
	 * Vista del Login
	 */
	class Register
	{
		/**
		 * Constructor de la clase
		 */
		function __construct(){	
			$this->render();
		}

		/**
		 * Renderiza la vista
		 */
		function render()
		{			
			// Añadimos el idioma
			include_once '../Locale/Strings_'.$_SESSION['idioma'].'.php';
			// Añadimos la vista Header
			include '../View/Header.php'; 
?>
			<form name="Form" action="../Controller/Register_Controller.php" method="post">
				<ul class="form-style">
					<li>
						<label><?php echo $strings['AccountData']; ?> <span class="requerido">*</span></label>
						<input type="text" class="campo-dividido" id="login" name="login" placeholder="<?php echo $strings['Login']; ?>" required>
						<input type="password" class="campo-dividido" id="password" name="password" placeholder="<?php echo $strings['Password']; ?>" required>
					</li>
					<li>
						<label><?php echo $strings['FullName']; ?> <span class="requerido">*</span></label>
						<input type="text" pattern="[A-Za-z][A-Za-z -]{2,29}" class="campo-dividido" id="nombre" name="nombre" placeholder="<?php echo $strings['Name']; ?>" required>
						<input type="text" pattern="[A-Za-z][A-Za-z -]{2,49}" class="campo-dividido" id="apellidos" name="apellidos" placeholder="<?php echo $strings['Surname']; ?>" required>
					</li>
					<li>
						<label><?php echo $strings['Email']; ?> <span class="requerido">*</span></label>
						<input type="email" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}" class="campo-largo" id="email" name="email" placeholder="<?php echo $strings['Email']; ?>" required>
					</li>
					<li>
						<label><?php echo $strings['Birth']; ?> <span class="requerido">*</span></label>
						<input type="date" class="campo-largo" name="fechanac" id="fechanac" max="2018-12-31" placeholder="<?php echo $strings['Birth']; ?>" required>
					</li>
					<li>
						<label><?php echo $strings['Picture']; ?> <span class="requerido">*</span></label>
						<label class="file-upload" id="fileuploader" for="fotopersonal"><?php echo $strings['UploadFile']; ?></label>
						<input type="file" class="campo-largo" accept="image/*" name="fotopersonal" id="fotopersonal" required>
					</li>
					<li>
						<label><?php echo $strings['PersonalData']; ?> <span class="requerido">*</span></label>
						<input type="tel" pattern="[0-9]{8}[A-NO-Za-no-z]" class="campo-dividido" id="dni" name="dni" placeholder="<?php echo $strings['DNI']; ?>" required>
						<input type="tel" pattern="[9|6|7][0-9]{8}" class="campo-dividido" id="telefono" name="telefono" placeholder="<?php echo $strings['Phone']; ?>" required>
					</li>
					<li>
						<label><?php echo $strings['Genre']; ?> <span class="requerido">*</span></label>
						<select class="campo-dividido" id="sexo" name="sexo" required>
							<option value="hombre" selected><?php echo $strings['Male']; ?></option>
							<option value="mujer"><?php echo $strings['Female']; ?></option>
						</select>

						<input type="submit" class="campo-dividido" name="action" value="REGISTER">
					</li>
				</ul>
			</form>


			<a href="../Controller/Index_Controller.php" class="return"><?php echo $strings['Back']; ?></a>

			<script>
				document.getElementById('fotopersonal').addEventListener('change', function(event)
				{
					var files = document.getElementById('fotopersonal').files;
					document.getElementById('fileuploader').innerText = files.length > 0 ? files[0].name : "<?php echo $strings['UploadFile']; ?>";
				});
			</script>
	<?php
			// Añadimos la vista Footer
			include '../View/Footer.php';
		}
	}
?>