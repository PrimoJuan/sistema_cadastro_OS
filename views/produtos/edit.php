<div class="card col col-lg-5 mx-3 mx-lg-auto p-0">
	<div class="card-header">
		<h3 class="card-title">Editar Produto</h3>
	</div>
	<div class="card-body">
		<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
		<div class="form-group">
				<label for="codigo">Código Produto:</label>
				<input type="number" name="codigo" class="form-control" id="codigo" value="<?=$retorno['codigo']?>" required />
			</div>
		<div class="form-group">
				<label for="descricao">Descrição Produto:</label>
				<input type="text" name="descricao" class="form-control" id="descricao" value="<?=$retorno['descricao']?>" required />
			</div>
			<div class="form-check">
				<input type="checkbox" name="ativo" class="form-check-input" <?= ($retorno['ativo']=='1' ? 'checked' : '');?> id="ativo">
				<label class="form-check-label" for="ativo">Ativo</label>
			</div><br>
			<input type="hidden" name="id" value="<?= $retorno['id_produto']; ?>" />
			<input class="btn btn-primary" name="submit" type="submit" value="Atualizar" />
			<a class="btn btn-danger" href="<?php echo ROOT_PATH; ?>produtos">Cancelar</a>
		</form>
	</div>
</div>