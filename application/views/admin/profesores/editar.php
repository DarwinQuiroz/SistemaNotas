
<div class="container text-center no-padding">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><strong><?=$titulo.': '.$profesor->result()[0]->nombres." ".$profesor->result()[0]->apellidos?></strong></h3>
		</div>
		<div class="panel-body">
			<form class="" action="<?=base_url()?>profesor/actualizar" method="POST">
				<div class="form-group">
					<input type="hidden" class="form-control" name="id" value="<?= $profesor->result()[0]->idprofesor?>">
				</div>

				<div class="form-group">
					<label>Cedula: </label>
					<input type="text" class="form-control" name="cedula" value="<?= $profesor->result()[0]->cedula?>">
				</div>

				<div class="form-group">
					<label>Nombres: </label>
					<input type="text" class="form-control" name="nombres" value="<?= $profesor->result()[0]->nombres?>">
				</div>

				<div class="form-group">
					<label>Apellidos: </label>
					<input type="text" class="form-control" name="apellidos" value="<?= $profesor->result()[0]->apellidos?>">
				</div>

				<div class="form-group">
					<label>Teléfono: </label>
					<input type="number" class="form-control" name="telefono" value="<?= $profesor->result()[0]->telefono?>">
				</div>

				<div class="form-group">
					<label>Dirección: </label>
					<input type="text" class="form-control" name="direccion" value="<?= $profesor->result()[0]->direccion?>">
				</div>

				<div class="form-group">
					<label>Correo: </label>
					<input type="text" class="form-control" name="correo" value="<?= $profesor->result()[0]->correo?>">
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-primary">Actualizar <i class="fa fa-refresh"></i></button>
				</div>
			</form>
			<hr>
			<?= validation_errors() ?>
		</div>
	</div>
</div>