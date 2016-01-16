
<div class="container text-center no-padding">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><strong><?=$titulo?></strong></h3>
		</div>
		<div class="panel-body">
			<a href="<?=base_url()?>usuario/crear" class="btn btn-default">Registrar Nuevo Usuario</a>
			<div class="table-responsive">
				<table class="table table-striped table-hover table-condensed">
					<thead>
						<td>Nombre</td>
						<td>Correo</td>
						<td>Usuario</td>
						<td>Acción</td>
					</thead>
					<tbody>
						<?php if ($usuarios): ?>
							<?php foreach ($usuarios->result() as $usuario): ?>
								<tr>
									<td><?= $usuario->nombres ?></td>
									<td><?= $usuario->correo ?></td>
									<td><?= $usuario->usuario ?></td>
									<td>
										<a href="<?= base_url()?>usuario/editar/<?=$usuario->idusuario?>" class="btn btn-warning"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Editar</a>
										<a href="<?=base_url()?>usuario/eliminar/<?=$usuario->idusuario?>" onclick="return confirm('¿Seguro desea eliminar este usuario?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Eliminar</a>
									</td>
								</tr>
							<?php endforeach ?>
						<?php else: ?>
							<?= "<h3>Registro no encontrado..!!</h3>" ?>
						<?php endif ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
