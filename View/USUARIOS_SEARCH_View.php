<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 * Fecha: 15/12/2019
	 */

	/**
	 * Vista de la función SEARCH de la entidad
	 */
	class USUARIOS_SEARCH
	{
		/**
		 * Constructor de la clase
		 */
		function __construct()
		{	
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
			<h2 class="trad_SEARCH"></h2>
		</div>

		<form name="Form" action="../Controller/USUARIOS_Controller.php" method="post">
			<ul class="form-style">
				<li>
					<label class="trad_AccountData"></label>
					<input type="text" pattern=".{0,15}" class="campo-dividido" id="login" name="login" placeholder="LOGIN">
					<input type="password" pattern=".{0,60}" class="campo-dividido" id="password" name="password" placeholder="PASSWD">
				</li>
				<li>
					<label class="trad_FullName"></label>
					<input type="text" pattern="[A-Za-zÁÉÍÓÚÏÜáéíóúïü][A-Za-z ÁÉÍÓÚÏÜáéíóúïü]{0,15}" class="campo-dividido" id="nombre" name="nombre">
					<input type="text" pattern="[A-Za-z -]{0,50}" class="campo-dividido" id="apellidos" name="apellidos">
				</li>
				<li>
					<label class="trad_Email"></label>
					<input type="email" pattern="[A-Za-z0-9._%+-@]+" class="campo-largo" id="email" name="email">
				</li>
				<li>
					<label class="trad_Birth"></label>
					<input type="date" class="campo-largo" name="fechanac" id="fechanac" max="2018-12-31">
				</li>
				<li>
					<label class="trad_Picture"></label>
					<label class="file-upload" id="fileuploader" for="fotopersonal" class="trad_UploadFile"></label>
					<input type="file" class="campo-largo" accept="image/*" name="fotopersonal" id="fotopersonal">
				</li>
				<li>
					<label class="trad_PersonalData"></label>
					<input type="tel" pattern="[A-NO-Za-no-z0-9]{0,9}" class="campo-dividido" id="dni" name="dni" placeholder="NIF">
					<input type="tel" pattern="\+?(34)?[976][0-9]{8}" class="campo-dividido" id="telefono" name="telefono" placeholder="986000000">
				</li>
				<li>
					<label class="trad_Genre"></label>
					<select class="campo-dividido" id="sexo" name="sexo">
						<option selected value="" class="trad_OptioneNone"></option>
						<option value="hombre" class="trad_Male"></option>
						<option value="mujer" class="trad_Female"></option>
					</select>

					<input type="submit" class="campo-dividido" name="action" value="SEARCH">
				</li>
			</ul>
		</form>


		<a href="../Controller/USUARIOS_Controller.php" class="return trad_Back"></a>

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