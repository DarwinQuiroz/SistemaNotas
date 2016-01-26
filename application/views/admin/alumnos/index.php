
<div class="container no-padding">
	<div class="panel panel-default">
		<div class="panel-heading text-center">
			<h3 class="panel-title"><strong><?=$titulo?></strong></h3>
		</div>

		<div class="panel-body">
			<a href="<?=base_url()?>alumno/crear" class="btn btn-default">Registrar Nuevo Alumno <i class="fa fa-user fa-fw"></i></a>
			<form action="<?= base_url()?>alumno" method="GET" class="navbar-form pull-right">
				<div class="input-group">
					<input type="text" name="nombre" class="form-control" placeholder="Buscar alumno..." aria-describedy="search">
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
						<?php if ($alumnos): ?>
							<?php foreach ($alumnos->result() as $alumno): ?>
								<tr>
									<td><?= $alumno->descripcion ?></td>
									<td><?= $alumno->cedula ?></td>
									<td><?= $alumno->nombres ?></td>
									<td><?= $alumno->apellidos ?></td>
									<td><?= $alumno->telefono ?></td>
									<td><?= $alumno->direccion ?></td>
									<td><?= $alumno->correo ?></td>
									<td>
										<a href="<?= base_url() ?>alumno/editar/<?=$alumno->idalumno?>" class="btn btn-xs btn-warning"><i class="fa fa-pencil fa-fw"></i> Editar</a>
										<a href="<?= base_url()?>alumno/eliminar/<?=$alumno->idalumno?>" onclick="return confirm('¿Seguro desea eliminar este usuario?')" class="btn btn-xs btn-danger"><i class="fa fa-trash-o fa-fw"></i> Eliminar</a>
									</td>
								</tr>
							<?php endforeach ?>
						<?php else: ?>
							<?= "<h3>No existen registros..!!</h3>" ?>
						<?php endif ?>
					</tbody>
				</table>
			</div>
			<?=$this->pagination->create_links() ?>
		</div>
	</div>
</div>
