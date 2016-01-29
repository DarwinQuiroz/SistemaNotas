<div class="container text-center no-padding">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><strong><?=$titulo?></strong></h3>
		</div>
		<div class="panel-body">
			<form action="<?= base_url() ?>notas/consulta" method="POST">
				<div class="form-group">
					<label>Año Lectivo: </label>
					<select class="form-control select-al" placeholder="Choose a country...">
						<?php foreach ($lectivos->result() as $lectivo): ?>
							<option values="<?= $lectivo->idañolectivo?>"><?= $lectivo->descripcion ?></option>
						<?php endforeach ?>
					</select>
				</div>
					<label>Periodo: </label>
					<select class="form-control select-p">
						<?php foreach ($periodos->result() as $periodo): ?>
							<option vlaues="<?= $periodo->idperiodo?>"><?= $periodo->descripcion ?></option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="form-group">
					<label>Cédula: </label>
					<input type="text" class="form-control" name="cedula" placeholder="Ingrese su número de cedula">
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Consultar</button>
				</div>
			</form>
		</div>
	</div>
</div>
