
<div class="container text-center no-padding">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><strong><?=$titulo?></strong></h3>
		</div>
		<div class="panel-body">
			<form class="" action="<?=base_url()?>profesor/crear" method="POST">
				<div class="form-group">
					<label>Facultad: </label>
					<select class="form-control select-al" name="facultad">
						<?php foreach ($facultades->result() as $facultad): ?>
							<option value="<?= $facultad->idfacultad?>"><?= $facultad->descripcion ?></option>
						<?php endforeach ?>
					</select>
				</div>

				<div class="form-group">
					<label>Cedula: </label>
					<input type="text" class="form-control" name="cedula" value="<?= set_value('cedula') ?>">
				</div>

				<div class="form-group">
					<label>Nombres: </label>
					<input type="text" class="form-control" name="nombres" value="<?= set_value('nombres') ?>">
				</div>

				<div class="form-group">
					<label>Apellidos: </label>
					<input type="text" class="form-control" name="apellidos" value="<?= set_value('apellidos') ?>">
				</div>

				<div class="form-group">
					<label>Teléfono: </label>
					<input type="number" class="form-control" name="telefono" value="<?= set_value('telefono') ?>">
				</div>

				<div class="form-group">
					<label>Dirección: </label>
					<input type="text" class="form-control" name="direccion" value="<?= set_value('direccion') ?>">
				</div>

				<div class="form-group">
					<label>Correo: </label>
					<input type="text" class="form-control" name="correo" value="<?= set_value('correo') ?>">
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