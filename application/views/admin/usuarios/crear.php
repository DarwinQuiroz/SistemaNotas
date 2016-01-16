
<div class="container text-center no-padding">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><strong><?=$titulo?></strong></h3>
		</div>
		<div class="panel-body">
			<form action="<?=base_url()?>usuario/crear" method="POST">
				<div class="form-group">
					<label>Nombres: </label>
					<input type="text" class="form-control" name="nombre">
				</div>

				<div class="form-group">
					<label>Correo: </label>
					<input type="text" class="form-control" name="correo">
				</div>

				<div class="form-group">
					<label>Usuario: </label>
					<input type="text" class="form-control" name="usuario">
				</div>

				<div class="form-group">
					<label>Contraseña: </label>
					<input type="password" class="form-control" name="clave">
				</div>

				<div class="form-group">
					<label>Confirme Contraseña: </label>
					<input type="password" class="form-control" name="claveConfirm">
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-primary">Guardar</button>
				</div>
			</form>
			<hr>
			<?= validation_errors() ?>
		</div>
	</div>
</div>