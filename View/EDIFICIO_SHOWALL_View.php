<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 * Fecha: 31/01/2019
	 */

	/**
	 * Vista de la función SHOWALL de la entidad
	 * @var maxindex Número máximo de columnas
	 * @var lista Columnas de la entidad
	 * @var datos Datos de la entidad
	 */
	class EDIFICIO_SHOWALL
	{
		/**
		 * Constructor de la clase
		 */
		function __construct($lista,$datos)
		{
			$this->maxindex = 3;
			$this->datos = $datos;
			$this->lista = $lista;	
			$this->render();
		}

		/**
		 * Renderiza la vista
		 */
		function render()
		{
			// Añadimos la vista Header
			include '../View/Header.php';

			// Añadimos los iconos
			include '../Locale/Icons.php';
?>
			<div class="centrado">
				<h2><?php echo $strings['GEdificios']; ?></h2>
			</div>
			
			<table>
				<thead>
					<tr>
<?php
					// Recorremos titulos
					foreach ($this->lista as $index=>$titulo) {
?>
						<th><?php echo $titulo; ?></th>
<?php
						if($index >= $this->maxindex - 1) { break; }
					}
?>
						<th class="addnsearch">
							<a href='../Controller/EDIFICIO_Controller.php?action=ADD'><img height="16" src="<?php echo $icons['add']; ?>"></a>
							<a href='../Controller/EDIFICIO_Controller.php?action=SEARCH'><img height="16" src="<?php echo $icons['search']; ?>"></a>
						</th>
					</tr>
				</thead>
				<tbody>
<?php
			// Recorremos filas
			foreach($this->datos as $fila)
			{
?>
					<tr>
<?php
					// Recorremos columnas
					foreach ($this->lista as $index=>$columna) {			
?>
						<td><?php echo $fila[$columna]; ?></td>
<?php
						if($index >= $this->maxindex - 1) { break; }
					}
?>
						<td class="buttons">
							<a href='../Controller/EDIFICIO_Controller.php?action=EDIT&CODEdificio=<?php echo $fila['CODEDIFICIO']; ?>'>
								<img height="16" src="<?php echo $icons['edit']; ?>">
							</a>
							<a href='../Controller/EDIFICIO_Controller.php?action=DELETE&CODEdificio=<?php echo $fila['CODEDIFICIO']; ?>'>
								<img height="16" src="<?php echo $icons['delete']; ?>">
							</a>
							<a href='../Controller/EDIFICIO_Controller.php?action=SHOWCURRENT&CODEdificio=<?php echo $fila['CODEDIFICIO']; ?>'>
								<img height="16" src="<?php echo $icons['view']; ?>">
							</a>
						</td>
					</tr>
<?php
			}
?>
				</tbody>
			</table>
			
			<a href="../Controller/Index_Controller.php" class="return trad_Back"></a>
<?php
			// Añadimos la vista Footer
			include '../View/Footer.php';
		}
	}
?>