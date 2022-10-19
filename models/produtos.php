<?php

class produtosModel extends Model{
    public function Index(){
		$rows = $this->run2('SELECT * FROM produto');
		return $rows;
	}

	public function getProdutobyId($id=''){
		$rows = $this->run('SELECT * 
							FROM produto 
							where id_produto ='.$id);
		return $rows;
	}

	public function add($descricao = '', $ativo = '', $codigo=''){
        $sql = "INSERT INTO produto (descricao, codigo,ativo)
        		VALUES ('".$descricao."', '".$codigo."','".$ativo."');";
		$id = $this->runAndGetId($sql);
        return $id;
	}

	public function edit($id='', $descricao='', $ativo='', $codigo=''){
		$rows = $this->runReturnRow("	UPDATE PRODUTO
										SET descricao = '".$descricao."',
											codigo = '".$codigo."', 
											ativo = '".$ativo."'
										WHERE id_produto =".$id);
		return $rows;
	}

	public function delete($id=''){
		$id = $this->runReturnRow("DELETE FROM PRODUTO WHERE id_produto =".$id);
		return $id;
	}
}
?>