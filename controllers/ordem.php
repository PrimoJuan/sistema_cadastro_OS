<?php
class Ordem extends Controller{
    
	protected function Index(){
		$modelOrdem = new ordemModel();
        $data_inicial =!empty($_REQUEST['data_inicial'])? $_REQUEST['data_inicial']: '';
        $data_final =!empty($_REQUEST['data_final'])? $_REQUEST['data_final']: '';
		$this->returnView($modelOrdem->Index($data_inicial, $data_final), true);
	}

	protected function add(){
        print_r($_REQUEST);
        $modelOrdem = new ordemModel();
        if(!empty($_REQUEST['submit'])){
            $resultado = $modelOrdem->add(      $_REQUEST['numero_ordem'],
                                                $_REQUEST['data_abertura'], 
                                                $_REQUEST['cpf_consumidor'],
                                                $_REQUEST['nome_consumidor'],
                                                $_REQUEST['produto']);
            if(!empty($resultado)){
                Messages::setMsg('Ordem de Serviço Cadastrada com Sucesso!', 'success');
            }else{
                Messages::setMsg('Erro ao Ordem de Serviço!', 'error');
            }
        }
        $produtos = $modelOrdem->getProdutos();
        $this->returnView('add', true, $produtos);
	}

	protected function edit(){
        $modelOrdem = new ordemModel();
        if(!empty($_REQUEST['submit'])){
            $resultado = $modelOrdem->edit(     $_REQUEST['id'],
                                                $_REQUEST['numero_ordem'],
                                                $_REQUEST['data_abertura'], 
                                                $_REQUEST['cpf_consumidor'],
                                                $_REQUEST['nome_consumidor'],
                                                $_REQUEST['produto']);
            if(!empty($resultado)){
                Messages::setMsg('Ordem de Serviço Atualizada com Sucesso!', 'success');
            }else{
                Messages::setMsg('Erro ao Atualizar Ordem de Serviço!', 'error');
            }
        }
        $cliente = $modelOrdem->getOrdembyId($_REQUEST['id']);
        $this->returnView('edit', true, $cliente);
	}

	protected function delete(){
        $modelOrdem = new ordemModel();
        $resultado = $modelOrdem->delete($_REQUEST['id']);
        if(!empty($resultado)){
            Messages::setMsg('Ordem de Serviço excluída com Sucesso!', 'success');
        }else{
            Messages::setMsg('Erro ao Excluir Ordem de Serviço!', 'error');
        }
        $this->returnView('index', true);
	}

    protected function finalizar(){
        $modelOrdem = new ordemModel();
        $resultado = $modelOrdem->finalizar($_REQUEST['id']);
        $array = array(
                            "sucesso" => !empty($resultado)?'true':'false',
                        );
        return json_encode($array);
        // if(!empty($resultado)){
        //     Messages::setMsg('Ordem de Serviço excluída com Sucesso!', 'success');
        // }else{
        //     Messages::setMsg('Erro ao Excluir Ordem de Serviço!', 'error');
        // }
        //$this->returnView('index', true);
	}
}
?>