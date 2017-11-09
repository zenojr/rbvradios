<?php
	
	class auditoria extends Controller{

		public function index_action(){

			$auditoria = new auditoriaModel;

			$aud = $auditoria->get(null, null, "id DESC", "50", null, null);
			$datas['aud'] = $aud;
			echo json_encode($aud);
			
		}

		public function inserir(){

			//pega dados e faz Decode
			$dados = file_get_contents("php://input");
			$dadosFim = json_decode($dados, true);

			//só insere se dados nome Tiver conteudo
			if ($dadosFim['usuario']) {
				$auditoria = new auditoriaModel;
				$aud = $auditoria->insere($dadosFim);
				$datas['aud'] = $aud;
				echo json_encode($aud);

			}
			
		}
		
	}

?>