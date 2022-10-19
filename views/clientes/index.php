<div class="col-md-12">
	<div class="card mb-4">
		<h3 class="card-header">
			Listagem de Clientes
			<a id="btn_cadastro" class="btn btn-success"href="<?php echo ROOT_PATH; ?>clientes/add">Adicionar Cliente</a>
		</h3>
		<table class="table">
		<thead class="thead-dark">
			<tr>
				<th scope="col">Id</th>
				<th scope="col">Nome</th>
				<th scope="col">CPF</th>
				<th scope="col">Endereço</th>
				<th scope="col">Número</th>
				<th scope="col">Editar</th>
				<th scope="col">Excluir</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($viewmodel as $cliente){?>
				<tr>
					<th><?=$cliente['cliente_id']?></th>
					<td><?=$cliente['nome']?></td>
					<td><?=$cliente['cpf']?></td>
					<td><?=$cliente['endereco']?></td>
					<td><?=$cliente['numero']?></td>
					<td><a class="btn btn-info"href="<?php echo ROOT_PATH; ?>clientes/edit/<?= $cliente['cliente_id']; ?>">Editar</a></td>
					<td><a class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este cliente?');" href="<?php echo ROOT_PATH; ?>clientes/delete/<?= $cliente['cliente_id']; ?>">Excluir</a></td>
				</tr>
			<?php }?>
		</tbody>
		</table>
	</div>
</div>