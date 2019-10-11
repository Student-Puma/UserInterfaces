<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 */

	/**
	 * Vista de la función SHOWALL de la entidad
	 * @var lista Columnas de la entidad
	 * @var datos Datos de la entidad
	 */
	class CENTRO_SHOWALL
	{
		/**
		 * Constructor de la clase
		 */
		function __construct($lista,$datos){
			$this->datos = $datos;
			$this->lista = $lista;	
			$this->render();
		}

		/**
		 * Renderiza la vista
		 */
		function render(){
			// Añadimos la vista Header
			include '../View/Header.php';
?>
			<h1><?php echo $strings['SHOWALL']; ?></h1>	
			<br>
			<br>
			<a href='../Controller/CENTRO_Controller.php?action=ADD'><?php echo $strings['ADD']; ?></a>
			<br>
			<a href='../Controller/CENTRO_Controller.php?action=SEARCH'><?php echo $strings['SEARCH']; ?></a>
			
			<table>
				<tr>
<?php
			// Recorremos titulos
			foreach ($this->lista as $titulo) {
?>
					<th><?php echo $titulo; ?></th>
<?php
			}
?>
				</tr>
<?php
			// Recorremos filas
			foreach($this->datos as $fila)
			{
?>
				<tr>
<?php
				// Recorremos columnas
				foreach ($this->lista as $columna) {			
?>
					<td><?php echo $fila[$columna]; ?></td>
<?php
				}
?>
					<td>
						<a href='
							../Controller/CENTRO_Controller.php?action=EDIT&CODCentro=
								<?php echo $fila['CODCENTRO']; ?>
								'> EDITAR </a>
					</td>
					<td>
						<a href='
							../Controller/CENTRO_Controller.php?action=DELETE&CODCentro=
								<?php echo $fila['CODCENTRO']; ?>
								'> BORRAR </a>
					</td>
					<td>
						<a href='
							../Controller/CENTRO_Controller.php?action=SHOWCURRENT&CODCentro=
								<?php echo $fila['CODCENTRO']; ?>
								'> DETALLE </a>
					</td>
				</tr>
<?php
		}
?>
			</table>		
<?php
			// Añadimos la vista Footer
			include '../View/Footer.php';
		}
	}
?>