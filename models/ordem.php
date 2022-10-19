<?php

class ordemModel extends Model{
    public function Index($data_inicial='', $data_final=''){
		$where = '';
		if(!empty($data_inicial) and !empty($data_final)){
			$where = " WHERE data_abertura BETWEEN '".$data_inicial."' AND '".$data_final."'";
		}elseif(!empty($data_inicial)){
			$where = " WHERE data_abertura = '".$data_inicial."'";
		}elseif(!empty($data_final)){
			$where = " WHERE data_abertura = '".$data_final."'";
		}
		$rows = $this->run2("SELECT * , p.descricao AS descricao_produto
							 FROM ordem o
							 LEFT JOIN produto p ON o.produto = p.id_produto ".$where);
		return $rows;
	}
	public function getProdutos($id=''){
		$rows = $this->run2('SELECT * FROM produto where ativo = 1');
		return $rows;
	}

	public function getOrdembyId($id=''){
		$rows = $this->run('SELECT * , p.descricao AS descricao_produto
							FROM ordem o
							LEFT JOIN produto p ON o.produto = p.id_produto
							where id_ordem ='.$id);
		return $rows;
	}

	public function getClientebyCpf($cpf=''){
		$rows = $this->run("SELECT cliente_id, nome, cpf
							FROM cliente 
							where cpf ='".$cpf."'");					
		return $rows;
	}

	public function insertCliente($nome = '', $cpf = ''){
        $sql = "INSERT INTO cliente (nome, cpf, numero, endereco)
				VALUES ('".$nome."', '".$cpf."', NULL, '');";
		$id = $this->runAndGetId($sql);
        return $id;
	}

	public function add($numero_ordem = '', $data_abertura = '', $cpf_consumidor='', $nome_consumidor='', $produto=''){
		$id_cliente = $this->getClientebyCpf($cpf_consumidor);
		if(!empty($id_cliente)){
			$cpf_consumidor = $id_cliente['cpf'];
			$nome_consumidor = $id_cliente['nome'];
		}else{
			$id_cliente = $this->insertCliente($nome_consumidor, $cpf_consumidor);		
		}

        $sql = "INSERT INTO ordem (numero_ordem, data_abertura, cpf_consumidor, nome_consumidor, produto)
        		VALUES ('".$numero_ordem."', '".$data_abertura."','".$cpf_consumidor."', '".$nome_consumidor."', '".$produto."');";
		$id = $this->runAndGetId($sql);
        return $id;
	}

	public function edit($id='', $data_abertura='', $nome_consumidor='', $cpf_consumidor='', $numero_ordem='', $produto=''){
		$id_cliente = $this->getClientebyCpf($cpf_consumidor);
		if(!empty($id_cliente)){
			$cpf_consumidor = $id_cliente['cpf'];
			$nome_consumidor = $id_cliente['nome'];
		}else{
			$id_cliente = $this->insertCliente($nome_consumidor, $cpf_consumidor, '', '');		
		}
		
		$rows = $this->runReturnRow("	UPDATE ORDEM
										SET data_abertura = '".$data_abertura."', 
											nome_consumidor = '".$nome_consumidor."',
											cpf_consumidor = '".$cpf_consumidor."',
											numero_ordem = '".$numero_ordem."',
											produto = '".$produto."'
										WHERE id_ordem =".$id);
		return $rows;
	}

	public function delete($id=''){
		$id = $this->runReturnRow("DELETE FROM ORDEM WHERE id_ordem =".$id);
		return $id;
	}

	public function finalizar($id=''){

		$ordem = $this->getOrdembyId($id);

		$valor = $ordem['finalizado'] == '1' ? '0' :'1';
		
		$rows = $this->runReturnRow("	UPDATE ORDEM
										SET finalizado = ".$valor."
										WHERE id_ordem =".$id);
		return $rows;
	}
}
?>