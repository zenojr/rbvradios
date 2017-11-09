<?php

	class segurancaHelper{

			private $usuarioID;
			private $usuarioNome;
			private $timeout;
			// protected $linkUrl = "http://localhost/Central_de_Push/source/";
			// protected $sairUrl = "http://localhost/Central_de_Push/source/login.php";
			// protected $linkUrl = "http://localhost/Central_de_Push/deploy/";
			// protected $sairUrl = "http://localhost/Central_de_Push/deploy/login.php";	
			protected $linkUrl = "http://cdp.rbvradios.com.br/";
			protected $sairUrl = "http://cdp.rbvradios.com.br/login.php";			
			// protected $linkUrl = "https://rbvradios1.websiteseguro.com/cdp/";
			// protected $sairUrl = "https://rbvradios1.websiteseguro.com/cdp/login.php";

		public function protegePagina() {

			//startando as sessoes
			if(!isset($_SESSION)){
				session_start();
			}

			$this->usuarioID   = $_SESSION['usuarioID'];
			$this->usuarioNome = $_SESSION['usuarioNome'];
			// $this->timeout = $_SESSION['timeout'];

			//se nao existir
			if (empty($this->usuarioID) OR empty($this->usuarioNome)) {

				$this->expulsaVisitante();
				error_log("Tchau, Trouxa! - IP: ".$_SERVER['REMOTE_ADDR']);
				exit;

			}else{
				return true;
			}
		
		}

		//expulsa
		public function expulsaVisitante(){
			
			//startando as sessoes
			if(!isset($_SESSION)){
				session_start();
			}

			session_destroy();
			session_unset();
			header("Location:".$this->sairUrl);
		}

	}

?>