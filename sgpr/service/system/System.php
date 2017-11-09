<?php
	
	class System extends segurancaHelper{

		private $_url;
		private $_explode;
		public  $_controller;
		public  $_action;
		public  $_params;


		public function __construct(){

			$this->setUrl();
			$this->setExplode();
			$this->setController();
			$this->setAction();
			$this->setParams();

			//verifica se a rota é a de login, se for não aplica proteção a pagina, se não aplica
			if ($_GET["url"] != 'login/') {
				$this->protegePagina();
			}

		}

		private function setUrl(){

			$_GET["url"] = ($_GET["url"] == null ? 'index/index_action' : $_GET["url"]);
			$this->_url = $_GET['url'];

		}

		private function setExplode(){

			$this->_explode = explode('/', $this->_url);

		}

		private function setController(){

			$this->_controller = $this->_explode[0];

		}

		private function setAction(){
			$ac = (!isset($this->_explode[1]) || $this->_explode[1] == null || $this->_explode[1] == "index" ? "index_action" : $this->_explode[1]);
			// $ac = ($ac != 'index_action' ? $ac = 'geral' : "index_action");
			$this->_action = $ac;

		}

		private function setParams(){

			//define tema_ultima
			if (!empty($this->_explode[1])) {
				$this->_params['temau'] = $this->_explode[1];
			}

			unset($this->_explode[0], $this->_explode[1]);

			if(end($this->_explode) == null){

				array_pop($this->_explode);

			}

			//define id como Array de url 2
			if (!empty($this->_explode[2])) {
				$this->_params['id'] = $this->_explode[2];
			}

			//define id como Array de url 3
			if (!empty($this->_explode[3])) {
				//define tema 
				$this->_params['tema'] = $this->_explode[3];
			}

		}

		public function getParams($name = null){

			if($name != null){

				return $this->_params[$name];

			}else{

				return $this->_params;

			}

		}

		public function run(){
			
			$controller_path = CONTROLLER.$this->_controller.'Controller.php';

			//valida Classe e Arquivo
			if( !file_exists($controller_path) )
				// die("Erro no Controller");
				header('Location: http://sgpr.rbvradios.com.br/');

				require_once($controller_path);
				$app = new $this->_controller();
			//valida Classe e Arquivo

			//valida Metodo da classe
			if( !method_exists($app, $this->_action) )
				// die("Erro no Action");
				header('Location: http://sgpr.rbvradios.com.br/');

				$action = $this->_action;
				$app->$action();
			//valida Metodo da classe

		}

	}

?>