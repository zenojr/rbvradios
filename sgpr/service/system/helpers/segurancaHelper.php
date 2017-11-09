<?php

	class segurancaHelper{

			private $usuarioID;
			private $usuarioNome;
			private $timeout;
			//aplicação final
			protected $linkUrl = "http://sgpr.rbvradios.com.br/#/";
			protected $sairUrl = "http://sgpr.rbvradios.com.br/login.php";
			// links Externos com SSL 
			// protected $linkUrl = "https://rbvradios1.websiteseguro.com/sgpr/";
			// protected $sairUrl = "https://rbvradios1.websiteseguro.com/sgpr/login.php";
			// links internos - SOURCE
			// protected $linkUrl = "http://localhost/SGPR/source/";
			// protected $sairUrl = "http://localhost/SGPR/source/login.php";

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