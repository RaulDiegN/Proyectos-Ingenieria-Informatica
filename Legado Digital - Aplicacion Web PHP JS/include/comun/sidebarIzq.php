<?php if (isset($_SESSION['user_id'])): ?>
	<div class="sidebar-left">
		<div class="buttons-column">
			<div class="button">
				<a class="button-link" href="miHistoria.php">Consultas</a>
			</div>

			<div class="button">
				<a class="button-link" href="#EliminarCuenta">Eliminar Cuenta</a>
			</div>

			<div class="button">
				<a class="button-link" href="archivador.php">Archivador</a>
			</div>

			<div class="button">
				<a class="button-link" href="muro.php">Muro Memorial</a>
			</div>

			<div class="button">
				<a class="button-link" href="testamento.php">Testamento</a>
			</div>
		</div>
	</div>
<?php endif ?>
