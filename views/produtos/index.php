<div class="col-md-12">
	<div class="card mb-4">
		<h3 class="card-header">
			Listagem de Produtos
			<a id="btn_cadastro" class="btn btn-success"href="<?php echo ROOT_PATH; ?>produtos/add">Adicionar Produto</a>
		</h3>
		<table class="table">
		<thead class="thead-dark">
			<tr>
				<th scope="col">Id</th>
				<th scope="col">Código</th>
				<th scope="col">Descrição</th>
				<th scope="col">Ativo</th>
				<th scope="col">Editar</th>
				<th scope="col">Excluir</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($viewmodel as $produto){?>
				<tr>
					<th><?=$produto['id_produto']?></th>
					<th><?=$produto['codigo']?></th>
					<td><?=$produto['descricao']?></td>
					<td><?=$produto['ativo'] == '1' ? 'Ativo' :'Desativado'?></td>
					<td><a class="btn btn-info"href="<?php echo ROOT_PATH; ?>produtos/edit/<?= $produto['id_produto']; ?>">Editar</a></td>
					<td><a class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este produto?');" href="<?php echo ROOT_PATH; ?>produtos/delete/<?= $produto['id_produto']; ?>">Excluir</a></td>
				</tr>
			<?php }?>
		</tbody>
		</table>
	</div>
</div>