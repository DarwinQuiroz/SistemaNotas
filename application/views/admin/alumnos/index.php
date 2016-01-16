
<div class="container no-padding text-center">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><strong><?=$titulo?></strong></h3>
		</div>
		<div class="panel-body">
			<a href="<?=base_url()?>alumno/crear" class="btn btn-default">Registrar Nuevo Alumno</a>
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
						<?php if ($alumnos): ?>
							<?php foreach ($alumnos->result() as $alumno): ?>
								<tr>
									<?php foreach($facultades->result() as $facultad): ?>
										<td><?= $facultad->descripcion ?></td>
									<?php endforeach ?>
									<td><?= $alumno->cedula ?></td>
									<td><?= $alumno->nombres ?></td>
									<td><?= $alumno->apellidos ?></td>
									<td><?= $alumno->telefono ?></td>
									<td><?= $alumno->direccion ?></td>
									<td><?= $alumno->correo ?></td>
									<td>
										<a href="" class="btn btn-xs btn-warning"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Editar</a>
										<a href="<?= base_url()?>alumno/eliminar/<?=$alumno->idalumno?>" onclick="return confirm('¿Seguro desea eliminar este usuario?')" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Eliminar</a>
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