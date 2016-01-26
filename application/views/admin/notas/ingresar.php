
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
					<label class="">Alumno</label>
					<select class="form-control alumno" name="alumno">
						<option></option>
						<?php foreach ($alumnos->result() as $alumno): ?>
							<option value="<?= $alumno->idalumno ?>"><?= $alumno->nombres.' '.$alumno->apellidos ?></option>
						<?php endforeach ?>
					</select>
				</div>

				<div class="form-group">
					<label class="">Materia</label>
					<select class="form-control materia" name="materia">
						<option></option>
						<?php foreach ($materias->result() as $materia): ?>
							<option value="<?= $materia->idmateria ?>"><?= $materia->descripcion ?></option>
						<?php endforeach ?>
					</select>
				</div>

				<div class="form-group">
					<label>Nota: </label>
					<input type="number" class="form-control" name="nota" placeholder="Ingrese la nota">
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-primary">Ingresar Nota</button>
				</div>
			</form>
		</div>
	</div>
</div>


