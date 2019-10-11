<?php

	class EDIFICIO_SHOWALL {

		function __construct($lista,$datos){
			$this->datos = $datos;
			$this->lista = $lista;	
			$this->render();
		}

		function render(){

			include '../View/Header.php'; //header necesita los strings
?>
			<h1><?php echo $strings['SHOWALL']; ?></h1>	
			<br>
			<br>
			<a href='../Controller/EDIFICIO_Controller.php?action=ADD'><?php echo $strings['ADD']; ?></a>
			<br>
			<a href='../Controller/EDIFICIO_Controller.php?action=SEARCH'><?php echo $strings['SEARCH']; ?></a>
			
		<table>
			<tr>
<?php
		foreach ($this->lista as $titulo) {
?>
				<th><?php echo $titulo; ?></th>
<?php
		}
?>
			</tr>
<?php
		foreach($this->datos as $fila)
		{
?>
			<tr>
<?php
			foreach ($this->lista as $columna) {			
?>
				<td><?php echo $fila[$columna]; ?></td>
<?php
			}
?>
				<td>
					<a href='
						../Controller/EDIFICIO_Controller.php?action=EDIT&CODEdificio=
							<?php echo $fila['CODEDIFICIO']; ?>
							'><?php echo $strings['EDIT']; ?></a>
				</td>
				<td>
					<a href='
						../Controller/EDIFICIO_Controller.php?action=DELETE&CODEdificio=
							<?php echo $fila['CODEDIFICIO']; ?>
							'><?php echo $strings['DELETE']; ?> </a>
				</td>
				<td>
					<a href='
						../Controller/EDIFICIO_Controller.php?action=SHOWCURRENT&CODEdificio=
							<?php echo $fila['CODEDIFICIO']; ?>
							'><?php echo $strings['SHOWCURRENT']; ?> </a>
				</td>
			</tr>

<?php

		}
?>


		</table>		
		
					
<?php
			include '../View/Footer.php';
		} //fin metodo render

	} //fin REGISTER

?>

	