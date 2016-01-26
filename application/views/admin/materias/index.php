
<div class="container no-padding">
	<div class="panel panel-default">
		<div class="panel-heading text-center">
			<h3 class="panel-title"><strong><?=$titulo?></strong></h3>
		</div>
		<div class="panel-body">
			<a href="<?=base_url()?>materia/crear" class="btn btn-default">Registrar Nueva Materia</a>
			<form action="<?= base_url()?>materia" method="GET" class="navbar-form pull-right">
				<div class="input-group">
					<input type="text" name="nombre" class="form-control" placeholder="Buscar materia..." aria-describedy="search">
					<span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
				</div>
			</form>
			<hr>
			<div class="table-responsive">
				<table class="table  table-bordered table-hover table-condensed text-center">
					<thead>
						<td>Nivel</td>
						<td>Materia</td>
						<td>Credito</td>
						<td>Acción</td>
					</thead>
					<tbody>
						<?php if ($materias): ?>
							<?php foreach ($materias->result() as $materia): ?>
								<tr>
									<td><?= $materia->nivel ?></td>
									<td><?= $materia->descripcion ?></td>
									<td><?= $materia->credito ?></td>
									<td>
										<a href="<?=base_url()?>materia/editar/<?=$materia->idmateria?>" class="btn btn-xs btn-warning"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Editar</a>
										<a href="<?= base_url()?>materia/eliminar/<?=$materia->idmateria?>" onclick="return confirm('¿Seguro desea eliminar este materia?')" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Eliminar</a>
									</td>
								</tr>
							<?php endforeach ?>
						<?php else: ?>
							<?= "<h3>No existen registros..!!</h3>" ?>
						<?php endif ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
