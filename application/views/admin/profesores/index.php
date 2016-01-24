
<div class="container no-padding">
	<div class="panel panel-default">
		<div class="panel-heading text-center">
			<h3 class="panel-title"><strong><?=$titulo?></strong></h3>
		</div>
		<div class="panel-body">
			<a href="<?=base_url()?>profesor/crear" class="btn btn-default">Registrar Nuevo Profesor</a>
			<form action="<?= base_url()?>profesor" method="GET" class="navbar-form pull-right">
				<div class="input-group">
					<input type="text" name="nombre" class="form-control" placeholder="Buscar profesor..." aria-describedy="search">
					<span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
				</div>
			</form>
			<hr>
			<div class="table-responsive">
				<table class="table  table-bordered table-hover table-condensed">
					<thead>
						<td>Facultad</td>
						<td>Cedula</td>
						<td>Nombres</td>
						<td>Apellidos</td>
						<td>Teléfono</td>
						<td>Dirección</td>
						<td>Correo</td>
						<td>Acción</td>
					</thead>
					<tbody>
						<?php if ($profesores): ?>
							<?php foreach ($profesores->result() as $profesor): ?>
								<tr>
									<?php foreach($facultades->result() as $facultad): ?>
										<td><?= $facultad->descripcion ?></td>
									<?php endforeach ?>
									<td><?= $profesor->cedula ?></td>
									<td><?= $profesor->nombres ?></td>
									<td><?= $profesor->apellidos ?></td>
									<td><?= $profesor->telefono ?></td>
									<td><?= $profesor->direccion ?></td>
									<td><?= $profesor->correo ?></td>
									<td>
										<a href="" class="btn btn-xs btn-warning"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Editar</a>
										<a href="<?= base_url()?>profesor/eliminar/<?=$profesor->idprofesor?>" onclick="return confirm('¿Seguro desea eliminar este profesor?')" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Eliminar</a>
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