
<div class="container text-center no-padding">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><strong><?=$titulo.": ". $usuarios->result()[0]->nombres?></strong></h3>
		</div>
		<div class="panel-body">
			<form action="<?=base_url()?>usuario/actualizar" method="POST">
				<div class="form-group">
					<input type="hidden" class="form-control" name="id" value="<?= $usuarios->result()[0]->idusuario?>">
				</div>

				<div class="form-group">
					<label>Nombre: </label>
					<input type="text" class="form-control" name="nombre" value="<?= $usuarios->result()[0]->nombres?>">
				</div>

				<div class="form-group">
					<label>Correo: </label>
					<input type="text" class="form-control"  name="correo" value="<?= $usuarios->result()[0]->correo?>" >
				</div>

				<div class="form-group">
					<label>Usuario: </label>
					<input type="text" class="form-control" name="usuario" value="<?= $usuarios->result()[0]->usuario?>">
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-primary">Actualizar <i class="fa fa-refresh"></i></button>
				</div>
			</form>
		</div>
	</div>
</div>
