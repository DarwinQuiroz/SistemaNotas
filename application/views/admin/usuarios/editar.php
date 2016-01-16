
<div class="container text-center no-padding">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><strong><?=$titulo?></strong></h3>
		</div>
		<div class="panel-body">
			<form action="<?=base_url()?>usuario/actualizar" method="POST">
				<div class="form-group">
					<label>Nombre: </label>
					<input type="text" class="form-control" value="<?= $usuarios->result()[0]->nombres?>" name="nombre">
				</div>

				<div class="form-group">
					<label>Correo: </label>
					<input type="text" class="form-control" value="<?= $usuarios->result()[0]->correo?>" name="correo">
				</div>

				<div class="form-group">
					<label>Usuario: </label>
					<input type="text" class="form-control" value="<?= $usuarios->result()[0]->usuario?>" name="usuario">
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-primary">Actualizar</button>
				</div>
			</form>
		</div>
	</div>
</div>
