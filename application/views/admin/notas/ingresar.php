
<div class="container no-padding">
	<div class="panel panel-default">
		<div class="panel-heading text-center">
			<h3 class="panel-title"><strong><?=$titulo?></strong></h3>
		</div>
		<div class="panel-body">
			<form action="<?=base_url()?>notas/registrarNota" method="POST">
				<div class="form-group">
					<label class="">Parcial</label>
					<select class="form-control" name="parcial">
						<option value="1">Parcial uno</option>
						<option value="2">Parcial dos</option>
						<option value="3">Parcial recuperación</option>
					</select>
				</div>

				<div class="form-group">
					<label class="">Materia</label>
					<select class="form-control" name="materia">
						<?php foreach ($materias->result() as $materia): ?>
							<option value="<?= $materia->idmateria ?>"><?= $materia->descripcion ?></option>
						<?php endforeach ?>
					</select>
				</div>

				<div class="form-group">
					<label>Nota: </label>
					<input type="text" class="form-control" name="nota">
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-primary">Ingresar Nota</button>
				</div>
			</form>
		</div>
	</div>
</div>
