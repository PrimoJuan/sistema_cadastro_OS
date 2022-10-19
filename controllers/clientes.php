<?php

class Clientes extends Controller{
    
	protected function Index(){
		$modelCliente = new clientesModel();
		$this->returnView($modelCliente->Index(), true);
	}

	protected function add(){
        $modelCliente = new clientesModel();
        if(!empty($_REQUEST['submit'])){
            $resultado = $modelCliente->add(    $_REQUEST['nome'],
                                                $_REQUEST['cpf'], 
                                                $_REQUEST['endereco'], $_REQUEST['numero']);
            if(!empty($resultado)){
                Messages::setMsg('Cliente Cadastrado com Sucesso!', 'success');
            }else{
                Messages::setMsg('Erro ao Cadastrar Cliente!', 'error');
            }
        }
        $this->returnView('add', true);
	}

	protected function edit(){
        $modelCliente = new clientesModel();
        if(!empty($_REQUEST['submit'])){
            $resultado = $modelCliente->edit(   $_REQUEST['id'],
                                                $_REQUEST['nome'],
                                                $_REQUEST['endereco'], 
                                                $_REQUEST['numero']);
            if(!empty($resultado)){
                Messages::setMsg('Cliente Atualizado com Sucesso!', 'success');
            }else{
                Messages::setMsg('Erro ao Atualizar Cliente!', 'error');
            }
        }
        $cliente = $modelCliente->getClientebyId($_REQUEST['id']);
        $this->returnView('edit', true, $cliente);
	}

	protected function delete(){
        $modelCliente = new clientesModel();
        $resultado = $modelCliente->delete($_REQUEST['id']);
        if(!empty($resultado)){
            Messages::setMsg('Cliente Excluído com Sucesso!', 'success');
        }else{
            Messages::setMsg('Erro ao Excluir Cliente!', 'error');
        }
        $this->returnView('index', true);
	}
}

?>