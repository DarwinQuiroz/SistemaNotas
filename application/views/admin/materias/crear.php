
<div class="container text-center no-padding">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><strong><?=$titulo?></strong></h3>
		</div>
		<div class="panel-body">
			<form class="" action="<?=base_url()?>materia/crear" method="POST">
				<div class="form-group">
					<label>Nivel: </label>
					<select class="form-control select-al" name="nivel">
						<option value="0"></option>
						<?php foreach ($niveles->result() as $nivel): ?>
							<option value="<?= $nivel->idnivel?>"><?= $nivel->descripcion ?></option>
						<?php endforeach ?>
					</select>
				</div>

				<div class="form-group">
					<label>Materia: </label>
					<input type="text" class="form-control" name="materia" value="<?= set_value('materia') ?>">
				</div>

				<div class="form-group">
					<label>Profesor: </label>
					<select class="form-control select-al" name="profesor">
						<?php foreach ($profesores->result() as $profesor): ?>
							<option value="<?= $profesor->idprofesor?>"><?= $profesor->nombres.' '. $profesor->apellidos ?></option>
						<?php endforeach ?>
						
					</select>
				</div>

				<div class="form-group">
					<label>Creditos: </label>
					<input type="number" class="form-control" name="creditos" value="<?= set_value('creditos') ?>">
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-primary">Guardar &nbsp;<i class="fa fa-floppy-o"></i></button>
				</div>
			</form>
			<hr>
			<?= validation_errors() ?>
		</div>
	</div>
</div>