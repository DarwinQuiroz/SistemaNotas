
<div class="container no-padding">
	<div class="panel panel-default">
		<div class="panel-heading text-center">
			<h3 class="panel-title"><strong><?=$titulo?></strong></h3>
		</div>
		<div class="panel-body">
			<a href="<?=base_url()?>usuario/crear" class="btn btn-default">Registrar Nuevo Usuario <i class="fa fa-users"></i></a>
			<form action="<?= base_url()?>usuario" method="POST" class="navbar-form pull-right">
				<div class="input-group">
					<input type="text" name="nombre" id="buscador" autocomplete="off" class="form-control" placeholder="Buscar usuario..." aria-describedy="search">
					<span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
				</div>
			</form>
			<hr>
			<div class="table-responsive">
				<table class="table table-striped table-hover table-condensed text-center">
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
										<a href="<?= base_url()?>usuario/editar/<?=$usuario->idusuario?>" class="btn btn-warning"><i class="fa fa-pencil fa-fw"></i> Editar</a>
										<a href="<?=base_url()?>usuario/eliminar/<?=$usuario->idusuario?>" onclick="return confirm('¿Seguro desea eliminar este usuario?')" class="btn btn-danger"><i class="fa fa-trash-o fa-fw"></i> Eliminar</a>
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
