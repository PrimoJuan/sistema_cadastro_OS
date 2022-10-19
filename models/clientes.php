<?php

class clientesModel extends Model{
    public function Index(){
		$rows = $this->run2('SELECT * FROM cliente');
		return $rows;
	}

	public function getClientebyId($id=''){
		$rows = $this->run('SELECT * 
							FROM cliente 
							where cliente_id ='.$id);
		return $rows;
	}

	public function add($nome = '', $cpf = '', $endereco = '', $numero =''){
        $sql = "INSERT INTO cliente (nome, cpf, numero, endereco)
				VALUES ('".$nome."', '".$cpf."', '".$endereco."', '".$numero."');";
		$id = $this->runAndGetId($sql);
        return $id;
	}

	public function edit($id='', $nome='', $endereco='',$numero=''){
		$rows = $this->runReturnRow("	UPDATE CLIENTE
										SET nome = '".$nome."', 
											endereco = '".$endereco."', 
											numero = '".$numero."'
										WHERE cliente_id =".$id);
		return $rows;
	}

	public function delete($id=''){
		$id = $this->runReturnRow("DELETE FROM CLIENTE WHERE cliente_id =".$id);
		return $id;
	}
}
?>