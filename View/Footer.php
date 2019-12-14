<?php
	/**
	 * Autor: Diego Enrique Fontán Lorenzo
	 * DNI: 77482941N
	 * Fecha: 31/01/2019
	 */

	/**
	 * Vista del Footer
	 */
?>
		</div> <!-- datos -->
        </div> <!-- workspace -->
        </div> <!-- contenido-principal -->
		</div> <!-- contenido -->
	
		<div class="footer">
			<p><span class="blue">pn532x</span><span> | </span><span class="trad_Today"></span><span class="today"><?php echo(date("d-M-Y", time())); ?></span></p>
		</div> <!-- footer -->

	</div> <!-- main -->

	<div class="centrado">
		<div  id="modal" class="modal">
			<form onsubmit="closeModal(event);">
				<h2><span class="trad_Error"></span></h2>
				<h4><span id="modal-msg-photo" class="trad_Error-Photo"></span></h4>
				<h4><span id="modal-msg-email" class="trad_Error-Email"></span></h4>
				<input type="submit" class="return" value="Enviar">
			</form>
		</div>
	</div>

	<script src="../View/public/js/comprobaciones.js"></script>
</body> <!-- body -->
</html> <!-- html -->
		