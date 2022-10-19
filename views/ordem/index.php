<div class="col-md-12">
	<div class="card mb-4">
		<h3 class="card-header">
			Listagem de Ordens de Serviço
			<a id="btn_cadastro" style="float: right;" class="btn btn-success"href="<?php echo ROOT_PATH; ?>ordem/add">Adicionar Ordem de Serviço</a>
		</h3>
		<div class="card mb-4"><br>
			<form method="post" action="<?php echo ROOT_PATH; ?>ordem/index">
				<div class="form-group">
					<label for="data_inicial">Data Inicial</label>
					<input type="date" id="data_inicial" name="data_inicial" value="<?=$_REQUEST['data_inicial'];?>">
				
					<label for="data_final">Data Abertura</label>
					<input type="date" id="data_final" name="data_final" value="<?=$_REQUEST['data_final'];?>">
					<input class="btn btn-primary" name="submit" type="submit" value="buscar" />
				</div>
			</form>
		</div>
		<table class="table">
		<thead class="thead-dark">
			<tr>
				<th scope="col">Id</th>
				<th scope="col">Numero O.S</th>
				<th scope="col">Nome Consumidor</th>
				<th scope="col">Produto</th>
                <th scope="col">Data Abertura</th>
				<th scope="col">Situação</th>
                <th scope="col">Ações</th>
				<th scope="col">Editar</th>
				<th scope="col">Excluir</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($viewmodel as $ordem){?>
				<tr>
					<th><?=$ordem['id_ordem']?></th>
					<td><?=$ordem['numero_ordem']?></td>
					<td><?=$ordem['nome_consumidor']?></td>
					<td><?=$ordem['descricao_produto']?></td>
					<td><?=date('d/m/Y', strtotime($ordem['data_abertura']))?></td>
					<td scope="col"><?= $ordem['finalizado'] == '1' ? 'Finalizada' :'Aberta'?></td>
                    <td><button class="btn btn-dark" onclick="finalizar(<?= $ordem['id_ordem']; ?>)" >Finalizar</button></td>
					<td><a class="btn btn-info"href="<?php echo ROOT_PATH; ?>ordem/edit/<?= $ordem['id_ordem']; ?>">Editar</a></td>
					<td><a class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir esta Ordem de Serviço?');" href="<?php echo ROOT_PATH; ?>ordem/delete/<?= $ordem['id_ordem']; ?>">Excluir</a></td>
				</tr>
				</tr>
			<?php }?>
		</tbody>
		</table>
	</div>
</div>

<script>
   function finalizar(id) {
	$.ajax({
		type: 'GET',
		url: '<?php echo ROOT_PATH; ?>/ordem/finalizar/' + id,
		success: function(data) {
			if(data == 'true'){
				alert('Ordem de Serviço alterada com sucesso!');
				location.reload();
			}else{
				alert('Erro ao finalizar ordem!');
			}
		}
  	});
}
</script>