
<div class="card col col-lg-5 mx-3 mx-lg-auto p-0">
	<div class="card-header">
		<h3 class="card-title">Cadastrar Ordem de Serviço</h3>
	</div>
	<div class="card-body">
		<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
			<div class="form-group">
				<label for="numero_ordem">Número Ordem:</label>
				<input type="number" name="numero_ordem" class="form-control" id="numero_ordem" required value="<?=$retorno['ordem']['numero_ordem']?>" />
			</div>
			<div class="form-group">
				<label for="data_abertura">Data Abertura</label>
				<input type="date" id="data_abertura" name="data_abertura" value="<?=$retorno['ordem']['data_abertura']?>">
			</div>
			<div class="form-group">
				<label for="nome_consumidor">Nome Consumidor</label>
				<textarea name="nome_consumidor" class="form-control" id="nome_consumidor" required ><?=$retorno['ordem']['nome_consumidor']?></textarea>
			</div>
			<div class="form-group">
				<label for="cpf_consumidor">CPF Consumidor</label>
				<textarea name="cpf_consumidor" class="form-control" id="cpf_consumidor" required ><?=$retorno['ordem']['cpf_consumidor']?></textarea>
			</div>
            <div class="form-group">
                <label for="produto">Produto</label>
                <select class="form-control" name="produto" id="produto">
                <?php foreach($retorno['produtos'] as $produto){?>
                    <option value="<?=$produto['id_produto']?>" <?=($produto['id_produto'] == $retorno['ordem']['id_produto']) ? 'selected': ''?>><?='Cod: '.$produto['codigo'].' Descrição: '.$produto['descricao']?></option>
                <?php }?>
                </select>
            </div>
			<input class="btn btn-primary" name="submit" type="submit" value="Atualizar" />
			<a class="btn btn-danger"  href="<?php echo ROOT_PATH; ?>ordem">Cancelar</a>
		</form>
	</div>
</div>
,
