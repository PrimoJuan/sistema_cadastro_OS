<div class="card col col-lg-5 mx-3 mx-lg-auto p-0">
	<div class="card-header">
		<h3 class="card-title">Editar Cliente</h3>
	</div>
	<div class="card-body">
		<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
		<div class="form-group">
				<label for="nome">Nome Cliente:</label>
				<input type="text" name="nome" class="form-control" id="nome" required value="<?= $retorno['nome']; ?>" />
			</div>
			<div class="form-group">
				<label for="cpf">CPF</label>
				<input type="text" name="cpf" class="form-control" id="cpf" readonly value="<?= $retorno['cpf']; ?>">
			</div>
			<div class="form-group">
				<label for="endereco">Endereço</label>
				<input type="text" name="endereco" class="form-control" id="endereco" required value="<?= $retorno['endereco']; ?>">
			</div>
			<div class="form-group">
				<label for="numero">Número</label>
				<input type="text" name="numero" class="form-control" id="numero" required value="<?= $retorno['numero']; ?>">
			</div>
			<input type="hidden" name="id" value="<?= $retorno['cliente_id']; ?>" />
			<input class="btn btn-primary" name="submit" type="submit" value="Atualizar" />
			<a class="btn btn-danger" href="<?php echo ROOT_PATH; ?>clientes">Cancelar</a>
		</form>
	</div>
</div>