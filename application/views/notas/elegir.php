<div class="container text-center no-padding">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><strong><?=$titulo?></strong></h3>
		</div>
		<div class="panel-body">
			<form action="<?= base_url() ?>notas/GuardarEleccion" method="POST">
				<div class="form-group">
					<label>Nivel: </label>
					<select class="form-control select-nivel" name="nivel">
						<?php foreach ($niveles->result() as $nivel): ?>
							<option value="<?=$nivel->idnivel?>"><?= $nivel->descripcion ?></option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="form-group">
					<label>Materias: </label>
					<select id="materia" class="form-control select-notas" name="materia" multiple>
						<?php foreach ($materias->result() as $materia): ?>
							<option value="<?=$materia->idmateria?>"><?= $materia->descripcion ?></option>
						<?php endforeach ?>
					</select>
				</div>
					<label>Periodo: </label>
					<select class="form-control select-periodo">
						<?php foreach ($periodos->result() as $periodo): ?>
							<option values="<?= $periodo->idperiodo?>"><?= $periodo->descripcion ?></option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="form-group">
					<label>Cédula: </label>
					<input type="text" class="form-control">
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Guardar</button>
				</div>
			</form>
		</div>
	</div>
</div>