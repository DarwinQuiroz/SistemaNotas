
<div class="container text-center no-padding">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><strong><?=$titulo.': '.$materia->result()[0]->descripcion?></strong></h3>
		</div>
		<div class="panel-body">
			<form class="" action="<?=base_url()?>materia/actualizar" method="POST">
				<div class="form-group">
					<input type="hidden" class="form-control" name="id" value="<?= $materia->result()[0]->idmateria?>">
				</div>

				<div class="form-group">
					<label>Nivel: </label>
					<input type="text" class="form-control" name="nivel" value="<?= $niveles->result()[0]->descripcion?>">
				</div>

				<div class="form-group">
					<label>Materia: </label>
					<input type="text" class="form-control" name="materia" value="<?= $materia->result()[0]->descripcion?>">
				</div>

				<div class="form-group">
					<label>Creditos: </label>
					<input type="number" class="form-control" name="creditos" value="<?= $materia->result()[0]->credito?>">
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-primary">Actualizar <i class="fa fa-refresh"></i></button>
				</div>
			</form>
			<hr>
		</div>
	</div>
</div>