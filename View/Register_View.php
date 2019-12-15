<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 * Fecha: 31/01/2019
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
			// Añadimos la vista Header
			include '../View/Header.php'; 
?>
			<form name="Form" action="../Functions/UploadFile.php" enctype="multipart/form-data" method="post">
				<ul class="form-style">
					<li>
						<label><span class="trad_AccountData"></span> <span class="requerido">*</span></label>
						<input type="text" pattern=".{4,15}" class="campo-dividido" id="login" name="login" placeholder="LOGIN" required>
						<input type="password" pattern=".{4,60}" class="campo-dividido" id="password" name="password" placeholder="PASSWD" required>
					</li>
					<li>
						<label><span class="trad_FullName"></span> <span class="requerido">*</span></label>
						<input type="text" pattern="[A-Za-z][A-Za-z -]{2,29}" class="campo-dividido" id="nombre" name="nombre" required>
						<input type="text" pattern="[A-Za-z][A-Za-z -]{2,49}" class="campo-dividido" id="apellidos" name="apellidos" required>
					</li>
					<li>
						<label><span class="trad_Email"></span> <span class="requerido">*</span></label>
						<input type="email" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}" class="campo-largo" id="email" name="email" required>
					</li>
					<li>
						<label><span class="trad_Birth"></span> <span class="requerido">*</span></label>
						<input type="date" class="campo-largo" name="fechanac" id="fechanac" max="2018-12-31" required>
					</li>
					<li>
						<label><span class="trad_Picture"></span> <span class="requerido">*</span></label>
						<label class="file-upload trad_UploadFile" id="fileuploader" for="fotopersonal"></label>
						<input type="file" class="campo-largo" accept="image/*" name="fotopersonal" id="fotopersonal" required>
					</li>
					<li>
						<label><span class="trad_Phone"></span> <span class="requerido">*</span></label>
						<input type="tel" pattern="[0-9]{8}[A-NO-Za-no-z]" class="campo-dividido" id="dni" name="dni" placeholder="NIF" required>
						<input type="tel" pattern="[9|6|7][0-9]{8}" class="campo-dividido" id="telefono" name="telefono" placeholder="986000000" required>
					</li>
					<li>
						<label><span class="trad_Genre"></span> <span class="requerido">*</span></label>
						<select class="campo-dividido" id="sexo" name="sexo" required>
							<option value="hombre" class="trad_Male" selected></option>
							<option value="mujer" class="trad_Female"></option>
						</select>

						<input type="submit" class="campo-dividido" name="action" value="REGISTER" onclick="submitUsuario();">
					</li>
				</ul>
			</form>


			<a href="../Controller/Index_Controller.php" class="return trad_Back"></a>

			<script>
				document.getElementById('fotopersonal').addEventListener('change', function(event)
				{
					var files = document.getElementById('fotopersonal').files;
					document.getElementById('fileuploader').innerText = files.length > 0 ? files[0].name : "";
				});
			</script>
	<?php
			// Añadimos la vista Footer
			include '../View/Footer.php';
		}
	}
?>