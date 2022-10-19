<?php

class Produtos extends Controller{
    
	protected function Index(){
		$modelProduto = new produtosModel();
		$this->returnView($modelProduto->Index(), true);
	}

	protected function add(){
        $modelProduto = new produtosModel();
        if(!empty($_REQUEST['submit'])){
            $ativo = !empty($_REQUEST['ativo']) ? '1' :'0';
            $resultado = $modelProduto->add(    $_REQUEST['descricao'],
                                                $ativo,
                                                $_REQUEST['codigo']);
            if(!empty($resultado)){
                Messages::setMsg('Produto Cadastrado com Sucesso!', 'success');
            }else{
                Messages::setMsg('Erro ao Cadastrar Produto!', 'error');
            }
        }
        $this->returnView('add', true);
	}

	protected function edit(){
        $modelProduto = new produtosModel();
        if(!empty($_REQUEST['submit'])){
            $ativo = !empty($_REQUEST['ativo']) ? '1' :'0';
            $resultado = $modelProduto->edit(   $_REQUEST['id'],
                                                $_REQUEST['descricao'],
                                                $ativo,
                                                $_REQUEST['codigo']);
                                                
            if(!empty($resultado)){
                Messages::setMsg('Produto Atualizado com Sucesso!', 'success');
            }else{
                Messages::setMsg('Erro ao Atualizar Produto!', 'error');
            }
        }
        $produto = $modelProduto->getProdutobyId($_REQUEST['id']);
        $this->returnView('edit', true, $produto);
	}

	protected function delete(){
        $modelProduto = new produtosModel();
        $resultado = $modelProduto->delete($_REQUEST['id']);
        Messages::setMsg('Produto Excluído com Sucesso!', 'success');  
        $this->returnView('index', true);
	}
}

?>