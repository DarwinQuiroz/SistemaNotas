
<div class="container no-padding">
	<div class="panel panel-default">
		<div class="panel-heading text-center">
			<h3 class="panel-title"><strong><?=$titulo?></strong></h3>
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<label>Nombres: <?= $notas->result()[0]->nombres.' '.$notas->result()[0]->apellidos ?></label><br>
				<label>Cedula: <?= $notas->result()[0]->cedula ?></label><br>
				<label>Facultad: <?= $notas->result()[0]->descripcion ?></label><br>
				<hr>
				<table class="table table-striped table-hover table-condensed">
					<thead>
						<td>Materia</td>
						<td>Parcial 1</td>
						<td>Parcial 2</td>
						<td>Recuperación</td>
						<td>Suma</td>
						<td>Estado</td>
					</thead>
					<tbody>

					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
