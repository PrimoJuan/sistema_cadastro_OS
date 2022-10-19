<?php

abstract class Controller{

	protected $request;
	protected $action;

	public function __construct($action, $request){
		$this->action = $action;
		$this->request = $request;
	}

	public function executeAction(){
		return $this->{$this->action}();
	}

	protected function returnView($viewmodel='', $fullview='',$retorno=''){
		$view = 'views/' . get_class($this) . '/' . $this->action . '.php';

		if($viewmodel == 'index'){
			header('Location: ' . ROOT_PATH .get_class($this));
		}elseif($fullview){
			require('views/main.php');
		}else{
			require($view);
		}
	}

}

?>