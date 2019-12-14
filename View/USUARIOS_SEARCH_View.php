<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 * Fecha: 31/01/2019
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
					<label><?php echo $strings['AccountData']; ?></label>
					<input type="text" pattern=".{0,15}" class="campo-dividido" id="login" name="login" placeholder="<?php echo $strings['Login']; ?>">
					<input type="password" pattern=".{0,60}" class="campo-dividido" id="password" name="password" placeholder="<?php echo $strings['Password']; ?>">
				</li>
				<li>
					<label><?php echo $strings['FullName']; ?></label>
					<input type="text" pattern="[A-Za-z -]{0,30}" class="campo-dividido" id="nombre" name="nombre" placeholder="<?php echo $strings['Name']; ?>">
					<input type="text" pattern="[A-Za-z -]{0,50}" class="campo-dividido" id="apellidos" name="apellidos" placeholder="<?php echo $strings['Surname']; ?>">
				</li>
				<li>
					<label><?php echo $strings['Email']; ?></label>
					<input type="email" pattern="[A-Za-z0-9._%+-@]+" class="campo-largo" id="email" name="email" placeholder="<?php echo $strings['Email']; ?>">
				</li>
				<li>
					<label><?php echo $strings['Birth']; ?></label>
					<input type="date" class="campo-largo" name="fechanac" id="fechanac" max="2018-12-31" placeholder="<?php echo $strings['Birth']; ?>">
				</li>
				<li>
					<label><?php echo $strings['Picture']; ?></label>
					<label class="file-upload" id="fileuploader" for="fotopersonal"><?php echo $strings['UploadFile']; ?></label>
					<input type="file" class="campo-largo" accept="image/*" name="fotopersonal" id="fotopersonal">
				</li>
				<li>
					<label><?php echo $strings['PersonalData']; ?></label>
					<input type="tel" pattern="[A-NO-Za-no-z0-9]{0,9}" class="campo-dividido" id="dni" name="dni" placeholder="<?php echo $strings['DNI']; ?>">
					<input type="tel" pattern="[0-9]{0,9}" class="campo-dividido" id="telefono" name="telefono" placeholder="<?php echo $strings['Phone']; ?>">
				</li>
				<li>
					<label><?php echo $strings['Genre']; ?></label>
					<select class="campo-dividido" id="sexo" name="sexo">
						<option selected value=""><?php echo $strings['OptionNone']; ?></option>
						<option value="hombre"><?php echo $strings['Male']; ?></option>
						<option value="mujer"><?php echo $strings['Female']; ?></option>
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
				document.getElementById('fileuploader').innerText = files.length > 0 ? files[0].name : "<?php echo $strings['UploadFile']; ?>";
			});
		</script>
<?php
		// Añadimos la vista Footer
		include '../View/Footer.php';
	}
}
?>