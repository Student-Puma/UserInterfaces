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
			include_once '../Locale/Strings_SPANISH.php';
			// Añadimos la vista Header
			include '../View/Header.php'; 
?>
			<form name="Form" action="../Controller/Register_Controller.php" method="post">
				<ul class="form-style">
					<li>
						<label>Datos de la cuenta <span class="requerido">*</span></label>
						<input type="text" class="campo-dividido" id="login" name="login" placeholder="Login" required>
						<input type="password" class="campo-dividido" id="password" name="password" placeholder="Contraseña" required>
					</li>
					<li>
						<label>Nombre Completo <span class="requerido">*</span></label>
						<input type="text" pattern="[A-Za-z][A-Za-z -]{2,}" class="campo-dividido" id="nombre" name="nombre" placeholder="Nombre" required>
						<input type="text" pattern="[A-Za-z][A-Za-z -]{2,}" class="campo-dividido" id="apellidos" name="apellidos" placeholder="Apellidos" required>
					</li>
					<li>
						<label>Email <span class="requerido">*</span></label>
						<input type="email" class="campo-largo" id="email" name="email" placeholder="Email" required>
					</li>
					<li>
						<label>Fecha de nacimiento</label>
						<input type="date" class="campo-largo" name="fechanac" id="fechanac" max="2018-12-31" placeholder="Fecha de nacimiento">
					</li>
					<li>
						<label>Foto personal</label>
						<input type="file" class="campo-largo" name="fotopersonal" id="fotopersonal">
					</li>
					<li>
						<label>Datos personales</label>
						<input type="tel" pattern="[0-9]{8}[A-NO-Z]" class="campo-dividido" id="DNI" name="DNI" placeholder="DNI *" required>
						<input type="tel" class="campo-dividido" id="telefono" name="telefono" placeholder="Teléfono">
					</li>
					<li>
						<label>Género</label>
						<select class="campo-dividido" id="sexo" name="sexo">
							<option value="hombre" selected>Hombre</option>
							<option value="mujer">Mujer</option>
							<option value="">Prefiero no decirlo</option>
						</select>

						<input type="submit" class="campo-dividido" name="action" value="REGISTER">
					</li>
				</ul>
			</form>
	<?php
			// Añadimos la vista Footer
			include '../View/Footer.php';
		}
	}
?>



<?php
/*
<h1><?php echo $strings['Register']; ?></h1>	
<form name='Form' action='../Controller/Register_Controller.php' method='post'">

		<?php echo $strings['Login']; ?> : <input type='text' name='login' id='login' size='15' value=''><br>
		<?php echo $strings['Password']; ?> : <input type='text' name='password' id='password' size='128' value=''><br>
		<?php echo $strings['Name']; ?> : <input type='text' name='nombre' id='nombre' size='30' value=''><br>
		<?php echo $strings['Surname']; ?> : <input type='text' name='apellidos' id='apellidos' size='50' value=''><br>
		<?php echo $strings['Email']; ?> : <input type='text' name='email' id='email' size='40' value=''><br>

		<?php echo $strings['DNI']; ?> : <input type='text' name='dni' id='dni' size='9' value=''><br>
		<?php echo $strings['Phone']; ?> : <input type='text' name='telefono' id='telefono' size='15' value='' ><br>
		<?php echo $strings['Birth']; ?> : <input type='text' name='fechanac' id='fechanac' size='30' value=''><br>
		<?php echo $strings['Picture']; ?> : <input type='text' name='fotopersonal' id='fotopersonal' size='50' value=''><br>
		<?php echo $strings['Genre']; ?> : <input type='text' name='sexo' id='sexo' size='40' value=''><br>

		<input type='submit' name='action' value='REGISTER'>
</form>

<a href='../Controller/Index_Controller.php'><?php echo $strings['Back']; ?></a>
 */
?>