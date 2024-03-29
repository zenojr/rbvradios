<?php

	class segurancaHelper{

			private $usuarioID;
			private $usuarioNome;
			private $timeout;
			// protected $linkUrl = "http://localhost/centralAudioNew/deploy/";
			// protected $sairUrl = "http://localhost/centralAudioNew/deploy/login.php";	
			protected $linkUrl = "http://cda.rbvradios.com.br/";
			protected $sairUrl = "http://cda.rbvradios.com.br/login.php";			
			// protected $linkUrl = "https://rbvradios1.websiteseguro.com/central_de_audio/";
			// protected $sairUrl = "https://rbvradios1.websiteseguro.com/central_de_audio/login.php";

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